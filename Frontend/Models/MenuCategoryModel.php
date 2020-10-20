<?php 
	class MenuCategoryModel{
		public function listCategory(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from categories where parent_id = 0 order by id asc");
			return $query->fetchAll();
		}
		public function listCategorySub($category_id){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from categories where parent_id = $category_id order by id asc");
			return $query->fetchAll();
		}
	}
 ?>