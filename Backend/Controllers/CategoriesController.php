<?php 
 include "Models/CategoriesModel.php";
 class CategoriesController extends CategoriesModel{
 	public function read(){
 		//quy dinh so ban ghi tren mot trang
 		$recordPerPage = 10;
 		// tinh tong so trang
 		$numPage = ceil($this->modelTotal()/$recordPerPage);
 		//goi ham tu model de lay du lieu
 		$listRecord = $this->modelRead($recordPerPage);
 		include "Views/CategoriesView.php";
 	}
 	public function update(){
 		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
 		$record = $this->modelGetRecord($id);
 		$action = "index.php?controller=categories&action=updatePost&id=$id";
 		include "Views/CategoriesCreateUpdateView.php";
 	}
 	public function updatePost(){
 		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
 		$this->modelUpdate($id);
 		echo "<script>location.href='index.php?controller=categories&action=read';</script>";
 	}
 	public function create(){
 		$action = "index.php?controller=categories&action=createPost";
 		include "Views/CategoriesCreateUpdateView.php";
 	}
 	public function createPost(){
 		$this->modelCreate();
 		echo "<script>location.href='index.php?controller=categories&action=read';</script>";
 	}
 	public function delete(){
 		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
 		$this->modelDelete($id);
 		echo "<script>location.href='index.php?controller=categories&action=read';</script>";
 	}
 }
 ?>