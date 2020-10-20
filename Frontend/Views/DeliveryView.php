<?php
    if(isset($_SESSION['customerId'])){
    $customer_id = $_SESSION['customerId'];
    $conn = Connection::getInstance();
    $query = $conn->query("select name, phone, address from customers where id= $customer_id");
    $result = $query->fetch();
  }
 ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 p-0">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
          <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6 p-3">
      <h5>Thông tin đơn hàng</h5>
      <hr>
      <div class="order-detail">
        <?php foreach ($_SESSION["cart"] as $product) : ?>
        <div class="row pb-3">
          <div class="col-2">
            <img src="../Assets/Upload/Products/<?php echo $product['photo'] ?>" class="img-fluid">
          </div>
          <div class="col-7">
            <a href="index.php?controller=products&action=detail&id=<?php echo $product['id'] ?>"><?php echo $product['name'] ?></a><br>
            <p><?php echo $product['color'] ?> / <?php echo $product['size']; ?></p>
            <span>Số lượng: <?php echo $product['number'] ?></span>     
          </div>
          <div class="col-3">
            <?php echo number_format($product['price']) ?>₫
          </div>
        </div>
        <?php endforeach ?>
        <hr>
        <div class="row">
          <div class="col-12">
            <div class="total-cart"> 
              Tổng tiền thanh toán:
              <b><?php echo number_format($this->cartTotal()) ?>₫</b>
            </div>
          </div>
        </div>
      </div>
  </div>
    <div class="col-lg-6 p-3">
      <h5>Thông tin giao hàng</h5>
      <hr>
      <div class="col-12">
        <form action="cart/checkout" method="post">
          <div class="form-group row">
            <label class="col-4">Họ tên:</label>
            <input type="text" name="name" class="form-control col-8" <?php if(isset($_SESSION["customerId"])): ?> value="<?php echo $result->name  ?>" <?php else: ?> placeholder="Nhập họ tên" required <?php endif ?>>
          </div>
          <div class="form-group row">
            <label class="col-4">Điện thoại:</label>
            <input type="text" name="phone" class="form-control col-8" <?php if(isset($_SESSION["customerId"])): ?> value="<?php echo $result->phone  ?>" <?php else: ?> placeholder="Nhập số điện thoại" required <?php endif ?>>
          </div>
          <div class="form-group row">
            <label class="col-4">Địa chỉ:</label>
            <textarea name="address" class="form-control col-8" placeholder="Nhập địa chỉ" required><?php if(isset($_SESSION["customerId"])): ?><?php echo $result->address; ?><?php endif ?>
            </textarea>
          </div>
          <div class="form-group row">
            <label class="col-4">Ghi chú giao hàng:</label>
            <textarea name="note" rows="3" class="form-control col-8" placeholder="Nhập ghi chú ở đây"></textarea>
          </div>
          <div class="row">
            <div class="col-12">
              <input type="submit" class="btn btn-success mr-3" value="Hoàn tất đơn hàng">
              <input onclick="history.go(-1);" type="button" value="Quay lại" class="btn btn-secondary">
            </div>
          </div>
        </form>
      </div>
  </div>
  
  </div>
</div>