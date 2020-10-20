<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Thông tin shop</a></li>
              <li class="breadcrumb-item active"><?php echo $text = ($_GET["action"]=='create') ? "Thêm" : "Sửa"; ?></li>
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
                <h3 class="card-title"><?php echo $text; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" enctype="multipart/form-data" action="<?php echo $action; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label>Tên shop</label>
                    <input type="text" value="<?php echo isset($record->name)?$record->name:""; ?>" class="form-control" name="name" placeholder="Nhập tên shop vào đây" required>
                  </div>
                  <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" value="<?php echo isset($record->address)?$record->address:""; ?>" class="form-control" name="address" placeholder="Nhập địa chỉ vào đây" required>
                  </div>
                  <div class="form-group">
                    <label>Điện thoại</label>
                    <input type="text" value="<?php echo isset($record->phone)?$record->phone:""; ?>" class="form-control" name="phone" placeholder="Nhập số điện thoại vào đây" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" value="<?php echo isset($record->email)?$record->email:""; ?>" class="form-control" name="email" placeholder="Nhập email vào đây" required>
                  </div>
                  <div class="form-group">
                    <label>Tiêu đề nhỏ</label>
                    <input type="text" value="<?php echo isset($record->subtitle)?$record->subtitle:""; ?>" class="form-control" name="subtitle" placeholder="Nhập tiêu đề vào đây" required>
                  </div>
                  <div class="form-group">
                    <label>Tiêu đề</label>
                    <input type="text" value="<?php echo isset($record->title)?$record->title:""; ?>" class="form-control" name="title" placeholder="Nhập tiêu đề vào đây" required>
                  </div>
                  <div class="form-group">
                    <label>Photo</label>
                    <div class="input-group flex-column">
                        <input type="file" name="photo" id="imgInp">
                        <img <?php if(isset($record->photo)): ?> src="../Assets/Upload/Images/<?php echo $record->photo; ?>" <?php endif ?> style="max-width: 500px; margin-top: 10px;" id="imgPreview">                       
                    </div>
                 </div>
                 <div class="form-group">
                    <label>Description</label>
                     <textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="description"><?php echo isset($record->description) ? $record->description : "" ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Giới thiệu</label>
                     <textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="content"><?php echo isset($record->content) ? $record->content : "" ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Chính sách đổi trả</label>
                     <textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="returnpolicy"><?php echo isset($record->returnpolicy) ? $record->returnpolicy : "" ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Chính sách bảo mật</label>
                     <textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="privacypolicy"><?php echo isset($record->privacypolicy) ? $record->privacypolicy : "" ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Điều khoản dịch vụ</label>
                     <textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="termsofservice"><?php echo isset($record->termsofservice) ? $record->termsofservice : "" ?></textarea>
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
    <script type="text/javascript">
      $(document).ready(function() {
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imgPreview').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
          }
          $('#imgInp').change(function(event) {
            readURL(this);
          });
      });
    </script>