<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Thương hiệu</a></li>
              <li class="breadcrumb-item active"><?php echo $text = ($_GET["action"]=='create') ? "Thêm" : "Sửa"; ?> thương hiệu</li>
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
                <h3 class="card-title"><?php echo $text; ?> thương hiệu</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="<?php echo $action; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label>Tên thương hiệu</label>
                    <input type="text" value="<?php echo isset($record->name)?$record->name:""; ?>" class="form-control" name="name" placeholder="Nhập tên vào đây" required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>