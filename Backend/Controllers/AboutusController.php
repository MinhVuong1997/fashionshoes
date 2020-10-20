<?php 
	include "Models/AboutUsModel.php";
	class AboutUsController extends AboutUsModel{
		public function read(){
			$total = $this->modelTotal();
			$listRecord = $this->modelRead();
			include "Views/AboutUsView.php";
		}
		//edit ban ghi
		public function update(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//goi ham de lay du lieu truyen ra view
			$record = $this->modelGetRecord($id);
			$action = "index.php?controller=aboutus&action=updatePost&id=$id";
			//goi view
			include "Views/AboutUsCreateUpdateView.php";
		}
		//edit khi an nut submit
		public function updatePost(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//goi ham de update du lieu
			$this->modelUpdate($id);
			//di chuyen den trang danh sach cac ban ghi
			echo "<script>location.href='index.php?controller=aboutus&action=read';</script>";
		}
		//create ban ghi
		public function create(){
			$action = "index.php?controller=aboutus&action=createPost";
			//goi view
			include "Views/AboutUsCreateUpdateView.php";
		}
		//create ghi an nut submit
		public function createPost(){
			//goi ham de insert ban ghi
			$this->modelCreate();
			//di chuyen den trang danh sach cac ban ghi
			echo "<script>location.href='index.php?controller=aboutus&action=read';</script>";
		}
		//delete ban ghi
		public function delete(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//goi ham de update du lieu
			$this->modelDelete($id);
			//di chuyen den trang danh sach cac ban ghi
			echo "<script>location.href='index.php?controller=aboutus&action=read';</script>";
		}
	}
 ?>