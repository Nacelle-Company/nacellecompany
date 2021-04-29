<?php
$sliderSpeed = get_field('slider_speed');
$coverOpacity = get_field('cover_opacity');
?>

<div class="carousel carousel-full carousel-full--overlay" data-flickity='{ "imagesLoaded": true, "wrapAround": true }'>
  <!-- "autoPlay": "17000" -->
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

      $synopsisOG = get_field('synopsis');
      $content = get_the_content();

      $synopsis = wp_strip_all_tags($synopsisOG);
      $content = wp_strip_all_tags($content);

      $synopsis = substr($synopsis, 0, 200);
      $content = substr($content, 0, 200);

      $synopsisResult = substr($synopsis, 0, strrpos($synopsis, ' '));
      $contentResult = substr($content, 0, strrpos($content, ' '));

      // the permalink
      if (get_field('home_link_change')) {
        $thePermalink = get_field('home_link_change');
      } else $thePermalink = get_the_permalink();

      // get the images
      if (get_field('horizontal_image', false, false)) {
        $image_array = get_field('horizontal_image', false, false);
      } else {
        $image_array = get_field('square_image', false, false);
      }
      $size = 'medium'; // (thumbnail, medium, large, full or custom size)

      // get the background image
      if (get_field('use_home_image_for_background', false, false)) {
        $bk_image = get_field('home_image');
        $bk_image = $bk_image['url'];
      } else {
        $bk_image = get_field('horizontal_image');
        $bk_image = $bk_image['url'];
      }
  ?>
      <div class="carousel-cell" style="background-image:url('<?php echo $bk_image; ?>')">
        <a href="<?php echo $thePermalink; ?>">
          <figure>
            <figcaption class="grid-x align-bottom">
              <div class="cell large-6">
                <div class="flickity-image">
                  <?php echo wp_get_attachment_image($image_array, $size); ?>
                </div>
                <div class="flickity-synopsis">
                  <h3><?php echo $theTitle; ?></h3>
                  <?php if (!empty($synopsis)) : ?>
                    <?php echo '<div class="synopsis-container"><p>' . $synopsisResult . '</p></div>'; ?>
                  <?php elseif (get_the_excerpt()) : ?>
                    <?php the_excerpt(); ?>
                  <?php else : ?>
                    <?php the_content(); ?>
                  <?php endif; ?>
                </div>
              </div>
            </figcaption>
          </figure>
        </a>
      </div>
    <?php
    endforeach; ?>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
    ?>
  <?php endif; ?>
</div>