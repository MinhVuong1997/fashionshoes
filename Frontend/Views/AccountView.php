<div class="content-account">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 p-0">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
							<li class="breadcrumb-item active" aria-current="page">Quản lý tài khoản</li>
						</ol>
					</nav>
				</div>
			</div>
			<div class="row p-4">
				<div class="col-lg-3">
					<div class="left">
						<div class="account_menu">
							<h3 class="text-center text-success">Danh mục</h3>
							<ul>
								<li>
									<a href="account/info/<?php echo $_SESSION["customerId"] ?>">Thông tin tài khoản</a>
								</li>
								<li>
									<a href="account/update/<?php echo $_SESSION["customerId"] ?>">Cập nhật tài khoản</a>
								</li>
								<li>
									<a href="account/order/<?php echo $_SESSION["customerId"] ?>">Đơn hàng của tôi</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-9 pt-lg-0 pt-3">
					<div class="right">
						<div class="page-wrapper">
							<?php if(isset($_GET["action"])&&$_GET["action"]=="info"): ?>
							<h3 class="pb-3 pt-lg-0 pt-3">Thông tin tài khoản</h3>
								<div class="content">
									<div class="col-12 pb-3 pt-3">
										<span>Họ tên:</span>&nbsp;&nbsp;
										<span><?php echo $record->name ?></span>
									</div>
									<div class="col-12 pb-3">
										<span>Email:</span>&nbsp;&nbsp;
										<span><?php echo $record->email ?></span>
									</div>
									<div class="col-12 pb-3">
										<span>Số điện thoại:</span>&nbsp;&nbsp;
										<span><?php echo $record->phone ?></span>
									</div>
									<div class="col-12 pt-3 pb-3">
										<h5 style="font-size: 15px;">ĐỊA CHỈ GIAO HÀNG:</h5>
										<span><?php echo $record->address ?></span>
									</div>
								</div>
							<?php elseif(isset($_GET["action"])&&$_GET["action"]=="update"): ?>
							<?php if(isset($_GET["notify"])&&$_GET["notify"]=="success"): ?>
								<div class="alert alert-success">Cập nhật thành công.</div>
							<?php elseif(isset($_GET["notify"])&&$_GET["notify"]=="fail"): ?>
								<div class="alert alert-danger">Cập nhật thất bại.</div>
							<?php endif; ?>
							<h3 class="pb-3 pt-lg-0 pt-3">Cập nhật tài khoản</h3>
								<div class="content pt-3 pb-3">
									<form action="account/updatePost/<?php echo $_SESSION['customerId'] ?>" method="post">
										<div class="form-group">
											<label>Họ tên*:</label>
											<input type="text" name="name" class="form-control" placeholder="Nhập họ tên" value="<?php echo $record->name; ?>" required>
										</div>
										<div class="form-group">
											<label>Email*:</label>
											<input type="email" name="email" class="form-control" placeholder="Nhập email" value="<?php echo $record->email; ?>" required>
										</div>
										<div class="form-group">
											<label>Số điện thoại*:</label>
											<input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại" value="<?php echo $record->phone; ?>" required>
										</div>
										<div class="form-group">
											<label>Địa chỉ*:</label>
											<input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ" value="<?php echo $record->address; ?>" required>
										</div>
										<div class="form-group">
											<label>Mật khẩu mới:</label>
											<input type="password" id="password" name="password" class="form-control" placeholder="Nhập mật khẩu mới">
										</div>
										<div class="form-group">
											<label>Nhập lại mật khẩu:</label>
											<input type="password" id="returnpass" name="returnpass" class="form-control" placeholder="Nhập lại mật khẩu">
										</div>
										<div class="message-pass"></div>
										<input type="submit" value="Cập nhật" class="btn btn-success">
									</form>
								</div>
							<?php elseif(isset($_GET["action"])&&$_GET["action"]=="order"): ?>
								<h3 class="pb-3 pt-lg-0 pt-3">Danh sách đơn hàng</h3>
								<div class="content">
									<?php $total = $this->modelTotalOrder($_SESSION["customerId"]) ?>
									<?php if($total == 0): ?>
										<div class="col-12 text-center p-5">Không có đơn hàng nào</div>
									<?php else: ?>
									<table class="table table-borderless table-responsive-sm">
										<tr>
											<th>Mã HĐ</th>
											<th>Người nhận</th>
											<th>Thành tiền</th>
											<th>Ngày đặt</th>
											<th>Trạng thái</th>
											<th>Thao tác</th>
										</tr>
										<?php foreach ($listRecord as $rows) : ?>
										<tr>
											<td>HD<?php echo $rows->id ?></td>
											<td><?php echo $_SESSION["customerName"] ?></td>
											<td><?php echo number_format($rows->price) ?>₫</td>
											<td><?php echo $rows->date ?></td>
											<td>
												<?php if($rows->status == 1): ?>
													<div class="badge badge-primary">Đã giao hàng</div>
												<?php else: ?>
													<div class="badge badge-secondary">Chưa giao hàng</div>
												<?php endif ?>
											</td>
											<td>
												<button type="button" class="btn badge badge-primary" data-toggle="modal" data-target="#order_view" data-id="<?php echo $rows->id ?>">Xem</button>
												<?php if($rows->status == 1): ?>
												<?php else: ?>
												<a href="index.php?controller=account&action=deleteOrder&id=<?php echo $rows->id ?>" class="btn badge badge-danger" onclick="return window.confirm('Are you sure?');">Hủy</a>
											<?php endif ?>
											</td>
										</tr>
									<?php endforeach ?>
									</table>
								<?php endif ?>
								</div>
							<?php endif ?>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- Modal -->
<input type="hidden" id="customerId" value="<?php echo $_SESSION['customerId'] ?>">
<div class="modal fade" id="order_view" tabindex="-1" role="dialog" aria-labelledby="order_viewTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title" id="order_viewTitle">Chi tiết đơn hàng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body orderdetail">
      	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#returnpass').keyup(function(event) {
			var pass = $('#password').val();
			if($(this).val() != pass){
				$('.message-pass').show();
				$('.message-pass').html('<div class="alert alert-warning">Mật khẩu không khớp. Vui lòng kiểm tra lại</div>');
				setTimeout(function(){
					$('.message-pass').hide();
				},5000)
			}
			else{
				$('.message-pass').hide();
			}
		});
		$('#order_view').on('show.bs.modal', function(e) {
		    var orderId = $(e.relatedTarget).data('id');
		    var customerId = $('#customerId').val()
		    $.ajax({
		    	url: 'Ajax/Fetch_order.php',
		    	type: 'POST',
		    	data: {orderId:orderId,customerId:customerId},
		    	success:function(data){
		    		$('.orderdetail').html(data);
		    	}
		    })
		});
	});
</script>