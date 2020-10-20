<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
              <li class="breadcrumb-item"><a href="#">Sản phẩm nổi bật</a></li>
              <li class="breadcrumb-item active"><?php echo $text = ($_GET["action"] == 'create') ? "Thêm" : "Sửa" ?> sản phẩm nổi bật</li>
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
                <h3 class="card-title"><?php echo $text; ?> sản phẩm nổi bật</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" enctype="multipart/form-data" action="<?php echo $action; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" value="<?php echo isset($record->name)?$record->name:""; ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Ảnh sản phẩm</label>
                    <div class="input-group flex-column">
                        <input type="file" name="photo" id="imgInp">
                        <img <?php if(isset($record->photo)): ?> src="../Assets/Upload/Products/<?php echo $record->photo; ?>" <?php endif ?> style="max-width: 500px; margin-top: 10px;" id="imgPreview">                       
                    </div>                   
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                     <textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="description"><?php echo isset($record->description) ? $record->description : "" ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Content</label>
                     <textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="content"><?php echo isset($record->content) ? $record->content : "" ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Size</label>
                     <textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="size"><?php echo isset($record->size) ? $record->size : "" ?></textarea>
                  </div>
                  <div class="form-group">  
                     <label>Lựa chọn sản phẩm</label>
                     <select class="selectpicker" name="product_id" data-live-search="true" data-width="100%" data-none-selected-text="Không có sản phẩm nào được chọn" data-show-tick="true" required>
                      <?php $products = $this->modelGetProduct() ?>
                      <option value=""></option>
                      <?php foreach ($products as $rows) : ?> 
                       <option <?php if(isset($record->id)&&$this->modelCheckFeaturedProduct($record->id,$rows->id)): ?> selected <?php endif; ?> value="<?php echo $rows->id ?>"><?php echo $rows->name ?></option>
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