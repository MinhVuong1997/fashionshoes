<?php 
 include "Models/ProductsModel.php";
 class ProductsController extends ProductsModel{
 	public function read(){
 		//quy dinh so ban ghi tren mot trang
 		$recordPerPage = 25; 
 		// tinh tong so trang
 		$numPage = ceil($this->modelTotal()/$recordPerPage);
 		//goi ham tu model de lay du lieu
 		$listRecord = $this->modelRead($recordPerPage);
 		include "Views/ProductsView.php";
 	}
 	public function update(){
 		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
 		$record = $this->modelGetRecord($id);
 		$action = "index.php?controller=products&action=updatePost&id=$id";
 		include "Views/ProductsCreateUpdateView.php";
 	}
 	public function updatePost(){
 		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
 		$this->modelUpdate($id);
 		echo "<script>location.href='index.php?controller=products&action=read';</script>";
 	}
 	public function create(){
 		$action = "index.php?controller=products&action=createPost";
 		include "Views/ProductsCreateUpdateView.php";
 	}
 	public function createPost(){
 		$this->modelCreate();
 		echo "<script>location.href='index.php?controller=products&action=read';</script>";
 	}
 	public function delete(){
 		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
 		$this->modelDelete($id);
 		echo "<script>location.href='index.php?controller=products&action=read';</script>";
 	}
 }
 ?>