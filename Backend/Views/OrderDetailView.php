<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <input onclick="history.go(-1);" type="button" value="Back" class="btn btn-danger">
            </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Đơn hàng</a></li>
              <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Chi tiết đơn hàng</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                    <?php 
                        $order = $this->modelGetOrders($id);
                        $customer = $this->modelGetCustomers($order->customer_id);
                     ?>
                    <table class="table mb-3">
                        <tr>
                            <th style="width: 110px;">Họ tên:</th>
                            <td><?php echo $customer->name; ?></td>
                        </tr>
                        <tr>
                            <th style="width: 110px;">Địa chỉ:</th>
                            <td><?php echo $customer->address; ?></td>
                        </tr>
                        <tr>
                            <th style="width: 110px;">Điện thoại:</th>
                            <td><?php echo $customer->phone; ?></td>
                        </tr>
                        <tr>
                            <th style="width: 110px;">Tổng giá:</th>
                            <td><?php echo number_format($order->price); ?> VNĐ</td>
                        </tr>
                        <tr>
                            <th style="width: 110px;">Ngày đặt:</th>
                            <td><?php echo $order->date; ?></td>
                        </tr>
                        <tr>
                            <th style="width: 110px;">Ghi chú:</th>
                            <td><?php echo $order->note; ?></td>
                        </tr>
                        <tr>
                            <th style="width: 110px;">Trạng thái:</th>
                            <td>
                                <?php if($order->status == 0) :?>
                                    <span class="badge badge-danger">Chưa giao hàng</span>
                                <?php else: ?>
                                    <span class="badge badge-primary">Đã giao hàng</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                    <table class="table table-bordered table-hover">
                        <tr class="text-center bg-light">
                            <th>STT</th>
                            <th style="width: 100px;">Ảnh sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Màu sắc</th>
                            <th>Size</th>
                            <th>Số lượng</th>
                        </tr>
                        <?php $stt=0; foreach ($data as $rows) : $stt++; ?>
                            <?php 
                                $product = $this->modelGetProducts($rows->product_id);
                             ?>
                            <tr class="text-center">
                                <td style="width: 70px;"><?php echo $stt; ?></td>
                                <td style="text-align: center;"><img src="../Assets/Upload/Products/<?php echo $product->photo ?>" style="width: 100px;"></td>
                                <td><?php echo $product->name; ?></td>
                                <td style="text-align: center;"><?php echo number_format($rows->price) ?> VNĐ</td>
                                <td><?php echo $rows->color; ?></td>
                                <td><?php echo $rows->size; ?></td>
                                <td style="text-align: center;"><?php echo $rows->quantity; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>