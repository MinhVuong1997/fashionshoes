<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh sách sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
              <li class="breadcrumb-item active">Danh sách sản phẩm</li>
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
              <div class="card-header">
                <a href="index.php?controller=products&action=create" class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;&nbsp;Thêm mới</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="listProduct" class="table table-bordered table-hover">
                  <thead>
                  <tr class="text-center bg-light">
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Ảnh</th>
                    <th>Danh mục</th>
                    <th>Giá</th>
                    <th>Hot</th>
                    <th>Tình trạng</th>
                    <th>Thao tác</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $stt=0; foreach ($listRecord as $rows) : $stt++;?>
                  <tr class="text-center">
                    <td><?php echo $stt; ?></td>
                    <td><?php echo $rows->name; ?></td>
                    <td style="width: 100px;">
                        <?php if($rows->photo != "" && file_exists('../Assets/Upload/Products/'.$rows->photo)): ?>
                            <img src="../Assets/Upload/Products/<?php echo $rows->photo; ?>" style="width:100px;">
                        <?php endif; ?>
                    </td>
                    <td>
                      <span class="badge badge-primary"><?php echo $this->modelGetCategoryName($rows->category_id); ?></span>
                    </td>
                    <td>
                      <?php if($rows->discount == 0) :?>
                        <?php echo number_format($rows->price); ?> VNĐ
                      <?php else: ?>
                      <del><?php echo number_format($rows->price); ?> VNĐ </del>
                      <br> 
                      <?php echo number_format($rows->price - ($rows->price * ($rows->discount / 100))); ?> VNĐ
                    <?php endif; ?>
                    </td>
                    <td><?php if($rows->hot == 1) : ?>
                      <span class="badge badge-danger">hot</span>
                    <?php else: ?>
                      <span class="badge badge-secondary">none</span>
                    <?php endif; ?>
                    </td>
                    <td>
                      <?php if($rows->status==1): ?>
                        <span class="badge badge-success">Còn hàng</span>
                      <?php else: ?>
                        <span class="badge badge-secondary">Hết hàng</span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <a href="index.php?controller=products&action=update&id=<?php echo $rows->id; ?>"><i class="fas fa-edit"></i></a>
                      <a href="index.php?controller=products&action=delete&id=<?php echo $rows->id; ?>" onclick="return window.confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
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
        $("#listProduct").DataTable({
          "responsive": true,
          "autoWidth": false,
          "ordering": false,
          // "pageLength": 5
        });
      });
    </script>