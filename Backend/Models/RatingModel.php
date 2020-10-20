<?php 
class RatingModel{
	public function modelRead($recordPerPage){
		$total = $this->modelTotal();
		$numPage = ceil($total/$recordPerPage);
		$page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"]-1 : 0;
		$from = $page * $recordPerPage;
		$conn = Connection::getInstance();
		$query = $conn->query("select * from rating order by id desc limit $from, $recordPerPage");
		return $query->fetchAll();
	}
	public function modelTotal(){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from rating order by id desc");
		return $query->rowCount();
	}
	public function modelGetProductName($product_id){
		$conn = Connection::getInstance();
		$query = $conn->query("select name from products where id = $product_id");
		$result = $query->fetch();
		return $result->name;
	}
	public function modelGetCustomerName($customer_id){
		$conn = Connection::getInstance();
		$query = $conn->query("select name from customers where id = $customer_id");
		$result = $query->fetch();
		return $result->name;
	}
	public function modelDelete($id){
		$conn = Connection::getInstance();
		$query = $conn->query("delete from rating where id = $id");
	}
}
 ?>
