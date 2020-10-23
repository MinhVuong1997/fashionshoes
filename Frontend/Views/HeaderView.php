<div class="topbar">
    <div class="container-fluid">
      <div class="row">
        <div class="topbar-left col-md-6 text-md-left text-center p-0">
          <span>Miễn phí vận chuyển với đơn hàng trên 300K</span>
        </div>
        <?php 
            $conn = Connection::getInstance();
            $query = $conn->query("select * from about_us limit 1");
            $result = $query->fetch();
           ?>
        <div class="topbar-right col-md-6 text-right d-md-block d-none">
          <i class="fas fa-phone-alt">&nbsp;&nbsp;&nbsp;<span>Hotline: <?php echo $result->phone ?></span></i>
        </div>
      </div>
    </div>
  </div> <!-- end topbar -->
  <header class="d-md-block d-none">
    <div class="container-fluid">
      <div class="row banner pt-3 pb-3 text-center">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <div class="logo wow animate__swing">
            <a href="home"><?php echo $result->name; ?></a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="icon">
            <ul>
              <li class="login"><a href="javascript:void(0);"><i class="fas fa-user"></i></a>
                <?php if(isset($_SESSION["customerName"])) : ?>
                  <div class="form-login" style="width: 250px;">
                    <div class="account_info" style="display: flex; justify-content: center;">
                      <i class="fas fa-user-circle" style="font-size: 30px;"></i>
                      <span style="padding-left: 10px;"><?php echo $_SESSION["customerName"];?></span>
                    </div>
                    <a href="account/info/<?php echo $_SESSION["customerId"] ?>" class="btn btn-primary mt-3" style="font-size: 14px; color: white; font-weight: 600;">Quản lý tài khoản</a>
                    <a href="logout" class="btn btn-primary mt-3" style="font-size: 14px; color: white; font-weight: 600;">Đăng xuất</a>
                  </div>
                <?php else: ?>
                <div class="form-login">
                  <form method='post' action="index.php?controller=account&action=loginPost">
                      <p class="title"><span><b>Đăng nhập tài khoản</b></span></p>
                      <div class="form-group">
                        <input type="email" class="form-control" name="email" required="" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" name="password" required="" placeholder="Mật khẩu">
                      </div>
                      <input type="submit" class="btn btn-primary" value="Đăng nhập">
                    </form>
                    <div class="register">
                      <p>Khách hàng mới?</p>
                      <a href="register">Tạo tài khoản</a>
                    </div>
                </div>
              <?php endif; ?>
              </li>
              <li class="search">
                <a href="#" data-toggle="modal" data-target="#searchmodal"><i class="fas fa-search"></i></a>
              </li>
              <?php $numberProduct = 0; if(isset($_SESSION["cart"])): ?>
                <?php 
                  foreach($_SESSION["cart"] as $product){
                    $numberProduct++;
                  }
                ?>
                <?php endif; ?>
              <li class="cart">
                <a href="cart"><i class="fas fa-shopping-cart"></i><span class="badge badge-dark count"><?php echo $numberProduct; ?></span></a>
              </li> 
            </ul> 
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="menu">
          <ul>
            <li><a href="home">Trang chủ</a></li>
            <li><a href="product/all">Sản phẩm</a>
              <?php 
                include_once "Controllers/MenuCategoryController.php";
                $obj = new MenuCategoryController();
                $obj->read(); 
              ?>
            </li>
            <li><a href="blog">Blog</a></li>
            <li><a href="introduce/about_us">Giới thiệu</a></li>
            <li><a href="contact">Liên hệ</a></li>
          </ul>
        </div>
      </div>
    </div>
    </div>
    <div class="fixheader">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3 text-center">
            <div class="logo">
              <a href="home"><?php echo $result->name; ?></a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="menu">
              <ul>
                <li><a href="home">Trang chủ</a></li>
                <li><a href="product/all">Sản phẩm</a>
                  <?php 
                    include_once "Controllers/MenuCategoryController.php";
                    $obj = new MenuCategoryController();
                    $obj->read(); 
                  ?>
                </li>
                <li><a href="blog">Blog</a></li>
                <li><a href="introduce/about_us">Giới thiệu</a></li>
                <li><a href="contact">Liên hệ</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-3 text-center">
            <div class="icon">
              <ul>
                <li>
                  <?php if(isset($_SESSION["customerName"])) : ?>
                  <a href="account/info/<?php echo $_SESSION["customerId"] ?>" style="font-size: 14px; font-weight: 600;"><?php echo $_SESSION["customerName"]; ?></a>
                  <a href="logout"><i class="fas fa-sign-out-alt"></i></a>
                  <?php else: ?>
                  <a href="login"><i class="fas fa-user"></i></a>
                  <?php endif; ?>
                </li>
                <li>
                  <a href="#" data-toggle="modal" data-target="#searchmodal"><i class="fas fa-search"></i></a>
                </li>
                <li>
                  <a href="cart"><i class="fas fa-shopping-cart"></i><span class="badge badge-dark count"><?php echo $numberProduct; ?></span></a>
                </li>
              </ul> 
            </div>
          </div>
        </div>
      </div>
    </div> <!-- end fixheader -->
  </header>
  <!-- Mobile header -->
  <header class="mobile-header d-md-none d-block p-0">
    <div class="container-fluid">
      <div class="row border-bottom p-2">
        <div class="col-3 p-0 btnmenu">
          <span class="btn openmenu">&#9776;</span>
          <span class="btn closemenu">&#10005;</span>         
        </div>
        <div class="col-6 text-center p-0">
          <a href="home" class="logo"><?php echo $result->name; ?></a>
        </div>
        <div class="col-3">
          <div class="icon d-flex justify-content-end">
            <?php if(isset($_SESSION["customerId"])): ?>
              <a href="logout"><i class="fas fa-sign-out-alt"></i></a>
              <a href="account/info/<?php echo $_SESSION["customerId"] ?>"><i class="fas fa-user"></i></a>
            <?php else: ?>
            <a href="login"><i class="fas fa-user"></i></a>
            <?php endif; ?>
            <a href="cart"><i class="fas fa-shopping-cart"></i><span class="badge badge-dark count"><?php echo $numberProduct; ?></span></a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 p-2">
          <input type="search" id="key-mb" placeholder="Tìm kiếm" class="search w-100 p-2">
          <div class="box-smart-search search-mobile" id="box-smart-search-mb">
            <ul></ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="menu-mobile">
          <ul>
            <li><a href="home">Trang chủ</a></li>
            <li><a href="product/all">Sản phẩm</a></li>
            <li><a href="blog">Blog</a></li>
            <li><a href="introduce/about_us">Giới thiệu</a></li>
            <li><a href="contact">Liên hệ</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header> 
  <script type="text/javascript">
    $(document).ready(function() {
      $('.openmenu').click(function(event) {
          $(this).css('display', 'none');
          $('.closemenu').css('display', 'block');
          $('.menu-mobile').css('display', 'block').slideUp(0).slideDown(500);
      });
      $('.closemenu').click(function(event) {
          $(this).css('display', 'none');
          $('.openmenu').css('display', 'block');
          $('.menu-mobile').slideUp(500);
      });

      $('#key-mb').keyup(function(event) {
       $('#box-smart-search-mb').attr("style", "display:block");
       var key = $('#key-mb').val();
       $('#box-smart-search-mb ul').empty();
       $.ajax({
        url: "Ajax/SmartSearch.php?key="+key,
        success: function(result){
          if(result){
            $('#box-smart-search-mb ul').append(result);
          }
          else{
            $('#box-smart-search-mb').attr("style", "display:none");
          }
        }   
      });
    }); 
    $('#key-mb').blur(function(event) {
      $('#key-mb').val("");
      setTimeout(function(){
        $('#box-smart-search-mb').attr("style", "display:none");
      }, 200)
    });
    });
  </script>