<div class="slider">
      <div id="carousel" class="carousel slide" data-ride="carousel" data-interval="4000">
        <ol class="carousel-indicators">
          <?php $totalslider = $this->modelTotalSlider() ?>
          <?php for ($i=0; $i < $totalslider; $i++) : ?>
          <li data-target="#carousel" data-slide-to="<?php echo $i ?>"></li>
          <?php endfor ?>
        </ol>
        <div class="carousel-inner">
          <?php $slider = $this->modelGetSlider() ?>
          <?php foreach ($slider as $rows): ?>
          <div class="carousel-item">
            <a href="<?php echo $rows->url ?>"><img src="../Assets/Upload/Slider/<?php echo $rows->photo ?>" class="d-block w-100" alt="<?php echo $rows->name ?>" style="max-height: 550px;"></a>
          </div>
          <?php endforeach ?>
        </div>
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div> <!-- end slider -->
    <section class="support">
      <div class="container-fluid">
        <div class="row overflow-hidden">
          <div class="col-md-3 col-sm-6 col-6 text-center border-right p-0 wow animate__slideInLeft">
            <div class="support-inner">
              <div class="inner-icon">
                <img src="../Assets/Frontend/images/support-01.png" alt="Giao hàng miễn phí">
              </div>
              <div class="inner-content">
                <h3>Giao hàng miễn phí</h3>
                  <p>Cho đơn hàng trên 599k</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-6 text-center border-right p-0 wow animate__slideInDown">
            <div class="support-inner">
              <div class="inner-icon">
                <img src="../Assets/Frontend/images/support-02.png" alt="Miễn phí đổi trả">
              </div>
              <div class="inner-content">
                <h3>Miễn phí đổi trả</h3>
                  <p>Trong vòng 7 ngày</p>
              </div>
            </div>
          </div>  
          <div class="col-md-3 col-sm-6 col-6 text-center border-right border-top p-0 wow animate__slideInUp">
            <div class="support-inner">
              <div class="inner-icon">
                <img src="../Assets/Frontend/images/support-03.png" alt="Đặt hàng trực tuyến">
              </div>
              <div class="inner-content">
                <h3>Đặt hàng trực tuyến</h3>
                  <p>Hotline : 1900.636.099</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-6 text-center border-top p-0 wow animate__slideInRight">
            <div class="support-inner">
              <div class="inner-icon">
                <img src="../Assets/Frontend/images/support-04.png" alt="Hỗ trợ 24/7">
              </div>
              <div class="inner-content">
                <h3>Hỗ trợ 24/7</h3>
                  <p>Hỗ trợ online / offline 24/7</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> <!-- end support -->
<section class="product" id="product-new">
      <div class="title">
        <div class="container-fluid">
          <div class="row wow animate__zoomIn">
            <div class="col-md-12 text-center p-4">
              <h2>Sản phẩm mới</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="content">
        <div class="container-fluid pb-5">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-8 d-sm-block d-none product-banner p-3">
              <a href="javascript:void(0)"><img src="../Assets/Frontend/images/product-new.jpg" alt=""></a>
            </div>
            <?php $newproducts = $this->modelNewProduct(); ?>
            <?php foreach ($newproducts as $rows) : ?>
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 product-item p-3 wow animate__fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
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
        </div>
      </div>
    </section> <!-- end product-new -->
    <?php $featured = $this->modelFeaturedProduct() ?>
    <?php foreach ($featured as $rows) : ?>
    <section class="featured d-md-block d-none">
      <div class="container">
        <div class="row">
          <div class="col-md-5 featured-left">
            <div class="bg-shadow">
              <h2>NEW</h2>
            </div>
            <div class="featured-img">
              <img src="../Assets/Upload/Products/<?php echo $rows->photo ?>" alt="">
            </div>
          </div>
          <div class="col-md-7 text-center featured-right">
            <p>Fashion Shoes</p>
            <h3><a href="<?php echo $rows->url ?>"><?php echo $rows->name ?></a></h3>
            <div class="info">
              <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab" aria-controls="nav-info" aria-selected="true">Thông tin</a>
                  <a class="nav-item nav-link" id="nav-detail-tab" data-toggle="tab" href="#nav-detail" role="tab" aria-controls="nav-detail" aria-selected="false">Chi tiết</a>
                  <a class="nav-item nav-link" id="nav-size-tab" data-toggle="tab" href="#nav-size" role="tab" aria-controls="nav-size" aria-selected="false">Size</a>
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab"><?php echo $rows->description ?></div>
                <div class="tab-pane fade" id="nav-detail" role="tabpanel" aria-labelledby="nav-detail-tab"><?php echo $rows->content ?></div>
                <div class="tab-pane fade" id="nav-size" role="tabpanel" aria-labelledby="nav-size-tab"><?php echo $rows->size ?></div>
              </div>
              <a href="product/detail/<?php echo $rows->product_id ?>" class="btn btn-primary rounded-pill mt-4 btn-lg">Xem ngay</a>
            </div>
          </div>
        </div>
      </div>
    </section> <!-- end featured -->
    <?php endforeach; ?>
    <div class="collection">
      <div class="container-fluid">
        <div class="row">
          <?php $collection = $this->modelGetCollection() ?>
          <?php foreach ($collection as $rows) : ?>
          <div class="col-md-3 col-sm-6 col-6 p-0">
            <div class="collection-img">
              <img src="../Assets/Upload/Collection/<?php echo $rows->photo ?>" alt="<?php echo $rows->title ?>">
            </div>
            <div class="caption">
              <span><?php echo $rows->subtitle ?></span>
              <h3><?php echo $rows->title ?></h3>
              <a href="product/collection/<?php echo $rows->id ?>" class="btn btn-light">Mua ngay</a>
            </div>
          </div>
          <?php endforeach ?>
        </div>
      </div>
    </div> <!-- end collection -->
    <section class="product" id="product-hot">
      <div class="title">
        <div class="container-fluid">
          <div class="row wow animate__zoomIn">
            <div class="col-md-12 text-center p-4">
              <h2>Sản phẩm bán chạy</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="content">
        <div class="container-fluid pb-5">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-8 d-sm-block d-none product-banner p-3">
              <a href="javascript:void(0)"><img src="../Assets/Frontend/images/product-hot.jpg" alt=""></a>
            </div>
            <?php $hotproducts = $this->modelHotProduct(); ?>
            <?php foreach ($hotproducts as $rows) : ?>
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 product-item p-3 wow animate__fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
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
        </div>
      </div>
    </section> <!-- end product-hot -->
    <?php $about = $this->modelGetAboutUs() ?>
    <?php foreach ($about as $rows) : ?>
    <section class="about-us"> 
      <div class="container-fluid">
        <div class="row d-flex align-items-center">
          <div class="col-md-6 p-0 overflow-hidden">
            <div class="content wow animate__bounceInUp" data-wow-duration="2s" data-wow-delay="0.2s">
              <p><?php echo $rows->subtitle ?></p>
              <h2><?php echo $rows->title ?></h2>
              <p><?php echo $rows->description ?></p>
            </div>
          </div>
          <div class="col-md-6 p-0 wow animate__zoomIn" data-wow-duration="2s" data-wow-delay="0.2s">
              <img src="../Assets/Upload/Images/<?php echo $rows->photo ?>" alt="<?php echo $rows->title ?>">
          </div>
        </div>
      </div>
    </section> <!-- end about-us -->
    <?php endforeach ?>
    <section class="blog pb-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 text-center p-4">
            <h2>Bài viết mới nhất</h2>
          </div>
        </div>
        <div class="row">
          <div class="owl-carousel">
            <?php $blog = $this->modelGetBlog() ?>
            <?php foreach ($blog as $rows): ?>
            <div class="blog-item m-2 p-3">
              <div class="image">
                <a href="blog/detail/<?php echo $rows->id ?>"><img src="../Assets/Upload/News/<?php echo $rows->photo ?>" style="height: 250px;"></a>
              </div>
              <div class="title">
                <a href="blog/detail/<?php echo $rows->id ?>"><?php echo $rows->name ?></a>
              </div>
              <div class="description">
                <?php echo $rows->description ?> 
              </div>
            </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>
    </section>
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
<script type="text/javascript">
  $(document).ready(function() {
    $('.carousel-indicators li:first-child').addClass('active');
    $('.carousel-item:first-child').addClass('active');
    $(".owl-carousel").owlCarousel({
            loop:true,
            nav:true,
            dots:false,
            autoplay:true,
            autoplayTimeout:4000,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
          })

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