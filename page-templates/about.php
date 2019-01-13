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
		<!-- https://gist.github.com/morgyface/d8c1c4246843bf0f0c76959b68faa95f -->
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

				<div class="grid-x align-center">

				<div class="cell">
					<h4>On Instagram: <a href="<?php the_field('ig_feed_link');?>" target="_blank"><?php the_field('ig_feed_title'); ?></a></h4>
				</div>
				<div class="cell mb-3">
					<?php if (the_field('instagram')) {
                                the_field('instagram');
                            } ?>
				</div>

				<div class="cell">
					<h4>On Twitter: <a href="<?php the_field('t_feed_link');?>" target="_blank"><?php the_field('t_feed_title'); ?></a></h4>
				</div>
				<div class="cell mb-3">
					<?php if (the_field('twitter')) {
                                the_field('twitter');
                            } ?>
				</div>


				<div class="cell">
					<div class="embed-container">
					<?php

                    // check if the repeater field has rows of data
                    if (have_rows('embed_content')):

                        // loop through the rows of data
                        while (have_rows('embed_content')) : the_row();

                            // display a sub field value
                            the_sub_field('embed_content_subfield');

                        endwhile;

                    else :

                        // no rows found

                    endif;

                    ?>
					</div>
				</div>
			</div>

				<?php // edit_post_link(__('(Edit)', 'comedy-dynamics'), '<span class="edit-link">', '</span>');?>
			</div>
			<footer>
				<?php
                    wp_link_pages(
                        array(
                            'before' => '<nav id="page-nav"><p>' . __('Pages:', 'comedy-dynamics'),
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
</main>

<?php get_footer();
