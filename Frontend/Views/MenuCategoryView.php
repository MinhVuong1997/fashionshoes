<ul class="sub-menu">
  <?php 
    $categories = $this->listCategory();
  ?>
  <?php foreach ($categories as $rows) : ?>
  <li><a style="font-weight: 500;" href="product/categories/<?php echo $rows->id; ?>"><?php echo $rows->name ?></a></li>
    <?php 
      $categoriesSub = $this->listCategorySub($rows->id);
    ?>
    <?php foreach ($categoriesSub as $rowsSub) : ?>
      <li style="padding-left:15px;"><a href="product/categories/<?php echo $rowsSub->id; ?>"><?php echo $rowsSub->name ?></a></li>
    <?php endforeach; ?>
  <?php endforeach; ?>
</ul>