<?php 
	include "../../Application/Connection.php";

	$product_id = $_POST["product_id"];
	$output = '';

// Rating
	if(isset($_POST['action'])&&$_POST['action']=='rating'){
		$star = $_POST["star"];
		$customerId = $_POST["customerId"];
		$title = $_POST["title"];
		$comment = $_POST["comment"];

		$conn = Connection::getInstance();
		$query = $conn->query("insert into rating set product_id = $product_id, customerId = $customerId, title = '$title', comment = '$comment', star = $star, created = now()");
	}
//Load Rating
	if(isset($_POST['action'])&&$_POST['action']=='load_rating'){
		$conn = Connection::getInstance();
		$query = $conn->query("select id from rating where product_id = $product_id and star=1");
		$totalstar1 = $query->rowCount();

		$query = $conn->query("select id from rating where product_id = $product_id and star=2");
		$totalstar2 = $query->rowCount();

		$query = $conn->query("select id from rating where product_id = $product_id and star=3");
		$totalstar3 = $query->rowCount();

		$query = $conn->query("select id from rating where product_id = $product_id and star=4");
		$totalstar4 = $query->rowCount();

		$query = $conn->query("select id from rating where product_id = $product_id and star=5");
		$totalstar5 = $query->rowCount();

		$query = $conn->query("select ROUND(AVG(star),1) as average from rating where product_id = $product_id");
		$result = $query->fetch();
		if($result->average == null){
			$average = 0;
		}
		else
		{
			$average = $result->average;
		}
		$output .='
				 <div class="row">
				  <div class="col-md-2 col-4 d-flex align-items-center justify-content-center">
	                  <h5 class="text-center">'.$average.' <span>&#9733;</span></h5>
	              </div>
	              <div class="col-md-10 col-8 pt-3 votes">
	                  <h5><span>&#9733;&#9733;&#9733;&#9733;&#9733;</span> <small>('.$totalstar5.' votes)</small></h5>
	                  <h5><span>&#9733;&#9733;&#9733;&#9733;</span> <small>('.$totalstar4.' votes)</small></h5>
	                  <h5><span>&#9733;&#9733;&#9733;</span> <small>('.$totalstar3.' votes)</small></h5>
	                  <h5><span>&#9733;&#9733;</span> <small>('.$totalstar2.' votes)</small></h5>
	                  <h5><span>&#9733;</span> <small>('.$totalstar1.' votes)</small></h5>
	              </div>
	              </div>
	              <hr>
	              <div class="row">
	              <div class="col-12" id="comment_view">
		';
		$query = $conn->query("select * from rating where product_id = $product_id");
		$total = $query->rowCount();
		$start = $_POST["start"];
		$limit = $_POST["limit"];
		$numPage = ceil($total/$limit);
		$query = $conn->query("select * from rating where product_id = $product_id order by id desc limit $start, $limit");
		$result = $query->fetchAll();
		$rowResult = $query->rowCount();
		if($rowResult > 0){
			foreach ($result as $rows) {
				$customerId = $rows->customerId;
				$query = $conn->query("select name from customers where id = $customerId");
				$result = $query->fetch();
				$name = $result->name;
				$date = date_create( $rows->created);
		        $createdate = date_format($date, "d-m-Y H:i:s");
		        for ($i=1; $i <= $rows->star ; $i++) { 
		        	$output .='<span style="color:#EDB867">&#9733;</span>';
		        }
				$output .= '&nbsp;&nbsp;<span>'.$name.'</span>&nbsp;&nbsp;<sup>'.$createdate.'</sup>
							  <p class="mt-1 text-success"><small>'.$rows->title.'</small></p>
		                      <p class="mt-2">'.$rows->comment.'</p>
		                      <hr>
				';
			} 
			if($numPage > 1){
				$output .= '<div class="col-12 text-center loadmore p-0"><a href="javascript:void(0)" id="load_more">Xem thêm <i class="fas fa-angle-down"></i></a><hr></div>';
			}
		}
		else{
			$output .='<h5 class="text-center">Không có đánh giá nào</h5><hr>';
		}
		$output .= '</div></div>';
		
	}
//Load more rating
	if(isset($_POST['action'])&&$_POST['action']=='load_more'){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from rating where product_id = $product_id");
		$total = $query->rowCount();
		$start = $_POST["start"];
		$limit = $_POST["limit"];
		$numPage = ceil($total/$limit);
		$query = $conn->query("select * from rating where product_id = $product_id order by id desc limit $start, $limit");
		$result = $query->fetchAll();
		$rowResult = $query->rowCount();
		if($rowResult > 0){
			foreach ($result as $rows) {
				$customerId = $rows->customerId;
				$query = $conn->query("select name from customers where id = $customerId");
				$result = $query->fetch();
				$name = $result->name;
				$date = date_create( $rows->created);
		        $createdate = date_format($date, "d-m-Y H:i:s");
				for ($i=1; $i <= $rows->star ; $i++) { 
			        	$output .='<span style="color:#EDB867">&#9733;</span>';
			        }
					$output .= '&nbsp;&nbsp;<span>'.$name.'</span>&nbsp;&nbsp;<sup>'.$createdate.'</sup>
								<p class="mt-1 text-success"><small>'.$rows->title.'</small></p>
			                      <p class="mt-2">'.$rows->comment.'</p>
			                      <hr>
					';
			}
			if($start  < $numPage){
				$output .= '<div class="col-12 text-center loadmore p-0"><a href="javascript:void(0)" id="load_more">Xem thêm <i class="fas fa-angle-down"></i></a><hr></div>';
			}
		}
	}
	echo $output;
 ?>