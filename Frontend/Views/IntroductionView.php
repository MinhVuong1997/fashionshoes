<?php 
	$conn = Connection::getInstance();
	$query = $conn->query("select * from about_us");
	$result = $query->fetch();
?>
<div class="content-blog">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 p-0">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
							<li class="breadcrumb-item active" aria-current="page">Giới thiệu</li>
						</ol>
					</nav>
				</div>
			</div>
			<div class="row p-3">
				<div class="col-md-3">
					<div class="left">
						<div class="account_menu">
							<h3 class="text-center">Danh mục</h3>
							<ul>
								<li>
									<a href="introduce/about_us">Giới thiệu</a>
								</li>
								<li>
									<a href="introduce/chinh_sach_doi_tra">Chính sách đổi trả</a>
								</li>
								<li>
									<a href="introduce/chinh_sach_bao_mat">Chính sách bảo mật</a>
								</li>
								<li>
									<a href="introduce/dieu_khoan_dich_vu">Điều khoản dịch vụ</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-9 mt-md-0 mt-3">
					<div class="right">
						<div class="page-wrapper">
								<?php if(isset($_GET["action"])&&$_GET["action"]=="aboutus"): ?>
									<h2 class="pb-3 pt-lg-0 pt-3">Giới thiệu</h2>
										<div class="content">
											<?php echo $result->content ?>
										</div>
								<?php elseif(isset($_GET["action"])&&$_GET["action"]=="returnpolicy"): ?>
									<h2 class="pb-3 pt-lg-0 pt-3">Chính sách đổi trả</h2>
										<div class="content">
											<?php echo $result->returnpolicy ?>
										</div>
								<?php elseif(isset($_GET["action"])&&$_GET["action"]=="privacypolicy"): ?>
									<h2 class="pb-3 pt-lg-0 pt-3">Chính sách bảo mật</h2>
										<div class="content">
											<?php echo $result->privacypolicy ?>
										</div>
								<?php elseif(isset($_GET["action"])&&$_GET["action"]=="termsofservice"): ?>
									<h2 class="pb-3 pt-lg-0 pt-3">Điều khoản dịch vụ</h2>
										<div class="content">
											<?php echo $result->termsofservice ?>
										</div>
								<?php endif ?>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>