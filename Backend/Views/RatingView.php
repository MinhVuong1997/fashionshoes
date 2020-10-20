<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh sách đánh giá</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Đánh giá</li>
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
              <!-- /.card-header -->
              <div class="card-body">
                <table id="listRating" class="table table-bordered table-hover">
                  <thead>
                  <tr class="text-center bg-light">
                    <th>STT</th>
                    <th>Sản phẩm</th>
                    <th>Đánh giá</th>
                    <th>Tiêu đề</th>
                    <th>Khách hàng</th>
                    <th>Thời gian</th>
                    <th>Thao tác</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $stt=0; foreach ($listRecord as $rows) : $stt++;?>
                  <tr class="text-center">
                    <td><?php echo $stt ?></td>
                    <td><?php echo $this->modelGetProductName($rows->product_id) ?></td>
                    <td style="color: #EDB867">
                      <?php if ($rows->star == 0 && $rows->star <= 0.5): ?>
                        <span>&#9734;&#9734;&#9734;&#9734;&#9734;</span>
                      <?php elseif($rows->star > 0.5 && $rows->star <= 1.5): ?>
                        <span>&#9733;&#9734;&#9734;&#9734;&#9734;</span>
                      <?php elseif($rows->star > 1.5 && $rows->star <= 2.5): ?>
                        <span>&#9733;&#9733;&#9734;&#9734;&#9734;</span>
                      <?php elseif($rows->star > 2.5 && $rows->star <= 3.5): ?>
                        <span>&#9733;&#9733;&#9733;&#9734;&#9734;</span>
                      <?php elseif($rows->star > 3.5 && $rows->star <= 4.5): ?>
                        <span>&#9733;&#9733;&#9733;&#9733;&#9734;</span>
                      <?php elseif($rows->star > 4.5 && $rows->star <= 5): ?>
                        <span>&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                      <?php endif ?>
                    </td>
                    <td><?php echo $rows->title; ?></td>
                    <td><?php echo $this->modelGetCustomerName($rows->customerId) ?></td>
                    <td><?php echo $rows->created ?></td>
                    <td>
                      <a href="http://localhost/project01/Frontend/product/detail/<?php echo $rows->product_id; ?>" target="_blank"><i class="fas fa-eye"></i></a>
                      <a href="index.php?controller=rating&action=delete&id=<?php echo $rows->id; ?>" onclick="return window.confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                    </td>
                  </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>        
              </div>
              <!-- /.card-body -->
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
        $("#listRating").DataTable({
          "responsive": true,
          "autoWidth": false,
          "ordering": false,
        });
      });
    </script>