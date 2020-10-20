<?php 
class HomeModel{
	public function modelTotalNewOrder(){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from orders where status = 0");
		return $query->rowCount();
	}
	public function modelTotalRating(){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from rating");
		return $query->rowCount();
	}
	public function modelTotalCustomer(){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from customers");
		return $query->rowCount();
	}
	public function modelTotalProduct(){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from products");
		return $query->rowCount();
	}
}
 ?>
