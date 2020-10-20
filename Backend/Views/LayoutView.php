<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../Assets/Backend/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../Assets/Backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../Assets/Backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../Assets/Backend/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../Assets/Backend/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../Assets/Backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../Assets/Backend/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../Assets/Backend/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- jQuery -->
  <script src="../Assets/Backend/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../Assets/Backend/plugins/jquery-ui/jquery-ui.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../Assets/Backend/plugins/upload/css/image-uploader.min.css">

  <script src="../Assets/Backend/plugins/upload/js/image-uploader.min.js"></script>
   <!-- Bootstrap 4 -->
  <script src="../Assets/Backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="../Assets/Backend/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="../Assets/Backend/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="../Assets/Backend/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../Assets/Backend/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../Assets/Backend/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../Assets/Backend/plugins/moment/moment.min.js"></script>
  <script src="../Assets/Backend/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../Assets/Backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="../Assets/Backend/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../Assets/Backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../Assets/Backend/dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../Assets/Backend/dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../Assets/Backend/dist/js/demo.js"></script>
   <!-- DataTables -->
  <link rel="stylesheet" href="../Assets/Backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../Assets/Backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <script src="../Assets/Backend/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../Assets/Backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../Assets/Backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../Assets/Backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../Assets/Backend/plugins/multipleSelect/js/bootstrap-select.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../Assets/Backend/plugins/multipleSelect/css/bootstrap-select.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="../Assets/Backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Quản trị Website</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../Assets/Backend/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION["name"] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2 menu_main">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link <?php if(!$_GET['controller']): ?> active <?php endif ?> ">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?controller=users&action=read" class="nav-link <?php if(isset($_GET['controller']) && $_GET['controller'] == 'users'): ?> active <?php endif ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Tài khoản
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="index.php?controller=categories&action=read" class="nav-link <?php if(isset($_GET['controller']) && $_GET['controller'] == 'categories'): ?> active <?php endif ?>">
              <i class="nav-icon fas fa-th-list"></i>
              <p>
                Danh mục sản phẩm
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?php if(isset($_GET['controller']) && ($_GET['controller'] == 'brand' || $_GET['controller'] == 'parameters' || $_GET['controller'] == 'featuredProduct' || $_GET['controller'] == 'collection' || $_GET['controller'] == 'products')): ?> menu-open <?php endif ?>">
            <a href="#" class="nav-link <?php if(isset($_GET['controller']) && ($_GET['controller'] == 'brand' || $_GET['controller'] == 'parameters' || $_GET['controller'] == 'featuredProduct' || $_GET['controller'] == 'collection' || $_GET['controller'] == 'products')): ?> active <?php endif ?>">
              <i class="nav-icon fas fa-th-large"></i>
              <p>Sản phẩm</p>
              <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?controller=brand&action=read" class="nav-link <?php if(isset($_GET['controller']) && $_GET['controller'] == 'brand'): ?> active <?php endif ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thương hiệu</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="index.php?controller=parameters&action=read" class="nav-link <?php if(isset($_GET['controller']) && $_GET['controller'] == 'parameters'): ?> active <?php endif ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dữ liệu sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="index.php?controller=featuredProduct&action=read" class="nav-link <?php if(isset($_GET['controller']) && $_GET['controller'] == 'featuredProduct'): ?> active <?php endif ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sản phẩm nổi bật</p>
                  </a>
                </li>
              <li class="nav-item">
                  <a href="index.php?controller=collection&action=read" class="nav-link <?php if(isset($_GET['controller']) && $_GET['controller'] == 'collection'): ?> active <?php endif ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Bộ sưu tập</p>
                  </a>
                </li>
              <li class="nav-item">
                  <a href="index.php?controller=products&action=read" class="nav-link <?php if(isset($_GET['controller']) && $_GET['controller'] == 'products'): ?> active <?php endif ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách sản phẩm</p>
                  </a>
                </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="index.php?controller=customers&action=read" class="nav-link <?php if(isset($_GET['controller']) && $_GET['controller'] == 'customers'): ?> active <?php endif ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Khách hàng
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?controller=orders&action=read" class="nav-link <?php if(isset($_GET['controller']) && $_GET['controller'] == 'orders'): ?> active <?php endif ?>">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Đơn hàng
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?controller=blog&action=read" class="nav-link <?php if(isset($_GET['controller']) && $_GET['controller'] == 'blog'): ?> active <?php endif ?>">
              <i class="nav-icon fas fa-blog"></i>
              <p>
                Bài viết
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?controller=rating&action=read" class="nav-link <?php if(isset($_GET['controller']) && $_GET['controller'] == 'rating'): ?> active <?php endif ?>">
              <i class="nav-icon fas fa-star"></i>
              <p>
                Đánh giá
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?controller=sendmail&action=read" class="nav-link <?php if(isset($_GET['controller']) && $_GET['controller'] == 'sendmail'): ?> active <?php endif ?>">
              <i class="nav-icon fas fa-envelope-open-text"></i>
              <p>
                Gửi tin
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?controller=slider&action=read" class="nav-link <?php if(isset($_GET['controller']) && $_GET['controller'] == 'slider'): ?> active <?php endif ?>">
              <i class="nav-icon fas fa-images"></i>
              <p>
                Slider
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?controller=aboutus&action=read" class="nav-link <?php if(isset($_GET['controller']) && $_GET['controller'] == 'aboutus'): ?> active <?php endif ?>">
              <i class="nav-icon fas fa-info"></i>
              <p>
                Thông tin shop
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?controller=login&action=logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Log out
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <?php
      switch (file_exists($fileController)) {
       case '$controller':
         include $fileController;
            if(class_exists($classController)){
                $obj = new $classController();
                $obj->$action();
            }
         break;
       default:
          include "Controllers/HomeController.php";
            $obj = new HomeController();
            $obj->index();
         break;
      }
    ?>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer text-center">
    <strong>Copyright &copy; 2020 Fashion Shoes.</strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
</body>
</html>
