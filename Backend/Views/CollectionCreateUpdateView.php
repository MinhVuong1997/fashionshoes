<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
              <li class="breadcrumb-item"><a href="#">Bộ sưu tập</a></li>
              <li class="breadcrumb-item active"><?php echo $text = ($_GET["action"] == 'create') ? "Thêm" : "Sửa" ?> bộ sưu tập</li>
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
                <h3 class="card-title"><?php echo $text; ?> bộ sưu tập</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" enctype="multipart/form-data" action="<?php echo $action; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label>Tiêu đề nhỏ</label>
                    <input type="text" class="form-control" name="subtitle" value="<?php echo isset($record->subtitle)?$record->subtitle:""; ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Tiêu đề</label>
                    <input type="text" class="form-control" name="title" value="<?php echo isset($record->title)?$record->title:""; ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Ảnh nền</label>
                    <div class="input-group flex-column">
                        <input type="file" name="photo" id="imgInp">
                        <img <?php if(isset($record->photo)): ?> src="../Assets/Upload/Collection/<?php echo $record->photo; ?>" <?php endif ?> style="max-width: 500px; margin-top: 10px;" id="imgPreview">                       
                    </div>                    
                  </div>
                  <div class="form-group">  
                     <label>Lựa chọn sản phẩm</label>
                     <select class="selectpicker" name="products[]" multiple data-actions-box="true" data-live-search="true" data-width="100%" data-deselect-all-text="Bỏ chọn tất cả" data-select-all-text="Chọn tất cả" data-none-selected-text="Không có sản phẩm nào được chọn">
                      <?php $products = $this->modelGetProduct() ?>
                      <?php foreach ($products as $rows) : ?> 
                       <option <?php if(isset($record->id)&&$this->modelCheckProductCollection($record->id,$rows->id)): ?> selected <?php endif; ?> value="<?php echo $rows->id ?>"><?php echo $rows->name ?></option>
                     <?php endforeach ?>
                     </select>
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

          $('select').selectpicker();
        });
      </script>
      <!-- /.container-fluid -->
    </section>