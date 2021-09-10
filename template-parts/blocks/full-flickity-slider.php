<?php
$sliderSpeed = get_field('slider_speed');
?>
<div class="carousel carousel-full carousel-full--overlay" data-flickity='{ "imagesLoaded": true, "wrapAround": true,"bgLazyLoad": true, "autoPlay":<?php echo $sliderSpeed; ?>000 }'>
  <?php
  /*
    *  http://codex.wordpress.org/Template_Tags/get_posts#Reset_after_Postlists_with_offset
    */
  $post_objects = get_field('home_feat_posts');
  if ($post_objects) :
    foreach ($post_objects as $post) :
      setup_postdata($post);
      $theTitle = get_the_title();
      $featWidth = get_field('feat_width');
      if (get_post_type(get_the_ID()) == 'catalog') {
        $synopsisOG = get_field('synopsis');
        $giveaway = false;
      } else {
        $giveaway = true;
        $rows = get_post_meta(get_the_ID(), 'layouts', true);
        foreach ((array) $rows as $count => $row) {
          switch ($row) {
            case 'img_txt':
              $synopsisOG = get_post_meta(get_the_ID(), 'layouts_' . $count . '_txt', true);
              $img = get_post_meta(get_the_ID(), 'layouts_' . $count . '_img', true);
              $giveawayButtonURL = get_post_meta(get_the_ID(), 'layouts_' . $count . '_btn_url', true);
              $giveawayButtonTxt = get_post_meta(get_the_ID(), 'layouts_' . $count . '_btn_txt', true);
              $btn_color = get_post_meta(get_the_ID(), 'layouts_' . $count . '_btn_color', true);
              break;
          }
        }
      }
      if ($giveaway === true) {
        $carouselCell = 'flex-container align-bottom';
        $figcaptionRelativeStyle = 'style="position: relative;bottom: unset;justify-content: center;height: 100%;align-items: center;"';
        $flickityContainer = 'grid-x align-bottom grid-padding-x align-middle align-center p3 py-large-3 ';
        $flickityItem = 'cell medium-6 large-5';
        $cellStyle = 'style="background: #000000cc;"';
        $btn_color = 'style="background:' . $btn_color . ';color:black;"';
        $giveawayButton = '<a class="button large" href="' . $giveawayButtonURL . '"' . $btn_color . '>' . $giveawayButtonTxt . '</a>';
        $thePermalink = $giveawayButtonURL;
      } else {
        $carouselCell = '';
        $figcaptionRelativeStyle = '';
        $flickityContainer = 'cell large-6';
        $cellStyle = '';
        $giveawayButtonURL = '';
        $giveawayButtonTxt = '';
        $btn_color = '';
        $btn_color = '';
        $giveawayButton = '';
        // the permalink
        if (get_field('home_link_change')) {
          $thePermalink = get_field('home_link_change');
        } else {
          $thePermalink = get_the_permalink();
        }
      }
      $content = get_the_content();
      $synopsis = wp_strip_all_tags($synopsisOG);
      $content = wp_strip_all_tags($content);
      $synopsis = substr($synopsis, 0, 200);
      $content = substr($content, 0, 200);
      $synopsisResult = substr($synopsis, 0, strrpos($synopsis, ' '));
      $contentResult = substr($content, 0, strrpos($content, ' '));

      // get the images
      if (get_field('horizontal_image', false, false)) {
        $image_array = get_field('horizontal_image', false, false);
      } else {
        $image_array = get_field('square_image', false, false);
      }
      $size = 'medium'; // (thumbnail, medium, large, full or custom size)
      // get the background image
      // if (!wp_is_mobile()) {
      if (get_field('use_home_image_for_background', false, false)) {
        $bk_image = get_field('home_image');
        $bk_image = $bk_image['url'];
      } else {
        if (get_post_type(get_the_ID()) == 'catalog') {
          $bk_image = get_field('horizontal_image');
          $bk_image = $bk_image['url'];
        } else {
          $bk_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
        }
      }
      // }
  ?>
      <div class="carousel-cell <?php echo $carouselCell; ?>" data-flickity-bg-lazyload="<?php echo $bk_image; ?>">

        <figure>
          <figcaption class="grid-x align-bottom" <?php echo $figcaptionRelativeStyle; ?>>
            <div class="<?php echo $flickityContainer; ?> fadeIn" <?php echo $cellStyle; ?>>
              <div class="flickity-image <?php echo $flickityItem; ?>">
                <a href="<?php echo $thePermalink; ?>">
                  <?php
                  if (get_post_type(get_the_ID()) == 'catalog') {
                    echo wp_get_attachment_image($image_array, $size);
                  } else {
                    echo wp_get_attachment_image($img, 'large');
                  }
                  ?>
                </a>
              </div>
              <div class="flickity-synopsis <?php echo $flickityItem; ?>">
                <?php echo $giveawayButton; ?>
                <h3><?php echo $theTitle; ?></h3>
                <?php if (!empty($synopsis)) : ?>
                  <?php echo '<div class="synopsis-container"><p>' . $synopsisResult . '</p></div>'; ?>
                <?php elseif (get_the_excerpt()) : ?>
                  <?php the_excerpt(); ?>
                <?php else : ?>
                  <?php echo the_content(); ?>
                <?php endif; ?>
              </div>
            </div>
          </figcaption>
        </figure>
      </div>
    <?php
    endforeach; ?>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
    ?>
  <?php endif; ?>
</div>