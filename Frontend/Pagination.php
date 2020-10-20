<?php
$previous_link = '';
$next_link = '';
$page_link = '';
$page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"] : 1;
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
$output='';
for($count = 0; $count < count($page_array); $count++)
{
  if($page == $page_array[$count])
  {
    if(isset($_GET["action"])&&$_GET["action"]=="all"){
      $page_link .= '
    <li class="page-item active">
      <a class="page-link" href="product/all/page/'.$page_array[$count].'" data-page_number="'.$page_array[$count].'">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
    </li>
    ';
    }
    if(isset($_GET["action"])&&$_GET["action"]=="categories"){
      $page_link .= '
    <li class="page-item active">
      <a class="page-link" href="product/categories/'.$category_id.'/'.$page_array[$count].'" data-page_number="'.$page_array[$count].'">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
    </li>
    ';
    }
    if(isset($_GET["action"])&&$_GET["action"]=="collection"){
      $page_link .= '
    <li class="page-item active">
      <a class="page-link" href="product/collection/'.$collection_id.'/'.$page_array[$count].'" data-page_number="'.$page_array[$count].'">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
    </li>
    ';
    }
    
    $previous_id = $page_array[$count] - 1;
    if($previous_id > 0)
    {
      if(isset($_GET["action"])&&$_GET["action"]=="all"){
        $previous_link = '<li class="page-item"><a class="page-link" href="product/all/page/'.$previous_id.'" data-page_number="'.$previous_id.'">Prev</a></li>';
      }
      if(isset($_GET["action"])&&$_GET["action"]=="categories"){
        $previous_link = '<li class="page-item"><a class="page-link" href="product/categories/'.$category_id.'/'.$previous_id.'" data-page_number="'.$previous_id.'">Prev</a></li>';
      }
      if(isset($_GET["action"])&&$_GET["action"]=="collection"){
        $previous_link = '<li class="page-item"><a class="page-link" href="product/collection/'.$collection_id.'/'.$previous_id.'" data-page_number="'.$previous_id.'">Prev</a></li>';
      }
    }
    else
    {
      $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Prev </a>
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
      if(isset($_GET["action"])&&$_GET["action"]=="all"){
        $next_link = '<li class="page-item"><a class="page-link" href="product/all/page/'.$next_id.'" data-page_number="'.$next_id.'">Next</a></li>';
      }
      if(isset($_GET["action"])&&$_GET["action"]=="categories"){
        $next_link = '<li class="page-item"><a class="page-link" href="product/categories/'.$category_id.'/'.$next_id.'" data-page_number="'.$next_id.'">Next</a></li>';
      }
      if(isset($_GET["action"])&&$_GET["action"]=="collection"){
        $next_link = '<li class="page-item"><a class="page-link" href="product/collection/'.$collection_id.'/'.$next_id.'" data-page_number="'.$next_id.'">Next</a></li>';
      }
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
      if(isset($_GET["action"])&&$_GET["action"]=="all"){
        $page_link .= '
      <li class="page-item">
        <a class="page-link" href="product/all/page/'.$page_array[$count].'" data-page_number="'.$page_array[$count].'">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
      </li>
      ';
      }
      if(isset($_GET["action"])&&$_GET["action"]=="categories"){
        $page_link .= '
      <li class="page-item">
        <a class="page-link" href="product/categories/'.$category_id.'/'.$page_array[$count].'" data-page_number="'.$page_array[$count].'">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
      </li>
      ';
      }
      if(isset($_GET["action"])&&$_GET["action"]=="collection"){
        $page_link .= '
      <li class="page-item">
        <a class="page-link" href="product/collection/'.$collection_id.'/'.$page_array[$count].'" data-page_number="'.$page_array[$count].'">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
      </li>
      ';
      }
    }
  }
}
$output .= $previous_link . $page_link . $next_link;
echo $output;
?>