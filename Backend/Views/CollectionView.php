<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh sách bộ sưu tập</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
              <li class="breadcrumb-item active">Bộ sưu tập</li>
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
              <div class="card-header">
                <a href="index.php?controller=collection&action=create" class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;&nbsp;Thêm mới</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="featured" class="table table-bordered table-hover">
                  <thead>
                  <tr class="text-center bg-light">
                    <th>STT</th>
                    <th>Tiêu đề nhỏ</th>
                    <th>Tiêu đề</th>
                    <th>Ảnh nền</th>
                    <th>Show</th>
                    <th>Thao tác</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $stt=0; foreach ($listRecord as $rows) : $stt++;?>
                  <tr class="text-center">
                    <td><?php echo $stt; ?></td>
                    <td><?php echo $rows->subtitle; ?></td>
                    <td><?php echo $rows->title; ?></td>
                    <td>
                        <?php if($rows->photo != "" && file_exists('../Assets/Upload/Collection/'.$rows->photo)): ?>
                            <img src="../Assets/Upload/Collection/<?php echo $rows->photo; ?>" style="width:200px; max-height: 300px" class="img-fluid">
                        <?php endif; ?>
                    </td>
                    <td>
                      <?php if($rows->type == 1) : ?>
                      <label class="switch">
                        <input type="checkbox" class="show" data-id="<?php echo $rows->id ?>" value="0" checked>
                        <span class="slider round"></span>
                      </label>
                      <?php else: ?>
                        <label class="switch">
                        <input type="checkbox" class="show" data-id="<?php echo $rows->id ?>" value="1">
                        <span class="slider round"></span>
                      </label>
                    <?php endif; ?>
                    </td>
                    <td>
                      <a href="index.php?controller=collection&action=update&id=<?php echo $rows->id; ?>"><i class="fas fa-edit"></i></a>
                      <a href="index.php?controller=collection&action=delete&id=<?php echo $rows->id; ?>" onclick="return window.confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
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
    <style type="text/css">
      .switch {
  position: relative;
  display: inline-block;
  width: 40px;
  height: 20px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 18px;
  width: 18px;
  left: 1px;
  bottom: 1px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(20px);
  -ms-transform: translateX(20px);
  transform: translateX(20px);
}
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
    </style>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#featured").DataTable({
          "responsive": true,
          "autoWidth": false,
          "ordering": false,
        });
        $('.show').click(function(event) {
          var type = $(this).val();
          var collection_id = $(this).data("id");
          location.href="index.php?controller=collection&action=updateType&id="+collection_id+"&type="+type;
        });
      });
    </script>