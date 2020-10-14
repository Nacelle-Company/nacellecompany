<?php

/**
 * The template for displaying Main Talent archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php

// START variables
// $genres = get_the_terms($post->ID, 'genre');
// $term = get_queried_object();

// $img_size_lg = 'fp-large';
// $img_size_md = 'fp-medium';
// $img_size_sm = 'fp-small';

// $hero_image = get_the_post_thumbnail($term);

/* Get custom sizes of our image sub_field */
// $hero_lg = $hero_image['sizes'][$img_size_lg];
// $hero_md = $hero_image['sizes'][$img_size_md];
// $hero_sm = $hero_image['sizes'][$img_size_sm];

?>

<main class="main-talent">

    <?php get_template_part('template-parts/catalog/catalog-hero'); ?>

    <?php get_template_part('template-parts/catalog/catalog-masonry'); 
    ?>

    <?php get_template_part('template-parts/catalog/talent-bio'); 
    ?>

    <?php get_template_part('template-parts/blocks/video-hero'); ?>

</main>

<?php get_footer();
