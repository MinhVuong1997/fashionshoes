<div class="content-detail">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 p-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $record->name; ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row pb-4">
                <div class="col-md-6">
                    <div class="product-gallery">
                        <div class="gallery">
                            <ul>
                                <?php $images = $this->modelGetImages($record->id); ?>
                                <li><img src="../Assets/Upload/Products/<?php echo $record->photo; ?>"></li>
                                <?php foreach ($images as $rows) : ?>
                                <li><img src="../Assets/Upload/Products/<?php echo $rows->photo; ?>"></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="gallery-img">
                            <img src="../Assets/Upload/Products/<?php echo $record->photo; ?>" alt="<?php echo $record->name; ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 p-md-0 p-3">
                    <div class="product-title pb-2">
                        <h2><?php echo $record->name; ?></h2>
                    </div>
                    <div class="star">
                      <?php $star = $this->modelGetStar($record->id) ?>
                      <?php $totalrating = $this->modelGetTotalRating($record->id) ?>
                      <?php if ($star == 0 && $star <= 0.5): ?>
                        <span>&#9734;&#9734;&#9734;&#9734;&#9734;</span> (<?php echo $totalrating ?> đánh giá)
                      <?php elseif($star > 0.5 && $star <= 1.5): ?>
                        <span>&#9733;&#9734;&#9734;&#9734;&#9734;</span> (<?php echo $totalrating ?> đánh giá)
                      <?php elseif($star > 1.5 && $star <= 2.5): ?>
                        <span>&#9733;&#9733;&#9734;&#9734;&#9734;</span> (<?php echo $totalrating ?> đánh giá)
                      <?php elseif($star > 2.5 && $star <= 3.5): ?>
                        <span>&#9733;&#9733;&#9733;&#9734;&#9734;</span> (<?php echo $totalrating ?> đánh giá)
                      <?php elseif($star > 3.5 && $star <= 4.5): ?>
                        <span>&#9733;&#9733;&#9733;&#9733;&#9734;</span> (<?php echo $totalrating ?> đánh giá)
                      <?php elseif($star > 4.5 && $star <= 5): ?>
                        <span>&#9733;&#9733;&#9733;&#9733;&#9733;</span> (<?php echo $totalrating ?> đánh giá)
                      <?php endif ?>
                    </div>
                    <div class="product-content">
                        <p><?php echo $record->description; ?></p>
                    </div>
                    <?php if($record->discount == 0) : ?>
                        <div class="product-price border-bottom pb-2 pt-2">
                            <span style="color: red; padding-right: 10px"><?php echo number_format($record->price) ?>₫</span>
                        </div>
                    <?php else: ?>
                        <div class="product-price border-bottom pb-2 pt-2">
                            <span style="color: red; padding-right: 10px"><?php echo number_format($record->price - ($record->price * $record->discount)/100) ?>₫</span>
                            <del><?php echo number_format($record->price); ?>₫</del>
                        </div>
                    <?php endif; ?>
                    <?php if($record->status==1): ?>
                    <form action="index.php?controller=cart&action=add&id=<?php echo $record->id; ?>" method="post">
                    <div class="product-color border-bottom pt-2">
                        <h5>Màu sắc</h5>
                        <div class="check-color">
                        <?php $color = $this->modelGetProductColor($record->id); ?>
                        <?php foreach ($color as $rows) : ?>
                            <label style="background-color: <?php echo $rows->name; ?>">
                                <input type="radio" name="color" value="<?php echo $rows->name; ?>" required>
                                <span></span>
                            </label>
                        <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="product-size border-bottom pt-2">
                        <h5>Size</h5>
                        <?php $size = $this->modelGetProductSize($record->id); ?>
                        <?php foreach ($size as $rows) : ?>
                        <label>
                            <input type="radio" name="size" value="<?php echo $rows->name; ?>" required>
                            <span><?php echo $rows->name; ?></span>
                        </label>
                        <?php endforeach; ?>
                    </div>
                    <div class="product-quanlity pt-3">
                        <input type="button" value="-" class="qlt-btn minusbtn">
                        <input type="text" id="quanlity" name="qlt" value="1" min="1">
                        <input type="button" value="+" class="qlt-btn plusbtn">
                        <div style="clear: both;"></div>
                    </div>
                    <div class="btn-addcart mt-3 w-50">
                        <input type="submit" class="btn w-100" value="Thêm vào giỏ hàng">
                    </div>
                    </form>
                    <?php else: ?>
                      <h5 class="mt-3 text-danger">Tạm hết hàng</h5>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row pb-4">
                <div class="col-md-12 pt-2 pb-2">
                    <nav>
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-description-tab" data-toggle="tab" href="#nav-description" role="tab" aria-controls="nav-description" aria-selected="true">Mô tả</a>
                        <a class="nav-item nav-link" id="nav-rate-tab" data-toggle="tab" href="#nav-rate" role="tab" aria-controls="nav-rate" aria-selected="false">Đánh giá</a>
                        <a class="nav-item nav-link" id="nav-comment-tab" data-toggle="tab" href="#nav-comment" role="tab" aria-controls="nav-comment" aria-selected="false">Bình luận</a>
                      </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab">
                        <div class="description p-4">
                        <h4 class="text-center pb-2 text-uppercase">Chi tiết sản phẩm</h4>
                         <?php echo $record->content; ?>
                    </div>
                      </div>
                      <div class="tab-pane fade" id="nav-rate" role="tabpanel" aria-labelledby="nav-rate-tab">
                          <div class="container-fluid">
                                <div class="rating_review">
                                    
                                </div>
                              <div class="row">
                                  <div class="col-12">
                                      <h5>Đánh giá và nhận xét</h5>
                                  </div>
                                  <div class="col-12">
                                    <select id="rating">
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                    </select>
                                  </div>                               
                                  <div class="col-12 pt-3 pb-3">
                                        <input type="hidden" id="customerId" name="customerId" value="<?php echo isset($_SESSION['customerId']) ? $_SESSION['customerId']:0 ?>">
                                        <input type="hidden" id="product_id" name="product_id" value="<?php echo $record->id; ?>">
                                        <div class="form-group">
                                          <label>Tiêu đề</label>
                                          <input type="text" id="title_comment" class="form-control" name="">
                                        </div>
                                        <div class="form-group">
                                          <label>Nội dung</label>
                                          <textarea class="form-control" rows="5" placeholder="Viết nhận xét ở đây..." name="comment" id="comment"></textarea>
                                        </div>
                                        <a class="btn btn-success" id="submit_rating" href="javascript:void(0)">Gửi đánh giá</a>
                                  </div>
                              </div>  
                          </div>
                      </div>
                      <div class="tab-pane fade" id="nav-comment" role="tabpanel" aria-labelledby="nav-comment-tab">
                          <div class="fb-comments" data-href="http://localhost/project01/Frontend/home" data-numposts="5" data-width="100%"></div>
                      </div>
                    </div>
                </div>
            </div>
            <?php $total =  $this->modelTotalProductsRelated($record->id) ?>
            <?php if($total > 0): ?>
            <div class="row pb-3">
                <div class="col-md-12 text-center text-uppercase pb-sm-2 pb-4">
                    <h2>Sản phẩm liên quan</h2>
                </div>
                <div class="owl-carousel">
                <?php $productRelated = $this->modelGetProductsRelated($record->id); ?>
                <?php foreach ($productRelated as $rows) : ?>
                <div class="p-3 product-item">
                  <div class="image">
                    <a href="product/detail/<?php echo $rows->id ?>"><img src="../Assets/Upload/Products/<?php echo $rows->photo ?>" alt=""></a>
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
          <?php endif ?>
        </div>
    </div>
    <script type="text/javascript" src="../Assets/Frontend/js/detail.js"></script>
    <style type="text/css">
      #load_more:hover{
        text-decoration: none;
        color: red;
      }
      #loading_more{
        text-align:center; 
        background: url('../Assets/Frontend/images/loading2.gif') no-repeat center; 
        height: 10px;
      }
     </style>
    <script type="text/javascript">
        $(document).ready(function(){
          $('#title_comment').val('Không thích');
          $('#rating').change(function(event) {
            var star_rating = $(this).val();
            if(star_rating == 1){
              $('#title_comment').val('Không thích');
            }
            if(star_rating == 2){
              $('#title_comment').val('Tạm được');
            }
            if(star_rating == 3){
              $('#title_comment').val('Bình thường');
            }
            if(star_rating == 4){
              $('#title_comment').val('Rất tốt');
            }
            if(star_rating == 5){
              $('#title_comment').val('Tuyệt vời');
            }
          });
          

          $(".owl-carousel").owlCarousel({
            loop:true,
            nav:true,
            dots:false,
            autoplay:true,
            autoplayTimeout:4000,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:2
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
          });

          $('#rating').barrating({
            theme: 'css-stars'
          });

            var product_id = $('#product_id').val();  
            var start = 0;
            var limit = 5;

            function rating(){
            var action = 'load_rating';      
            $.ajax({
                url: 'Ajax/Rating.php',
                method: 'POST',
                data: {action:action,product_id:product_id,start:start,limit:limit},
                success:function(data){
                    $('.rating_review').html(data);
                }
            })
            }

            //Load rating
            rating();

            //Load more
            $('body').on('click', '#load_more', function(event) {
              event.preventDefault();
              var action ='load_more';
              start = start + limit;
              $.ajax({
                  url: 'Ajax/Rating.php',
                  method: 'POST',
                  data: {action:action,product_id:product_id,start:start,limit:limit},
                  success:function(data){
                    $('.loadmore').html('<div id="loading_more"></div>');
                    setTimeout(function(){
                      $('.loadmore').remove();
                      $('#comment_view').append(data);
                    }, 1000)
                  }
              })
            });
            //Rating
            <?php if(isset($_SESSION["customerId"])): ?>
            $('#submit_rating').on('click', function(event) {
                event.preventDefault();
                var action = 'rating';
                var customerId = $('#customerId').val();
                var title = $('#title_comment').val();
                var comment = $('#comment').val();
                var star = $('#rating').val();
                $.ajax({
                url: 'Ajax/Rating.php',
                method: 'POST',
                data: {action:action, product_id:product_id, customerId:customerId,title:title, comment:comment, star:star},
                success:function(data){
                    alert('Cảm ơn bạn đã đánh giá sản phẩm của chúng tôi');
                    $('#comment').val('');
                    rating();
                }
                })          
            });
            <?php else: ?>
              $('#submit_rating').on('click',function(event) {
                  if(confirm('Vui lòng đăng nhập tài khoản!!!')){document.location='login'};
              });
            <?php endif ?>         
        });
    </script> 