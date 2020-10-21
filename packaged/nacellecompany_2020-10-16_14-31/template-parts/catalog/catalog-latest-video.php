<?php

/**
 * The template for displaying catalog latest stand up
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
?>
<?php
// latest video
$term = get_queried_object();
$standUp = 'stand-up';
$artistName = $term->slug;
$startLatestVidAt = get_field('start_latest_video', $term);
$endLatestVidAt = get_field('end_latest_video', $term);
// START the main qurey args
$args = array(
    'post_type'         => 'catalog',
    'category_name'     => 'special-production, special',
    'posts_per_page'    => 1,
    'order'             => 'DSC',
    'tax_query' => array(
        'relation' => 'AND',
        array(
            'taxonomy' => 'main_talent',
            'field'    => 'slug',
            'terms'    => $artistName,
        ),
    ),
);
// END the main qurey args
$query = new WP_Query($args);

if ($query->have_posts()) :

    while ($query->have_posts()) :

        $query->the_post();

        /*
         * check if a specific video has been set 
         * in the main talent taxonomy page for the artist
         * if so, set the $videoHero variable to that video.
         */
        if (get_field('latest_video', $term)) {
            $videoLatest = get_field('latest_video', $term);
        } else {
            $videoLatest = get_field('video_embedd');
        }

?>

        <div id="video-latest" class="grid-x column medium-12 grid-padding-x align-center dark-container">

            <?php if ($videoLatest) : ?>

                <!-- plugin docs: https://github.com/pupunzi/jquery.mb.YTPlayer/wiki#external-methods -->

                <div id="video-latest-call" class="player" data-property="{videoURL:'<?php echo $videoLatest; ?>', containment:'#video-latest', coverImage:'<?php echo $profile_hero_lg; ?>', mobileFallbackImage:'<?php echo $profile_hero_lg; ?>', startAt:<?php echo $startLatestVidAt; ?>, stopAt:<?php echo $endLatestVidAt; ?>, autoPlay:true, mute:true, opacity:1, showControls:false, optimize_display:true, loop:true, showYTLogo:false, stopMovieOnBlur:false }"></div>

            <?php endif; ?>

            <div class="cell medium-auto">

                <div class="media-object stack-for-small align-middle">

                    <div class="media-object-section middle px-5 py-5">

                        <a href="<?php the_permalink(); ?>" title="stand up special">

                            <?php get_template_part('template-parts/featured-image-element'); ?>

                        </a>

                    </div>

                    <div class="media-object-section main-section">

                        <h6 class="subheader">Latest Special</h6>

                        <a href="<?php the_permalink(); ?>">

                            <h2><strong><?php the_title(); ?></strong></h2>

                        </a>

                        <a href=" <?php the_permalink(); ?>" class="button large" title="stand up special">Watch Now</a>

                    </div>

                </div>

            </div>

            <div class="big-video-cover"></div>

        </div>

<?php endwhile;

else :

endif;

wp_reset_postdata(); ?>