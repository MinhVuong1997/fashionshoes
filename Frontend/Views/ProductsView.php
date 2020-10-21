<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 p-0">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="#"><?php if (isset($_GET["action"])&&$_GET["action"]=="collection"): ?> Bộ sưu tập <?php else: ?>Danh mục <?php endif ?></a></li>
              <li class="breadcrumb-item active" aria-current="page">
                <?php echo $categoryName; ?>   
                </li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <img style="height: 300px; width: 100%" src="../Assets/Frontend/images/banner-category.jpg" alt="">
      </div>
      <div class="row p-lg-4 pt-4">
        <div class="col-lg-3 col-md-4 pt-2">
          <div class="left">
            <div class="filter">
              <h3><i class="fa fas fa-list"></i>&nbsp;&nbsp;Lọc</h3>
              <ul>
                <li class="brand">
                  <span>Thương hiệu</span>
                  <div class="check-brand">
                    <?php $brand = $this->modelGetBrand(); ?>
                    <?php foreach ($brand as $rows) : ?>
                    <label>
                        <input class="common_selector brand" type="checkbox" name="brand" value="<?php echo $rows->id ?>">
                        <span><?php echo $rows->name; ?></span>
                      </label>
                    <br>
                    <?php endforeach; ?>
                </li>
                <li class="price">
                  <span>Giá sản phẩm</span>
                  <div class="check-price">
                    <label>
                        <input class="common_selector price" type="checkbox" name="price" value="<500k">
                        <span>Dưới 500,000₫</span>
                      </label>
                    <br>
                    <label>
                        <input class="common_selector price" type="checkbox" name="price" value="500k-1tr">
                        <span>500,000₫ - 1,000,000₫</span>
                      </label>
                    <br>
                    <label>
                        <input class="common_selector price" type="checkbox" name="price" value="1tr-1tr5">
                        <span>1,000,000₫ - 1,500,000₫</span>
                      </label>
                    <br>
                    <label>
                        <input class="common_selector price" type="checkbox" name="price" value=">1tr5">
                        <span>Trên 1,500,000₫</span>
                      </label>
                  </div>
                </li>
                <li class="color">
                  <span>Màu sắc</span>
                  <div class="check-color">
                    <?php $color = $this->modelGetColor(); ?>
                    <?php foreach ($color as $rows) : ?>
                      <label style="background-color: <?php echo $rows->name; ?>">
                        <input class="common_selector color" type="checkbox" value="<?php echo $rows->id; ?>">
                        <span></span>
                      </label>
                    <?php endforeach; ?>
                  </div>
                </li>
                <li class="size">
                  <span>Kích thước</span>
                  <div class="check-size">
                    <?php $size = $this->modelGetSize(); ?>
                    <?php foreach ($size as $rows) : ?>
                      <label class="mr-1">
                        <input class="common_selector size" type="checkbox" value="<?php echo $rows->id; ?>">
                        <span><?php echo $rows->name; ?></span>
                      </label>
                    <?php endforeach; ?>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-9 col-md-8 pt-2">
          <div class="right">
            <div class="container-fluid p-0">
              <div class="row">
                <div class="col-sm-9">
                  <h2>
                    <?php echo $categoryName; ?>
                  </h2>
                </div>
                <div class="col-sm-3">
                  <select class="custom-select" id="sorting">
                    <option value="0">Sắp xếp</option>
                    <option value="nameASC">Tên: A-Z</option>
                    <option value="nameDESC">Tên: Z-A</option>
                    <option value="priceASC">Giá: Tăng dần</option>
                    <option value="priceDESC">Giá: Giảm dần</option>
                  </select>
                </div>
              </div>
              <div class="row filter_data">
                <?php foreach ($listRecord as $rows) : ?>
                <div class="col-sm-4 col-lg-3 col-6 p-3 product-item">
                  <div class="image">
                    <a href="product/detail/<?php echo $rows->id ?>"><img src="../Assets/Upload/Products/<?php echo $rows->photo; ?>" alt=""></a>
                    <button type="button" class="btn btn-sm add-to-cart" data-toggle="modal" data-target="#addtocart" data-id="<?php echo $rows->id ?>">
                      <i class="fas fa-shopping-basket"></i>&nbsp;&nbsp;Mua ngay
                    </button>
                    <?php if($rows->hot == 1): ?>
                    <div class="hot">
                      <img src="../Assets/Frontend/images/icon-hot.png" alt="">
                    </div>
                    <?php else: ?>
                    <?php endif ?>
                  </div>
                  <div class="name">
                    <h3><a href="product/detail/<?php echo $rows->id ?>"><?php echo $rows->name; ?></a></h3>
                  </div>
                  <?php if($rows->discount == 0) : ?>
              <?php else: ?>
              <div class="discount">
                <span>- <?php echo $rows->discount ?>%</span>
              </div>
            <?php endif; ?>
            <?php if($rows->discount == 0) : ?>
              <div class="price">
                <span><?php echo number_format($rows->price); ?>₫</span>
              </div>
            <?php else: ?>
              <div class="price-safe">
                <span><?php echo number_format($rows->price - ($rows->price * $rows->discount)/100); ?>₫</span>
                <del class="price"><?php echo number_format($rows->price); ?>₫</del>
              </div>
            <?php endif; ?>
            <div class="star text-center">
              <?php $star = $this->modelGetStar($rows->id) ?>
              <?php $totalrating = $this->modelGetTotalRating($rows->id) ?>
              <?php if ($star == 0 && $star <= 0.5): ?>
                <span>&#9734;&#9734;&#9734;&#9734;&#9734;</span> <small>(<?php echo $totalrating ?> đánh giá)</small>
              <?php elseif($star > 0.5 && $star <= 1.5): ?>
                <span>&#9733;&#9734;&#9734;&#9734;&#9734;</span> <small>(<?php echo $totalrating ?> đánh giá)</small>
              <?php elseif($star > 1.5 && $star <= 2.5): ?>
                <span>&#9733;&#9733;&#9734;&#9734;&#9734;</span> <small>(<?php echo $totalrating ?> đánh giá)</small>
              <?php elseif($star > 2.5 && $star <= 3.5): ?>
                <span>&#9733;&#9733;&#9733;&#9734;&#9734;</span> <small>(<?php echo $totalrating ?> đánh giá)</small>
              <?php elseif($star > 3.5 && $star <= 4.5): ?>
                <span>&#9733;&#9733;&#9733;&#9733;&#9734;</span> <small>(<?php echo $totalrating ?> đánh giá)</small>
              <?php elseif($star > 4.5 && $star <= 5): ?>
                <span>&#9733;&#9733;&#9733;&#9733;&#9733;</span> <small>(<?php echo $totalrating ?> đánh giá)</small>
              <?php endif ?>
            </div>
                </div>
                <?php endforeach; ?>
              </div>
              <div class="row p-3">
                <?php if($numPage == 0): ?>
                    <div class="col-12 text-center">Không có sản phẩm</div>
                <?php else: ?>
                  <ul class="pagination">
                      <?php include "Pagination.php" ?>
                  </ul>
                <?php endif ?>
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Quick View-->
<div class="modal fade" id="addtocart" tabindex="-1" role="dialog" aria-labelledby="addtocartTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body product_view">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i>&nbsp;&nbsp;Đóng</button>
      </div>
    </div>
  </div>
</div>
  <style type="text/css">
    #loading
    {
     text-align:center; 
     background: url('../Assets/Frontend/images/loader.gif') no-repeat center; 
     height: 150px;
    }
  </style>
  <script type="text/javascript">
    $(document).ready(function() {
    function filter_data(page,sort)
    {
        $('.filter_data').html('<div class="col-12 text-center" id="loading"></div>');
        var brand = get_filter('brand');
        var price = get_filter('price');    
        var color = get_filter('color');
        var size = get_filter('size');
        var action = '<?php echo $_GET["action"] ?>';     
        var category_id = '<?php echo isset($category_id) ? $category_id : 0 ?>';       
        var collection_id = '<?php echo isset($collection_id) ? $collection_id : 0 ?>';
        
        $.ajax({
            url:"Ajax/Filter_data.php",
            method:"POST",
            data:{brand:brand, price:price, color:color, size:size, p:page, action:action, category_id:category_id,collection_id:collection_id, sort:sort},
            success:function(data){
              setTimeout(function(){
                $('.filter_data').html(data);
                $('.page-link').click(function(event) {
                  var sort = $('#sorting').val();
                  var page = $(this).data('page');
                  filter_data(page,sort);
                })
              },700)
            }
        });
    }
  
    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        var sort = $('#sorting').val();
        filter_data(1, sort);
        $('.pagination').remove();
    });

    $('#sorting').change(function(){
        var sort = $(this).val();
        filter_data(1, sort);
        $('.pagination').remove();
    });

    $('.page-link').click(function(event) {
      event.preventDefault();
      var sort = $('#sorting').val();
      var page = $(this).data('page');
      filter_data(page,sort);
      $('.pagination').remove();
    });

    $('#addtocart').on('show.bs.modal', function(e) {
      var product_id = $(e.relatedTarget).data('id');
      $.ajax({
        url: 'Ajax/Quick_view.php',
        type: 'POST',
        data: {product_id:product_id},
        success:function(data){
          $('.product_view').html(data);
          $('#product_attr').submit( function(event) {
            event.preventDefault();
            var data = $('#product_attr').serialize();
            $.ajax({
              url: 'Ajax/Add_to_cart.php',
              type: 'POST',
              data: data,
              success:function(data){
                $('#addtocart').modal('hide');
                $(".count").html(data);
                $('.message').fadeIn().html('<div class="alert alert-success">Thêm vào giỏ thành công</div>').delay(2000).fadeOut(1000);
              }
            })
          });
        }
      })
    });
    });
  </script>