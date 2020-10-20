<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Tài khoản</a></li>
              <li class="breadcrumb-item active"><?php echo $text = ($_GET["action"]=='create') ? "Thêm" : "Sửa"; ?> tài khoản</li>
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
                <h3 class="card-title"><?php echo $text; ?> tài khoản</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="<?php echo $action; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" value="<?php echo isset($record->name)?$record->name:""; ?>" class="form-control" name="name" placeholder="Nhập tên vào đây" required>
                  </div>
                   <div class="form-group">
                      <label>Email</label>
                      <input type="email" value="<?php echo isset($record->email)?$record->email:""; ?>" class="form-control" name="email" placeholder="Nhập email vào đây" required>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" <?php if(isset($record->name)): ?>  placeholder="Không đổi password thì không nhập thông tin vào ô này" <?php else: ?> required placeholder="Nhập password vào đây"<?php endif; ?> name="password">
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