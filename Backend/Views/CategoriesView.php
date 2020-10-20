<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh mục sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Danh mục sản phẩm</li>
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
                <a href="index.php?controller=categories&action=create" class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;&nbsp;Thêm mới</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="listUsers" class="table table-bordered table-hover">
                  <thead>
                  <tr class="text-center bg-light">
                    <th>STT</th>
                    <th>Tên danh mục</th>
                    <th>Thao tác</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $stt=0; foreach ($listRecord as $rows) : $stt++;?>
                  <tr>
                    <td class="text-center" style="width: 100px;"><?php echo $stt ?></td>
                    <td><?php echo $rows->name; ?></td>
                    <td class="text-center" style="width: 100px;">
                      <a href="index.php?controller=categories&action=update&id=<?php echo $rows->id; ?>"><i class="fas fa-edit"></i></a>
                      <a href="index.php?controller=categories&action=delete&id=<?php echo $rows->id; ?>" onclick="return window.confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                    </td>
                  </tr>
                  <?php 
                      $listSubRecord = $this->modelGetSubCategories($rows->id);
                   ?>
                   <?php foreach ($listSubRecord as $rowsSub) : ?>
                      <tr>
                          <td style="width: 100px;"></td>
                          <td style="padding-left: 50px;"><?php echo $rowsSub->name; ?></td>
                          <td style="text-align:center; width: 100px;">
                              <a href="index.php?controller=categories&action=update&id=<?php echo $rowsSub->id; ?>"><i class="fas fa-edit"></i></a>&nbsp;
                              <a href="index.php?controller=categories&action=delete&id=<?php echo $rowsSub->id; ?>" onclick="return window.confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                          </td>
                      </tr>                          
                  <?php endforeach; ?>
                  <?php endforeach; ?>
                  </tbody>
                </table>        
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <ul class="pagination">
                    <?php 
                    for ($i=1; $i <= $numPage ; $i++){ 
                      $p = isset($_GET["p"]) ? $_GET["p"] : 1;                   
                      if($i != $p){
                        echo "<li class=\"page-item\">
                            <a href=\"index.php?controller=categories&action=read&p=$i\" class=\"page-link\">$i</a>
                        </li>";
                      }
                      else{
                        echo "<li class=\"page-item active\">
                            <a href=\"index.php?controller=categories&action=read&p=$i\" class=\"page-link\">$i</a>
                        </li>";
                      }
                    }
                    ?>
                  </ul>
              </div>
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