<?php 
	include "Models/HomeModel.php";
	class HomeController extends HomeModel{
		public function read(){
			$_SESSION["redirectURL"] = $_SERVER["REQUEST_URI"];
			include "Views/HomeView.php";
		}
	}
 ?>