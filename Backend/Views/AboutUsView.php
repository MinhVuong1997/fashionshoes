<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thông tin shop</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Thông tin shop</li>
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
              <?php if($total > 0): ?>
              <?php else: ?>
               <div class="card-header">
                <a href="index.php?controller=aboutus&action=create" class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;&nbsp;Thêm mới</a>
              </div>
            <?php endif; ?>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="listBlog" class="table table-bordered table-hover">
                  <thead>
                  <tr class="text-center bg-light">
                    <th>Tên shop</th>
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th>Email</th>
                    <th>Thao tác</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($listRecord as $rows) : ?>
                  <tr class="text-center">
                    <td><?php echo $rows->name ?></td>
                    <td><?php echo $rows->address; ?></td>
                    <td><?php echo $rows->phone; ?></td>
                    <td><?php echo $rows->email; ?></td>
                    <td style="width: 100px;">
                      <a href="index.php?controller=aboutus&action=update&id=<?php echo $rows->id; ?>"><i class="fas fa-edit"></i></a>
                      <a href="index.php?controller=aboutus&action=delete&id=<?php echo $rows->id; ?>" onclick="return window.confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
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