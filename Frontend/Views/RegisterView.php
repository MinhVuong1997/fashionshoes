<div class="container-fluid">
  <div class="row">
        <div class="col-md-12 p-0">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="#">Tài khoản</a></li>
              <li class="breadcrumb-item active" aria-current="page">Đăng ký</li>
            </ol>
          </nav>
        </div>
      </div>
  <div class="row">
 <div class="template-customer col-12 pt-3 pb-3">
       <div class="row">
        <div class="col-md-12 pl-md-5">
          <h2>Đăng ký tài khoản</h2>
          <?php if(isset($_GET["notify"]) && $_GET["notify"]=="success") : ?>
            <div class="alert alert-success">Đăng ký thành công</div>
          <?php elseif(isset($_GET["notify"]) && $_GET["notify"]=="fail") :?>
            <div class="alert alert-warning">Email đã tồn tại</div>
          <?php else: ?>
          <p>Nếu bạn chưa có tài khoản, hãy đăng ký ngay để nhận thông tin ưu đãi cùng những ưu đãi từ cửa hàng.</p>
        <?php endif; ?>
      </div>
        </div>
          <div class="row" style="margin-top:20px;">
            <div class="col-md-5 pl-md-5">
              <div class="wrapper-form">
                <form method='post' action="index.php?controller=account&action=registerPost">
                  <p class="title"><span><b>Đăng ký tài khoản</b></span></p>
                  <div class="form-group">
                    <label>Họ và tên:</label>
                    <input type="text" name="name" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Email:<b id="req">*</b></label>
                    <input type="text" name="email" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Địa chỉ:</label>
                    <input type="text" name="address" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Điện thoại:</label>
                    <input type="text" name="phone" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Mật khẩu:<b id="req">*</b></label>
                    <input type="password" name="password" class="form-control" required="">
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Đăng ký">
                  </div>
                </form>
              </div>
            </div>
            <div class="col-md-7 pl-md-5">
              <div class="wrapper-form">
                <p class="title"><span><b>Đăng nhập</b></span></p>
                <p>Đăng nhập tài khoản nếu bạn đã có tài khoản. Đăng nhập tài khoản để theo dõi đơn đặt hàng, vận chuyển và đặt hàng được thuận lợi.</p>
                <a href="login" class="btn btn-primary">Đăng nhập</a> </div>
            </div>
          </div>
        </div>
   </div>
</div>