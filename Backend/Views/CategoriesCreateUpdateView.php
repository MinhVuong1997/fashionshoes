<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Danh mục sản phẩm</a></li>
              <li class="breadcrumb-item active"><?php echo $text = ($_GET["action"]=='create') ? "Thêm" : "Sửa"; ?> danh mục</li>
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
                <h3 class="card-title"><?php echo $text; ?> danh mục</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="<?php echo $action; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label>Tên danh mục</label>
                    <input type="text" value="<?php echo isset($record->name)?$record->name:""; ?>" class="form-control" name="name" placeholder="Nhập tên vào đây" required>
                  </div>
                  <div class="form-group">
                      <label>Danh mục cha</label>
                      <?php 
                          $categories = $this->modelGetCategories(isset($record->id) ? $record->id : 0);
                       ?>
                      <select name="parent_id" class="form-control" style="width: 200px;">
                          <option value="0"></option>
                          <?php foreach ($categories as $rows) : ?>
                              <option <?php if(isset($record->id)&&$record->parent_id==$rows->id): ?> selected <?php endif; ?> value="<?php echo $rows->id; ?>"><?php echo $rows->name ?></option>
                          <?php endforeach; ?>
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
      <!-- /.container-fluid -->
    </section>