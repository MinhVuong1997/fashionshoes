<?php 
	class MailModel{
		public function modelGetEmail(){
			$conn = Connection::getInstance();
			$query = $conn->query("select email from email union select email from customers");
			return $query->fetchAll();
		}
	}
 ?>