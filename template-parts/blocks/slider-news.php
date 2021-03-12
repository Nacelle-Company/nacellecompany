<div class="carousel carousel-full carousel-full--news mb-4" data-flickity='{ "wrapAround": true, "adaptiveHeight": true, "pageDots": false, "cellSelector": ".carousel-cell" }'>
    <div class="cell primary-title p-1">
        <h2 class="entry-title mb-0">Latest News</h2>
    </div>
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
            $image = get_the_post_thumbnail($mypost->ID, 'large', array('title' => $theTitle, 'class' => 'flickity-image cell medium-auto', 'alt' => $theTitle));
    ?>

            <div class="carousel-cell">
                <div class="grid-x align-middle">
                    <figcaption class="cell medium-6 px-1">
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
            </div>
    <?php
        endforeach;
        wp_reset_postdata();
    endif; ?>
</div>