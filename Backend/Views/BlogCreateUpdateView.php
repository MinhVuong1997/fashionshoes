<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Bài viết</a></li>
              <li class="breadcrumb-item active"><?php echo $text = ($_GET["action"]=='create') ? "Thêm" : "Sửa"; ?> bài viết</li>
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
                <h3 class="card-title"><?php echo $text; ?> bài viết</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" enctype="multipart/form-data" action="<?php echo $action; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label>Tiêu đề</label>
                    <input type="text" value="<?php echo isset($record->name)?$record->name:""; ?>" class="form-control" name="name" placeholder="Nhập tiêu đề vào đây" required>
                  </div>
                  <div class="form-group">
                    <label>Photo</label>
                    <div class="input-group flex-column">
                        <input type="file" name="photo" id="imgInp">
                        <img <?php if(isset($record->photo)): ?> src="../Assets/Upload/News/<?php echo $record->photo; ?>" <?php endif ?> style="max-width: 500px; margin-top: 10px;" id="imgPreview">                       
                    </div>
                 </div>
                 <div class="form-group">
                    <label>Mô tả</label>
                     <textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="description"><?php echo isset($record->description) ? $record->description : "" ?></textarea>
                  </div>
                   <div class="form-group">
                    <label>Nội dung</label>
                     <textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="content"><?php echo isset($record->content) ? $record->content : "" ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Hot</label>
                    <input type="checkbox" style="margin-left: 10px;" <?php if(isset($record->hot)&&$record->hot == 1): ?> checked <?php endif; ?> name="hot">
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