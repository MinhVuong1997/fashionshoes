<?php 
	include "../../Application/Connection.php";
	$orderId = $_POST["orderId"];
	$conn = Connection::getInstance();
 	$query = $conn->query("select * from orderdetails where order_id=$orderId");
 	$result = $query->fetchAll();

	$strResult = '';
	$strResult .= '
			<div class="row p-3">
	        <table class="table table-bordered table-responsive-sm">
	        	<tr class="text-center">
	        		<th>Tên sản phẩm</th>
	        		<th>Ảnh</th>
	        		<th>Giá</th>
	        		<th>Màu sắc</th>
	        		<th>Size</th>
	        		<th>Số lượng</th>
	        	</tr>
	        	';
	foreach ($result as $rows) {
			 	$query = $conn->query("select * from products where id=$rows->product_id");
			 	$products = $query->fetchAll();
			 	foreach ($products as $value) {
	        	$strResult .= '<tr class="text-center">
	        		<td>'.$value->name.'</td>
	        		<td><img src="../Assets/Upload/Products/'.$value->photo.'" style="width:100px;"></td>
	        		<td>'.number_format($rows->price).'₫</td>
	        		<td>'.$rows->color.'</td>
	        		<td>'.$rows->size.'</td>
	        		<td>'.$rows->quantity.'</td>
	        	</tr>';
				}
	}
	$customerId = $_POST["customerId"];
	$query = $conn->query("select * from customers where id= '".$customerId."'");
	$customer = $query->fetch();

	$query = $conn->query("select price from orders where id= '".$orderId."'");
	$totalPrice = $query->fetch();
	$strResult .= '</table>
    	</div>
    	<div class="row">
    		<div class="col-7">
    			<h5 class="pb-2">Thông tin giao hàng</h5>
    			<p>Người nhận: '.$customer->name.'</p>
    			<p>Điện thoại: '.$customer->phone.'</p>
    			<p>Địa chỉ: '.$customer->address.'</p>
    		</div>
    		<div class="col-5">
    			<h5 class="pb-2">Tổng cộng</h5>
    			<p>Tạm tính: <b>'.number_format($totalPrice->price).'₫</b></p>
    			<p>Phí vận chuyển: Miễn phí </p>
    			<p>Hình thức: Thanh toán khi nhận hàng</p>
    			<hr>
    			<p>Tổng cộng(Bao gồm VAT): <b>'.number_format($totalPrice->price).'₫</b></p>
    		</div>
    	</div>';
	echo $strResult;
 ?>