<?php 
	//load file model
	include "Models/LoginModel.php";
	class LoginController extends LoginModel{
		public function index(){
			include "Views/LoginView.php";
		}
		public function login(){
			if($this->modelLogin()){
				header("location:index.php");
			}
			else{
				echo "<script>alert('Đăng nhập thất bại');</script>";
				echo "<script>location.href='index.php';</script>";
			}
		}
		public function logout(){
			unset($_SESSION["name"]);
			echo "<script>location.href='index.php';</script>";
		}
	}
 ?>