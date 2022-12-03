<?php require(__DIR__.'/layouts/header.php'); ?>		
<?php require(__DIR__.'/layouts/nav.php'); ?>

<div class="single_post">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="single_post_title"><?php echo $tinTuc[0]['tieuDe']; ?></div>
					<div class="single_post_text">
						<?php echo $tinTuc[0]['noiDung']; ?>
					</div>
				</div>
			</div>
		</div>
</div>

<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="blog_posts d-flex flex-row align-items-start justify-content-between">

						<!-- Blog post -->
						<div class="blog_post">
							<div class="blog_image" style="background-image:url(images/blog_4.jpg)"></div>
							<div class="blog_text">Etiam leo nibh, consectetur nec orci et, tempus tempus ex</div>
							<div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
						</div>

						<!-- Blog post -->
						<div class="blog_post">
							<div class="blog_image" style="background-image:url(images/blog_5.jpg)"></div>
							<div class="blog_text">Sed viverra pellentesque dictum. Aenean ligula justo, viverra in lacus porttitor</div>
							<div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
						</div>

						<!-- Blog post -->
						<div class="blog_post">
							<div class="blog_image" style="background-image:url(images/blog_6.jpg)"></div>
							<div class="blog_text">In nisl tortor, tempus nec ex vitae, bibendum rutrum mi. Integer tempus nisi</div>
							<div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
						</div>

					</div>
				</div>	
			</div>
		</div>
</div>

<?php require(__DIR__.'/layouts/footer.php'); ?>