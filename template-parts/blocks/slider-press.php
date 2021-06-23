<div class="carousel carousel-full carousel-full--press" data-flickity='{ "wrapAround": true, "adaptiveHeight": true, "pageDots": false, "cellSelector": ".carousel-cell" }'>
    <div class="cell primary-title p-1">
        <h2 class="entry-title mb-0"><span class="hide">Comedy </span>Latest Press</h2>
    </div>
    <?php
    $image = '';
    $args = array(
        'numberposts'        => 3, // -1 is for all
        'post_type'        => 'press_release', // or 'post', 'page'
        'orderby'         => 'date', // or 'date', 'rand'
        'order'         => 'DESC', // or 'DESC'
    );
    $myposts = get_posts($args);
    if ($myposts) :
        foreach ($myposts as $mypost) :
            $theTitle = get_the_title($mypost->ID);
            $wideImage = get_field('wide_image', $mypost->ID);
            $alt = $wideImage['alt'];
            if ($wideImage) {
                $image = '<img src="' . $wideImage['url'] . '"' . ' ' . 'alt="' . $alt . '">';
            } else {
                $image = get_the_post_thumbnail($mypost->ID, 'large', array('title' => $theTitle, 'class' => 'orbit-image', 'alt' => $theTitle));
            }
    ?>
            <div class="carousel-cell">
                <?php echo '<a href="' . get_permalink($mypost->ID) . '">'; ?>
                <?php echo $image; ?>
                <figcaption class="grid-x align-bottom px-1">
                    <div class="cell medium-12">
                        <h3 class="subheader"><?php echo $theTitle; ?></h3>
                    </div>
                </figcaption>
                <?php echo '</a>'; ?>
            </div>
    <?php
        endforeach;
        wp_reset_postdata();
    endif; ?>
</div>