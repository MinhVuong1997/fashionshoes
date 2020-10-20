<div class="content-blog">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 p-0">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
							<li class="breadcrumb-item active" aria-current="page">Blog</li>
						</ol>
					</nav>
				</div>
			</div>
			<div class="row pb-3">
				<div class="col-lg-3">
					<div class="left">
						<div class="new-latest">
							<h2>Bài viết nổi bật</h2>
							<ul>
								<?php $hotBlog = $this->modelGetHotBlog(); ?>
								<?php foreach ($hotBlog as $rows): ?>
								<li>
									<a href="#"><img src="../Assets/Upload/News/<?php echo $rows->photo ?>" alt=""></a>
									<div class="post-content">
										<h3><a href="blog/detail/<?php echo $rows->id; ?>"><?php echo $rows->name ?></a></h3>
										<span class="author"><?php echo $rows->writer ?></span>
										<span class="date"><?php echo $rows->created ?></span>
									</div>
								</li>
								<?php endforeach ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-9">
					<div class="right">
						<h2 class="pb-3 pt-lg-0 pt-3">Bài viết</h2>
						<?php foreach ($listRecord as $rows): ?>
						<div class="blog-post row pb-3">
							<div class="col-md-4">
								<a href="#"><img src="../Assets/Upload/News/<?php echo $rows->photo ?>" alt="" class="img-fluid w-100"></a>
							</div>
							<div class="col-md-8">
								<h3 class="title"><a href="blog/detail/<?php echo $rows->id ?>"><?php echo $rows->name ?></a></h3>
								<div class="info">
									<span class="author">Người viết: <?php echo $rows->writer ?></span>
									<span class="date"><?php echo $rows->created ?></span>
								</div>
								<div class="description">
									<?php echo $rows->description ?>
								</div>
							</div>
						</div>
						<?php endforeach ?>
						<nav>
						  <ul class="pagination">
						    <?php 
			                    for ($i=1; $i <= $numPage ; $i++){
			                      $p = isset($_GET["p"]) ? $_GET["p"] : 1;                    
			                      if($i != $p){
			                        echo "<li class=\"page-item\">
			                            <a href=\"blog/page/$i\" class=\"page-link\">$i</a>
			                        </li>";
			                      }
			                      else{
			                        echo "<li class=\"page-item active\">
			                            <a href=\"blog/page/$i\" class=\"page-link\">$i</a>
			                        </li>";
			                      }
			                    }
			                    ?>
						  </ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>