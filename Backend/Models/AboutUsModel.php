<?php 
	class AboutUsModel{
		//ham liet ke danh sach cac ban ghi, co phan trang
		public function modelRead(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from about_us");
			return $query->fetchAll();
		}
		//ham tinh tong so ban ghi
		public function modelTotal(){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select * from about_us");
			return $query->rowCount();
			//---
		}
		//lay mot ban ghi
		public function modelGetRecord($id){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select * from about_us where id = $id");
			//tra ve mot ban ghi
			return $query->fetch();
			//---
		}
		//update ban ghi
		public function modelUpdate($id){
			//---
			$name = $_POST["name"];		
			$subtitle = $_POST["subtitle"];		
			$title = $_POST["title"];			
			$address = $_POST["address"];		
			$phone = $_POST["phone"];		
			$email = $_POST["email"];						
			$description = $_POST["description"];			
			$content = $_POST["content"];			
			$returnpolicy = $_POST["returnpolicy"];			
			$privacypolicy = $_POST["privacypolicy"];			
			$termsofservice = $_POST["termsofservice"];			
			//---
			$conn = Connection::getInstance();
			$conn->query("update about_us set name='$name', subtitle='$subtitle',title='$title',description='$description',content='$content',address='$address',phone='$phone',email='$email',returnpolicy='$returnpolicy',privacypolicy='$privacypolicy',termsofservice='$termsofservice' where id=$id");
			//neu user chon anh thi thuc hien upload anh
			if($_FILES["photo"]["name"]!= ""){
				//---
				//xoa anh cu truoc khi upload anh moi
				$oldImage = $conn->query("select photo from about_us where id=$id");
				if($oldImage->rowCount() > 0){
					//lay mot ban ghi
					$oldPhoto = $oldImage->fetch();
					//xoa anh cu bang ham unlink
					if(file_exists('../Assets/Upload/Images/'.$oldPhoto->photo))
						unlink('../Assets/Upload/Images/'.$oldPhoto->photo);
				}
				//---
				$photo = time().$_FILES["photo"]["name"];
				//thuc hien upload file
				move_uploaded_file($_FILES["photo"]["tmp_name"], "../Assets/Upload/Images/".$photo);
				//update truong photo
				$conn->query("update about_us set photo='$photo' where id=$id");
			}
		}
		public function modelCreate(){
			//---
			$name = $_POST["name"];		
			$subtitle = $_POST["subtitle"];		
			$title = $_POST["title"];	
			$address = $_POST["address"];		
			$phone = $_POST["phone"];		
			$email = $_POST["email"];						
			$description = $_POST["description"];			
			$content = $_POST["content"];			
			$returnpolicy = $_POST["returnpolicy"];			
			$privacypolicy = $_POST["privacypolicy"];			
			$termsofservice = $_POST["termsofservice"];	
			$photo = "";
			if($_FILES["photo"]["name"]!= ""){
				$photo = time().$_FILES["photo"]["name"];
				//thuc hien upload file
				move_uploaded_file($_FILES["photo"]["tmp_name"], "../Assets/Upload/Images/".$photo);
			}
			//---
			$conn = Connection::getInstance();
			$conn->query("insert into about_us set name='$name', subtitle='$subtitle',title='$title',description='$description',content='$content',address='$address',phone='$phone',email='$email',returnpolicy='$returnpolicy',privacypolicy='$privacypolicy',termsofservice='$termsofservice',photo='$photo'");
		}
		public function modelDelete($id){
			//---
			$conn = Connection::getInstance();
			//---
			//xoa anh cu truoc khi upload anh moi
			$oldImage = $conn->query("select photo from about_us where id=$id");
			if($oldImage->rowCount() > 0){
				//lay mot ban ghi
				$oldPhoto = $oldImage->fetch();
				//xoa anh cu bang ham unlink
				if(file_exists('../Assets/Upload/Images/'.$oldPhoto->photo))
					unlink('../Assets/Upload/Images/'.$oldPhoto->photo);
			}
			//---
			$query = $conn->query("delete from about_us where id = $id");
		}
	}
 ?>