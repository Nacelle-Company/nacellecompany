<?php
// audio links
$itunesA = get_field('itunes_audio');
$googlePlayA = get_field('google_play_audio');
$youTubeA = get_field('you_tube_audio');
$amazonA = get_field('amazon_audio');
$spotifyA = get_field('spotify_audio');
$pandoraA = get_field('pandora_audio');
$walmartA = get_field('walmart_audio');
$targetA = get_field('target_audio');
$fandangoA = get_field('fandango_audio');
$customA = get_field('custom_audio');
$customAtitle = get_field('custom_audio_title');
?>

<?php if ($itunesA) : ?>
    <div class="cell large-4 medium-12 small-12">

        <div class="solo-link">

            <a href="<?php echo $itunesA; ?>" class="catalog-title button hollow expanded" rel="bookmark" title="Watch <?php the_title_attribute(); ?> on <?php echo $itunesA; ?>" target="_blank" rel="noreferrer">
                <p>
                    <strong>
                        <?php _e("iTunes", 'Nacelle'); ?>
                    </strong>
                </p>
            </a>

        </div>

    </div>
<?php endif; ?>

<?php if ($googlePlayA) : ?>
    <div class="cell large-4 medium-12 small-12">

        <div class="solo-link">

            <a href="<?php echo $googlePlayA; ?>" class="catalog-title button hollow expanded" rel="bookmark" title="Watch <?php the_title_attribute(); ?> on <?php echo $googlePlayA; ?>" target="_blank" rel="noreferrer">
                <p>
                    <strong>
                        <?php _e("Google Play", 'Nacelle'); ?>
                    </strong>
                </p>
            </a>

        </div>

    </div>

<?php endif; ?>

<?php if ($youTubeA) : ?>
    <div class="cell large-4 medium-12 small-12">

        <div class="solo-link">

            <a href="<?php echo $youTubeA; ?>" class="catalog-title button hollow expanded" rel="bookmark" title="Watch <?php the_title_attribute(); ?> on <?php echo $youTubeA; ?>" target="_blank" rel="noreferrer">
                <p>
                    <strong>
                        <?php _e("YouTube Music", 'Nacelle'); ?>
                    </strong>
                </p>
            </a>

        </div>

    </div>


<?php endif; ?>

<?php if ($amazonA) : ?>
    <div class="cell large-4 medium-12 small-12">

        <div class="solo-link">

            <a href="<?php echo $amazonA; ?>" class="catalog-title button hollow expanded" rel="bookmark" title="Watch <?php the_title_attribute(); ?> on <?php echo $amazonA; ?>" target="_blank" rel="noreferrer">
                <p>
                    <strong>
                        <?php _e("Amazon", 'Nacelle'); ?>
                    </strong>
                </p>
            </a>

        </div>

    </div>

<?php endif; ?>

<?php if ($spotifyA) : ?>
    <div class="cell large-4 medium-12 small-12">

        <div class="solo-link">

            <a href="<?php echo $spotifyA; ?>" class="catalog-title button hollow expanded" rel="bookmark" title="Watch <?php the_title_attribute(); ?> on <?php echo $spotifyA; ?>" target="_blank" rel="noreferrer">
                <p>
                    <strong>
                        <?php _e("Spotify", 'Nacelle'); ?>
                    </strong>
                </p>
            </a>

        </div>

    </div>

<?php endif; ?>

<?php if ($pandoraA) : ?>
    <div class="cell large-4 medium-12 small-12">

        <div class="solo-link">

            <a href="<?php echo $pandoraA; ?>" class="catalog-title button hollow expanded" rel="bookmark" title="Watch <?php the_title_attribute(); ?> on <?php echo $pandoraA; ?>" target="_blank" rel="noreferrer">
                <p>
                    <strong>
                        <?php _e("Pandora", 'Nacelle'); ?>
                    </strong>
                </p>
            </a>

        </div>

    </div>

<?php endif; ?>

<?php if ($walmartA) : ?>
    <div class="cell large-4 medium-12 small-12">

        <div class="solo-link">

            <a href="<?php echo $walmartA; ?>" class="catalog-title button hollow expanded" rel="bookmark" title="Watch <?php the_title_attribute(); ?> on <?php echo $walmartA; ?>" target="_blank" rel="noreferrer">
                <p>
                    <strong>
                        <?php _e("Walmart", 'Nacelle'); ?>
                    </strong>
                </p>
            </a>

        </div>

    </div>
<?php endif; ?>

<?php if ($targetA) : ?>
    <div class="cell large-4 medium-12 small-12">

        <div class="solo-link">

            <a href="<?php echo $targetA; ?>" class="catalog-title button hollow expanded" rel="bookmark" title="Watch <?php the_title_attribute(); ?> on <?php echo $targetA; ?>" target="_blank" rel="noreferrer">
                <p>
                    <strong>
                        <?php _e("Target", 'Nacelle'); ?>
                    </strong>
                </p>
            </a>

        </div>

    </div>
<?php endif; ?>

<?php if ($fandangoA) : ?>
    <div class="cell large-4 medium-12 small-12">

        <div class="solo-link">

            <a href="<?php echo $fandangoA; ?>" class="catalog-title button hollow expanded" rel="bookmark" title="Watch <?php the_title_attribute(); ?> on <?php echo $fandangoA; ?>" target="_blank" rel="noreferrer">
                <p>
                    <strong>
                        <?php _e("Fandango", 'Nacelle'); ?>
                    </strong>
                </p>
            </a>

        </div>

    </div>
<?php endif; ?>

<?php // END Audio Icons ?>

<?php // custom AUDIO link ?>
<?php
// Check rows exists.
if (have_rows('new_audio_link')) :

    // Loop through rows.
    while (have_rows('new_audio_link')) : the_row();

        // Load sub field value.
        $audioLinkTitle = get_sub_field('audio_link_title');
        $audioLinkURL = get_sub_field('audio_link_url');
?>
        <?php if (!empty($audioLinkTitle)) : ?>

            <div class="cell large-4 medium-12 small-12">

                <div class="solo-link">

                    <a href="<?php echo $audioLinkURL; ?>" class="catalog-title button hollow expanded" rel="bookmark" title="Watch <?php the_title_attribute(); ?> on <?php echo $audioLinkTitle; ?>" target="_blank" rel="noreferrer">
                        <p>
                            <strong>
                                <?php echo $audioLinkTitle; ?>
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
<?php // END custom AUDIO link ?>
