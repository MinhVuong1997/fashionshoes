<?php 
 include "Models/HomeModel.php";
 class HomeController extends HomeModel{
 	public function index(){
 		$totalNewOrder = $this-> modelTotalNewOrder();
 		$totalRating = $this-> modelTotalRating();
 		$totalCustomer = $this-> modelTotalCustomer();
 		$totalProduct = $this-> modelTotalProduct();
 		include "Views/HomeView.php";
 	}
}
?>