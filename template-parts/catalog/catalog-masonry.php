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
        <h2 class="entry-title mb-0"><?php echo $artistName . ' ' . $taxonomyAlt; ?></h2>
    </div>
    <div class="grid-container grid--masonry">
    <?php   global $post; // required
            $custom_posts = get_posts($producer_args);
            $count = 0;
    foreach ($custom_posts as $post) : setup_postdata($post);
        $count++;
        ?>
        <div class="grid-item">
            
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

                <?php
                // workaround for image URL: https://support.advancedcustomfields.com/forums/topic/illegal-string-offset/
                $image = get_field('square_image');
                if (!is_array($image)) {
                    $image = acf_get_attachment($image);
                }
                $url = $image['url'];
                $alt = $image['alt'];

                if (!empty($image)) : ?>

                    <img class="grid--masonry__image test" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" />

                <?php endif; ?>

            </a>

        </div>
    <?endforeach; ?>
</div>
<?php 
// MAIN TALENT
// MAIN TALENT
// MAIN TALENT
} elseif ($taxonomy == 'Main Talent') {
    $taxonomyAlt = '<span class="subheader">Catalog</span>'; ?>
    <div class="cell grid-container primary-title my-3">
        <h2 class="entry-title mb-0"><?php echo $artistName . ' ' . $taxonomyAlt; ?></h2>
    </div>
    <div class="grid-container grid--masonry">
    <?php   global $post; // required
            $custom_posts = get_posts($main_talent_args);
            $count = 0;
    foreach ($custom_posts as $post) : setup_postdata($post);
        $count++;
        ?>
        <div class="grid-item">
            
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

                <?php
                // workaround for image URL: https://support.advancedcustomfields.com/forums/topic/illegal-string-offset/
                $image = get_field('square_image');
                if (!is_array($image)) {
                    $image = acf_get_attachment($image);
                }
                $url = $image['url'];
                $alt = $image['alt'];

                if (!empty($image)) : ?>

                    <img class="grid--masonry__image" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" />

                <?php endif; ?>

            </a>

        </div>
    <?endforeach; ?>
</div>
<?php 
// DIRECTORS
// DIRECTORS
// DIRECTORS
} elseif ($taxonomy == 'Directors') {
    $taxonomyAlt = '<span class="subheader">Directed on</span>'; ?>

    <div class="cell grid-container primary-title my-3">
        <h2 class="entry-title mb-0"><?php echo $artistName . ' ' . $taxonomyAlt; ?></h2>
    </div>
    <div class="grid-container grid--masonry">
    <?php   global $post; // required
            $custom_posts = get_posts($director_args);
            $count = 0;
    foreach ($custom_posts as $post) : setup_postdata($post);
        $count++;
        ?>
        <div class="grid-item">
            
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

                <?php
                // workaround for image URL: https://support.advancedcustomfields.com/forums/topic/illegal-string-offset/
                $image = get_field('square_image');
                if (!is_array($image)) {
                    $image = acf_get_attachment($image);
                }
                $url = $image['url'];
                $alt = $image['alt'];

                if (!empty($image)) : ?>

                    <img class="grid--masonry__image" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" />

                <?php endif; ?>

            </a>

        </div>
    <?endforeach; ?>
</div>
<?php 
// WRITERS
// WRITERS
// WRITERS
} elseif ($taxonomy == 'Writers') {
    $taxonomyAlt = '<span class="subheader">Wrote on</span>'; ?>

    <div class="cell grid-container primary-title my-3">
        <h2 class="entry-title mb-0"><?php echo $artistName . ' ' . $taxonomyAlt; ?></h2>
    </div>
    <div class="grid-container grid--masonry">
    <?php   global $post; // required
            $custom_posts = get_posts($writer_args);
            $count = 0;
    foreach ($custom_posts as $post) : setup_postdata($post);
        $count++;
        ?>
        <div class="grid-item">
            
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

                <?php
                // workaround for image URL: https://support.advancedcustomfields.com/forums/topic/illegal-string-offset/
                $image = get_field('square_image');
                if (!is_array($image)) {
                    $image = acf_get_attachment($image);
                }
                $url = $image['url'];
                $alt = $image['alt'];

                if (!empty($image)) : ?>

                    <img class="grid--masonry__image" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" />

                <?php endif; ?>

            </a>

        </div>
    <?endforeach; ?>
</div>
<?php 
}
wp_reset_postdata();
?>
