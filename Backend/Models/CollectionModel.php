<?php 
	class CollectionModel{
	public function modelRead($recordPerPage){
		$total = $this->modelTotal();
		$numPage = ceil($total/$recordPerPage);
		$page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"]-1 : 0;
		$from = $page * $recordPerPage;
		$conn = Connection::getInstance();
		$query = $conn->query("select * from collection order by id desc limit $from, $recordPerPage");
		return $query->fetchAll();
	}
	public function modelTotal(){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from collection order by id desc");
		return $query->rowCount();
	}
	public function modelGetRecord($id){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from collection where id = $id");
		return $query->fetch();
	}
	public function modelUpdate($id){
		$subtitle = $_POST["subtitle"];
		$title = $_POST["title"];
		$type = isset($_POST["type"]) ? 1 : 0;
		$conn = Connection::getInstance();
		$conn->query("update collection set subtitle='$subtitle',title='$title',type=$type where id=$id");

		//
		$products = isset($_POST["products"]) ? $_POST["products"]:array();
		$conn->query("delete from product_collection where collection_id = $id");
		foreach($products as $product_id){
			$conn->query("insert into product_collection set collection_id=$id, product_id=$product_id");
		}
		
		if ($_FILES["photo"]["name"]!= ""){
			$oldImage = $conn->query("select photo from collection where id=$id");
				if($oldImage->rowCount() > 0){
					//lay mot ban ghi
					$oldPhoto = $oldImage->fetch();
					//xoa anh cu bang ham unlink
					if(file_exists('../Assets/Upload/Collection/'.$oldPhoto->photo))
						unlink('../Assets/Upload/Collection/'.$oldPhoto->photo);
				}				
			$photo = time().$_FILES["photo"]["name"];
			move_uploaded_file($_FILES["photo"]["tmp_name"], "../Assets/Upload/Collection/".$photo);
			$conn->query("update collection set photo='$photo' where id=$id ");
		}
	}
	public function modelCreate(){
		$subtitle = $_POST["subtitle"];
		$title = $_POST["title"];
		$type = isset($_POST["type"]) ? 1 : 0;
		$photo = "";
		//
		if ($_FILES["photo"]["name"]!= ""){
			$photo = time().$_FILES["photo"]["name"];
			move_uploaded_file($_FILES["photo"]["tmp_name"], "../Assets/Upload/collection/".$photo);
		}

		$conn = Connection::getInstance();
		$conn->query("insert into collection set subtitle='$subtitle',title='$title',type=$type, photo='$photo'");
		$collection_id = $conn->lastInsertId();
		$products = isset($_POST["products"]) ? $_POST["products"]:array();
		foreach($products as $product_id){
			$conn->query("insert into product_collection set collection_id=$collection_id, product_id=$product_id");
		}
	}
	public function modelDelete($id){
		$conn = Connection::getInstance();
		$oldImage = $conn->query("select photo from collection where id=$id");
				if($oldImage->rowCount() > 0){
					//lay mot ban ghi
					$oldPhoto = $oldImage->fetch();
					//xoa anh cu bang ham unlink
					if(file_exists('../Assets/Upload/Collection/'.$oldPhoto->photo))
						unlink('../Assets/Upload/Collection/'.$oldPhoto->photo);
				}
		$conn->query("delete from collection where id = $id");
		$conn->query("delete from product_collection where collection_id = $id");
	}
	public function modelUpdateType($id,$type){
		$conn = Connection::getInstance();
		$conn->query("update collection set type=$type where id=$id");
	}
	public function modelGetProduct(){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from products order by id desc");
		return $query->fetchAll();
	}

	public function modelCheckProductCollection($id,$product_id){
		$conn = Connection::getInstance();
		$query = $conn->query("select id from product_collection where collection_id = $id and product_id = $product_id");
		if($query->rowCount() > 0)
			return true;
		return false;
	}

}
 ?>
