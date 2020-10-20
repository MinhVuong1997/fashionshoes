<?php 
class ParametersModel{
	public function modelRead($recordPerPage){
		$total = $this->modelTotal();
		$numPage = ceil($total/$recordPerPage);
		$page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"]-1 : 0;
		$from = $page * $recordPerPage;
		$conn = Connection::getInstance();
		$query = $conn->query("select * from parameters where parent_id <> 0 order by parent_id desc limit $from, $recordPerPage");
		return $query->fetchAll();
	}
	public function modelTotal(){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from parameters order by id desc");
		return $query->rowCount();
	}
	public function modelGetRecord($id){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from parameters where id = $id");
		return $query->fetch();
	}
	public function modelUpdate($id){
		$name = $_POST["name"];
		$parent_id = $_POST["parent_id"];
		$conn = Connection::getInstance();
		$conn->query("update parameters set name='$name', parent_id=$parent_id where id=$id");
	
	}
	public function modelCreate(){
		$name = $_POST["name"];
		$parent_id = $_POST["parent_id"];
		$conn = Connection::getInstance();
		$conn->query("insert into parameters set name ='$name', parent_id=$parent_id");
	}
	public function modelDelete($id){
		$conn = Connection::getInstance();
		$query = $conn->query("delete from parameters where id = $id");
	}
	public function modelGetParameter($parent_id){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from parameters where id = $parent_id");
		$record = $query->fetch();
		return $record->name;
	}
	public function modelGetParameters(){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from parameters where parent_id = 0");
		return $query->fetchAll();
	}
}
 ?>
