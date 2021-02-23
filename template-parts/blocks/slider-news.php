<div class="orbit-slider slider-post news">
    <div class="cell orbit" role="region" aria-label="Favorite Space Pictures" data-orbit data-auto-play="false" data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
        <div class="fullscreen-image-slider">
            <div class="cell grid-container primary-title mt-1">
                <h2 class="entry-title mb-0">Latest News</h2>
            </div>
            <ul class="orbit-container">
                <div class="orbit-controls">

                    <button class="orbit-previous">
                        <span class="show-for-sr">Previous Slide</span>
                        <?php get_template_part('template-parts/svg/icon-chevronLeft'); ?>
                    </button>
                    <button class="orbit-next">
                        <span class="show-for-sr">Next Slide</span>
                        <?php get_template_part('template-parts/svg/icon-chevronRight'); ?>
                    </button>

                </div>

                <?php
                // Set the arguments for the query, https://blog.netgloo.com/2014/08/27/showing-a-list-of-custom-post-type-using-get_posts-loop-in-wordpress/
                $args = array(
                    'numberposts'        => 3, // -1 is for all
                    'post_type'        => 'news', // or 'post', 'page'
                    'orderby'         => 'title', // or 'date', 'rand'
                    'order'         => 'DESC', // or 'DESC'
                    //'category' 		=> $category_id,
                    //'exclude'		=> get_the_ID()
                    // ...
                    // http://codex.wordpress.org/Template_Tags/get_posts#Usage
                );

                // Get the posts
                $myposts = get_posts($args);

                // If there are posts
                if ($myposts) :
                    // Loop the posts
                    foreach ($myposts as $mypost) :
                        $theTitle = get_the_title($mypost->ID);
                        // var_dump(get_intermediate_image_sizes());
                        $image = get_the_post_thumbnail($mypost->ID, 'full', array('title' => $theTitle, 'class' => 'orbit-image cell medium-6', 'alt' => $theTitle));
                ?>

                        <li class="is-active orbit-slide grid-x">
                            <figcaption class="orbit-caption cell medium-6 align-bottom">
                                <div class="orbit-caption-container">
                                    <?php // the_field('link_to_article', $mypost->ID); 
                                    ?>
                                    <?php echo '<a href="' . get_permalink($mypost->ID) . '">'; ?>

                                    <h3 class="subheader"><?php echo $theTitle; ?></h3>
                                    <?php echo '</a>'; ?>
                                </div>
                            </figcaption>

                            <?php echo $image; ?>

                        </li>
                        <style>
                            .orbit-slider.news .orbit-image {
                                width: 50%;
                            }

                            .orbit-slider.news .orbit-caption {
                                position: relative !important;
                                background: #ffbc00;
                                width: 50%;
                                height: auto;
                            }

                            .orbit-slider.news .orbit-caption h3 {
                                color: #2c2c2c;
                            }
                        </style>
                <?php
                    endforeach;
                    wp_reset_postdata();
                endif; ?>
        </div>
        </ul>
    </div>
</div>