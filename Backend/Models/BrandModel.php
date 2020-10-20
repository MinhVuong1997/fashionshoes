<?php 
class BrandModel{
	public function modelRead($recordPerPage){
		$total = $this->modelTotal();
		$numPage = ceil($total/$recordPerPage);
		$page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"]-1 : 0;
		$from = $page * $recordPerPage;
		$conn = Connection::getInstance();
		$query = $conn->query("select * from brand order by id desc limit $from, $recordPerPage");
		return $query->fetchAll();
	}
	public function modelTotal(){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from brand order by id desc");
		return $query->rowCount();
	}
	public function modelGetRecord($id){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from brand where id = $id");
		return $query->fetch();
	}
	public function modelUpdate($id){
		$name = $_POST["name"];
		$conn = Connection::getInstance();
		$conn->query("update brand set name='$name' where id=$id");
	
	}
	public function modelCreate(){
		$name = $_POST["name"];
		$conn = Connection::getInstance();
		$conn->query("insert into brand set name ='$name'");
	}
	public function modelDelete($id){
		$conn = Connection::getInstance();
		$query = $conn->query("delete from brand where id = $id");
	}

}
 ?>
