<?php 
	include "../../Application/Connection.php";
	$product_id = $_POST["product_id"];
	$conn = Connection::getInstance();
 	$query = $conn->query("select * from products where id = $product_id");
 	$record = $query->fetch();

 	$query = $conn->query("select id,name from parameters where id in (select parameter_id from product_parameters where product_id = $product_id) and parent_id in (select id from parameters where name='Màu sắc') ");
 	$colors = $query->fetchAll();

 	$query = $conn->query("select id,name from parameters where id in (select parameter_id from product_parameters where product_id = $product_id) and parent_id in (select id from parameters where name='Size') ");
 	$sizes = $query->fetchAll();

 	$query = $conn->query("select photo from product_images where product_id=$product_id");
	$images = $query->fetchAll();
?>
	<div class="container-fluid content-detail">
		<div class="row pb-4">
                <div class="col-md-6 pl-0">
                    <div class="product-gallery">
                        <div class="gallery">
                            <ul>
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
            		<form id="product_attr">
            			<input type="hidden" name="product_id" value="<?php echo $product_id ?>">
                    <div class="product-color border-bottom pt-2">
                        <h5>Màu sắc</h5>
                        <div class="check-color">
                    <?php foreach ($colors as $color): ?>             
                    	<label style="background-color: <?php echo $color->name; ?>">
                                <input type="radio" name="color" value="<?php echo $color->name; ?>" required>
                                <span></span>
                            </label>
                   	<?php endforeach ?>
                    	</div>
                    </div>
                    <div class="product-size border-bottom pt-2">
                        <h5>Size</h5>
                    <?php foreach ($sizes as $size): ?>
                    	<label>
                            <input type="radio" name="size" value="<?php echo $size->name; ?>" required>
                            <span><?php echo $size->name; ?></span>
                        </label>
                    <?php endforeach ?>
                    	</div>
                    <div class="product-quanlity pt-3">
                        <input type="button" value="-" class="qlt-btn minusbtn">
                        <input type="text" id="quanlity" name="qlt" value="1" min="1">
                        <input type="button" value="+" class="qlt-btn plusbtn">
                        <div style="clear: both;"></div>
                    </div>
                    <div class="mt-3 w-50">
                        <input type="submit" class="btn btn-primary w-100 font-weight-bold" value="Thêm vào giỏ hàng">
                    </div>
                    </form>
                    <?php else: ?>
                      <h5 class="mt-3 text-danger">Tạm hết hàng</h5>
                    <?php endif ?>
                     	</div>
            </div>
       </div>
       <script type="text/javascript" src="../Assets/Frontend/js/detail.js"></script>