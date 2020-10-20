<?php 
 include "Models/CartModel.php";
 class CartController extends CartModel{
 	public function add(){
 		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
 		$this->cartAdd($id);
 		echo "<script>location.href='cart'</script>";
 	}
 	public function read(){
 		$_SESSION["redirectURL"] = $_SERVER["REQUEST_URI"];
 		if(isset($_SESSION["cart"]) == false)
 			$_SESSION["cart"] = array();
 		include "Views/CartView.php";
 	}
 	public function remove(){
 		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
 		$this->cartDelete($id);
 		echo "<script>location.href='cart'</script>";
 	}
 	public function destroy(){
 		$this->cartDestroy();
 		echo "<script>location.href='cart'</script>";
 	}
 	public function update(){
 		foreach ($_SESSION["cart"] as $product) {
 			$id = $product["id"];
 			$number = $_POST["product_$id"];
 			$this->cartUpdate($id,$number);
 		}
 		echo "<script>location.href='cart'</script>";
 	}
 	public function delivery(){
 		if(!isset($_SESSION["customerId"])){
 			echo "<script>if(confirm('Vui lòng đăng nhập tài khoản!!!')){document.location='login'}</script>";
 			echo "<script>location.href='cart'</script>";
 		}	
 		include "Views/DeliveryView.php";
 	}
 	public function success(){
 		include "Views/SuccessCheckOutView.php";
 	}
 	public function checkout(){
 		$customer_id = $_SESSION["customerId"];
 		$name = $_POST["name"];
 		$phone = $_POST["phone"];
 		$address = $_POST["address"];
 		$conn = Connection::getInstance();
	    $query = $conn->query("update customers set name='$name',phone='$phone',address='$address' where id= $customer_id");
 		$this->cartCheckOut();
 		echo "<script>location.href='cart/success'</script>";
 	}

 }	
 ?>