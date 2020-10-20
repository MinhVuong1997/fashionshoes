<?php 
	include "Models/MailModel.php";
	class SendmailController extends MailModel{
		public function read(){
			$result = $this->modelGetEmail();
			include "Views/SendMailView.php";
		}
	}
 ?>