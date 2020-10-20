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
    <div class="template-cart col-12 mt-3 mb-3">
          <form action="index.php?controller=cart&action=update" method="post">
            <div class="table-responsive">
              <table class="table table-bordered table-cart">
                <thead class="thead-light">
                  <tr class="text-center">
                    <th class="image">Ảnh sản phẩm</th>
                    <th class="name">Tên sản phẩm</th>
                    <th class="price">Giá</th>
                    <th class="color">Màu sắc</th>
                    <th class="size">Size</th>
                    <th class="quantity">Số lượng</th>
                    <th class="price">Thành tiền</th>
                    <th>Xóa</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($_SESSION["cart"] as $product) : ?>
                  <tr class="text-center">
                    <td><img src="../Assets/Upload/Products/<?php echo $product['photo'] ?>" class="img-fluid" style="width: 100px;" /></td>
                    <td><a href="index.php?controller=products&action=detail&id=<?php echo $product['id'] ?>"><?php echo $product['name'] ?></a></td>
                    <td> <?php echo number_format($product['price']) ?>₫ </td>
                    <td><?php echo $product['color'] ?></td>
                    <td><?php echo $product['size']; ?></td>
                    <td><input type="number" id="qty" min="1" class="text-center" value="<?php echo $product['number'] ?>" name="product_<?php echo $product['id'] ?>" required="Không thể để trống"></td>
                    <td><p><b><?php echo number_format($product['number']*$product['price']) ?>₫</b></p></td>
                    <td><a href="index.php?controller=cart&action=remove&id=<?php echo $product['id'] ?>" data-id="2479395"><i class="fas fa-trash"></i></a></td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
                <?php if($this->cartTotal() > 0) :?>
                <tfoot>
                  <tr>
                    <td colspan="8"><a href="index.php?controller=cart&action=destroy" class="btn btn-secondary">Xóa toàn bộ</a> <a href="home" class="btn btn-primary float-right ml-2">Tiếp tục mua hàng</a>
                      <input type="submit" class="btn btn-primary float-right" value="Cập nhật"></td>
                  </tr>
                </tfoot>
              <?php endif; ?>
              </table>
            </div>
          </form>
          <?php if($this->cartTotal() > 0): ?>
          <div class="total-cart float-right"> 
            Tổng tiền thanh toán:
            <b><?php echo number_format($this->cartTotal()) ?>₫</b> <br>
            <a href="cart/delivery" class="btn btn-success float-right mt-3">Tiếp tục</a> 
          </div>
          <?php else: ?>
            <span class="d-block text-center">Giỏ hàng trống</span>
          <?php endif; ?>
          <div class="clearfix"></div>
        </div>
    </div>
</div>