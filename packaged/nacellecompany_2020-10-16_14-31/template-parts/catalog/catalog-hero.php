<?php
// get term
$term = get_queried_object();

$tax_page = is_tax(array('main_talent', 'producers', 'directors', 'writers'), $term);

if ($tax_page) {
    $videoAbundance = '0.3';
    $profile_hero_lg = get_field('profile_pic', $term);
} else {
    $videoAbundance = '0.3';
    $profile_hero_lg = get_field('profile_pic', $term->taxonomy . '_' . $term->term_id);
}

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
    // $term = get_queried_object();

    // for the catalog pages
    // simply get the video_embedd field
    // no need to worry about the talent pages
    $video_embedd_exist = get_field('video_embedd');
    if ($video_embedd_exist) {
        $videoHero = get_field('video_embedd');
    }

    $artistSlug = $term->slug;
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
    while ($query_embedd->have_posts()) {
        $query_embedd->the_post();
        // talent page shows this
        $videoEmbedd = get_field('video_embedd', $post->ID);
        $videoTalent = get_field('main_talent_hero_video', $term);
        if (!empty($videoTalent)) {
            $videoHero = $videoTalent;
        } elseif ($videoEmbedd) {
            $videoHero = $videoEmbedd;
        }
    }
    wp_reset_postdata();


?>

<div class="catalog-hero hero-section">

    <div id="big-video">

        <!-- plugin docs: https://github.com/pupunzi/jquery.mb.YTPlayer/wiki#external-methods -->
        <div id="video-header-hero" class="player" data-property="{
            videoURL:'<?php echo $videoHero; ?>',
            containment:'self', 
            coverImage:'<?php echo esc_url($profile_hero_lg['url']); ?>', 
            mobileFallbackImage:'<?php echo esc_url($profile_hero_lg['url']); ?>', 
            autoPlay:true, 
            mute:true, 
            opacity:1, 
            showControls:false, 
            optimizeDisplay:true,
            abundance: <?php echo $videoAbundance; ?>,
            loop:true, 
            showYTLogo:false, 
            stopMovieOnBlur:true,
            playOnlyIfVisible:true }"></div>

    </div>

    <div class="hero-section-text cover-on" id="coverOn" data-toggler=".cover-on">

        <div class="cell medium-4">

            <?php if ($tax_page) { ?>

                <!-- play button group -->
                <div class="mobile-app-toggle play" data-mobile-app-toggle>

                    <div class="hero-text">
                        <span class="subheader"><?php echo $taxonomy; ?></span>
                        <h1><?php echo $term->name; ?></h1>

                        <button data-toggle="coverOn" class="button is-active icon" onclick="jQuery('#video-header-hero').YTPUnmute()">
                            <?php get_template_part('template-parts/svg/icon-play', ''); ?>
                            <strong>Watch</strong>
                        </button>
                    </div>

                    <div class="big-video-cover"></div>

                </div>

                <!-- pause button group -->
                <div class="mobile-app-toggle pause" data-mobile-app-toggle>

                    <button class="clear button is-active icon" data-toggle="coverOn" onclick="jQuery('#video-header-hero').YTPMute()">
                        <?php get_template_part('template-parts/svg/icon-pause', ''); ?>
                        <strong>Pause</strong>
                    </button>

                    <a class="button icon catalog-links-btn" href="#catalog_links" data-smooth-scroll data-animation-duration="700" data-offset="45">
                        <?php get_template_part('template-parts/svg/icon-cart', ''); ?>
                        <strong>Purchase</strong>
                    </a>

                    <button class="button icon" data-open="catalog_modal" onclick="jQuery('#modal-video').YTPPlay(); jQuery('#video-header-hero').YTPPause();">
                        <?php get_template_part('template-parts/svg/icon-expand', ''); ?>
                        <strong>Full screen</strong>
                    </button>

                </div>

            <?php } elseif ('catalog' == get_post_type()) { ?>

                <!-- play button group -->
                <div class="mobile-app-toggle play" data-mobile-app-toggle>

                    <div class="big-video-cover"></div>

                    <button data-toggle="coverOn" class="button is-active icon" onclick="jQuery('#video-header-hero').YTPUnmute()">
                        <?php get_template_part('template-parts/svg/icon-play', ''); ?>
                        <strong>Watch</strong>
                    </button>

                    <a class="button icon catalog-links-btn" href="#catalog_links" data-smooth-scroll data-animation-duration="700" data-offset="45">
                        <?php get_template_part('template-parts/svg/icon-cart', ''); ?>
                        <strong>Purchase</strong>
                    </a>

                </div>

                <!-- pause button group -->
                <div class="mobile-app-toggle pause" data-mobile-app-toggle>

                    <button class="clear button is-active icon" data-toggle="coverOn" onclick="jQuery('#video-header-hero').YTPMute()">
                        <?php get_template_part('template-parts/svg/icon-pause', ''); ?>
                        <strong>Pause</strong>
                    </button>

                    <a class="button icon catalog-links-btn" href="#catalog_links" data-smooth-scroll data-animation-duration="700" data-offset="45">
                        <?php get_template_part('template-parts/svg/icon-cart', ''); ?>
                        <strong>Purchase</strong>
                    </a>

                    <button class="button icon" data-open="catalog_modal" onclick="jQuery('#modal-video').YTPPlay(); jQuery('#video-header-hero').YTPPause();">
                        <?php get_template_part('template-parts/svg/icon-expand', ''); ?>
                        <strong>Full screen</strong>
                    </button>

                </div>

            <?php } else {
            }; ?>


        </div>

    </div>
    <div class="reveal large catalog-modal" id="catalog_modal" data-reveal data-append-to='#modal_container'>


        <div id="modalVideo" class="modal-video">

            <?php
            if ($videoHero) : ?>

                <!-- plugin docs: https://github.com/pupunzi/jquery.mb.YTPlayer/wiki#external-methods -->
                <div id="modal-video" class="player" data-property="{
                videoURL:'<?php echo $videoHero; ?>',
                containment:'#modalVideo', 
                coverImage:'<?php echo $profile_hero_lg; ?>', 
                mobileFallbackImage:'<?php echo $profile_hero_lg; ?>', 
                mute:false, 
                autoPlay: false,
                showControls:true, 
                optimizeDisplay:true,
                abundance: 0,
                loop:true, 
                showYTLogo:true, 
                stopMovieOnBlur:true }"></div>

            <?php endif; ?>

        </div>

        <button class="close-button" data-toggle="coverOn" data-close aria-label="Close modal" type="button" onclick="jQuery('#video-header-hero').YTPPlay().YTPMute(); jQuery('#modal-video').YTPPause();">
            <span aria-hidden="true">&times;</span>
        </button>

    </div>

    <?php
    // #modal_container contains the actual modal 
    ?>
    <div id="modal_container" data-toggle="coverOn" onclick="jQuery('#video-header-hero').YTPPlay().YTPMute(); jQuery('#modal-video').YTPPause();"></div>
</div>
<!-- END hero section || video -->