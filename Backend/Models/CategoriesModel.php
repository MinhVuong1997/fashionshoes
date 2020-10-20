<?php 
class CategoriesModel{
	public function modelRead($recordPerPage){
		$total = $this->modelTotal();
		$numPage = ceil($total/$recordPerPage);
		$page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"]-1 : 0;
		$from = $page * $recordPerPage;
		$conn = Connection::getInstance();
		$query = $conn->query("select * from categories where parent_id = 0 order by id asc limit $from, $recordPerPage");
		return $query->fetchAll();
	}
	public function modelTotal(){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from categories order by id asc");
		return $query->rowCount();
	}
	public function modelGetRecord($id){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from categories where id = $id");
		return $query->fetch();
	}
	public function modelUpdate($id){
		$name = $_POST["name"];
		$parent_id = $_POST["parent_id"];
		$conn = Connection::getInstance();
		$conn->query("update categories set name='$name', parent_id=$parent_id where id=$id");
	
	}
	public function modelCreate(){
		$name = $_POST["name"];
		$parent_id = $_POST["parent_id"];
		$conn = Connection::getInstance();
		$conn->query("insert into categories set name ='$name', parent_id=$parent_id");
	}
	public function modelDelete($id){
		$conn = Connection::getInstance();
		$query = $conn->query("delete from categories where id = $id");
	}
	public function modelGetSubCategories($id){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from categories where parent_id = $id");
		return $query->fetchAll();
	}
	public function modelGetCategories($id){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from categories where parent_id = 0 and id <> $id order by id asc");
		return $query->fetchAll();
	}
}
 ?>
