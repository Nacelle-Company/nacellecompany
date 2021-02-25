<?php

// video links

$youTubeV = get_field('youtube_video');
$itunesV = get_field('itunes_video');
$googlePlayV = get_field('google_play_video');
$amazonV = get_field('amazon_video');
$steamV = get_field('steam_video');
$microsoftV = get_field('microsoft_video');
$vuduV = get_field('vudu_video');
$vimeoV = get_field('vimeo_video');
$netflixV = get_field('netflix_video');
$animalNationV = get_field('animal_nation_video');
$hooplaV = get_field('hoopla_video');
$tubiV = get_field('tubi_video');
$breakerV = get_field('breaker_video_link');
$huluV = get_field('hulu_video');
$epixV = get_field('epix_video');
$comcastV = get_field('comcast');
$redboxV = get_field('redbox');
$walmartV = get_field('walmart');
$targetV = get_field('target');
$fandangoV = get_field('fandango');
$mtv2V = get_field('mtv2_video');

?>

<?php if ($youTubeV) : ?>
    <div class="cell large-4 medium-12 small-12">

        <div class="solo-link">

            <a href="<?php echo $youTubeV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $youTubeV; ?>" target="_blank" rel="noreferrer">
                <p>
                    <strong>
                        <?php _e("YouTube", 'Nacelle'); ?>
                    </strong>
                </p>
            </a>

        </div>

    </div>
<?php endif; ?>

<?php if ($itunesV) : ?>
    <div class="cell large-4 medium-12 small-12">

        <div class="solo-link">

            <a href="<?php echo $itunesV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $itunesV; ?>" target="_blank" rel="noreferrer">
                <p>
                    <strong>
                        <?php _e("Apple TV", 'Nacelle'); ?>
                    </strong>
                </p>
            </a>

        </div>

    </div>

<?php endif; ?>

<?php if ($googlePlayV) : ?>
    <div class="cell large-4 medium-12 small-12">

        <div class="solo-link">

            <a href="<?php echo $googlePlayV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $googlePlayV; ?>" target="_blank" rel="noreferrer">
                <p>
                    <strong>
                        <?php _e("Google Play", 'Nacelle'); ?>
                    </strong>
                </p>
            </a>

        </div>

    </div>


<?php endif; ?>

<?php if ($amazonV) : ?>
    <div class="cell large-4 medium-12 small-12">

        <div class="solo-link">

            <a href="<?php echo $amazonV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $amazonV; ?>" target="_blank" rel="noreferrer">
                <p>
                    <strong>
                        <?php _e("Amazon", 'Nacelle'); ?>
                    </strong>
                </p>
            </a>

        </div>

    </div>

<?php endif; ?>

<?php if ($steamV) : ?>
    <div class="cell large-4 medium-12 small-12">

        <div class="solo-link">

            <a href="<?php echo $steamV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $steamV; ?>" target="_blank" rel="noreferrer">
                <p>
                    <strong>
                        <?php _e("Steam", 'Nacelle'); ?>
                    </strong>
                </p>
            </a>

        </div>

    </div>

<?php endif; ?>

<?php if ($microsoftV) : ?>
    <div class="cell large-4 medium-12 small-12">

        <div class="solo-link">

            <a href="<?php echo $microsoftV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $microsoftV; ?>" target="_blank" rel="noreferrer">
                <p>
                    <strong>
                        <?php _e("Microsoft", 'Nacelle'); ?>
                    </strong>
                </p>
            </a>

        </div>

    </div>

<?php endif; ?>

<?php if ($vuduV) : ?>
    <div class="cell large-4 medium-12 small-12">

        <div class="solo-link">

            <a href="<?php echo $vuduV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $vuduV; ?>" target="_blank" rel="noreferrer">
                <p>
                    <strong>
                        <?php _e("Vudu", 'Nacelle'); ?>
                    </strong>
                </p>
            </a>

        </div>

    </div>
<?php endif; ?>

<?php if ($vimeoV) : ?>
    <div class="cell large-4 medium-12 small-12">

        <div class="solo-link">

            <a href="<?php echo $vimeoV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $vimeoV; ?>" target="_blank" rel="noreferrer">
                <p>
                    <strong>
                        <?php _e("Vimeo", 'Nacelle'); ?>
                    </strong>
                </p>
            </a>

        </div>

    </div>
<?php endif; ?>

<?php if ($netflixV) : ?>
    <div class="cell large-4 medium-12 small-12">

        <div class="solo-link">

            <a href="<?php echo $netflixV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $netflixV; ?>" target="_blank" rel="noreferrer">
                <p>
                    <strong>
                        <?php _e("Netflix", 'Nacelle'); ?>
                    </strong>
                </p>
            </a>

        </div>

    </div>
<?php endif; ?>

<?php if ($animalNationV) : ?>
    <div class="cell large-4 medium-12 small-12">

        <div class="solo-link">

            <a href="<?php echo $animalNationV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $animalNationV; ?>" target="_blank" rel="noreferrer">
                <p>
                    <strong>
                        <?php _e("Animal Nation", 'Nacelle'); ?>
                    </strong>
                </p>
            </a>

        </div>

    </div>
<?php endif; ?>

<?php if ($breakerV) : ?>
    <div class="cell large-4 medium-12 small-12">

        <div class="solo-link">

            <a href="<?php echo $breakerV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $breakerV; ?>" target="_blank" rel="noreferrer">
                <p>
                    <strong>
                        <?php _e("Breaker", 'Nacelle'); ?>
                    </strong>
                </p>
            </a>

        </div>

    </div>
<?php endif; ?>

<?php if ($huluV) : ?>
    <div class="cell large-4 medium-12 small-12">

        <div class="solo-link">

            <a href="<?php echo $huluV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $huluV; ?>" target="_blank" rel="noreferrer">
                <p>
                    <strong>
                        <?php _e("HULU", 'Nacelle'); ?>
                    </strong>
                </p>
            </a>

        </div>

    </div>
<?php endif; ?>

<?php if ($epixV) : ?>
    <div class="cell large-4 medium-12 small-12">

        <div class="solo-link">

            <a href="<?php echo $epixV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $epixV; ?>" target="_blank" rel="noreferrer">
                <p>
                    <strong>
                        <?php _e("EPIX", 'Nacelle'); ?>
                    </strong>
                </p>
            </a>

        </div>

    </div>
<?php endif; ?>

<?php if ($comcastV) : ?>
    <div class="cell large-4 medium-12 small-12">

        <div class="solo-link">

            <a href="<?php echo $comcastV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $comcastV; ?>" target="_blank" rel="noreferrer">
                <p>
                    <strong>
                        <?php _e("Comcast", 'Nacelle'); ?>
                    </strong>
                </p>
            </a>

        </div>

    </div>
<?php endif; ?>

<?php if ($redboxV) : ?>
    <div class="cell large-4 medium-12 small-12">

        <div class="solo-link">

            <a href="<?php echo $redboxV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $redboxV; ?>" target="_blank" rel="noreferrer">
                <p>
                    <strong>
                        <?php _e("Redbox", 'Nacelle'); ?>
                    </strong>
                </p>
            </a>

        </div>

    </div>
<?php endif; ?>

<?php if ($walmartV) : ?>
    <div class="cell large-4 medium-12 small-12">

        <div class="solo-link">

            <a href="<?php echo $walmartV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $walmartV; ?>" target="_blank" rel="noreferrer">
                <p>
                    <strong>
                        <?php _e("Walmart", 'Nacelle'); ?>
                    </strong>
                </p>
            </a>

        </div>

    </div>
<?php endif; ?>

<?php if ($targetV) : ?>
    <div class="cell large-4 medium-12 small-12">

        <div class="solo-link">

            <a href="<?php echo $targetV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $targetV; ?>" target="_blank" rel="noreferrer">
                <p>
                    <strong>
                        <?php _e("Target", 'Nacelle'); ?>
                    </strong>
                </p>
            </a>

        </div>

    </div>
<?php endif; ?>

<?php if ($fandangoV) : ?>
    <div class="cell large-4 medium-12 small-12">

        <div class="solo-link">

            <a href="<?php echo $fandangoV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $fandangoV; ?>" target="_blank" rel="noreferrer">
                <p>
                    <strong>
                        <?php _e("Fandango", 'Nacelle'); ?>
                    </strong>
                </p>
            </a>

        </div>

    </div>
<?php endif; ?>

<?php if ($hooplaV) : ?>
    <div class="cell large-4 medium-12 small-12">

        <div class="solo-link">

            <a href="<?php echo $hooplaV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $hooplaV; ?>" target="_blank" rel="noreferrer">
                <p>
                    <strong>
                        <?php _e("Hoopla", 'Nacelle'); ?>
                    </strong>
                </p>
            </a>

        </div>

    </div>
<?php endif; ?>

<?php if ($mtv2V) : ?>
    <div class="cell large-4 medium-12 small-12">

        <div class="solo-link">

            <a href="<?php echo $mtv2V; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $mtv2V; ?>" target="_blank" rel="noreferrer">
                <p>
                    <strong>
                        <?php _e("MTV2", 'Nacelle'); ?>
                    </strong>
                </p>
            </a>

        </div>

    </div>
<?php endif; ?>

<?php if ($tubiV) : ?>
    <div class="cell large-4 medium-12 small-12">

        <div class="solo-link">

            <a href="<?php echo $tubiV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $tubiV; ?>" target="_blank" rel="noreferrer">
                <p>
                    <strong>
                        <?php _e("Tubi", 'Nacelle'); ?>
                    </strong>
                </p>
            </a>

        </div>

    </div>
<?php endif; ?>

<?php // END Video Icons ?>

<?php // custom VIDEO link ?>
<?php
// Check rows exists.
if (have_rows('new_link')) :

    // Loop through rows.
    while (have_rows('new_link')) : the_row();

        // Load sub field value.
        $linkTitle = get_sub_field('link_title');
        $linkURL = get_sub_field('link_url');
?>
        <?php if (!empty($linkTitle)) : ?>

            <div class="cell large-4 medium-12 small-12">

                <div class="solo-link">

                    <a href="<?php echo $linkURL; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $linkTitle; ?>" target="_blank" rel="noreferrer">
                        <p>
                            <strong>
                                <?php echo $linkTitle; ?>
                            </strong>
                        </p>
                    </a>

                </div>

            </div>
<?php endif;
    // End loop.
    endwhile;
// No value.
else :
// Do something...
endif;
?>
<?php // END custom VIDEO link ?>
