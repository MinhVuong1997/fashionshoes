<?php 
	class ProductsModel{
		//ham liet ke danh sach cac ban ghi, co phan trang
		public function modelRead($category_id,$recordPerPage){
			//lay tong to so ban ghi
			$total = $this->modelTotal($category_id);
			//tinh so trang
			$numPage = ceil($total/$recordPerPage);
			//lay so trang hien tai truyen tu url
			$page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"]-1 : 0;
			//lay tu ban ghi nao
			$from = $page * $recordPerPage;
			$sqlOrderBy =" order by id desc";
			$sort = isset($_GET["sort"]) ? $_GET["sort"] : "";
			switch ($sort) {
				case 'priceASC':
					$sqlOrderBy = " order by price asc";
					break;
				case 'priceDESC':
					$sqlOrderBy = " order by price desc";
					break;
				case 'nameASC':
					$sqlOrderBy = " order by name asc";
					break;
				case 'nameDESC':
					$sqlOrderBy = " order by name desc";
					break;
			} 
			//thuc hien truy van
			$conn = Connection::getInstance();
			$query = $conn->query("select p.* from products p inner join categories cc on cc.id = p.category_id left join categories cp on cp.id = cc.parent_id where cc.id = $category_id or cp.id = $category_id $sqlOrderBy limit $from, $recordPerPage");
			//tra ve tat ca cac ban truy van duoc
			return $query->fetchAll();
		}
		//ham tinh tong so ban ghi
		public function modelTotal($category_id){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select p.* from products p inner join categories cc on cc.id = p.category_id left join categories cp on cp.id = cc.parent_id where cc.id = $category_id or cp.id = $category_id order by p.id desc");
			return $query->rowCount();
			//---
		}
		
		//lay mot ban ghi
		public function modelGetProduct($id){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where id = $id");
			//tra ve mot ban ghi
			return $query->fetch();
			//---
		}
		public function modelGetCategory($category_id){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select * from categories where id = $category_id");
			//tra ve mot ban ghi
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

		public function modelReadAllProducts($recordPerPage){
		//lay tong to so ban ghi
		$total = $this->modelTotalAllProducts();
		//tinh so trang
		$numPage = ceil($total/$recordPerPage);
		//lay so trang hien tai truyen tu url
		$page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"]-1 : 0;
		//lay tu ban ghi nao
		$from = $page * $recordPerPage;
		$sqlOrderBy =" order by id desc";
		$sort = isset($_GET["sort"]) ? $_GET["sort"] : "";
		switch ($sort) {
			case 'priceASC':
				$sqlOrderBy = " order by price asc";
				break;
			case 'priceDESC':
				$sqlOrderBy = " order by price desc";
				break;
			case 'nameASC':
				$sqlOrderBy = " order by name asc";
				break;
			case 'nameDESC':
				$sqlOrderBy = " order by name desc";
				break;
		} 
		//thuc hien truy van
		$conn = Connection::getInstance();
		$query = $conn->query("select * from products $sqlOrderBy limit $from, $recordPerPage");
		//tra ve tat ca cac ban truy van duoc
		return $query->fetchAll();
		}
		//ham tinh tong so ban ghi
		public function modelTotalAllProducts(){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products");
			//lay tong so ban ghi
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
			//lay tong to so ban ghi
			$total = $this->modelTotal($collection_id);
			//tinh so trang
			$numPage = ceil($total/$recordPerPage);
			//lay so trang hien tai truyen tu url
			$page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"]-1 : 0;
			//lay tu ban ghi nao
			$from = $page * $recordPerPage;
			$sqlOrderBy =" order by id desc";
			$sort = isset($_GET["sort"]) ? $_GET["sort"] : "";
			switch ($sort) {
				case 'priceASC':
					$sqlOrderBy = " order by price asc";
					break;
				case 'priceDESC':
					$sqlOrderBy = " order by price desc";
					break;
				case 'nameASC':
					$sqlOrderBy = " order by name asc";
					break;
				case 'nameDESC':
					$sqlOrderBy = " order by name desc";
					break;
			} 
			//thuc hien truy van
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where id in(select product_id from product_collection where collection_id = $collection_id) $sqlOrderBy limit $from, $recordPerPage");
			//tra ve tat ca cac ban truy van duoc
			return $query->fetchAll();
		}
		//ham tinh tong so ban ghi
		public function modelTotalCollection($collection_id){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select product_id from product_collection where collection_id = $collection_id order by id desc");
			//lay tong so ban ghi
			return $query->rowCount();
			//---
		}
		
		public function modelGetCollection($collection_id){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select * from collection where id = $collection_id");
			//tra ve mot ban ghi
			$record = $query->fetch();
			return $record->title;
			//---
		}
	}
 ?>