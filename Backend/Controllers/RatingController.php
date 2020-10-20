<?php 
 include "Models/RatingModel.php";
 class RatingController extends RatingModel{
 	public function read(){
 		//quy dinh so ban ghi tren mot trang
 		$recordPerPage = 5;
 		// tinh tong so trang
 		$numPage = ceil($this->modelTotal()/$recordPerPage);
 		//goi ham tu model de lay du lieu
 		$listRecord = $this->modelRead($recordPerPage);
 		include "Views/RatingView.php";
 	}
 	public function delete(){
 		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
 		$this->modelDelete($id);
 		echo "<script>location.href='index.php?controller=rating&action=read';</script>";
 	}
 }
 ?>