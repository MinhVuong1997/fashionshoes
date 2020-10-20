<?php 
 include "Models/OrdersModel.php";
 class OrdersController extends OrdersModel{
 	public function read(){
 		//quy dinh so ban ghi tren mot trang
 		$recordPerPage = 25;
 		// tinh tong so trang
 		$numPage = ceil($this->modelTotal()/$recordPerPage);
 		//goi ham tu model de lay du lieu
 		$listRecord = $this->modelRead($recordPerPage);
 		include "Views/OrdersView.php";
 	}
 	public function delivery(){
 		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
 		$this->modelDelivery($id);
 		echo "<script>location.href='index.php?controller=orders&action=read'</script>";
 	}
 	public function detail(){
 		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
 		$data = $this->modelListOrderDetails($id);
 		include "Views/OrderDetailView.php";
 	}
 }
 ?>