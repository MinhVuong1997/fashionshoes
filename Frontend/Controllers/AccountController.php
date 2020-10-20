<?php 
	include "Models/AccountModel.php";
	class AccountController extends AccountModel{
		public function register(){
			if(isset($_SESSION["customerId"])){
				echo "<script>location.href='home'</script>";
			}
			include "Views/RegisterView.php";
		}
		public function registerPost(){
			if($this->modelRegister()){
				echo "<script>location.href='register?notify=success'</script>";
			}
			else{
				echo "<script>location.href='register?notify=fail'</script>";
			}
		}
		public function login(){
			if(isset($_SESSION["customerId"])){
				echo "<script>location.href='home'</script>";
			}
			include "Views/LoginView.php";
		}
		public function loginPost(){
			if($this->modelLogin()){
				if(isset($_SESSION["redirectURL"])){
					echo "<script>location.href='".$_SESSION["redirectURL"]."'</script>";
					unset($_SESSION["redirectURL"]);
				}else{
				echo "<script>location.href='home'</script>";
				}
			}
			else{
				echo "<script>location.href='login?notify=fail'</script>";
			}
		}
		public function logout(){
			unset($_SESSION["customerId"]);
			unset($_SESSION["customerName"]);
			echo "<script>location.href='login'</script>";
		}
		public function info(){
			$customer_id = isset($_SESSION["customerId"]) ? $_SESSION["customerId"]:0;
			$record = $this->modelGetAccount($customer_id);
			include "Views/AccountView.php";
		}
		public function update(){
			$customer_id = isset($_SESSION["customerId"]) ? $_SESSION["customerId"]:0;
			$record = $this->modelGetAccount($customer_id);
			include "Views/AccountView.php";
		}
		public function updatePost(){
			$customer_id = isset($_SESSION["customerId"]) ? $_SESSION["customerId"]:0;
			if($this->modelUpdate($customer_id)){
				$_SESSION["customerName"] =  $_POST["name"];
				echo "<script>location.href='update?notify=success'</script>";
			}
			else{
				echo "<script>location.href='update?notify=fail'</script>";
			}
		}
		public function order(){ 
			$customer_id = isset($_SESSION["customerId"]) ? $_SESSION["customerId"]:0;
			$listRecord = $this->modelGetOrder($customer_id);
			include "Views/AccountView.php";
		}
		public function deleteOrder(){
			$order_id = isset($_GET["id"]) ? $_GET["id"]:0;
			$this->modelDeleteOrder($order_id);
			echo "<script>location.href='account/order/".$_SESSION["customerId"]."';</script>";
		}
	}
 ?>