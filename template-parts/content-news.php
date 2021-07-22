<?php

/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */
$link = get_post_meta(get_the_ID(), 'link_to_article', true);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
        <div class="media-object stack-for-small">
            <div class="media-object-section">
                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php echo $link; ?>" target="_blank">
                        <?php the_post_thumbnail('medium', array('align' => 'left')); ?>
                    </a>
                <?php endif; ?>
            </div>
            <div class="media-object-section">
                <a href="<?php echo $link; ?>" target="_blank">
                    <?php
                    if (is_single()) {
                        the_title('<h1 class="entry-title">', '</h1>');
                    } else {
                        the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                    }
                    ?>
                    <h4><?php _e('Read more', 'nacelle'); ?>
                        <svg class="icon" width="20" height="20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.875 12.5h-1.25a.625.625 0 00-.625.625V17.5H2.5V5h5.625c.345 0 .625-.28.625-.625v-1.25a.625.625 0 00-.625-.625h-6.25C.839 2.5 0 3.34 0 4.375v13.75C0 19.161.84 20 1.875 20h13.75c1.036 0 1.875-.84 1.875-1.875v-5a.625.625 0 00-.625-.625zM19.063 0h-5c-.835 0-1.252 1.012-.665 1.602l1.396 1.395-9.52 9.517a.938.938 0 000 1.329l.885.884a.937.937 0 001.328 0l9.516-9.52 1.395 1.395c.586.585 1.602.175 1.602-.665v-5A.937.937 0 0019.062 0z" fill="#FFBC00" fill-rule="nonzero" />
                        </svg>
                    </h4>
                </a>
            </div>
        </div>
    </header>
    <div class="entry-content">
        <?php the_content(); ?>
        <hr>
        <?php
        $related_posts = get_post_meta(get_the_ID(), 'related_to', true);
        if ($related_posts) : ?>
            <div class="grid-x grid-padding-x">
                <div class="cell medium-6">
                    <h4>Related Comedy</h4>
                    <?php foreach ($related_posts as $post) :
                        setup_postdata($post); ?>
                        <p>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </p>
                        <?php wp_reset_postdata(); ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php
            $related_posts = get_post_meta(get_the_ID(), 'related_to', true);
            if ($related_posts) : ?>
                <div class="cell medium-6">
                    <h4>Featured Talent</h4>
                    <?php foreach ($related_posts as $post) :
                        setup_postdata($post); ?>
                        <?php
                        $terms = get_field('talent');
                        if ($terms) : ?>
                            <?php foreach ($terms as $term) : ?>
                                <a href="<?php echo esc_url(get_term_link($term)); ?>"><?php echo esc_html($term->name); ?></a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <footer class="pagination">
        <?php get_template_part('template-parts/catalog/catalog-pagination'); ?>
        <div class="cell flex-container align-center-middle align-spaced text-center">
            <div class="mr-1">
                <svg class="icon" width="7" height="11" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.01.972v8.652c0 .599-.725.899-1.148.475L.535 5.773a.673.673 0 010-.95L4.862.495A.672.672 0 016.01.972z" fill-rule="nonzero" />
                </svg>
            </div>
            <?php
            $postType = get_post_type();
            if ($postType == 'news') : ?>
                <a href="<?php echo get_post_type_archive_link('news'); ?>">Return to News Feed</a>
            <?php elseif ($postType == 'press') : ?>
                <a href="<?php echo get_post_type_archive_link('press'); ?>">Return to News Feed</a>
            <?php endif; ?>
        </div>
    </footer>
</article>
<?php edit_post_link(__('(Edit)', 'nacelle'), '<span class="edit-link">', '</span>'); ?>