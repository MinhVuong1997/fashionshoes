<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Quản lý giao diện</a></li>
              <li class="breadcrumb-item"><a href="#">Slider</a></li>
              <li class="breadcrumb-item active"><?php echo $text = ($_GET["action"] == 'create') ? "Thêm" : "Sửa" ?> slider</li>
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
                <h3 class="card-title"><?php echo $text; ?> slider</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" enctype="multipart/form-data" action="<?php echo $action; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label>Tên</label>
                    <input type="text" class="form-control" name="name" value="<?php echo isset($record->name)?$record->name:""; ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Ảnh</label>
                    <div class="input-group flex-column">
                        <input type="file" name="photo" id="imgInp">
                        <img <?php if(isset($record->photo)): ?> src="../Assets/Upload/Slider/<?php echo $record->photo; ?>" <?php endif ?> style="max-width: 500px; margin-top: 10px;" id="imgPreview">                       
                    </div>                    
                  </div>
                  <div class="form-group">  
                     <label>URL</label>
                     <input type="text" class="form-control" name="url" value="<?php echo isset($record->url)?$record->url:""; ?>">
                  </div>  
                  <div class="form-group">
                    <label>Show</label>
                    <input type="checkbox" style="margin-left: 10px;" <?php if(isset($record->type)&&$record->type == 1): ?> checked <?php endif; ?> name="type">
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
      <script type="text/javascript">
        $(document).ready(function() {
          $('.input-images').imageUploader();
          $('.textarea').summernote();
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
      <!-- /.container-fluid -->
    </section>