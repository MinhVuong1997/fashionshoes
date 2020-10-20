<?php 
 include "Models/FeaturedProductModel.php";
 class FeaturedProductController extends FeaturedProductModel{
 	public function read(){
 		//quy dinh so ban ghi tren mot trang
 		$recordPerPage = 25; 
 		// tinh tong so trang
 		$numPage = ceil($this->modelTotal()/$recordPerPage);
 		//goi ham tu model de lay du lieu
 		$listRecord = $this->modelRead($recordPerPage);
 		include "Views/FeaturedProductView.php";
 	}
 	public function update(){
 		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
 		$record = $this->modelGetRecord($id);
 		$action = "index.php?controller=featuredProduct&action=updatePost&id=$id";
 		include "Views/FeaturedProductCreateUpdateView.php";
 	}
 	public function updatePost(){
 		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
 		$this->modelUpdate($id);
 		echo "<script>location.href='index.php?controller=featuredProduct&action=read';</script>";
 	}
 	public function create(){
 		$action = "index.php?controller=featuredProduct&action=createPost";
 		include "Views/FeaturedProductCreateUpdateView.php";
 	}
 	public function createPost(){
 		$this->modelCreate();
 		echo "<script>location.href='index.php?controller=featuredProduct&action=read';</script>";
 	}
 	public function delete(){
 		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
 		$this->modelDelete($id);
 		echo "<script>location.href='index.php?controller=featuredProduct&action=read';</script>";
 	}
 	public function updateType(){
 		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
 		$type = isset($_GET["type"]) ? $_GET["type"] : 0;
 		$this->modelUpdateType($id,$type);
 		echo "<script>location.href='index.php?controller=featuredProduct&action=read';</script>";
 	}
 }
 ?>