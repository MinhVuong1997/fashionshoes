<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh sách bài viết</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Bài viết</li>
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
                <a href="index.php?controller=blog&action=create" class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;&nbsp;Thêm mới</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="listBlog" class="table table-bordered table-hover">
                  <thead>
                  <tr class="text-center bg-light">
                    <th>STT</th>
                    <th>Photo</th>
                    <th>Tiêu đề</th>
                    <th>Hot</th>
                    <th>Thao tác</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $stt=0; foreach ($listRecord as $rows) : $stt++;?>
                  <tr>
                    <td class="text-center"><?php echo $stt ?></td>
                    <td class="text-center">
                        <?php if($rows->photo != "" && file_exists('../Assets/Upload/News/'.$rows->photo)): ?>
                    <img src="../Assets/Upload/News/<?php echo $rows->photo; ?>" style="width:100px;">
                        <?php endif; ?>
                    </td>
                    <td><?php echo $rows->name; ?></td>
                    <td class="text-center">
                        <?php if($rows->hot == 1): ?>
                            <span class="badge badge-danger">hot</span>
                          <?php else: ?>
                            <span class="badge badge-secondary">none</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-center" style="width: 100px;">
                      <a href="index.php?controller=blog&action=update&id=<?php echo $rows->id; ?>"><i class="fas fa-edit"></i></a>
                      <a href="index.php?controller=blog&action=delete&id=<?php echo $rows->id; ?>" onclick="return window.confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                    </td>
                  </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>        
              </div>
              <!-- /.card-body -->
             <!--  <div class="card-footer">
                  <ul class="pagination">
                    <?php 
                    for ($i=1; $i <= $numPage ; $i++){
                      $p = isset($_GET["p"]) ? $_GET["p"] : 1;                    
                      if($i != $p){
                        echo "<li class=\"page-item\">
                            <a href=\"index.php?controller=blog&action=read&p=$i\" class=\"page-link\">$i</a>
                        </li>";
                      }
                      else{
                        echo "<li class=\"page-item active\">
                            <a href=\"index.php?controller=blog&action=read&p=$i\" class=\"page-link\">$i</a>
                        </li>";
                      }
                    }
                    ?>
                  </ul>
              </div> -->
              <!-- card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#listBlog").DataTable({
          "responsive": true,
          "autoWidth": false,
          "ordering": false,
        });
      });
    </script>