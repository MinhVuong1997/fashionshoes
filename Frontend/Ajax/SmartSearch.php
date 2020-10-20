<?php 
	include "../../Application/Connection.php";
	$key = isset($_GET["key"]) ? $_GET["key"] : "";
	if($key == ""){die();}
	$conn = Connection::getInstance();
	$query = $conn->query("select id, name, photo from products where name like '%$key%'");
	$total = $query->rowCount();
	$result = $query->fetchAll();

	$strResult = "";
	if($total > 0){
	$strResult .= '<div class="mb-2">Tìm thấy <b>'.$total.'</b> sản phẩm</div>';
	foreach ($result as $rows) {
		$strResult .= "<li><img src='../Assets/Upload/Products/".$rows->photo."'><a href='index.php?controller=products&action=detail&id=".$rows->id."'>".$rows->name."</a></li>";
	}
	}
	else{
		$strResult .= '<div class="text-center">Không có sản phẩm</div>';
	}
	echo $strResult;
 ?>