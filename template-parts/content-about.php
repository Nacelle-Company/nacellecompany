<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-content grid-container text-center">
	<?php
        if (is_single()) {
            the_title('<h1 class="entry-title">', '</h1>');
        } else {
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        }
    ?>
	</header>
	<div class="entry-content grid-container">
		<div class="grid-x align-center">
			<div class="cell medium-8">
				<?php the_content(); ?>
			</div>
		</div>
<!-- https://gist.github.com/morgyface/d8c1c4246843bf0f0c76959b68faa95f -->
		<?php if (have_rows('social_media')): ?>
			<div class="grid-x social align-center">
				<?php while (have_rows('social_media')) : the_row(); ?>
	            <?php $socialchannel = get_sub_field('social_channel');
                    $socialurl = get_sub_field('social_url');
                    echo '<a class="nav-link" rel="nofollow noopener noreferrer" href="' . $socialurl . '" target="_blank">';
                    echo '<i class="fab fa-' . $socialchannel . '" aria-hidden="true"></i>';
                    echo '<span class="sr-only hidden">' . ucfirst($socialchannel) . '</span>';
                    echo "</a>";
                    ?>
	            <?php endwhile; ?>
			</div>

        <?php endif; ?>

		<div class="grid-x grid-margin-y">
			<div class="cell">
				<div cell="grid-x">

			<div class="grid-x">
				<div class="cell">
					<h4>On Instagram: <a href="<?php the_field('ig_feed_link');?>" target="_blank"><?php the_field('ig_feed_title'); ?></a></h4>
				</div>
				<div class="cell">
					<?php if (the_field('instagram')) {
                        the_field('instagram');
                    } ?>
				</div>
			</div>
			<hr>
			<div class="grid-x">
				<div class="cell">
					<h4>On Twitter: <a href="<?php the_field('t_feed_link');?>" target="_blank"><?php the_field('t_feed_title'); ?></a></h4>
				</div>
				<div class="cell">
					<?php if (the_field('twitter')) {
                        the_field('twitter');
                    } ?>
				</div>
			</div>


			<div class="grid-x">
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
		</div>
		</div>
	</div>

		<?php // edit_post_link(__('(Edit)', 'nacelle'), '<span class="edit-link">', '</span>');?>
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
