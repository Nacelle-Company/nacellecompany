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
	<header class="grid-x">

		<div class="cell medium-11">
			<?php
                if (is_single()) {
                    the_title('<h1 class="entry-title">', '</h1>');
                } else {
                    the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                }
            ?>
		</div>

		<div class="cell medium-1 success">
			<p><?php the_time('m.j.y'); ?></p>
		</div>

	</header>
	<div class="entry-content">
		<?php //vars
        $synopsis = get_field('synopsis');
        ?>
		<?php if (!empty(get_the_content())) : ?>

			<?php echo wp_trim_words(get_the_content(), 40, '...');?>

		<?php elseif ($synopsis): ?>

			<?php the_field('synopsis'); ?>

		<?php endif; ?>

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
