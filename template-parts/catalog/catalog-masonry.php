<?php
$term = get_queried_object();
$artistSlug = $term->slug;
$artistName = $term->name;

// get taxonomy name
$tax = $wp_query->get_queried_object();
$tax = get_taxonomy($tax->taxonomy);
$taxonomy =  $tax->label;

// START the main qurey args
$main_talent_args = array(
    'post_type'         => 'catalog',
    'posts_per_page'    => -1,
    'orderby'           => 'DSC',
    'tax_query' => array(
        array(
            'taxonomy' => 'main_talent',
            'field'    => 'slug',
            'terms'    => $artistSlug,
        ),
    ),
);
$producer_args = array(
    'post_type'         => 'catalog',
    'posts_per_page'    => -1,
    'orderby'           => 'DSC',
    'tax_query' => array(
        array(
            'taxonomy' => 'producers',
            'field'    => 'slug',
            'terms'    => $artistSlug,
        ),
    ),
);
$director_args = array(
    'post_type'         => 'catalog',
    'posts_per_page'    => -1,
    'orderby'           => 'DSC',
    'tax_query' => array(
        array(
            'taxonomy' => 'directors',
            'field'    => 'slug',
            'terms'    => $artistSlug,
        ),
    ),
);
$writer_args = array(
    'post_type'         => 'catalog',
    'posts_per_page'    => -1,
    'orderby'           => 'DSC',
    'tax_query' => array(
        array(
            'taxonomy' => 'writers',
            'field'    => 'slug',
            'terms'    => $artistSlug,
        ),
    ),
);
// ways to loop: https://digwp.com/2011/05/loops/
// PRODUCERS
// PRODUCERS
// PRODUCERS
if ($taxonomy == 'Producers') {
    $taxonomyAlt = '<span class="subheader">Productions</span>'; ?>

    <div class="cell grid-container primary-title my-3">
        <h1 class="entry-title mb-0 h2"><?php echo $artistName . ' ' . $taxonomyAlt; ?></h1>
    </div>
    <div class="grid-container">
        <div class="grid-x grid-margin-x grid-padding-y small-up-1 medium-up-2 post-grid align-center">
            <?php global $post; // required
            $custom_posts = get_posts($producer_args);
            $count = 0;
            foreach ($custom_posts as $post) : setup_postdata($post);
                $count++;
                $trim_length = 35;
                $value_more = '. . .';
                $value = get_field('synopsis', $post->ID);
                if ($value) {
                    $synopsis = wp_trim_words($value, $trim_length, $value_more);
                }
            ?>
                <div class="cell media-object stack-for-small">
                    <div class="media-object-section">
                        <?php
                        if (get_field('square_image', $post->ID)) {
                            $image = get_field('square_image', $post->ID);
                            $url = $image['url'];
                            $title = $image['title'];
                            $alt = $image['alt'];
                            $caption = $image['caption'];
                            $size = 'medium';
                            $thumb = $image['sizes'][$size];
                            $width = $image['sizes'][$size . '-width'];
                            $height = $image['sizes'][$size . '-height'];
                        } else {
                            $thumb = get_the_post_thumbnail_url($post->ID, 'medium');
                        }
                        if ($image) :

                        ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="media-object-section">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <p>
                                <?php
                                the_title('<h5 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h5>');
                                if ($synopsis) {
                                    echo $synopsis;
                                }
                                ?>
                            </p>
                        </a>
                    </div>
                    <a class="go-corner" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <div class="go-arrow">
                            →
                        </div>
                    </a>
                </div>
            <? endforeach; ?>
        </div>
    </div>
<?php
} elseif ($taxonomy == 'Main Talent') {
    $taxonomyAlt = '<span class="subheader">Catalog</span>'; ?>
    <div class="cell grid-container primary-title my-3">
        <h1 class="entry-title mb-0 h2"><?php echo $artistName . ' ' . $taxonomyAlt; ?></h1>
    </div>
    <div class="grid-container">
        <div class="grid-x grid-margin-x grid-padding-y small-up-1 medium-up-2 post-grid align-center">
            <?php global $post; // required
            $custom_posts = get_posts($main_talent_args);
            $count = 0;
            foreach ($custom_posts as $post) : setup_postdata($post);
                $count++;
                $trim_length = 35;
                $value_more = '. . .';
                $value = get_field('synopsis', $post->ID);
                if ($value) {
                    $synopsis = wp_trim_words($value, $trim_length, $value_more);
                }
            ?>
                <div class="cell media-object stack-for-small">
                    <div class="media-object-section">
                        <?php
                        if (get_field('square_image', $post->ID)) {
                            $image = get_field('square_image', $post->ID);
                            $url = $image['url'];
                            $title = $image['title'];
                            $alt = $image['alt'];
                            $caption = $image['caption'];
                            $size = 'medium';
                            $thumb = $image['sizes'][$size];
                            $width = $image['sizes'][$size . '-width'];
                            $height = $image['sizes'][$size . '-height'];
                        } else {
                            $thumb = get_the_post_thumbnail_url($post->ID, 'medium');
                        }
                        if ($image) :

                        ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="media-object-section">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <p>
                                <?php
                                the_title('<h5 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h5>');
                                if ($synopsis) {
                                    echo $synopsis;
                                }
                                ?>
                            </p>
                        </a>
                    </div>
                    <a class="go-corner" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <div class="go-arrow">
                            →
                        </div>
                    </a>
                </div>
            <? endforeach; ?>
        </div>
    </div>
<?php
    // DIRECTORS
    // DIRECTORS
    // DIRECTORS
} elseif ($taxonomy == 'Directors') {
    $taxonomyAlt = '<span class="subheader">Directed on</span>'; ?>

    <div class="cell grid-container primary-title my-3">
        <h1 class="entry-title mb-0 h2"><?php echo $artistName . ' ' . $taxonomyAlt; ?></h1>
    </div>
    <div class="grid-container">
        <div class="grid-x grid-margin-x grid-padding-y small-up-1 medium-up-2 post-grid align-center">
            <?php global $post; // required
            $custom_posts = get_posts($director_args);
            $count = 0;
            foreach ($custom_posts as $post) : setup_postdata($post);
                $count++;
                $trim_length = 35;
                $value_more = '. . .';
                $value = get_field('synopsis', $post->ID);
                if ($value) {
                    $synopsis = wp_trim_words($value, $trim_length, $value_more);
                }
            ?>
                <div class="cell media-object stack-for-small">
                    <div class="media-object-section">
                        <?php
                        if (get_field('square_image', $post->ID)) {
                            $image = get_field('square_image', $post->ID);
                            $url = $image['url'];
                            $title = $image['title'];
                            $alt = $image['alt'];
                            $caption = $image['caption'];
                            $size = 'medium';
                            $thumb = $image['sizes'][$size];
                            $width = $image['sizes'][$size . '-width'];
                            $height = $image['sizes'][$size . '-height'];
                        } else {
                            $thumb = get_the_post_thumbnail_url($post->ID, 'medium');
                        }
                        if ($image) :

                        ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="media-object-section">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <p>
                                <?php
                                the_title('<h5 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h5>');
                                if ($synopsis) {
                                    echo $synopsis;
                                }
                                ?>
                            </p>
                        </a>
                    </div>
                    <a class="go-corner" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <div class="go-arrow">
                            →
                        </div>
                    </a>
                </div>
            <? endforeach; ?>
        </div>
    </div>
<?php
    // WRITERS
    // WRITERS
    // WRITERS
} elseif ($taxonomy == 'Writers') {
    $taxonomyAlt = '<span class="subheader">was a writer on</span>'; ?>

    <div class="cell grid-container primary-title my-3">
        <h1 class="entry-title mb-0 h2"><?php echo $artistName . ' ' . $taxonomyAlt; ?></h1>
    </div>
    <div class="grid-container">
        <div class="grid-x grid-margin-x grid-padding-y small-up-1 medium-up-2 post-grid align-center">
            <?php global $post; // required
            $custom_posts = get_posts($writer_args);
            $count = 0;
            foreach ($custom_posts as $post) : setup_postdata($post);
                $count++;
                $trim_length = 35;
                $value_more = '. . .';
                $value = get_field('synopsis', $post->ID);
                if ($value) {
                    $synopsis = wp_trim_words($value, $trim_length, $value_more);
                }
            ?>
                <div class="cell media-object stack-for-small">
                    <div class="media-object-section">
                        <?php
                        if (get_field('square_image', $post->ID)) {
                            $image = get_field('square_image', $post->ID);
                            $url = $image['url'];
                            $title = $image['title'];
                            $alt = $image['alt'];
                            $caption = $image['caption'];
                            $size = 'medium';
                            $thumb = $image['sizes'][$size];
                            $width = $image['sizes'][$size . '-width'];
                            $height = $image['sizes'][$size . '-height'];
                        } else {
                            $thumb = get_the_post_thumbnail_url($post->ID, 'medium');
                        }
                        if ($image) :

                        ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="media-object-section">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <p>
                                <?php
                                the_title('<h5 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h5>');
                                if ($synopsis) {
                                    echo $synopsis;
                                }
                                ?>
                            </p>
                        </a>
                    </div>
                    <a class="go-corner" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <div class="go-arrow">
                            →
                        </div>
                    </a>
                </div>
            <? endforeach; ?>
        </div>
    </div>
<?php
}
wp_reset_postdata();
?>