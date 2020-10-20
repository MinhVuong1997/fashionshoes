<?php 
	include "Models/MenuCategoryModel.php";
	class MenuCategoryController extends MenuCategoryModel{
		public function read(){
			include "Views/MenuCategoryView.php";
		}
	}
 ?>