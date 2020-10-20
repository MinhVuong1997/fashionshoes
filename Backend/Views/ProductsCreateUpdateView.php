<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
              <li class="breadcrumb-item active"><?php echo $text = ($_GET["action"] == 'create') ? "Thêm" : "Sửa" ?> sản phẩm</li>
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
                <h3 class="card-title"><?php echo $text; ?> sản phẩm</h3>
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
                        <img src="" id="imgPreview">                       
                    </div>                   
                  </div>
                  <div class="form-group">
                    <label>Gallery</label>
                    <div class="input-images"></div>
                  </div>
                  <div class="form-group">
                  <label>Thương hiệu</label>
                  <select class="form-control" style="width: 200px;" name="brand_id">
                    <?php 
                        $brand = $this->modelGetBrand();
                     ?>
                     <?php foreach ($brand as $rows) : ?>
                        <option <?php if(isset($record->id)&&$record->brand_id==$rows->id): ?> selected <?php endif; ?> value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                  <div class="form-group">
                  <label>Danh mục</label>
                  <select class="form-control" style="width: 200px;" name="category_id">
                    <?php 
                        $categories = $this->modelGetCategories();
                     ?>
                     <?php foreach ($categories as $rows) : ?>
                        <option <?php if(isset($record->id)&&$record->category_id==$rows->id): ?> selected <?php endif; ?> value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                        <?php 
                            $categoriesSub = $this->modelGetSubCategories($rows->id);
                         ?>
                         <?php foreach ($categoriesSub as $rowsSub) : ?>
                            <option <?php if(isset($record->id)&&$record->category_id==$rowsSub->id): ?> selected <?php endif; ?> value="<?php echo $rowsSub->id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowsSub->name ?></option>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                    </select>
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
                    <?php $parameters = $this->modelGetParameters(); ?>
                    <?php foreach($parameters as $rows): ?>
                  <div class="form-group">
                        <label><?php echo $rows->name; ?></label><br>
                    <?php $subParameters = $this->modelGetSubParameters($rows->id); ?>
                    <?php foreach($subParameters as $rowsSub): ?>
                      <label style="font-weight: 500; font-size: 15px;">
                        <input type="checkbox" <?php if(isset($record->id)&&$this->modelCheckProductParameters($record->id,$rowsSub->id)): ?> checked <?php endif; ?> name="parameters[]" value="<?php echo $rowsSub->id; ?>">
                        &nbsp;<?php echo $rowsSub->name; ?>&nbsp;&nbsp;&nbsp;&nbsp;
                      </label>             
                    <?php endforeach; ?> 
                  </div> 
                  <?php endforeach; ?>         
                  <div class="form-group">
                    <label>Hot</label>
                    <input type="checkbox" style="margin-left: 10px;" <?php if(isset($record->hot)&&$record->hot == 1): ?> checked <?php endif; ?> name="hot">
                  </div>
                  <div class="form-group">
                    <label>Giá</label>
                    <input type="number" class="form-control" name="price" value="<?php echo isset($record->price)?$record->price:""; ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Giảm giá (%)</label>
                    <input type="number" class="form-control" name="discount" value="<?php echo isset($record->discount)?$record->discount:"0"; ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Tình trạng</label>
                    <select class="form-control" name="status">
                      <option <?php if(isset($record->status)&&$record->status==1): ?>selected <?php endif ?> value="1">Còn hàng</option>
                      <option <?php if(isset($record->status)&&$record->status==0): ?>selected <?php endif ?> value="0">Hết hàng</option>
                    </select>
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
                    $('#imgPreview').attr({'src':e.target.result,'style':'max-width:150px;margin-top:10px'});
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