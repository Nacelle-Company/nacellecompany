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
            <div id="video-header-hero" class="player" data-property="{videoURL:'<?php echo $videoHero; ?>',containment:'#big-video', coverImage:'<?php echo $profile_hero_lg; ?>', mobileFallbackImage:'<?php echo $profile_hero_lg; ?>', autoPlay:true, mute:true, opacity:1, showControls:false, optimize_display:true, loop:true, showYTLogo:false, stopMovieOnBlur:false }"></div>

        <?php endif; ?>

    </div>

    <div class="big-video-cover"></div>

    <div class="hero-section-text">

        <div class="cell medium-4">

            <!-- <button class="bounce hollow button success" data-open="heroModal">

                <i class="far fa-play-circle"></i>Watch Trailer

            </button> -->
            <button class="button hollow" onclick="jQuery('#video-header-hero').YTPUnmute()">play</button>
        </div>

    </div>

</div>
<!-- END hero section || video -->