<div class="container-fluid">
  <div class="row">
        <div class="col-md-12 p-0">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="#">Tài khoản</a></li>
              <li class="breadcrumb-item active" aria-current="page">Đăng nhập</li>
            </ol>
          </nav>
        </div>
      </div>
  <div class="row">
<div class="col-12 template-customer pt-3 pb-3">
  <div class="row">
        <div class="col-md-12 pl-md-5">
          <h2>Đăng nhập tài khoản</h2>
          <?php if(isset($_GET["notify"])&&$_GET["notify"]=='fail'): ?>
            <div class="alert alert-warning">
              Vui lòng kiểm tra lại tài khoản hoặc mật khẩu.
          </div>
          <?php else: ?>
          <p>Nếu bạn có tài khoản xin vui lòng đăng nhập</p>
           <?php endif ?>
        </div>
    </div>
          <div class="row" style="margin-top:30px;">
            <div class="col-md-5 pl-md-5">
              <div class="wrapper-form">
                <form method='post' action="index.php?controller=account&action=loginPost">
                  <p class="title"><span><b>Đăng nhập tài khoản</b></span></p>
                  <div class="form-group">
                    <label>Email:<b id="req">*</b></label>
                    <input type="email" class="form-control" name="email" required="">
                  </div>
                  <div class="form-group">
                    <label>Mật khẩu:<b id="req">*</b></label>
                    <input type="password" class="form-control" name="password" required="">
                  </div>
                  <input type="submit" class="btn btn-primary" value="Đăng nhập">
                </form>
              </div>
            </div>
            <div class="col-md-7 pl-md-5 pt-md-0 pt-3">
              <div class="wrapper-form">
                <p class="title"><span><b>Tạo tài khoản mới</b></span></p>
                <p>Đăng ký tài khoản để mua hàng nhanh hơn. Theo dõi đơn đặt hàng, vận chuyển. Cập nhật các sự kiện và chương trình giảm giá của chúng tôi.</p>
                <a href="register" class="btn btn-primary">Đăng ký</a>
              </div>
            </div>
          </div>
        </div>
  </div>
</div>