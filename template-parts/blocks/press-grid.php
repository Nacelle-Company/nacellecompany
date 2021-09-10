<?php
/*
 * Hover effects: https://codepen.io/andrewsims/pen/mQoYwz
 */
?>
<div class="grid-container fluid post-grid" id="press">
  <div class="cell primary-title p-1">
    <h2 class="entry-title mb-0"><span class="hide">Comedy </span>Latest Press</h2>
  </div>
  <div class="grid-container py-3">
    <div class="grid-x grid-margin-x grid-padding-y small-up-1 medium-up-2">
      <?php

      $image = '';
      $args = array(
        'numberposts'        => 6, // -1 is for all
        'post_type'        => 'press_release', // or 'post', 'page'
        'orderby'         => 'date', // or 'date', 'rand'
        'order'         => 'DESC', // or 'DESC'
      );
      $myposts = get_posts($args);
      if ($myposts) :
        foreach ($myposts as $mypost) :
          $theTitle = get_the_title($mypost->ID);
          $time = get_the_time('F j, Y', $mypost->ID);
          $timeShort = get_the_time('o-m-j', $mypost->ID);
          $image = get_field('wide_image', $mypost->ID);

          // get the images
          if (get_field('wide_image', $mypost->ID, false)) {
            $image_array = get_field('wide_image', $mypost->ID, false);
          }
          $size = 'medium'; // (thumbnail, medium, large, full or custom size)
      ?>
          <div class="cell media-object stack-for-small">
            <div class="media-object-section">
              <?php echo '<a href="' . get_permalink($mypost->ID) . '">'; ?>
              <?php $image = get_the_post_thumbnail($mypost->ID, 'medium', array('title' => $theTitle, 'alt' => $theTitle));
              echo $image; ?>
              <?php echo '</a>'; ?>
            </div>
            <div class="media-object-section">
              <time datetime="<?php echo $timeShort; ?>">
                <?php
                echo $time; ?>
              </time>
              <?php echo '<a href="' . get_permalink($mypost->ID) . '">'; ?>
              <p class="lead"><?php echo $theTitle; ?></p>
              <?php echo '</a>'; ?>
              <p>
                <?php
                $trim_length = 15;  //desired length of text to display
                $value_more = '. . .'; // what to add at the end of the trimmed text
                $custom_field = 'intro';
                $value = get_field('intro', $mypost->ID);
                if ($value) {
                  echo wp_trim_words($value, $trim_length, $value_more);
                }
                ?>
              </p>
            </div>
            <a class="go-corner" href="<?php echo get_permalink($mypost->ID); ?>">
              <div class="go-arrow">
                →
              </div>
            </a>
          </div>
      <?php
        endforeach;
        wp_reset_postdata();
      endif; ?>
    </div>
  </div>
</div>