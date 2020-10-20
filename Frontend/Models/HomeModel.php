<?php 
	class HomeModel{
		public function modelNewProduct(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products order by id desc limit 0,10");
			return $query->fetchAll();
		}
		public function modelHotProduct(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where hot = 1 order by id desc limit 0,10");
			return $query->fetchAll();
		}
		public function listCategories(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from categories where id in (select category_id from products where categories.id = products.category_id) order by id desc");
			return $query->fetchAll();
		}
		public function listProducts($category_id){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where category_id = $category_id order by id desc limit 0,8");
			return $query->fetchAll();
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
		public function modelFeaturedProduct(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from featured_product where type = 1");
			return $query->fetchAll();
		}
		public function modelGetSlider(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from slider where type = 1 order by id desc");
			return $query->fetchAll();
		}
		public function modelTotalSlider(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from slider where type = 1");
			return $query->rowCount();
		}
		public function modelGetCollection(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from collection where type = 1 order by id desc");
			return $query->fetchAll();
		}
		public function modelGetBlog(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from news order by id desc");
			return $query->fetchAll();
		}
		public function modelGetAboutUs(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from about_us");
			return $query->fetchAll();
		}
	}
 ?>