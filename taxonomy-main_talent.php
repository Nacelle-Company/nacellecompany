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
$term = get_queried_object();

$bio = get_field('bio', $term);
$profile_image = get_field('profile_pic', $term);

// bio photo size
$profile_img_size_lg = 'fp-large';
$profile_img_size_md = 'fp-medium';
$profile_img_size_sm = 'fp-small';

$profile_hero_image_alt = $profile_image['alt']; /* Get image object alt */
/* Get custom sizes of our image sub_field */
$profile_hero_lg = $profile_image['sizes'][$profile_img_size_lg];
$profile_hero_md = $profile_image['sizes'][$profile_img_size_md];
$profile_hero_sm = $profile_image['sizes'][$profile_img_size_sm];
// END variables

$img_size_lg = 'fp-large';
$img_size_md = 'fp-medium';
$img_size_sm = 'fp-small';

// $hero_image = the_post_thumbnail($term);

/* Get custom sizes of our image sub_field */
$hero_lg = $hero_image['sizes'][$img_size_lg];
$hero_md = $hero_image['sizes'][$img_size_md];
$hero_sm = $hero_image['sizes'][$img_size_sm];

?>

<main class="main-talent">

    <?php get_template_part('template-parts/catalog/catalog-hero'); ?>

    <?php get_template_part('template-parts/catalog/catalog-latest-video'); ?>

    <?php get_template_part('template-parts/catalog/catalog-list'); ?>

    <!-- BIO SECTION -->
    <div class="grid-x grid-container grid-padding-x">

        <div class="cell">

            <div class="grid-x align-center grid-padding-x grid-padding-y">

                <?php
                if (!empty($profile_image)) :
                ?>

                    <div class="cell small-6 profile-image">

                        <img rel="preconnect" class="my-hero superman" data-interchange="[<?php echo $profile_hero_md; ?>, default], [<?php echo $profile_hero_sm; ?>, small], [<?php echo $profile_hero_md; ?>, medium]" alt="<?php echo $profile_hero_image_alt; ?>" />

                        <noscript><img src="<?php echo $profile_hero_lg; ?>" alt="<?php echo $profile_hero_image_alt; ?>" /></noscript>

                    </div>

                <?php endif; ?>

                <div class="cell small-6">

                    <?php $description = get_field('bio', $term);
                    echo $description; ?>

                </div>

            </div>

        </div>

    </div>

    <!-- LINKS SECTION -->
    <div class="cell mb-4">

        <div class="grid-x entry-title-container align-right">

            <h6 class="microphone-icon">Links</h6>

        </div>

        <div class="grid-x grid-padding-x">

            <?php $imdb_yes = get_field('imdb_video_artist_pg');
            if ($imdb_yes) : ?>

                <div class="cell shrink">

                    <a href="<?php echo the_field('imdb_video') ?>" target="_blank" rel="noreferrer">

                        <img src="<?php bloginfo('template_directory'); ?>/dist/assets/images/imdb.svg" alt="<?php the_title(); ?>" />

                    </a>

                </div>

            <?php endif; ?>

        </div>

    </div>

    <div class="grid-x grid-container">

        <div class="cell">

            <div class="grid-x entry-title-container align-right">

                <h6 class="microphone-icon">Archive</h6>

            </div>

        </div>

        <div class="cell medium-6">

            <?php

            $args_prod = array_merge($wp_query->query, array('cat' => 307, 'order' => 'DSC'));

            query_posts($args_prod);

            if (have_posts($args_prod)) :  ?>

                <h4 class="cell small-12 text-center catalog-title special">

                    <i class="fas fa-microphone-alt"></i>

                    <?php _e('Distribution', 'nacelle'); ?>

                </h4>

                <div class="masonry masonry--h">

                    <?php while (have_posts()) : the_post(); ?>

                        <div class="masonry-brick masonry-brick--h">

                            <a href="<?php the_permalink(); ?>">

                                <?php

                                $image = get_field('square_image');
                                $size = 'large'; // (thumbnail, medium, large, full or custom size)

                                if ($image) {
                                    echo wp_get_attachment_image($image, $size);
                                }

                                ?>
                            </a>

                        </div>

                    <?php endwhile; ?>

                </div>

            <?php else : ?>

                <?php get_template_part('template-parts/content', 'none'); ?>

            <?php endif; ?>

        </div>

    </div>

    <div class="cell medium-6">
        <?php

        $args_dist = array_merge($wp_query->query, array('cat' => 774, 'order' => 'DSC'));

        query_posts($args_dist);

        if (have_posts($args_dist)) :  ?>

            <h4 class="cell small-12 text-center catalog-title special">

                <i class="fas fa-microphone-alt"></i>

                <?php _e('Production', 'nacelle'); ?>

            </h4>

            <div class="masonry masonry--h">

                <?php while (have_posts()) : the_post(); ?>

                    <div class="masonry-brick masonry-brick--h">

                        <a href="<?php the_permalink(); ?>">

                            <?php

                            $image = get_field('square_image');
                            $size = 'large'; // (thumbnail, medium, large, full or custom size)

                            if ($image) {
                                echo wp_get_attachment_image($image, $size);
                            }

                            ?>

                        </a>

                    </div>

                <?php endwhile; ?>

            </div>

        <?php else : ?>

            <?php get_template_part('template-parts/content', 'none'); ?>

        <?php endif; ?>

    </div>

</main>

<script>
    jQuery(function() {
        jQuery("#video-header-hero").YTPlayer();
        jQuery("#video-latest-call").YTPlayer();
    });
</script>
<?php get_footer();
