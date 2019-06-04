<?php
/*
Template Name: News
*/

get_header(); ?>
<?php
$img_size_lg = 'fp-large';
$img_size_md = 'fp-medium';
$img_size_sm = 'fp-small';

$hero_image = get_field('news_header_image', 'option');

/* Get custom sizes of our image sub_field */
$hero_lg = $hero_image['sizes'][ $img_size_lg ];
$hero_md = $hero_image['sizes'][ $img_size_md ];
$hero_sm = $hero_image['sizes'][ $img_size_sm ];

if (!empty('news_header_image')):
    ?>

	<header class="featured-hero" role="banner" data-interchange="[<?php echo $hero_sm; ?>, small], [<?php echo $hero_md; ?>, medium], [<?php echo $hero_lg; ?>, large]">
        <div class="grid-x">
		    <div class="cell">
		    	<h1 class="text-center">News</h1>
		    </div>
		</div>
	</header>
<?php else:?>

<?php endif;?>

<?php //get_template_part('template-parts/featured-image-lg-title');?>

<div class="main-container">

	<div class="main-grid">
		<main class="main-content">

      <!-- https://developer.wordpress.org/reference/functions/query_posts/ -->
		<?php $posts = query_posts($query_string . "&posts_per_page=60&order=DESC");
        if (have_posts()) : ?>

			<!-- Start the Loop  -->
			<?php while (have_posts()) : the_post(); ?>

				<?php $link = get_field('link_to_article'); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('cell'); ?>>

            <div class="grid-x grid-padding-y feed-container">

              <!-- If a featured image is set, insert into layout and use Interchange
              to select the optimal image size per named media query. -->
							<?php if (has_post_thumbnail($post->ID)) :?>

              <!-- image -->
              <div class="cell medium-4">

								<?php if ($link): ?>
								<a href="<?php echo $link; ?>" target="_blank">
									<img class="slideInFromBottom" data-interchange="[<?php the_post_thumbnail_url('fp-small'); ?>, small], [<?php the_post_thumbnail_url('fp-medium'); ?>, medium], [<?php the_post_thumbnail_url('fp-large'); ?>, large], [<?php the_post_thumbnail_url('fp-xlarge'); ?>, xlarge]">
								<?php echo '</a>'; ?>
								<?php endif; ?>

							</div>

							<div class="cell medium-8 archive-title">

                <!-- title -->
                <div class="grid-x">
									<?php
                    if (is_single()) {
                        the_title('<h4 class="entry-title">', '</h4>');
                    } else {
                        the_title('<h4 class="entry-title"><a href="' . esc_url($link) . '" target="_blank">', '</a></h4>');
                    }
                    echo '</a>';
                  ?>
								</div>

								<footer class="grid-x small-up-2">

                  <!-- date -->
                  <div class="cell date">
										<p><?php the_time('m.j.y'); ?></p>
									</div>

                  <!-- microphone -->
                  <div class="cell text-right mic">
                    <img src="<?php bloginfo('template_directory'); ?>/dist/assets/images/nacelle-mic.png" />
                  </div>

								</footer>

							</div>


						<?php elseif (empty(has_post_thumbnail($post->ID))) : ?>

<!--  -->
<!--  -->
<!--  -->
<!-- without image -->
<!--  -->
<!--  -->
<!--  -->

						<div class="cell medium-12 archive-title">

              <!-- title -->
              <div class="grid-x">
								<?php
                  if (is_single()) {
                      the_title('<h4 class="entry-title">', '</h4>');
                  } else {
                      the_title('<h4 class="entry-title"><a href="' . esc_url($link) . '" target="_blank">', '</a></h4>');
                  }
                  echo '</a>';
                ?>
							</div>

              <!-- meta info -->
              <footer class="grid-x small-up-2">

                <!-- date -->
                <div class="cell date">
                  <p><?php the_time('m.j.y'); ?></p>
                </div>

                <!-- microphone -->
                <div class="cell text-right mic">
                  <img src="<?php bloginfo('template_directory'); ?>/dist/assets/images/nacelle-mic.png" />
                </div>

              </footer>
						</div>
						<?php endif;?>

					</div>
				</article>

			<?php endwhile; ?>

			<?php else : ?>
				<?php get_template_part('template-parts/content', 'none'); ?>

			<?php endif; // End have_posts() check.?>

		</main>
		<?php wp_reset_query(); ?>
		<?php get_sidebar(); ?>

	</div>
</div>

<?php get_footer();
