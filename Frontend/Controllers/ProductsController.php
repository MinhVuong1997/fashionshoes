<?php 
	include "Models/ProductsModel.php";
	$_SESSION["redirectURL"] = $_SERVER["REQUEST_URI"];
	class ProductsController extends ProductsModel{
		public function categories(){
			$category_id = isset($_GET["id"]) ? $_GET["id"] : 0;
			$recordPerPage = 8;
			$categoryName = $this->modelGetCategory($category_id);
			$numPage = ceil($this->modelTotal($category_id)/$recordPerPage);
			$listRecord = $this->modelRead($category_id,$recordPerPage);
			include "Views/ProductsView.php";
		}
		public function detail(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			$record = $this->modelGetProduct($id);
			include "Views/ProductsDetailView.php";
		}
		public function all(){
			$recordPerPage = 8;
			$categoryName = 'Tất cả sản phẩm';
			$numPage = ceil($this->modelTotalAllProducts()/$recordPerPage);
			$listRecord = $this->modelReadAllProducts($recordPerPage);
			include "Views/ProductsView.php";
		}
		public function collection(){
			$collection_id = isset($_GET["id"]) ? $_GET["id"] : 0;
			$recordPerPage = 8;
			$categoryName = $this->modelGetCollection($collection_id);
			$numPage = ceil($this->modelTotalCollection($collection_id)/$recordPerPage);
			$listRecord = $this->modelReadCollection($collection_id,$recordPerPage);
			include "Views/ProductsView.php";
		}
	}
 ?>