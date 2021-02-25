<div class="orbit-slider slider-post press">
    <div class="cell orbit" role="region" aria-label="Latest Comedy Dynamics press releases" data-orbit data-auto-play="false" data-timer-delay="7000" data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
        <?php
        // to stop the slider 
        // data - options = "data-auto-play:false"
        ?>
        <div class="fullscreen-image-slider">
            <div class="cell primary-title mt-1">
                <h2 class="entry-title mb-0">Latest Press</h2>
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
                    'post_type'        => 'press_release', // or 'post', 'page'
                    'orderby'         => 'date', // or 'date', 'rand'
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
                        $image = '';
                        $wideImage = get_field('wide_image', $mypost->ID);
                        $alt = $wideImage['alt'];
                        if ($wideImage) {
                            $image = '<img src="' . $wideImage['url'] . '"' . ' ' . 'alt="' . $alt . '">';
                        } else {
                            $image = get_the_post_thumbnail($mypost->ID, 'large', array('title' => $theTitle, 'class' => 'orbit-image', 'alt' => $theTitle));
                        }
                ?>

                        <li class="is-active orbit-slide">
                            <?php echo '<a href="' . get_permalink($mypost->ID) . '">'; ?>
                                <?php echo $image; ?>
                            <figcaption class="orbit-caption grid-x align-bottom">
                                <div class="cell medium-12">
                                    <h3 class="subheader"><?php echo $theTitle; ?></h3>
                                </div>
                            </figcaption>
                            <?php echo '</a>'; ?>
                        </li>
                <?php
                    endforeach;
                    wp_reset_postdata();
                endif; ?>
        </div>
        </ul>
    </div>
</div>