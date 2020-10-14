<?php

if (have_rows('featured_posts')) :

    $count = '';

    while (have_rows('featured_posts')) : the_row();
        $count++;

        $featured_projects = get_sub_field('featured_projects');

        if ($featured_projects) :

            $permalink = get_permalink($featured_projects->ID);
            $title = esc_html($featured_projects->post_title);

            $video = get_field('video_embedd', $featured_projects->ID);
            // $image = get_post_thumbnail('medium', $featured_projects->ID);
            $mask_url = get_template_directory_uri() . '/template-parts/svg/icon-mask.svg';

?>

            <div class="grid-x grid-frame">

                <div id="videoHeroContainment-<?php echo $count; ?>" class="cell">

                    <div id="big-video">

                        <?php // plugin docs: https://github.com/pupunzi/jquery.mb.YTPlayer/wiki#external-methods 
                        ?>
                        <div id="fullHeroVideo-<?php echo $count; ?>" class="player grid-x align-bottom grid-padding-x grid-padding-y" onclick="jQuery('#fullHeroVideo-<?php echo $count; ?>').YTPUnmute()" data-property="{
                                    videoURL:'<?php echo $video; ?>', 
                                    containment:'self', 
                                    coverImage:'<?php echo $image; ?>', 
                                    mobileFallbackImage:'<?php echo $image; ?>', 
                                    autoPlay:true, 
                                    mute:true, 
                                    mask: '<?php echo $mask_url; ?>',
                                    showControls:false, 
                                    optimize_display:true, 
                                    loop:true, 
                                    showYTLogo:false, 
                                    stopMovieOnBlur:true,
                                    playOnlyIfVisible:true }">
                            <div class="cell align-self-bottom">

                                <a href="<?php echo $permalink; ?>">



                                    <div class="media-object">
                                        <div class="media-object-section">
                                            <div class="thumbnail">
                                                <?php echo get_the_post_thumbnail($featured_projects->ID, array(300, 300), false); ?>
                                            </div>
                                        </div>
                                        <div class="media-object-section">
                                            <h2><?php echo $title; ?></h2>
                                            <?php
                                            // Returns Array of Term Names for "my_taxonomy".
                                            $term_list = wp_get_post_terms($featured_projects->ID, 'category', array('fields' => 'names'));
                                            $term_list = substr($term_list[1], 0, -1);
                                            echo 'Featured ' . $term_list;
                                            ?>
                                        </div>
                                    </div>
                                    <?php get_template_part('template-parts/blocks/scroll-down-arrow'); ?>

                                </a>

                            </div>

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
