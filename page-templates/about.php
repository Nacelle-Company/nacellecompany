<?php
/*
Template Name: About
*/
get_header(); ?>
<?php get_template_part('template-parts/featured-image'); ?>
<main class="main-grid">
<?php while (have_posts()) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('grid-container'); ?>>
			<header class="text-center">
				<?php
                if (is_single()) {
                    the_title('<h1 class="entry-title">', '</h1>');
                } else {
                    the_title('<h2 class="entry-title">', '</h2>');
                }
                ?>
			</header>
			<div class="entry-content">
				<div class="grid-x align-center">
					<div class="cell medium-8">
						<?php the_content(); ?>
					</div>
				</div>
				<?php // https://gist.github.com/morgyface/d8c1c4246843bf0f0c76959b68faa95f ?>
				<?php if (have_rows('social_media', 'option')): ?>
					<div class="grid-x social align-center">
						<?php while (have_rows('social_media', 'option')) : the_row(); ?>
							<?php $socialchannel = get_sub_field('social_channel', 'option');
                            $socialurl = get_sub_field('social_url', 'option');
                            echo '<a class="nav-link" rel="nofollow noopener noreferrer" href="' . $socialurl . '" target="_blank">';
                            echo '<i class="fab fa-' . $socialchannel . '" aria-hidden="true"></i>';
                            echo '<span class="sr-only hidden">' . ucfirst($socialchannel) . '</span>';
                            echo "</a>";
                            ?>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
				<header class="grid-x grid-padding-x">
					<div class="cell">
						<?php echo get_post_meta(get_the_ID(), 'full_width_content', true); ?>
					</div>
				</header>
				<div class="grid-x grid-padding-x">
					<div class="cell medium-6 extra-content">
						<?php if (get_post_meta(get_the_ID(), 'left_content', true)) { echo get_post_meta(get_the_ID(), 'left_content', true);; } ?>
					</div>
					<div class="cell medium-6 extra-content">
						<?php if (get_post_meta(get_the_ID(), 'right_content', true)) { echo get_post_meta(get_the_ID(), 'right_content', true);; } ?>
						</div>
					</div>
				</div>
				<?php edit_post_link(__('(Edit)', 'nacelle'), '<span class="edit-link">', '</span>');?>
			</div>
			<footer>
				<?php
                wp_link_pages(
                    array(
                        'before' => '<nav id="page-nav"><p>' . __('Pages:', 'nacelle'),
                        'after'  => '</p></nav>',
                    )
                );
                ?>
				<?php $tag = get_the_tags(); if ($tag) {
                    ?><p><?php the_tags(); ?></p><?php
                } ?>
			</footer>
		</article>
		<?php comments_template(); ?>
	<?php endwhile; ?>
	<script src="https://snapwidget.com/js/snapwidget.js"></script>
</main>
<?php get_footer();
