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
$artistSlug = $term->slug;
$mainTalent = is_tax('main_talent', $term);
$startLatestVidAt = get_field('start_latest_video', $term);
$endLatestVidAt = get_field('end_latest_video', $term);
$args = array(
    'post_type'         => 'catalog',
    // 'category_name'     => $selectedVideoCategory,
    'posts_per_page'    => 1,
    'orderby'             => 'DSC',
    'tax_query' => array(
        'relation' => 'AND',
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
// END the main qurey args
$query = new WP_Query($args);
if ($query->have_posts()) :
    while ($query->have_posts()) :
        $query->the_post();
        $profile_hero_lg = get_field('profile_pic', $term);
        if (get_field('latest_video', $term)) {
            $videoLatest = get_field('latest_video', $term);
        } else {
            $videoLatest = get_field('video_embedd');
        }
?>
        <div class="catalog-hero hero-section medium-height" id="videoHeroContainment">
            <div id="big_video">
                <div id="bigVideoHero" class="player" data-property="{videoURL:'<?php echo $videoLatest; ?>', containment:'#videoHeroContainment', coverImage:'<?php echo esc_url($profile_hero_lg['url']); ?>', mobileFallbackImage:'<?php echo esc_url($profile_hero_lg['url']); ?>', autoPlay:true, mute:true, opacity:1, showControls:false, optimize_display:true, loop:true, showYTLogo:false, stopMovieOnBlur:true,playOnlyIfVisible:true }"></div>
            </div>
            <div class="hero-section-text grid-x cover-on" id="videoCoverOn" data-toggler=".cover-on">
                <div class="cell medium-12">
                    <?php if ($mainTalent == 'main_talent') { ?>
                        <div class="mobile-app-toggle play" data-mobile-app-toggle>
                            <div class="hero-text">
                                <h1><span class="subheader">The</span> <?php echo $term->name; ?> <span class="subheader">Archive</span></h1>
                                <button data-toggle="videoCoverOn" class="button clear is-active icon" onclick="jQuery('#bigVideoHero').YTPUnmute()">
                                    <?php get_template_part('template-parts/svg/icon-play', ''); ?>
                                    <strong>Watch</strong>
                                </button>
                            </div>
                            <div class="big-video-cover"></div>
                        </div>
                        <div class="mobile-app-toggle pause" data-mobile-app-toggle>
                            <button class="clear button is-active icon" title="Pause" data-toggle="videoCoverOn" onclick="jQuery('#bigVideoHero').YTPMute()">
                                <?php get_template_part('template-parts/svg/icon-pause', ''); ?>
                            </button>
                            <a class="button clear icon catalog-links-btn" title="Purchase" href="#catalog_links" data-smooth-scroll data-animation-duration="700" data-offset="45">
                                <?php get_template_part('template-parts/svg/icon-cart', ''); ?>
                            </a>
                            <button class="button clear icon" data-open="video_modal" title="Full screen" onclick="jQuery('#modal-video-container').YTPPlay(); jQuery('#bigVideoHero').YTPPause();">
                                <?php get_template_part('template-parts/svg/icon-expand', ''); ?>
                            </button>
                        </div>
                    <?php } elseif ('catalog' == get_post_type()) { ?>
                        <div class="mobile-app-toggle play" data-mobile-app-toggle>
                            <div class="big-video-cover"></div>
                            <button data-toggle="videoCoverOn" class="button clear is-active icon" title="Watch Video" onclick="jQuery('#bigVideoHero').YTPUnmute()">
                                <?php get_template_part('template-parts/svg/icon-play', ''); ?>
                            </button>
                            <a class="button clear icon catalog-links-btn" title="Purchase" href="#catalog_links" data-smooth-scroll data-animation-duration="700" data-offset="45">
                                <?php get_template_part('template-parts/svg/icon-cart', ''); ?>
                            </a>
                        </div>
                        <div class="mobile-app-toggle pause" data-mobile-app-toggle>
                            <button class="clear button is-active icon" title="Pause" data-toggle="videoCoverOn" onclick="jQuery('#bigVideoHero').YTPMute()">
                                <?php get_template_part('template-parts/svg/icon-pause', ''); ?>
                            </button>
                            <a class="button clear icon catalog-links-btn" title="Purchase" href="#catalog_links" data-smooth-scroll data-animation-duration="700" data-offset="45">
                                <?php get_template_part('template-parts/svg/icon-cart', ''); ?>
                            </a>
                            <button class="button clear icon" title="Full screen" data-open="video_modal" onclick="jQuery('#modal-video-container').YTPPlay(); jQuery('#bigVideoHero').YTPPause();">
                                <?php get_template_part('template-parts/svg/icon-expand', ''); ?>
                            </button>
                        </div>
                    <?php } else {
                    }; ?>
                </div>
            </div>
            <div id="video_modal" class="reveal large catalog-modal" data-reveal data-append-to='#video_modal_container'>
                <div id="modalVideoContainer" class="modal-video">
                    <?php
                    if ($videoLatest) : ?>
                        <div id="modal-video-container" class="player" data-property="{videoURL:'<?php echo $videoLatest; ?>',containment:'#modalVideoContainer', coverImage:'<?php echo $profile_hero_lg; ?>', mobileFallbackImage:'<?php echo $profile_hero_lg; ?>', mute:false, autoPlay: false,showControls:true, optimizeDisplay:true,abundance: 0,loop:true, showYTLogo:true, stopMovieOnBlur:true }"></div>
                    <?php endif; ?>
                </div>
                <button class="close-button" data-toggle="videoCoverOn" data-close aria-label="Close modal" type="button" onclick="jQuery('#bigVideoHero').YTPPlay().YTPMute();jQuery('#modal-video-container').YTPPause();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="video_modal_container" data-toggle="videoCoverOn" onclick="jQuery('#bigVideoHero').YTPPlay().YTPMute(); jQuery('#modal-video-container').YTPPause();"></div>
        </div>
<?php endwhile;
else :
endif;
wp_reset_postdata(); ?>