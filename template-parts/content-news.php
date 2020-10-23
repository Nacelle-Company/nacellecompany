<?php

/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */
$link = get_field('link_to_article');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
        <div class="media-object stack-for-small">

            <div class="media-object-section">

                <?php if (has_post_thumbnail()) : ?>

                    <?php the_post_thumbnail('medium', array('align' => 'left')); ?>

                <?php endif; ?>
                <h1>
                    <?php the_field('title'); ?>
                </h1>
            </div>
            <div class="media-object-section">
                <?php
                if (is_single()) {
                    the_title('<h1 class="sm entry-title">', '</h1>');
                } else {
                    the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                }
                ?>
            </div>
        </div>
        <br>
        <a href="<?php echo $link; ?>" target="_blank">

            <h6 class="text-center"><  Read more  ></h6>
        </a>
        <?php //Nacelle_entry_meta(); 
        ?>
    </header>
    <div class="entry-content">
        <?php the_content(); ?>

        <?php edit_post_link(__('(Edit)', 'nacelle'), '<span class="edit-link">', '</span>'); ?>
        <hr>
    </div>
    <footer>
        <?php get_template_part('template-parts/block', 'img-pagination'); ?>
        <?php $tag = get_the_tags();
        if ($tag) {
        ?><p><?php the_tags(); ?></p><?php
                                    } ?>
    </footer>
</article>