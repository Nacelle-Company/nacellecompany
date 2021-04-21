<?php

if (have_rows('featured_posts')) :

    $count = '';

    while (have_rows('featured_posts')) : the_row();
        $count++;

        $featured_projects = get_sub_field('featured_projects');

        if ($featured_projects) :

            $permalink = get_permalink($featured_projects->ID);
            $homeImage = get_post_meta($featured_projects->ID, 'home_image', true);
            if (!empty($homeImage)) {
                $featured_img_url = esc_url($homeImage['url']);
            } else {
                $featured_img_url = get_the_post_thumbnail_url($featured_projects->ID, 'full');
            }
            $title = esc_html($featured_projects->post_title);

            // $video = get_field('video_embedd', $featured_projects->ID);
            $video = get_post_meta($featured_projects->ID, 'video_embedd', true);
            // $image = get_post_thumbnail('medium', $featured_projects->ID);
            $mask_url = get_template_directory_uri() . '/template-parts/svg/icon-mask.svg';

?>
            <div class="cell" id="full_hero_video">

                <div class="grid-y full-hero-video">

                    <div id="videoHeroContainment-<?php echo $count; ?>" class="cell">

                        <div id="big-video" class="big-video">

                            <?php // plugin docs: https://github.com/pupunzi/jquery.mb.YTPlayer/wiki#external-methods 
                            ?>
                            <div id="fullHeroVideo-<?php echo $count; ?>" class="player" onclick="jQuery('#fullHeroVideo-<?php echo $count; ?>').YTPUnmute()" data-property="{videoURL:'<?php echo $video; ?>', containment:'self', coverImage:'<?php echo $featured_img_url; ?>', useOnMobile:false, autoPlay:true, mute:true, mask: '<?php echo $mask_url; ?>',showControls:false, optimize_display:true, loop:true, showYTLogo:false, stopMovieOnBlur:true,playOnlyIfVisible:true, startAt:<?php echo get_post_meta(get_the_ID(), 'start_video_at', true); ?> }">


                                <!-- <div class="cell"> -->
                                <div class="grid-x flex-container flex-dir-column full-hero-video--content pl-medium-2 pb-medium-2 mt-2">

                                    <div class="cell small-8 small-offset-2 medium-9 medium-offset-0 large-6">
                                        <div class="media-object align-bottom stack-for-small">
                                            <div class="media-object-section">
                                                <div class="thumbnail">
                                                    <a href="<?php echo $permalink; ?>">
                                                        <?php echo get_the_post_thumbnail($featured_projects->ID, array(300, 300), false); ?>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="media-object-section">
                                                <p class="mb-0">
                                                    <?php
                                                    // Returns Array of Term Names for "my_taxonomy".
                                                    $term_list = wp_get_post_terms($featured_projects->ID, 'category', array('fields' => 'names'));
                                                    $term_list = substr($term_list[1], 0);
                                                    echo 'Featured ' . $term_list;
                                                    ?>
                                                </p>
                                                <a href="<?php echo $permalink; ?>">
                                                    <h2><?php echo $title; ?></h2>
                                                </a>
                                                <p class="synopsis">
                                                    <?php 
                                                    $summary = get_post_meta($featured_projects->ID, 'synopsis', true);
                                                    echo $summary; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- </div> -->

                            </div>
                            <?php get_template_part('template-parts/blocks/scroll-down-arrow'); ?>

                        </div>

                    </div>

                </div>

            </div>

            <script>
                jQuery(function() {
                    jQuery("#fullHeroVideo-<?php echo $count; ?>").YTPlayer();
                });
            </script>

<?php endif;

    // Do something...
    endwhile;

else :
// no rows found
endif;
