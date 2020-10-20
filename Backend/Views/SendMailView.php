<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Gửi tin</li>
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
                <h3 class="card-title">Gửi tin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="form-mail">
                <div class="card-body">
                  <div class="message"></div>
                  <div class="form-group">  
                     <label>Gửi tới:</label>&nbsp;&nbsp;
                     <select class="selectpicker email" name="emails[]" multiple data-actions-box="true" data-live-search="true" data-deselect-all-text="Bỏ chọn tất cả" data-select-all-text="Chọn tất cả" data-none-selected-text="Chọn email" required>
                      <?php foreach ($result as $rows) : ?> 
                       <option value="<?php echo $rows->email ?>"><?php echo $rows->email ?></option>
                     <?php endforeach ?>
                     </select>
                  </div>  
                   <div class="form-group">
                      <label>Tiêu đề</label>
                      <input type="text" id="title" name="title" class="form-control" placeholder="Nhập tiêu đề" required>
                  </div>
                  <div class="form-group">
                    <label>Nội dung</label>
                    <textarea rows="5" class="form-control" id="content" placeholder="Nhập nội dung" name="content" required></textarea> 
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="Gửi">
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
        $('select').selectpicker();
        $('#form-mail').submit(function(event) {
          event.preventDefault();
          var email = [];
          $('.email').each(function(){
            email.push($(this).val());
          })         
          var title = $('#title').val();
          var content = $('#content').val();
          $('.message').fadeIn().html('<div class="pb-3 text-primary">Đang gửi...</div>');
          $.ajax({
            url: 'SendMail.php',
            type: 'POST',
            data: {email:email, title:title, content:content},
          })
          .done(function(data) {
              $('.message').fadeIn().html(data).delay(2000).fadeOut(1000);       
          })
          
        });
      });
    </script>