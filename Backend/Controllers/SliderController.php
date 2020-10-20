<?php 
 include "Models/SliderModel.php";
 class SliderController extends SliderModel{
 	public function read(){
 		//quy dinh so ban ghi tren mot trang
 		$recordPerPage = 25; 
 		// tinh tong so trang
 		$numPage = ceil($this->modelTotal()/$recordPerPage);
 		//goi ham tu model de lay du lieu
 		$listRecord = $this->modelRead($recordPerPage);
 		include "Views/SliderView.php";
 	}
 	public function update(){
 		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
 		$record = $this->modelGetRecord($id);
 		$action = "index.php?controller=slider&action=updatePost&id=$id";
 		include "Views/SliderCreateUpdateView.php";
 	}
 	public function updatePost(){
 		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
 		$this->modelUpdate($id);
 		echo "<script>location.href='index.php?controller=slider&action=read';</script>";
 	}
 	public function create(){
 		$action = "index.php?controller=slider&action=createPost";
 		include "Views/SliderCreateUpdateView.php";
 	}
 	public function createPost(){
 		$this->modelCreate();
 		echo "<script>location.href='index.php?controller=slider&action=read';</script>";
 	}
 	public function delete(){
 		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
 		$this->modelDelete($id);
 		echo "<script>location.href='index.php?controller=slider&action=read';</script>";
 	}
 	public function updateType(){
 		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
 		$type = isset($_GET["type"]) ? $_GET["type"] : 0;
 		$this->modelUpdateType($id,$type);
 		echo "<script>location.href='index.php?controller=slider&action=read';</script>";
 	}
 }
 ?>