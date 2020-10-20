<?php 
 class AccountModel{
 	public function modelRegister(){
 		$name = $_POST["name"];
 		$email = $_POST["email"];
 		$address = $_POST["address"];
 		$phone = $_POST["phone"];
 		$password = $_POST["password"];
 		$password = md5($password);
 		$conn = Connection::getInstance();
 		$query = $conn->query("select * from customers where email='$email'");
 		$count = $query->rowCount();
 		if($count == 0){
 		$conn->query("insert into customers set name = '$name', email = '$email', address ='$address', phone = '$phone', password = '$password'");
 			return true;
 		}
 		else{
 			return false;
 		}
 	}
 	public function modelLogin(){
 		$email = $_POST["email"];
 		$password = $_POST["password"];
 		$password = md5($password);
 		$conn = Connection::getInstance();
 		$query = $conn->query("select id, name, email, password from customers where email='$email'");
 		$result = $query->fetch();
 		if (isset($result->email)){
	 		if ($result->password == $password){
	 			$_SESSION["customerId"] = $result->id;
	 			$_SESSION["customerName"] = $result->name;
	 			return true;
	 		}
 		}
 		return false;
 	}
 	public function modelGetAccount($customer_id){
 		$conn = Connection::getInstance();
 		$query = $conn->query("select * from customers where id=$customer_id");
 		return $query->fetch();
 	}
 	public function modelUpdate($customer_id){
 		$name = $_POST["name"];
 		$email = $_POST["email"];
 		$phone = $_POST["phone"];
 		$address = $_POST["address"];
 		$password = $_POST["password"];
 		$conn = Connection::getInstance();
 		$check = $conn->query("select id from customers where email='$email' and id <> $customer_id");
		$numCheck = $check->rowCount();
		if ($numCheck == 0){
	 		$query = $conn->query("update customers set name='$name', email='$email', phone='$phone', address='$address' where id=$customer_id");
	 		if($password != ""){
	 			$password = md5($password);
	 			$query = $conn->query("update customers set password='$password' where id=$customer_id");
	 		}
	 		return true;
	 	}
	 	return false;
 	}
 	public function modelGetOrder($customer_id){
 		$conn = Connection::getInstance();
 		$query = $conn->query("select * from orders where customer_id=$customer_id");
 		return $query->fetchAll();
 	}
 	public function modelTotalOrder($customer_id){
 		$conn = Connection::getInstance();
 		$query = $conn->query("select * from orders where customer_id=$customer_id");
 		return $query->rowCount();
 	}
 	public function modelDeleteOrder($order_id){
		$conn = Connection::getInstance();
		$query = $conn->query("delete from orders where id = $order_id");
		$query = $conn->query("delete from orderdetails where order_id = $order_id");
	}
 }
 ?>