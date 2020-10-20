<?php 
	include "../../Application/Connection.php";
	$email = $_POST["email"];
	$conn = Connection::getInstance();
	$query = $conn->query("select id from email where email = '$email' union select id from customers where email = '$email'");
	$count = $query->rowCount();
	if($count == 0){
		$query = $conn->query("insert into email set email = '$email'");
		echo '<div class="alert alert-success">Đăng kí nhận tin thành công</div>';
	}
	else{
		echo '<div class="alert alert-warning">Email đã tồn tại</div>';
	}
 ?>