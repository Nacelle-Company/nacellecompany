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

// Check rows exists.
$count = '';
if (have_rows('featured_posts')) :

    // Loop through rows.
    while (have_rows('featured_posts')) : the_row();
        $count++;

        // vars
        $mask_url = get_template_directory_uri() . '/template-parts/svg/icon-mask.svg';

        $featured_projects = get_sub_field('featured_projects');
        foreach ($variable as $key => $value) {
            # code...
        }
        if ($featured_projects) {
            echo the_permalink();
            $final_video_url = get_field('video_embedd', $featured_projects->ID);
            echo $final_video_url . '<br>';
            $final_video_post_title = esc_html($featured_projects->post_title);
            $final_video_post_permalink = get_permalink($featured_projects->ID);
        }

    endwhile;

endif; ?>


<a href="<?php echo $final_video_post_permalink; ?>">

    <div class="catalog-hero hero-section video grid-x align-bottom" id="videoHeroContainment-<?php echo $count; ?>">

        <div id="big-video">

            <?php // plugin docs: https://github.com/pupunzi/jquery.mb.YTPlayer/wiki#external-methods 
            ?>
            <div id="fullHeroVideo-<?php echo $count; ?>" class="player" data-property="{
                        videoURL:'<?php echo $final_video_url; ?>', 
                        containment:'#videoHeroContainment', 
                        coverImage:'<?php echo $fallbackImage; ?>', 
                        mobileFallbackImage:'<?php echo $fallbackImage; ?>', 
                        autoPlay:true, 
                        mute:true, 
                        mask: '<?php echo $mask_url; ?>',
                        showControls:false, 
                        optimize_display:true, 
                        loop:true, 
                        showYTLogo:false, 
                        stopMovieOnBlur:true,
                        playOnlyIfVisible:true }"></div>

        </div>

        <div class="cell align-self-bottom">

            <h1><?php echo $final_video_post_title; ?></h1>

        </div>

    </div>

</a>

<script>
    jQuery(function() {
        jQuery("#fullHeroVideo-<?php echo $count; ?>").YTPlayer();
    });
</script>