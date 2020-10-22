<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Fashion Shoes</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <base href="http://localhost/project01/Frontend/">
  <link rel="stylesheet" type="text/css" href="../Assets/Frontend/css/bootstrap.css">
  <script type="text/javascript" src="../Assets/Frontend/js/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="../Assets/Frontend/js/bootstrap.js"></script>
  <link rel="stylesheet" href="../Assets/Frontend/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="../Assets/Frontend/css/style.css">
  <link rel="stylesheet" type="text/css" href="../Assets/Frontend/css/animate.css">
  <link rel="stylesheet" type="text/css" href="../Assets/Frontend/css/owl.carousel.min.css">
  <link rel="stylesheet" type="text/css" href="../Assets/Frontend/css/owl.theme.default.min.css">
  <link rel="stylesheet" type="text/css" href="../Assets/Frontend/css/owl.theme.green.min.css">
  <link rel="stylesheet" type="text/css" href="../Assets/Frontend/css/css-stars.css">
  <script type="text/javascript" src="../Assets/Frontend/js/owl.carousel.js"></script>
  <script type="text/javascript" src="../Assets/Frontend/js/jquery.barrating.min.js"></script>
</head>
<body>
<div class="message"></div>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5f5243c9f0e7167d000d780c/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=680132845943015&autoLogAppEvents=1" nonce="b2qq65fj"></script>
<div class="wrapper">
  <?php include "Views/HeaderView.php"; ?>
  <main>
    <!-- main-content -->
    <?php 
        if(file_exists($fileController)){
            include $fileController;
            if(class_exists($classController)){
                $obj= new $classController();
                $obj->$action();
            }
        }
     ?>
    <!-- end main-content -->
  </main>
  <footer>
    <div class="top-footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div class="newsletter d-flex align-items-center justify-content-between">
              <div class="title">
                <h4><i class="fas fa-envelope-open-text"></i>&nbsp;&nbsp;Đăng kí nhận tin</h4>
              </div>
              <form class="form-newsletter">
                <input type="email" id="newsletter-email" placeholder="Nhập email của bạn" required>
                <button type="submit">Đăng kí</button>
              </form>
            </div>
            <script type="text/javascript">
              $(document).ready(function() {
                $('.form-newsletter').submit(function(event) {
                  event.preventDefault();
                  var email = $('#newsletter-email').val();
                  $.ajax({
                    url: 'Ajax/InsertEmail.php',
                    type: 'POST',
                    data: {email:email},
                    success:function(data){
                      $('.message').fadeIn().html(data).delay(3000).fadeOut(1000);
                    }
                  })
                });
              });
            </script>
          </div>
          <?php 
            $conn = Connection::getInstance();
            $query = $conn->query("select * from about_us limit 1");
            $result = $query->fetch();
           ?>
          <div class="col-md-4">
            <div class="contact">
              <i class="fas fa-phone"></i>
              <span>Hỗ trợ / Mua hàng: <strong><?php echo $result->phone ?></strong></span>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- end top-footer -->
    <div class="main-footer">
      <div class="container-fluid">
        <div class="row pt-4 pb-4">
          <div class="col-md-4">
            <div class="footer-content">
              <h4>Giới thiệu</h4>
              <p><?php echo $result->name ?> là trang mua sắm trực tuyến của các thương hiệu như Nike, Vans, Adidas ..., thời trang nam, nữ, phụ kiện, giúp bạn tiếp cận xu hướng thời trang mới nhất.</p>
            </div>
          </div>
          <div class="col-md-2">
            <div class="footer-content">
              <h4>Liên kết</h4>
              <ul>
                <li><a href="introduce/about_us">Giới thiệu</a></li>
                <li><a href="introduce/chinh_sach_doi_tra">Chính sách đổi trả</a></li>
                <li><a href="introduce/chinh_sach_bao_mat">Chính sách bảo mật</a></li>
                <li><a href="introduce/dieu_khoan_dich_vu">Điều khoản dịch vụ</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-3">
            <div class="footer-content">
              <h4>Thông tin liên hệ</h4>
              <p><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;<?php echo $result->address ?></p>
              <p><i class="fas fa-phone-square-alt"></i>&nbsp;&nbsp;<?php echo $result->phone ?></p>
              <p><i class="fas fa-paper-plane"></i>&nbsp;&nbsp;<?php echo $result->email ?></p>
            </div>
          </div>         
          <div class="col-md-3">
            <div class="footer-content">
              <h4>Fanpage</h4>
              <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs=timeline&width=340&height=300&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- end main-footer -->
    <div class="bottom-footer border-top pt-3 text-center">
      <p>Copyright © 2020 Fashion Shoes</p>
    </div>
  </footer>
</div>
<!-- Modal Search -->
<div class="modal fade" id="searchmodal" tabindex="-1" role="dialog" aria-labelledby="searchmodalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
           <h5 class="modal-title" id="searchmodalTitle">Tìm kiếm </h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
          <div class="modal-body">
            <input type="search" autocomplete="off" id="key" name="" placeholder="Tìm kiếm sản phẩm..." style="padding: 0 20px; height: 46px;width: 100%; border: 1px solid #e7e7e7; box-shadow: none; outline: none;border-radius: 10px;">
          </div>
          <div class="box-smart-search" id="box-smart-search-lg">
            <ul></ul>
          </div>
    </div>
  </div>
</div> <!-- end Modal Search -->
<script type="text/javascript" src="../Assets/Frontend/js/wow.js"></script>
<script type="text/javascript">new WOW().init();</script>
<script type="text/javascript">
  $(document).ready(function() {
    var header = $('header').offset().top + 120;
    $(window).scroll(function(event) {
      if ($(window).scrollTop() > header) {
      $('.fixheader').addClass('show');
      $('.header').addClass('fixed');
      }
      else{
        $('.fixheader').removeClass('show');
        $('.header').removeClass('fixed');
      }
      });

    $('.banner .icon .login a').click(function(event) {
      $('.banner .icon .login .form-login').toggleClass('show');
    });

    $('#key').keyup(function(event) {
       $('#box-smart-search-lg').attr("style", "display:block");
       var key = $('#key').val();
       $('#box-smart-search-lg ul').empty();
       $.ajax({
        url: "Ajax/SmartSearch.php?key="+key,
        success: function(result){
          if(result){
            $('#box-smart-search-lg ul').append(result);
          }
          else{
            $('#box-smart-search-lg').attr("style", "display:none");
          }
        }   
      });
    }); 
    $('#key').blur(function(event) {
      $('#key').val("");
      setTimeout(function(){
        $('#box-smart-search-lg').attr("style", "display:none");
      }, 200)
    });
    });
</script>
</body>
</html>