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

                    <a href="<?php echo $link; ?>" target="_blank">

                        <?php the_post_thumbnail('medium', array('align' => 'left')); ?>

                    </a>

                <?php endif; ?>
                <h1>
                    <?php the_field('title'); ?>
                </h1>
            </div>
            <div class="media-object-section">
                <a href="<?php echo $link; ?>" target="_blank">
                    <?php
                    if (is_single()) {
                        the_title('<h1 class="sm entry-title">', '</h1>');
                    } else {
                        the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                    }
                    ?>
                </a>
            </div>
        </div>
    </header>
    <div class="entry-content">
        <a href="<?php echo $link; ?>" target="_blank">
            <?php the_content(); ?>
            <br>
            <h2 class="h4 text-center">read more
                <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16.875 12.5h-1.25a.625.625 0 00-.625.625V17.5H2.5V5h5.625c.345 0 .625-.28.625-.625v-1.25a.625.625 0 00-.625-.625h-6.25C.839 2.5 0 3.34 0 4.375v13.75C0 19.161.84 20 1.875 20h13.75c1.036 0 1.875-.84 1.875-1.875v-5a.625.625 0 00-.625-.625zM19.063 0h-5c-.835 0-1.252 1.012-.665 1.602l1.396 1.395-9.52 9.517a.938.938 0 000 1.329l.885.884a.937.937 0 001.328 0l9.516-9.52 1.395 1.395c.586.585 1.602.175 1.602-.665v-5A.937.937 0 0019.062 0z" fill="#FFBC00" fill-rule="nonzero" />
                </svg>
            </h2>
        </a>
        <hr>
        <?php
        $related_posts = get_field('related_to');
        if ($related_posts) : ?>
            <div class="grid-x">
                <div class="cell medium-6">
                    <h4>Related Comedy</h4>

                    <?php foreach ($related_posts as $post) :

                        // Setup this post for WP functions (variable must be named $post).
                        setup_postdata($post); ?>
                        <p>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </p>
                    <?php endforeach; ?>
                </div>
                <div class="cell medium-6">
                    <?php foreach ($related_posts as $post) :
                        // Setup this post for WP functions (variable must be named $post).
                        setup_postdata($post); ?>
                        <?php
                        $talents = get_field('talent');
                        if ($talents) {
                            echo '<h4>Featured Talent</h4>';

                            $talentstr = array();
                            foreach ($talents as $talent) {
                                $talentstr[] = $talent->name;
                                $talentSlug[] = '<a class="alt" href="' . $siteURL . '/main-talent/' . $talent->slug . '">' . $talent->name . '</a>';
                            }
                            echo implode(", ", $talentSlug);
                        }
                        ?>
                    <?php endforeach; ?>
                </div>
                <?php
                // Reset the global post object so that the rest of the page works correctly.
                wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>
    </div>
    <?php edit_post_link(__('(Edit)', 'nacelle'), '<span class="edit-link">', '</span>'); ?>
    <footer>
        <?php get_template_part('template-parts/block', 'img-pagination'); ?>
        <?php $tag = get_the_tags();
        if ($tag) {
        ?><p><?php the_tags(); ?></p><?php
                                    } ?>
    </footer>
</article>