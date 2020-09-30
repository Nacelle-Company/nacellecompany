<?php
// $term = get_queried_object();
// hero video
$videoHero = get_field('hero_video');
$startHeroVidAt = get_field('start_hero_video');
$endHeroVidAt = get_field('end_hero_video');
?>
<div class="hero-section">

    <div id="big-video">

        <?php
        if ($videoHero) : ?>

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
                showYTLogo:false,
                abundance: 0.3,
                loop:true, 
                showYTLogo:false, 
                stopMovieOnBlur:true,
                playOnlyIfVisible:true }"></div>

        <?php endif; ?>

    </div>

    <div class="hero-section-text cover-on" id="coverOn" data-toggler=".cover-on">

        <div class="cell medium-4">


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

        </div>

    </div>

</div>
<!-- END hero section || video -->

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
                showYTLogo:false, 
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