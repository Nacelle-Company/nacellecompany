<?php
// get term
$term = get_queried_object();

$startHeroVidAt = get_field('start_hero_video');
$endHeroVidAt = get_field('end_hero_video');
$mainTalent = is_tax('main_talent', $term);
$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
$videoHero = get_field('video_embedd');
$talentVideo = get_field('main_talent_hero_video');


if ($mainTalent == 'main_talent') {
    $videoAbundance = '0';
} else {
    $videoAbundance = '0.3';
}
// $selectedHeroVideoCategory = get_field('selected_hero_video_category', $term);
// echo $selectedHeroVideoCategory;
?>
<?php
$genre = 'stand-up';
$artistName = $term->slug;

$recent_args = array(
    'post_type'         => 'catalog',
    // 'category_name'     => $selectedHeroVideoCategory,
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
$query = new WP_Query($recent_args);

if ($query->have_posts()) :

    while ($query->have_posts()) :

        $query->the_post();

        /*
         * check if a specific video has been set 
         * in the main talent taxonomy page for the artist
         * if so, set the $videoHero variable to that video.
         */
        if (get_field('main_talent_hero_video', $term)) {
            $videoHero = get_field('main_talent_hero_video', $term);
        }

    endwhile;

endif;
?>

<div class="catalog-hero hero-section">

    <div id="big-video">

        <!-- plugin docs: https://github.com/pupunzi/jquery.mb.YTPlayer/wiki#external-methods -->
        <div id="video-header-hero" class="player" data-property="{
            videoURL:'<?php echo $videoHero; ?>',
            containment:'self', 
            coverImage:'<?php echo $profile_hero_lg; ?>', 
            mobileFallbackImage:'<?php echo $profile_hero_lg; ?>', 
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

            <?php if ($mainTalent == 'main_talent') { ?>

                <!-- play button group -->
                <div class="mobile-app-toggle play" data-mobile-app-toggle>

                    <div class="hero-text">
                        <h1><span class="subheader">The</span> <?php echo $term->name; ?> <span class="subheader">Archive</span></h1>

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