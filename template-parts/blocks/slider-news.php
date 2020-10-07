<div class="orbit-slider slider-post news">
    <div class="cell orbit" role="region" aria-label="Favorite Space Pictures" data-orbit data-auto-play="true" data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
        <div class="fullscreen-image-slider">
            <div class="cell grid-container title mt-1">
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
                        $image = get_the_post_thumbnail($mypost->ID, 'large', array('title' => $theTitle, 'class' => 'orbit-image', 'alt' => $theTitle));
                ?>

                        <li class="is-active orbit-slide">
                            <?php echo $image; ?>
                            <figcaption class="orbit-caption grid-x align-bottom">

                                <div class="cell medium-6 medium-offset-6">

                                    <time datetime="<?php $post_date_init = get_the_date('Y-m-d', $mypost->ID);
                                                    echo $post_date_init; ?>"><?php $post_date = get_the_date('M j, Y', $mypost->ID);
                                                                                echo $post_date; ?></time>

                                    <p>
                                        <a href="<?php the_field('link_to_article', $mypost->ID); ?>" class="read-more" target="_blank">Read More</a>
                                    </p>

                                    <?php echo '<a href="' . get_permalink($mypost->ID) . '">'; ?>
                                    <h3 class="subheader"><?php echo $theTitle; ?></h3>
                                    <?php echo '</a>'; ?>

                                </div>
                            </figcaption>
                        </li>

                <?php
                    endforeach;
                    wp_reset_postdata();
                endif; ?>
        </div>
        </ul>
    </div>
</div>