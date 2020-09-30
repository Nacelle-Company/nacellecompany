<div class="grid-container news-gallery mt-4">
    <div class="grid-x grid-padding-x">
        <div class="cell">
            <h2 class="align-right">Latest News</h2>
        </div>
    </div>
    <div class="grid-x grid-margin-x">
        <div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
            <ul class="orbit-container">
                <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span> &#9664;&#xFE0E;</button>
                <button class="orbit-next"><span class="show-for-sr">Next Slide</span> &#9654;&#xFE0E;</button>
                <?php
                // Set the arguments for the query, https://blog.netgloo.com/2014/08/27/showing-a-list-of-custom-post-type-using-get_posts-loop-in-wordpress/
                $args = array(
                    'numberposts'        => -1, // -1 is for all
                    'post_type'        => 'news', // or 'post', 'page'
                    'orderby'         => 'title', // or 'date', 'rand'
                    'order'         => 'ASC', // or 'DESC'
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
                        $theImage = get_the_post_thumbnail($mypost->ID, 'featured-xlarge', array('title' => $theTitle));


                ?>

                        <li class="orbit-slide">
                            <div class="grid-x grid-padding-x">
                                <div class="cell large-auto">
                                    <?php echo $theImage; ?>
                                </div>
                                <div class="cell large-auto">
                                    <h3><?php echo $theTitle; ?></h3>
                                    <p>
                                        <a href="<?php the_field('link_to_article', $mypost->ID); ?>" class="read-more" target="_blank">Read More</a>
                                    </p>
                                </div>
                            </div>
                        </li>


                <?php endforeach;
                    wp_reset_postdata();
                endif; ?>

            </ul>
            <nav class="orbit-bullets">
                <button class="is-active" data-slide="0"><span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span></button>
                <button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
                <button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
            </nav>
        </div>
    </div>
</div>