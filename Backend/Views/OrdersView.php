<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh sách đơn hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Đơn hàng</li>
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
            <div class="card">
              <div class="card-body">
                <table id="listOrder" class="table table-bordered table-hover">
                  <thead>
                  <tr class="text-center bg-light">
                    <th>STT</th>
                    <th>Khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th style="width:150px;">Tình trạng</th>
                    <th style="width:150px;">Delivery</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $stt=0; foreach($listRecord as $rows): $stt++; ?>
                        <?php 
                            $customer = $this->modelGetCustomers($rows->customer_id);
                         ?>
                    <tr class="text-center">
                        <td><?php echo $stt; ?></td>
                        <td><?php echo $customer->name; ?></td>
                        <td><?php echo $customer->phone; ?></td>
                        <td><?php
                                $date = date_create( $rows->date);
                                echo date_format($date, "d/m/Y");
                         ?></td>
                        <td><?php echo number_format($rows->price); ?> VNĐ</td>
                        <td style="text-align: center;">
                            <?php if($rows->status == 1) : ?>
                                <span class="badge badge-primary">Đã giao hàng</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Chưa giao hàng</span>
                            <?php endif; ?>
                        </td>
                        <td style="text-align: center;">
                            <a href="index.php?controller=orders&action=detail&id=<?php echo $rows->id ?>" class="badge badge-success">Chi tiết</a>
                            <?php if($rows->status == 0) : ?>
                                <a href="index.php?controller=orders&action=delivery&id=<?php echo $rows->id ?>" class="badge badge-info">Giao hàng</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>        
              </div>
              <!-- /.card-body -->
              <!-- <div class="card-footer">
                  <ul class="pagination">
                    <?php 
                    for ($i=1; $i <= $numPage ; $i++){
                      $p = isset($_GET["p"]) ? $_GET["p"] : 1;                    
                      if($i != $p){
                        echo "<li class=\"page-item\">
                            <a href=\"index.php?controller=orders&action=read&p=$i\" class=\"page-link\">$i</a>
                        </li>";
                      }
                      else{
                        echo "<li class=\"page-item active\">
                            <a href=\"index.php?controller=orders&action=read&p=$i\" class=\"page-link\">$i</a>
                        </li>";
                      }
                    }
                    ?>
                  </ul>
              </div> -->
              <!-- card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#listOrder").DataTable({
          "responsive": true,
          "autoWidth": false,
          "ordering": false,
        });
      });
    </script>