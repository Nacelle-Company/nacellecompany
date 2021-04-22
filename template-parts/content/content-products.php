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
    <?php get_template_part('template-parts/logo-bg-header'); ?>
    <div class="entry-content">
        <?php get_template_part('template-parts/content/content-products-catalog', 'page'); ?>
    </div>
</article>