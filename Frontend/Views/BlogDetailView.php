<div class="content-blog">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 p-0">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="home">Trang chủ</a></li>
							<li class="breadcrumb-item"><a href="blog">Blog</a></li>
							<li class="breadcrumb-item active" aria-current="page"><?php echo $record->name ?></li>
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
						<div class="blog-detail">
							<div class="image pt-lg-0 pt-3">
								<img src="../Assets/Upload/News/<?php echo $record->photo ?>" alt="" class="img-fluid w-100">
							</div>
							<div class="title pt-3"><h3><?php echo $record->name ?></h3></div>
							<div class="info">
								<span>Người viết: <?php echo $record->writer ?></span>
								<span>lúc <?php echo $record->created ?></span>
							</div>
							<div class="description pt-3">
								<?php echo $record->content ?>
							</div>	
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>