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
    <header class="invisible">
        <?php
        if (is_single()) {
            the_title('<h1 class="entry-title">', '</h1>');
        } else {
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        }
        ?>
        <?php Nacelle_entry_meta(); ?>
    </header>
    <div class="entry-content">
        <div class="grid-x">
            <?php get_template_part('template-parts/blocks/full-hero-video'); ?>
            <?php get_template_part('template-parts/content/content-products-catalog', 'page'); ?>
        </div>
        <?php the_content(); ?>
        <?php edit_post_link(__('(Edit)', 'nacelle'), '<span class="edit-link">', '</span>'); ?>
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
        <?php $tag = get_the_tags();
        if ($tag) {
        ?><p><?php the_tags(); ?></p><?php
                                        } ?>
    </footer>
</article>