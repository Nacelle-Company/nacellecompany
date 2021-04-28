<?php
/*
Template Name: Instagram
*/
get_header(); ?>
<main class="main-container">
	<div class="main-grid">
		<div class="main-content-full-width">
			<?php while (have_posts()) : the_post(); ?>
				<style>
					.instagram-link-container {
						position: relative;
					}
					.media-image-wrapper,
					.thumbnail-wrapper {
						position: relative;
					}
					.media-image-wrapper {
						margin: 0 0 5px 5px;
					}
					.thumbnail-image {
						position: absolute;
						width: 100%;
						height: 100%;
					}
					.thumbnail-image .object-fit {
						max-height: 100%;
						width: 100%;
						height: 100%;
						object-fit: cover;
						font-family: "object-fit: cover;";
					}
					.thumbnail-wrapper .thumbnail {
						display: block;
						line-height: 0;
						position: absolute;
						top: 0;
						width: 100%;
						margin-bottom: 0;
						height: 0;
						padding-bottom: 88% !important;
						border-radius: 0;
						border: none;
						cursor: pointer;
					}
					.thumbnail-wrapper .thumbnail {
						box-shadow: none;
					}
					.thumbnail-wrapper .thumbnail:hover {
						box-shadow: none;
					}
					.main-grid .main-content-full-width {
						width: 100%;
						margin-right: 5px;
						margin-left: 5px;
					}
				</style>
				<div class="grid-x text-center">
					<div class="cell">
						<h3>
							<?php echo get_post_meta(get_the_ID(), 'top_title', true);  ?>
						</h3>
					</div>
				</div>
				<?php if (have_rows('repeater')) : ?>
					<div class="instagram-link-container">
						<div class="instagram-link-cover">
							<div class="grid-x">
								<?php while (have_rows('repeater')) : the_row();
									// vars
									$IGpostTrue = get_sub_field('instagram_post_or_image');
									$IGpostLink = get_sub_field('instagram_post_link');
									$image = get_sub_field('image');
									$link = get_sub_field('link');
								?>
									<div class="cell small-4">
										<div class="media-image-wrapper">
											<div class="thumbnail-wrapper">
												<?php if ($IGpostTrue) : ?>
													<div style="max-width: 845px;">
														<div style="left: 0; width: 100%; height: 0; position: relative; padding-bottom: 100%;">
															<iframe src="//cdn.iframe.ly/api/iframe?url=<?php echo $IGpostLink; ?>&amp;key=5499a91ca3097ad0da51546ce4fba7ff&amp;media=1" style="border: 0; top: 0; left: 0; width: 100%; height: 100%; position: absolute;" allowfullscreen></iframe>
														</div>
													</div>
												<?php else : ?>
													<div style="max-width: 845px;">
														<div style="left: 0; width: 100%; height: 0; position: relative; padding-bottom: 86.9318%;overflow: hidden;">
															<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
														</div>
													</div>
												<?php endif; ?>
												<?php if (!empty($link)) : ?>
													<a class="thumbnail" href="<?php echo $link; ?>" target="_blank"></a>
												<?php endif; ?>
											</div>
										</div>
									</div>
								<?php endwhile; ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<?php //comments_template(); 
				?>
			<?php endwhile; ?>
		</div>
	</div>
</main>
<?php get_footer();
