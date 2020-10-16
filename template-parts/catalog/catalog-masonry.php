<?php
$term = get_queried_object();
$artistSlug = $term->slug;
$artistName = $term->name;

// get taxonomy name
$tax = $wp_query->get_queried_object();
$tax = get_taxonomy($tax->taxonomy);
$taxonomy =  $tax->label;

if ($taxonomy == 'Producers') {
    $taxonomyAlt = '<span class="subheader">Productions</span>';
} elseif ($taxonomy == 'Main Talent') {
    $taxonomyAlt = '<span class="subheader">Catalog</span>';
} elseif ($taxonomy == 'Directors') {
    $taxonomyAlt = '<span class="subheader">Directed on</span>';
} elseif ($taxonomy == 'Writers') {
    $taxonomyAlt = '<span class="subheader">Wrote on</span>';
}
// END get taxonomy name


// START the main qurey args
$args = array(
    'post_type'         => 'catalog',
    'posts_per_page'    => -1,
    'orderby'           => 'DSC',
    'tax_query' => array(
        'relation' => 'OR',
        array(
            'taxonomy' => 'main_talent',
            'field'    => 'slug',
            'terms'    => $artistSlug,
        ),
        array(
            'taxonomy' => 'producers',
            'field'    => 'slug',
            'terms'    => $artistSlug,
        ),
        array(
            'taxonomy' => 'directors',
            'field'    => 'slug',
            'terms'    => $artistSlug,
        ),
        array(
            'taxonomy' => 'writers',
            'field'    => 'slug',
            'terms'    => $artistSlug,
        ),
    ),
);
?>
<div class="cell grid-container primary-title my-3">
    <h2 class="entry-title mb-0"><?php echo $artistName . ' ' . $taxonomyAlt; ?></h2>
</div>
<div class="grid-container grid--masonry">
    <?php
    // ways to loop: https://digwp.com/2011/05/loops/
    global $post; // required
    $custom_posts = get_posts($args);
    $count = 0;

    foreach ($custom_posts as $post) : setup_postdata($post);
        $count++; ?>
        <div class="grid-item">

            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

                <?php
                // workaround for image URL: https://support.advancedcustomfields.com/forums/topic/illegal-string-offset/
                $image = get_field('square_image');
                if (!is_array($image)) {
                    $image = acf_get_attachment($image);
                }
                $url = $image['url'];

                if (!empty($image)) : ?>

                    <img class="grid--masonry__image" src="<?php echo $url; ?>" />

                <?php endif; ?>

            </a>

        </div>
    <?php
    endforeach;
    ?>
</div>