<?php 
	class LoginModel{
		public function modelLogin(){
			$email = $_POST["email"];
			$password = $_POST["password"];
			//ma hoa password
			$password = md5($password);
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->query("select id, name, password from users where email='$email'");
			$record = $query->fetch();
			if(isset($record) && $record->password == $password){
				//dang nhap thanh cong
				$_SESSION["name"] = $record->name;
				return true;
			}
			return false;
		}
	}
 ?>