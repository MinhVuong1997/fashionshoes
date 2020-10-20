<?php 
	class SliderModel{
	public function modelRead($recordPerPage){
		$total = $this->modelTotal();
		$numPage = ceil($total/$recordPerPage);
		$page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"]-1 : 0;
		$from = $page * $recordPerPage;
		$conn = Connection::getInstance();
		$query = $conn->query("select * from slider order by id desc limit $from, $recordPerPage");
		return $query->fetchAll();
	}
	public function modelTotal(){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from slider order by id desc");
		return $query->rowCount();
	}
	public function modelGetRecord($id){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from slider where id = $id");
		return $query->fetch();
	}
	public function modelUpdate($id){
		$name = $_POST["name"];
		$url = $_POST["url"];
		$type = isset($_POST["type"]) ? 1 : 0;
		$conn = Connection::getInstance();
		$conn->query("update slider set name='$name',url='$url',type=$type where id=$id");

		//
		if ($_FILES["photo"]["name"]!= ""){
			$oldImage = $conn->query("select photo from slider where id=$id");
				if($oldImage->rowCount() > 0){
					//lay mot ban ghi
					$oldPhoto = $oldImage->fetch();
					//xoa anh cu bang ham unlink
					if(file_exists('../Assets/Upload/Slider/'.$oldPhoto->photo))
						unlink('../Assets/Upload/Slider/'.$oldPhoto->photo);
				}				
			$photo = time().$_FILES["photo"]["name"];
			move_uploaded_file($_FILES["photo"]["tmp_name"], "../Assets/Upload/Slider/".$photo);
			$conn->query("update slider set photo='$photo' where id=$id ");
		}
	}
	public function modelCreate(){
		$name = $_POST["name"];
		$url = $_POST["url"];
		$type = isset($_POST["type"]) ? 1 : 0;
		$photo = "";
		//
		if ($_FILES["photo"]["name"]!= ""){
			$photo = time().$_FILES["photo"]["name"];
			move_uploaded_file($_FILES["photo"]["tmp_name"], "../Assets/Upload/Slider/".$photo);
		}

		$conn = Connection::getInstance();
		$conn->query("insert into slider set name='$name',url='$url',type=$type, photo='$photo'");
	}
	public function modelDelete($id){
		$conn = Connection::getInstance();
		$oldImage = $conn->query("select photo from slider where id=$id");
				if($oldImage->rowCount() > 0){
					//lay mot ban ghi
					$oldPhoto = $oldImage->fetch();
					//xoa anh cu bang ham unlink
					if(file_exists('../Assets/Upload/Slider/'.$oldPhoto->photo))
						unlink('../Assets/Upload/Slider/'.$oldPhoto->photo);
				}
		$conn->query("delete from slider where id = $id");
	}
	public function modelUpdateType($id,$type){
		$conn = Connection::getInstance();
		$conn->query("update slider set type=$type where id=$id");
	}

}
 ?>
