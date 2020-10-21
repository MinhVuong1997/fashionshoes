<?php 
	class ProductsModel{
		public function modelRead($category_id,$recordPerPage){
			$total = $this->modelTotal($category_id);
			$numPage = ceil($total/$recordPerPage);
			$page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"]-1 : 0;
			$from = $page * $recordPerPage; 
			
			$conn = Connection::getInstance();
			$query = $conn->query("select p.* from products p inner join categories cc on cc.id = p.category_id left join categories cp on cp.id = cc.parent_id where cc.id = $category_id or cp.id = $category_id order by id desc limit $from, $recordPerPage");
			return $query->fetchAll();
		}
		
		public function modelTotal($category_id){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select p.* from products p inner join categories cc on cc.id = p.category_id left join categories cp on cp.id = cc.parent_id where cc.id = $category_id or cp.id = $category_id order by p.id desc");
			return $query->rowCount();
			//---
		}
		
		public function modelGetProduct($id){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where id = $id");
			return $query->fetch();
			//---
		}
		public function modelGetCategory($category_id){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select * from categories where id = $category_id");
			$record = $query->fetch();
			return $record->name;
			//---
		}
		public function modelGetBrand(){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select * from brand");
			return $query->fetchAll();
			//---
		}
		public function modelGetColor(){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select id,name from parameters where parent_id in( select id from parameters where name = 'Màu sắc')");
			return $query->fetchAll();
			//---
		}
		public function modelGetSize(){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select id,name from parameters where parent_id in( select id from parameters where name = 'Size')");
			return $query->fetchAll();
			//---
		}
		public function modelGetProductColor($product_id){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select * from parameters where id in (select parameter_id from product_parameters where product_id = $product_id) and parent_id in (select id from parameters where name='Màu sắc') ");
			return $query->fetchAll();
			//---
		}
		public function modelGetProductSize($product_id){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select * from parameters where id in (select parameter_id from product_parameters where product_id = $product_id) and parent_id in (select id from parameters where name='Size') ");
			return $query->fetchAll();
			//---
		}
		public function modelGetImages($product_id){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select photo from product_images where product_id=$product_id");
			return $query->fetchAll();
			//---
		}
		public function modelGetProductsRelated($product_id){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where id<>$product_id and category_id in (select category_id from products where id = $product_id) order by RAND()");
			return $query->fetchAll();
			//---
		}
		public function modelTotalProductsRelated($product_id){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where id<>$product_id and category_id in (select category_id from products where id = $product_id) order by RAND()");
			return $query->rowCount();
			//---
		}

		public function modelReadAllProducts($recordPerPage)
		{
			$total = $this->modelTotalAllProducts();
			$numPage = ceil($total/$recordPerPage);
			$page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"]-1 : 0;
			$from = $page * $recordPerPage; 
			
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products order by id desc limit $from, $recordPerPage");
			return $query->fetchAll();
		}
		
		public function modelTotalAllProducts(){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products");
			return $query->rowCount();
			//---
		}
		public function modelGetStar($product_id){
			$conn = Connection::getInstance();
			$query = $conn->query("select ROUND(AVG(star),1) as average from rating where product_id = $product_id");
			$result = $query->fetch();
			return $result->average;
		}
		public function modelGetTotalRating($product_id){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from rating where product_id = $product_id");
			$result = $query->rowCount();
			return $result;
		}
		public function modelReadCollection($collection_id,$recordPerPage){
			$total = $this->modelTotal($collection_id);
			$numPage = ceil($total/$recordPerPage);
			$page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"]-1 : 0;
			$from = $page * $recordPerPage;
			
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where id in(select product_id from product_collection where collection_id = $collection_id) order by id desc limit $from, $recordPerPage");
			return $query->fetchAll();
		}
		
		public function modelTotalCollection($collection_id){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select product_id from product_collection where collection_id = $collection_id order by id desc");
			return $query->rowCount();
			//---
		}
		
		public function modelGetCollection($collection_id){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select * from collection where id = $collection_id");
			$record = $query->fetch();
			return $record->title;
			//---
		}
	}
 ?>