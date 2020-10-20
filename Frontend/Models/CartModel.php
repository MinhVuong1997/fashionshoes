<?php
	class CartModel{		
		public function cartAdd($id){
			$number = $_POST["qlt"];
			$color = $_POST["color"];
			$size = $_POST["size"];
		    if(isset($_SESSION['cart'][$id]) &&$_SESSION['cart'][$id]['color'] == $color&&$_SESSION['cart'][$id]['size'] == $size){
		        //nếu đã có sp trong giỏ hàng thì số lượng lên 1
		        $_SESSION['cart'][$id]['number'] += $number;
		    } else {
		        //lấy thông tin sản phẩm từ CSDL và lưu vào giỏ hàng
		        //$product = db::get_one("select * from products where id=$id");
		        //---
		        //PDO
		        $conn = Connection::getInstance();
		        $query = $conn->prepare("select * from products where id=:id");
		        $query->execute(array("id"=>$id));
		        $query->setFetchMode(PDO::FETCH_OBJ);
		        $product = $query->fetch();
		        //---
		       
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
		}
		/**
		 * Cập nhật số lượng sản phẩm
		 * @param int
		 * @param int
		 */
		public function cartUpdate($id, $number){
		    if($number==0){
		        //xóa sp ra khỏi giỏ hàng
		        unset($_SESSION['cart'][$id]);
		    } else {
		        $_SESSION['cart'][$id]['number'] = $number;
		    }
		}
		/**
		 * Xóa sản phẩm ra khỏi giỏ hàng
		 * @param int
		 */
		public function cartDelete($id){
		    unset($_SESSION['cart'][$id]);
		}
		/**
		 * Tổng giá trị giỏ hàng
		 */
		public function cartTotal(){
		    $total = 0;
		    foreach($_SESSION['cart'] as $product){
		        $total += $product['price'] * $product['number'];
		    }
		    return $total;
		}
		/**
		 * Số sản phẩm có trong giỏ hàng
		 */
		public function cartNumber(){
		    $number = 0;
		    foreach($_SESSION['cart'] as $product){
		        $number += $product['number'];
		    }
		    return $number;
		}
		/**
		 * Danh sách sản phẩm trong giỏ hàng
		 */
		public function cartList(){
		    return $_SESSION['cart'];
		}
		/**
		 * Xóa giỏ hàng
		 */
		public function cartDestroy(){
		    $_SESSION['cart'] = array();
		}
		//=============
		//checkout
		public function cartCheckOut(){
			$conn = Connection::getInstance();			
			//lay id vua moi insert
			$customer_id = $_SESSION["customerId"];
			$note = isset($_POST["note"]) ? $_POST["note"] : '';
			//---
			//---
			//insert ban ghi vao orders, lay order_id vua moi insert
			$price = $this->cartTotal();
			$query = $conn->prepare("insert into orders set customer_id=:customer_id, date=now(),price=:price,note=:note");
			$query->execute(array("customer_id"=>$customer_id,"price"=>$price,"note"=>$note));
			//lay id vua moi insert
			$order_id = $conn->lastInsertId();
			//---
			//duyet cac ban ghi trong session array de insert vao orderdetails
			foreach($_SESSION["cart"] as $product){
				$query = $conn->prepare("insert into orderdetails set order_id=:order_id, product_id=:product_id, price=:price, quantity=:quantity, color=:color, size=:size");
				$query->execute(array("order_id"=>$order_id,"product_id"=>$product["id"],"price"=>$product["price"],"quantity"=>$product["number"],"color"=>$product["color"],"size"=>$product["size"]));
			}
			//xoa gio hang
			unset($_SESSION["cart"]);
		}
		//=============
	}	
?>