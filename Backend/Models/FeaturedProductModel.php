<?php 
	class FeaturedProductModel{
	public function modelRead($recordPerPage){
		$total = $this->modelTotal();
		$numPage = ceil($total/$recordPerPage);
		$page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"]-1 : 0;
		$from = $page * $recordPerPage;
		$conn = Connection::getInstance();
		$query = $conn->query("select * from featured_product order by id desc limit $from, $recordPerPage");
		return $query->fetchAll();
	}
	public function modelTotal(){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from featured_product order by id desc");
		return $query->rowCount();
	}
	public function modelGetRecord($id){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from featured_product where id = $id");
		return $query->fetch();
	}
	public function modelUpdate($id){
		$name = $_POST["name"];
		$description = $_POST["description"];
		$content = $_POST["content"];
		$size = $_POST["size"];
		$product_id = $_POST["product_id"];
		$type = isset($_POST["type"]) ? 1 : 0;
		$conn = Connection::getInstance();
		if($type==1){
			$conn->query("update featured_product set name='$name', description='$description', content='$content', size='$size',product_id=$product_id,type=1 where id=$id");
			$conn->query("update featured_product set type=0 where id<>$id");
		}
		else{
			$conn->query("update featured_product set name='$name', description='$description', content='$content', size='$size',product_id=$product_id,type=0 where id=$id");
		}

		//
		if ($_FILES["photo"]["name"]!= ""){
			$oldImage = $conn->query("select photo from featured_product where id=$id");
				if($oldImage->rowCount() > 0){
					//lay mot ban ghi
					$oldPhoto = $oldImage->fetch();
					//xoa anh cu bang ham unlink
					if(file_exists('../Assets/Upload/Products/'.$oldPhoto->photo))
						unlink('../Assets/Upload/Products/'.$oldPhoto->photo);
				}				
			$photo = time().$_FILES["photo"]["name"];
			move_uploaded_file($_FILES["photo"]["tmp_name"], "../Assets/Upload/Products/".$photo);
			$conn->query("update featured_product set photo='$photo' where id=$id ");
		}
	}
	public function modelCreate(){
		$name = $_POST["name"];
		$description = $_POST["description"]; 
		$content = $_POST["content"];
		$size = $_POST["size"];
		$product_id = $_POST["product_id"];
		$type = isset($_POST["type"]) ? 1 : 0;
		$photo = "";
		//
		if ($_FILES["photo"]["name"]!= ""){
			$photo = time().$_FILES["photo"]["name"];
			move_uploaded_file($_FILES["photo"]["tmp_name"], "../Assets/Upload/Products/".$photo);
		}

		$conn = Connection::getInstance();
		if($type==1){
		$conn->query("insert into featured_product set name='$name', description='$description', content='$content', size='$size',product_id=$product_id,type=1, photo='$photo'");
		$last_id = $conn->lastInsertId();
		$conn->query("update featured_product set type=0 where id<>$last_id");
		}
		else{
			$conn->query("insert into featured_product set name='$name', description='$description', content='$content', size='$size',product_id=$product_id,type=0, photo='$photo'");
		}

	}
	public function modelDelete($id){
		$conn = Connection::getInstance();
		$oldImage = $conn->query("select photo from featured_product where id=$id");
				if($oldImage->rowCount() > 0){
					//lay mot ban ghi
					$oldPhoto = $oldImage->fetch();
					//xoa anh cu bang ham unlink
					if(file_exists('../Assets/Upload/Products/'.$oldPhoto->photo))
						unlink('../Assets/Upload/Products/'.$oldPhoto->photo);
				}
		$conn->query("delete from featured_product where id = $id");
	}
	public function modelUpdateType($id,$type){
		$conn = Connection::getInstance();
		if($type==1){
			$conn->query("update featured_product set type=1 where id=$id");
			$conn->query("update featured_product set type=0 where id<>$id");
		}
		else{
			$conn->query("update featured_product set type=$type where id=$id");
		}
		
	}
	public function modelGetProduct(){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from products order by id desc");
		return $query->fetchAll();
	}

	public function modelCheckFeaturedProduct($id,$product_id){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from featured_product where id = $id and product_id = $product_id");
		if($query->rowCount() > 0)
			return true;
		return false;
	}

}
 ?>
