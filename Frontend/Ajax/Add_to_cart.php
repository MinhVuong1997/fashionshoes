<?php 
	session_start();
	include "../../Application/Connection.php";
	$id = $_POST["product_id"];
	$number = $_POST["qlt"];
	$color = $_POST["color"];
	$size = $_POST["size"];
    if(isset($_SESSION['cart'][$id]) &&$_SESSION['cart'][$id]['color'] == $color&&$_SESSION['cart'][$id]['size'] == $size){
        $_SESSION['cart'][$id]['number'] += $number;
    } else {
        $conn = Connection::getInstance();
        $query = $conn->prepare("select * from products where id=:id");
        $query->execute(array("id"=>$id));
        $query->setFetchMode(PDO::FETCH_OBJ);
        $product = $query->fetch();

        $_SESSION['cart'][$id] = array(
            'id' => $id,
            'name' => $product->name,
            'photo' => $product->photo,
            'color' => $color,
            'size' => $size,
            'number' =>$number,
            'price' => $product->price - ($product->price * $product->discount)/100
        );
    }
    $numberProduct = 0; 
    if(isset($_SESSION["cart"])){
      foreach($_SESSION["cart"] as $product){
        $numberProduct++;
      }
    }
    echo $numberProduct;
?>