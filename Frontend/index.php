<?php 
	session_start();
	include "../Application/Connection.php";
	$controller = isset($_GET["controller"]) ? $_GET["controller"] : "Home";
	$action = isset($_GET["action"]) ? $_GET["action"] : "read";
	$classController = $controller."Controller";
	$fileController = "Controllers/".ucfirst($controller)."Controller.php";
	
	include "Views/Layout.php";
 ?>