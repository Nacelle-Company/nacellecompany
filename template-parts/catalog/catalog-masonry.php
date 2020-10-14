<?php
$term = get_queried_object();
$artistSlug = $term->slug;
$artistName = $term->name;
// $postTitle =
// $category = get_the_category();

// START the main qurey args
$args = array(
    'post_type'         => 'catalog',
    // 'category_name'     => 'special-production, special',
    'posts_per_page'    => -1,
    'orderby'           => 'DSC',
    'tax_query' => array(
        'relation' => 'AND',
        array(
            'taxonomy' => 'main_talent',
            'field'    => 'slug',
            'terms'    => $artistSlug,
        ),
    ),
);
?>
<div class="cell grid-container primary-title my-3">
    <h2 class="entry-title mb-0"><?php echo $artistName . ' Archive'; ?></h2>
</div>
<div class="grid-container grid--masonry">

    <?php
    // ways to loop: https://digwp.com/2011/05/loops/
    global $post; // required
    $custom_posts = get_posts($args);
    $count = 0;

    foreach ($custom_posts as $post) : setup_postdata($post);
        $count++; ?>
        <?php
        // foreach ((get_the_category()) as $category) {
        //     echo $category->cat_name . ' ';
        // } 

        // https: //juzhax.com/2019/04/how-to-get-parent-category-name-in-wordpress/
        // $category = get_the_category();
        // $parent = get_cat_name($category[0]->category_parent);
        // if (!empty($parent)) {
        //     echo $parent;
        // } else {
        //     echo $category[0]->cat_name;
        // }
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

                if (!empty($image)) : ?>

                    <img class="grid--masonry__image" src="<?php echo $url; ?>" />

                <?php endif; ?>

            </a>

        </div>
    <?php
    endforeach;
    ?>
</div>