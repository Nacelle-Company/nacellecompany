<div class="orbit-slider slider-post news">
    <div class="orbit" role="region" aria-label="Latest Comedy Dynamics news" data-orbit data-options="" data-auto-play="false">
        <?php // data-auto-play="true" data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;"  
        ?>
        <?php // to stop slider: data-auto-play="false" 
        ?>
        <div class="fullscreen-image-slider">
            <div class="cell primary-title mt-1">
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
                <style>
                    .orbit-slider.news .orbit-caption {
                        position: relative !important;
                        background: transparent;
                        height: auto;
                        width: 75%;
                    }

                    @media print,
                    screen and (min-width: 40em) {
                        .orbit-slider.news .orbit-container {
                            display: flex;
                            align-items: center;
                        }

                        .orbit-slider.news .orbit-slide {
                            padding: 0 6rem;
                        }

                        .orbit-slider.news .orbit-caption {
                            width: 50%;
                            text-align: right;
                        }
                    }
                </style>
                <?php
                $args = array(
                    'numberposts'        => 3, // -1 is for all
                    'post_type'        => 'news', // or 'post', 'page'
                    'orderby'         => 'title', // or 'date', 'rand'
                    'order'         => 'DESC', // or 'DESC'
                );
                $myposts = get_posts($args);
                if ($myposts) :
                    foreach ($myposts as $mypost) :
                        $theTitle = get_the_title($mypost->ID);
                        $image = get_the_post_thumbnail($mypost->ID, 'large', array('title' => $theTitle, 'class' => 'orbit-image cell medium-auto', 'alt' => $theTitle));
                ?>

                        <li class="is-active orbit-slide">
                            <div class="grid-x align-middle">
                                <figcaption class="orbit-caption cell medium-6">
                                    <div class="orbit-caption-container">
                                        <?php echo '<a href="' . get_permalink($mypost->ID) . '">'; ?>
                                            <h3 class="subheader">
                                                <?php echo $theTitle; ?>
                                            </h3>
                                        <?php echo '</a>'; ?>
                                    </div>
                                </figcaption>
                                <?php echo '<a class="cell medium-6" href="' . get_permalink($mypost->ID) . '">'; ?>
                                    <?php echo $image; ?>
                                <?php echo '</a>'; ?>
                            </div>
                        </li>
                <?php
                    endforeach;
                    wp_reset_postdata();
                endif; ?>
        </div>
        </ul>
    </div>
</div>