<?php
include('../../Application/Connection.php');

if(isset($_POST["action"]))
{
  if($_POST["action"] == 'all'){
    $query = "SELECT * FROM products p where id !=''";
  }
  if($_POST["action"] == 'categories'){
    $query = "
  SELECT p.* from products p inner join categories cc on cc.id = p.category_id left join categories cp on cp.id = cc.parent_id where (cc.id = '".$_POST["category_id"]."' or cp.id = '".$_POST["category_id"]."')";
  }
  if($_POST["action"] == 'collection'){
    $query = "
  SELECT * FROM products p where id in (select product_id from product_collection where collection_id = '".$_POST["collection_id"]."')";
  }
 
 if(isset($_POST["brand"]))
 {
  $brand_filter = implode("','", $_POST["brand"]);
  $query .= " AND brand_id in('".$brand_filter."')";
 }
 if(isset($_POST["price"]))
 {
  $price_filter = $_POST["price"];
  foreach ($price_filter as $value) {
    if($value == '<500k'){$query .= " AND price- (price*discount)/100 < 500000 ";}
    if($value == '500k-1tr'){$query .= " AND price- (price*discount)/100 between 500000 AND 1000000 ";}
    if($value == '1tr-1tr5'){$query .= " AND price- (price*discount)/100 between 1000000 AND 1500000 ";}
    if($value == '>1tr5'){$query .= " AND price- (price*discount)/100 > 1500000";}
  }
 }
 if(isset($_POST["color"]))
 {
  $color_filter = implode("','", $_POST["color"]);
  $query .= "
   AND p.id in(select product_id from product_parameters where parameter_id IN('".$color_filter."'))
  ";
 }
 if(isset($_POST["size"]))
 {
  $size_filter = implode("','", $_POST["size"]);
  $query .= "
   AND p.id in(select product_id from product_parameters where parameter_id IN('".$size_filter."'))
  ";
 }

 $conn = Connection::getInstance();
 $statement = $conn->query($query);
 $total_row = $statement->rowCount();

 if(isset($_POST['sort']) && $_POST['sort'] != ''){
  if($_POST['sort'] == 'nameASC'){
    $query .= " order by name asc";
  }
  if($_POST['sort'] == 'nameDESC'){
    $query .= " order by name desc";
  }
  if($_POST['sort'] == 'priceASC'){
    $query .= " order by (price - price*discount/100) asc";
  }
  if($_POST['sort'] == 'priceDESC'){
    $query .= " order by (price - price*discount/100) desc";
  }
 }
 $recordPerPage = 8;
 $numPage = ceil($total_row/$recordPerPage);
 $page = isset($_POST["p"]) && $_POST["p"] > 0 ? $_POST["p"] : 1;
 $from = ($page-1) * $recordPerPage;
 $query .=" limit $from, $recordPerPage";
 $statement = $conn->query($query);
 $result = $statement->fetchAll();
 
 $output = '';
 
 if($total_row > 0)
 {
   foreach($result as $rows)
  {
  $conn = Connection::getInstance();
  $query = $conn->query("select ROUND(AVG(star),1) as average from rating where product_id = $rows->id");
  $result = $query->fetch();
  $star = $result->average;

  $conn = Connection::getInstance();
  $query = $conn->query("select * from rating where product_id = $rows->id");
  $totalrating = $query->rowCount();

      $output .= '
        <div class="col-md-3 col-6 p-3 product-item">
        <div class="image">
        <a href="product/detail/'.$rows->id.'"><img src="../Assets/Upload/Products/'.$rows->photo.'" alt=""></a>
         <button type="button" class="btn btn-sm add-to-cart" data-toggle="modal" data-target="#addtocart" data-id="'.$rows->id.'">
              <i class="fas fa-shopping-basket"></i>&nbsp;&nbsp;Mua ngay
          </button>';
        if($rows->hot == 1){
          $output .= '<div class="hot">
                      <img src="../Assets/Frontend/images/icon-hot.png" alt="">
                    </div>';
        }
        $output .= '</div>
        <div class="name">
          <h3><a href="product/detail/'.$rows->id.'">'.$rows->name.'</a></h3>
        </div>
        ';
      if ($rows->discount == 0){
        $output .= '
        <div class="price">
          <span>'.number_format($rows->price).'₫</span>
        </div>';
      }
      else{
        $output .= '
          <div class="discount">
          <span>- '.$rows->discount.'%</span>
        </div>
       <div class="price-safe">
          <span>'.number_format($rows->price - ($rows->price * $rows->discount)/100).'₫</span>
          <del class="price">'.number_format($rows->price).'₫</del>
        </div>
        ';
      }
        $output .= '<div class="star text-center">';
           if ($star == 0 && $star <= 0.5){
             $output .= '<span>&#9734;&#9734;&#9734;&#9734;&#9734;</span> <small>('.$totalrating.' đánh giá)</small>';
           }
           else if($star > 0.5 && $star <= 1.5){
             $output .= '<span>&#9733;&#9734;&#9734;&#9734;&#9734;</span> <small>('.$totalrating.' đánh giá)</small>';
           }
           else if($star > 1.5 && $star <= 2.5){
             $output .= '<span>&#9733;&#9733;&#9734;&#9734;&#9734;</span> <small>('.$totalrating.' đánh giá)</small>';
           }
           else if($star > 2.5 && $star <= 3.5){
             $output .= '<span>&#9733;&#9733;&#9733;&#9734;&#9734;</span> <small>('.$totalrating.' đánh giá)</small>';
           }
           else if($star > 3.5 && $star <= 4.5){
             $output .= '<span>&#9733;&#9733;&#9733;&#9733;&#9734;</span> <small>('.$totalrating.' đánh giá)</small>';
           }
           else if($star > 4.5 && $star <= 5){
             $output .= '<span>&#9733;&#9733;&#9733;&#9733;&#9733;</span> <small>('.$totalrating.' đánh giá)</small>';
           }
      $output .= '</div></div>';   
  }
  if($numPage > 1){
  $output .='
  <ul class="pagination col-12 p-3">';
  $previous_link = '';
  $next_link = '';
  $page_link = '';
  if($numPage > 4)
  {
    if($page < 5)
    {
      for($count = 1; $count <= 5; $count++)
      {
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $numPage;
    }
    else
    {
      $end_limit = $numPage - 5;
      if($page > $end_limit)
      {
        $page_array[] = 1;
        $page_array[] = '...';
        for($count = $end_limit; $count <= $numPage; $count++)
        {
          $page_array[] = $count;
        }
      }
      else
      {
        $page_array[] = 1;
        $page_array[] = '...';
        for($count = $page - 1; $count <= $page + 1; $count++)
        {
          $page_array[] = $count;
        }
        $page_array[] = '...';
        $page_array[] = $numPage;
      }
    }
  }
  else
  {
    for($count = 1; $count <= $numPage; $count++)
    {
      $page_array[] = $count;
    }
  }
  for($count = 0; $count < count($page_array); $count++)
  {
    if($page == $page_array[$count])
    {
      $page_link .= '
      <li class="page-item active">
        <a class="page-link" href="javascript:voi(0)" data-page="'.$page_array[$count].'">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
      </li>
      ';

      $previous_id = $page_array[$count] - 1;
      if($previous_id > 0)
      {
        $previous_link = '<li class="page-item"><a class="page-link" href="javascript:voi(0)" data-page="'.$previous_id.'">Prev</a></li>';
      }
      else
      {
        $previous_link = '
        <li class="page-item disabled">
          <a class="page-link" href="#">Prev</a>
        </li>
        ';
      }
      $next_id = $page_array[$count] + 1;
      if($next_id > $numPage)
      {
        $next_link = '
        <li class="page-item disabled">
          <a class="page-link" href="#">Next</a>
        </li>
          ';
      }
      else
      {
        $next_link = '<li class="page-item"><a class="page-link" href="javascript:voi(0)" data-page="'.$next_id.'">Next</a></li>';
      }
    }
    else
    {
      if($page_array[$count] == '...')
      {
        $page_link .= '
        <li class="page-item disabled">
            <a class="page-link" href="#">...</a>
        </li>
        ';
      }
      else
      {
        $page_link .= '
        <li class="page-item"><a class="page-link" href="javascript:voi(0)" data-page="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
        ';
      }
    }
  }
  $output .= $previous_link . $page_link . $next_link;
  $output .='</ul>';
}
}
else
 {
  $output = '<div class="col-12 text-center pt-4"><h5>Không có sản phẩm</h5></div>';
 }
 echo $output;
}
?>
