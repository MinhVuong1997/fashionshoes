<?php 
class UsersModel{
	public function modelRead($recordPerPage){
		$total = $this->modelTotal();
		$numPage = ceil($total/$recordPerPage);
		$page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"]-1 : 0;
		$from = $page * $recordPerPage;
		$conn = Connection::getInstance();
		$query = $conn->query("select * from users order by id desc limit $from, $recordPerPage");
		return $query->fetchAll();
	}
	public function modelTotal(){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from users order by id desc");
		return $query->rowCount();
	}
	public function modelGetRecord($id){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from users where id = $id");
		return $query->fetch();
	}
	public function modelUpdate($id){
		$name = $_POST["name"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$conn = Connection::getInstance();
		$check = $conn->query("select id from users where email='$email' and id <> $id");
		$numCheck = $check->rowCount();
		if ($numCheck == 0){
			$conn->query("update users set name = '$name', email='$email' where id = $id");
			if ($password != ""){
				$password = md5($password);
				$conn->query("update users set password='$password' where id=$id");
			}
		}
	}
	public function modelCreate(){
		$name = $_POST["name"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$password = md5($password);
		$conn = Connection::getInstance();
		$conn->query("insert into users set name ='$name', email='$email', password='$password'");

	}
	public function modelDelete($id){
		$conn = Connection::getInstance();
		$query = $conn->query("delete from users where id = $id");
	}
}
 ?>
