<?php 
	//start session
	session_start();
	//load file Connection.php
	include "../Application/Connection.php";
	//---
	//lay bien controller truyen tu url
	$controller = isset($_GET["controller"]) ? $_GET["controller"] : "";
	$action = isset($_GET["action"]) ? $_GET["action"] : "";
	//ten class
	$classController = $controller."Controller";
	//ghep de thanh duong dan hoan thien cua file controller
	$fileController = "Controllers/".ucfirst($controller)."Controller.php";
	//ham ucfirst su dung de viet hoa ky tu dau tien. VD users thanh Users
	//VD: $fileController = "Controllers/UsersController.php";
	//---
	//kiem tra neu user chua dang nhap thi load LoginView.php
	if(!isset($_SESSION["name"])){
		include "Views/LayoutLoginView.php";
	}else{
		//load file Layout.php
		include "Views/LayoutView.php";
	}
 ?>