<?php
// get term
$term = get_queried_object();
$tax_page = is_tax(array('main_talent', 'producers', 'directors', 'writers'), $term);
$videoEmbedd = '';
$videoTalent = '';
$videoHero = '';
if ($tax_page) {
    $videoAbundance = '0.3';
    $profile_hero_lg = get_field('profile_pic', $term);
} else {
    $videoAbundance = '0.0';
    $profile_hero_lg = get_field('profile_pic', $term->taxonomy . '_' . $term->term_id);
}
// for the catalog pages
// simply get the video_embedd field
// no need to worry about the talent pages
$video_embedd_exist = get_field('video_embedd');
if ($video_embedd_exist) :
    $videoHero = get_field('video_embedd');
endif;
$artistSlug = $term->slug;
$catalogPermalink;
// args
$embedd_args = array(
    'post_type'         => 'catalog',
    'orderby'           => 'DSC',
    'posts_per_page'    => 1,
    'meta_key' => 'video_embedd',
    'meta_value' => array(''),
    'meta_compare' => 'NOT IN',
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
// The EMBEDD Query
$query_embedd = new WP_Query($embedd_args);
// The EMBEDD Loop
while ($query_embedd->have_posts()) :
    $query_embedd->the_post();
    // talent page shows this
    $videoEmbedd = get_field('video_embedd', $post->ID);
    $videoTalent = get_field('main_talent_hero_video', $term);
    $catalogPermalink = get_permalink();
    if (!empty($videoTalent)) :
        $videoHero = $videoTalent;
    elseif (!empty($videoEmbedd)) :
        $videoHero = $videoEmbedd;
    else :
    endif;
endwhile;
wp_reset_postdata(); ?>
<? if (!empty($videoHero)) : ?>
    <div class="catalog-hero hero-section medium-order-1" id="catalog_hero">
        <?php if (wp_is_mobile()) : ?>
            <style>
                @media screen and (max-width: 63.9375em) {
                    .catalog-hero {
                        height: 0;
                    }
                }

                @media screen and (min-width: 40em) and (max-width: 63.9375em) {
                    .catalog-aside-wrapper {
                        margin-left: 50%;
                    }

                    .catalog-aside {
                        margin-top: -360px;
                        position: absolute;
                    }

                    .catalog-more-info,
                    .catalog-crew {
                        width: 50%;
                    }
                }

                @media only screen and (min-device-width: 834px) and (max-device-width: 1112px) and (-webkit-min-device-pixel-ratio: 2) {

                    .catalog-crew .title,
                    .catalog-crew .crew {
                        width: 100%;
                    }
                }
            </style>
            <div id="mobile_video" onclick="jQuery('#mobile_video').YTPUnmute()" class="player" data-property="{videoURL:'<?php echo $videoHero; ?>',containment:'#mobile_video_container',optimizeDisplay:false,playOnlyIfVisible:true,abundance:0}"></div>
        <?php else : ?>
            <style>
                .mobile-video-container {
                    width: 0;
                    height: 0;
                }

                @media screen and (min-width: 40em) and (max-width: 63.9375em) {
                    .catalog-aside-wrapper {
                        margin-left: 50%;
                    }

                    .catalog-crew,
                    .accordion {
                        width: 50%;
                    }
                }
            </style>
            <div id="big_video">
                <div id="video-header-hero" class="player" data-property="{videoURL:'<?php echo $videoHero; ?>',containment:'self', mute:true,coverImage:'<?php echo esc_url($profile_hero_lg['url']); ?>', mobileFallbackImage:'<?php echo esc_url($profile_hero_lg['url']); ?>', useOnMobile: false,optimizedDisplay:false,abundance: <?php echo $videoAbundance; ?>,showYTLogo:false,playOnlyIfVisible:true,startAt:<?php the_field('start_video_at'); ?> }"></div>
            </div>
            <div class="hero-section-text cover-on" id="coverOn" data-toggler=".cover-on">
                <div class="cell medium-4">
                    <?php if ($tax_page) {
                        // get taxonomy name
                        $tax = $wp_query->get_queried_object();
                        $tax = get_taxonomy($tax->taxonomy);
                        $taxonomy =  $tax->label;
                        if ($taxonomy == 'Main Talent') {
                            $taxonomy = 'Talent';
                        } elseif ($taxonomy == 'Producers') {
                            $taxonomy = substr($taxonomy, 0, -1);
                        } elseif ($taxonomy == 'Directors') {
                            $taxonomy = substr($taxonomy, 0, -1);
                        } elseif ($taxonomy == 'Writers') {
                            $taxonomy = substr($taxonomy, 0, -1);
                        }
                    ?>
                        <div class="mobile-app-toggle play" data-mobile-app-toggle>
                            <div class="hero-text">
                                <span class="subheader"><?php echo $taxonomy; ?></span>
                                <h1><?php echo $term->name; ?></h1>
                                <button data-toggle="coverOn" title="Watch Video" class="button clear is-active icon" onclick="jQuery('#video-header-hero').YTPUnmute()">
                                    <?php get_template_part('template-parts/svg/icon-play', ''); ?>
                                    <strong>Watch</strong>
                                </button>
                            </div>
                            <div class="big-video-cover"></div>
                        </div>
                        <div class="mobile-app-toggle pause" data-mobile-app-toggle>
                            <button class="clear button is-active icon" title="Pause" data-toggle="coverOn" onclick="jQuery('#video-header-hero').YTPMute()">
                                <?php get_template_part('template-parts/svg/icon-pause', ''); ?>
                            </button>
                            <a class="button clear icon catalog-links-btn dashicons-before dashicons-album" href="<?php echo $catalogPermalink; ?>">
                                <strong>View Comedy</strong>
                            </a>
                            <button class="button clear icon" title="Expand" onclick="jQuery('#modal-video').YTPPlay(); jQuery('#video-header-hero').YTPPause();">
                                <?php get_template_part('template-parts/svg/icon-expand', ''); ?>
                            </button>
                        </div>
                    <?php } elseif ('catalog' == get_post_type()) { ?>
                        <div class="mobile-app-toggle play" data-mobile-app-toggle>
                            <div class="big-video-cover"></div>
                            <button data-toggle="coverOn" class="button clear is-active icon" title="Watch Video" onclick="jQuery('#video-header-hero').YTPUnmute()">
                                <?php get_template_part('template-parts/svg/icon-play', ''); ?>
                                <strong>Watch</strong>
                            </button>
                        </div>
                        <div class="mobile-app-toggle pause" data-mobile-app-toggle>
                            <button class="clear button small is-active icon" title="Pause" data-toggle="coverOn" onclick="jQuery('#video-header-hero').YTPMute()">
                                <?php get_template_part('template-parts/svg/icon-pause', ''); ?>
                            </button>
                            <button class="button clear small icon" title="Expand" onclick="jQuery('#modal-video').YTPPlay().YTPFullscreen(); jQuery('#video-header-hero').YTPPause();">
                                <?php get_template_part('template-parts/svg/icon-expand', ''); ?>
                            </button>
                        </div>
                    <?php } else {
                    }; ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="reveal large catalog-modal" id="catalog_modal" data-reveal data-append-to='#modal_container'>
            <div id="modalVideo" class="modal-video">
                <div class="grid-x">
                    <div class="cell">
                        <?php if ($videoHero) : ?>
                            <div id="modal-video" class="player" data-property="{videoURL:'<?php echo $videoHero; ?>',containment:'self', coverImage:'<?php echo $profile_hero_lg; ?>', mute:false, autoPlay: false,showControls:true, optimizeDisplay:false,loop:false, showYTLogo:true, stopMovieOnBlur:true }"></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <button class="close-button" data-toggle="coverOn" data-close aria-label="Close modal" type="button" onclick="jQuery('#video-header-hero').YTPPlay().YTPMute(); jQuery('#modal-video').YTPPause();">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div id="modal_container" data-toggle="coverOn" onclick="jQuery('#video-header-hero').YTPPlay().YTPMute(); jQuery('#modal-video').YTPPause();"></div>
    </div>
<? else : ?>
<? endif; ?>