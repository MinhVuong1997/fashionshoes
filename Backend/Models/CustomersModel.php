<?php 
class CustomersModel{
	public function modelRead($recordPerPage){
		$total = $this->modelTotal();
		$numPage = ceil($total/$recordPerPage);
		$page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"]-1 : 0;
		$from = $page * $recordPerPage;
		$conn = Connection::getInstance();
		$query = $conn->query("select * from customers order by id desc limit $from, $recordPerPage");
		return $query->fetchAll();
	}
	public function modelTotal(){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from customers order by id desc");
		return $query->rowCount();
	}
	public function modelGetRecord($id){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from customers where id = $id");
		return $query->fetch();
	}
	public function modelDelete($id){
		$conn = Connection::getInstance();
		$query = $conn->query("delete from customers where id = $id");
	}
}
 ?>
