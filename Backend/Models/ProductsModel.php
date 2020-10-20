<?php 
class ProductsModel{
	public function modelRead($recordPerPage){
		$total = $this->modelTotal();
		$numPage = ceil($total/$recordPerPage);
		$page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"]-1 : 0;
		$from = $page * $recordPerPage;
		$conn = Connection::getInstance();
		$query = $conn->query("select * from products order by id desc limit $from, $recordPerPage");
		return $query->fetchAll();
	}
	public function modelTotal(){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from products order by id desc");
		return $query->rowCount();
	}
	public function modelGetRecord($id){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from products where id = $id");
		return $query->fetch();
	}
	public function modelUpdate($id){
		$name = $_POST["name"];
		$category_id = $_POST["category_id"];
		$brand_id = $_POST["brand_id"];
		$price = $_POST["price"];
		$discount = $_POST["discount"];
		$description = $_POST["description"];
		$content = $_POST["content"];
		$hot = isset($_POST["hot"]) ? 1 : 0;
		$status = $_POST["status"];
		$conn = Connection::getInstance();
		$conn->query("update products set name='$name', category_id=$category_id, brand_id=$brand_id,price=$price, discount=$discount, description='$description', content='$content', hot=$hot, status=$status where id=$id");
		//
		if ($_FILES["photo"]["name"]!= ""){
			$oldImage = $conn->query("select photo from products where id=$id");
				if($oldImage->rowCount() > 0){
					//lay mot ban ghi
					$oldPhoto = $oldImage->fetch();
					//xoa anh cu bang ham unlink
					if(file_exists('../Assets/Upload/Products/'.$oldPhoto->photo))
						unlink('../Assets/Upload/Products/'.$oldPhoto->photo);
				}

			$oldImage1 = $conn->query("select photo from product_images where product_id=$id");
			if($oldImage1->rowCount() > 0){
				$oldPhoto = $oldImage1->fetchAll();
				//xoa anh cu bang ham unlink
				foreach ($oldPhoto as $value) {
					if(file_exists('../Assets/Upload/Products/'.$value->photo))
					unlink('../Assets/Upload/Products/'.$value->photo);
				}
				
			}
			$photo = time().$_FILES["photo"]["name"];
			move_uploaded_file($_FILES["photo"]["tmp_name"], "../Assets/Upload/Products/".$photo);
			$conn->query("update products set photo='$photo' where id=$id ");
		}
		//Gallery
		if (!empty(array_filter($_FILES["images"]["name"]))){
			$conn->query("delete from product_images where product_id=$id ");
			foreach ($_FILES["images"]["name"] as $key => $value) {
				$images = time().$value;
				move_uploaded_file($_FILES["images"]["tmp_name"][$key], "../Assets/Upload/Products/".$images);
				$conn->query("insert into product_images set photo='$images', product_id=$id ");
			}
		}
		//
		$parameters = isset($_POST["parameters"]) ? $_POST["parameters"]:array();
			$conn->query("delete from product_parameters where product_id = $id");
			foreach($parameters as $parameter_id){
				$conn->query("insert into product_parameters set parameter_id=$parameter_id, product_id=$id");
			}
	}
	public function modelCreate(){
		$name = $_POST["name"];
		$category_id = $_POST["category_id"];
		$brand_id = $_POST["brand_id"];
		$price = $_POST["price"];
		$discount = $_POST["discount"];
		$description = $_POST["description"]; 
		$content = $_POST["content"];
		$status = $_POST["status"];
		$hot = isset($_POST["hot"]) ? 1 : 0;
		$photo = "";
		//
		if ($_FILES["photo"]["name"]!= ""){
			$photo = time().$_FILES["photo"]["name"];
			move_uploaded_file($_FILES["photo"]["tmp_name"], "../Assets/Upload/Products/".$photo);
		}
		$conn = Connection::getInstance();
		$conn->query("insert into products set name='$name', category_id=$category_id,brand_id=$brand_id, price=$price, discount=$discount, description='$description', content='$content', hot=$hot,status=$status, photo='$photo'");

		$product_id = $conn->lastInsertId();
		//Gallery
		if (!empty(array_filter($_FILES["images"]["name"]))){
			foreach ($_FILES["images"]["name"] as $key => $value) {
				$images = time().$value;
				move_uploaded_file($_FILES["images"]["tmp_name"][$key], "../Assets/Upload/Products/".$images);
			$conn->query("insert into product_images set photo ='$images', product_id = $product_id ");
			}
		}
		//
		$parameters = isset($_POST["parameters"]) ? $_POST["parameters"]:array();
			foreach($parameters as $parameter_id){
				$conn->query("insert into product_parameters set parameter_id=$parameter_id, product_id=$product_id");
			}
	}
	public function modelDelete($id){
		$conn = Connection::getInstance();
		$oldImage = $conn->query("select photo from products where id=$id");
				if($oldImage->rowCount() > 0){
					//lay mot ban ghi
					$oldPhoto = $oldImage->fetch();
					//xoa anh cu bang ham unlink
					if(file_exists('../Assets/Upload/Products/'.$oldPhoto->photo))
						unlink('../Assets/Upload/Products/'.$oldPhoto->photo);
				}
		$oldImage1 = $conn->query("select photo from product_images where product_id=$id");
			if($oldImage1->rowCount() > 0){
				//lay mot ban ghi
				$oldPhoto = $oldImage1->fetchAll();
				//xoa anh cu bang ham unlink
				foreach ($oldPhoto as $value) {
					if(file_exists('../Assets/Upload/Products/'.$value->photo))
					unlink('../Assets/Upload/Products/'.$value->photo);
				}
				
			}
		$conn->query("delete from products where id = $id");
		$conn->query("delete from product_parameters where product_id = $id");
		$conn->query("delete from product_images where product_id = $id");
	}
	public function modelGetSubCategories($id){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from categories where parent_id = $id");
		return $query->fetchAll();
	}
	public function modelGetCategories(){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from categories where parent_id = 0 order by id asc");
		return $query->fetchAll();
	}
	public function modelGetCategoryName($id){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from categories where id = $id");
			$record = $query->fetch();
			return $record->name;
	}
	public function modelGetBrand(){
		$conn = Connection::getInstance();
		$query = $conn->query("select * from brand order by id desc");
		return $query->fetchAll();
	}

	public function modelGetParameters(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from parameters where parent_id = 0 order by id desc");
			return $query->fetchAll();
		}
	public function modelGetSubParameters($parent_id){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from parameters where parent_id = $parent_id");
			return $query->fetchAll();
		}
	public function modelCheckProductParameters($id,$parameter_id){
		$conn = Connection::getInstance();
		$query = $conn->query("select id from product_parameters where product_id = $id and parameter_id = $parameter_id");
		if($query->rowCount() > 0)
			return true;
		return false;
	}

}
 ?>
