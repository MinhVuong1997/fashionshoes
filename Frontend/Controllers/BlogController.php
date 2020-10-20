<?php 
	include "Models/BlogModel.php";
	class BlogController extends BlogModel{
		public function read(){
			$recordPerPage = 10;
			//tinh so trang
			$numPage = ceil($this->modelTotal()/$recordPerPage);
			//goi ham de lay du lieu
			$listRecord = $this->modelRead($recordPerPage);
			include "Views/BlogView.php";
		}
		public function detail(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			$record = $this->modelGetRecord($id);
			include "Views/BlogDetailView.php";
		}
	}
 ?>