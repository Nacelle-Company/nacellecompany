<?php

$sliderSpeed = get_field('slider_speed');
$coverOpacity = get_field('cover_opacity');

?>
<div class="carousel carousel-main full-flickity" data-flickity='{ "cellAlign": "left", "contain": true, "adaptiveHeight": false, }'>

  <?php
  /*
    *  http://codex.wordpress.org/Template_Tags/get_posts#Reset_after_Postlists_with_offset
    */
  // $count = 0;
  $post_objects = get_field('home_feat_posts');
  if ($post_objects) :
    foreach ($post_objects as $post) :
      setup_postdata($post);
      $homeLinkChange = get_field('home_link_change');
      $featWidth = get_field('feat_width');

      $synopsisOG = get_field('synopsis');
      $content = get_the_content();

      $synopsis = wp_strip_all_tags($synopsisOG);
      $content = wp_strip_all_tags($content);

      $synopsis = substr($synopsis, 0, 200);
      $content = substr($content, 0, 200);

      $synopsisResult = substr($synopsis, 0, strrpos($synopsis, ' '));
      $contentResult = substr($content, 0, strrpos($content, ' '));

      $img_size_lg = 'fp-large';
      $img_size_md = 'fp-medium';
      $img_size_sm = 'medium';

      $imageHorizontal = get_field('horizontal_image');
      $imageSquare = get_field('square_image');
      $imageHome = get_field('home_image');

      if ($imageHorizontal) {
        $image = get_field('horizontal_image');
        $hero_image_alt = $imageHorizontal['alt']; /* Get image object alt */
      } elseif ($imageSquare) {
        $image = get_field('square_image');
        $hero_image_alt = $imageSquare['alt']; /* Get image object alt */
      } else {
      }

      /* Get custom sizes of our image sub_field */
      $hero_lg = $image['sizes'][$img_size_lg];
      $hero_md = $image['sizes'][$img_size_md];
      $hero_sm = $image['sizes'][$img_size_sm];

      // large background image
      if ($imageHome && get_field('use_home_image_for_background')) {
        $imageBackground = get_field('home_image');
        $hero_bg_image_alt = $imageBackground['alt'];
      } elseif ($imageHorizontal) {
        $imageBackground = get_field('horizontal_image');
        $hero_bg_image_alt = $imageBackground['alt']; /* Get image object alt */
      } elseif ($imageSquare) {
        $imageBackground = get_field('square_image');
        $hero_bg_image_alt = $imageBackground['alt']; /* Get image object alt */
      } else {
      }
      $hero_lg_background = $imageBackground['sizes'][$img_size_lg];
      $hero_md_background = $imageBackground['sizes'][$img_size_md];
      $hero_sm_background = $imageBackground['sizes'][$img_size_sm];

      // if ($count < 1) {
      //   $async = "async=of";
      // } else {
      //   $async = 'async=on';
      // }

  ?>
      <div class="carousel-cell">
        <figure>
          <img class="flickity-bg-image" data-interchange="[<?php echo $hero_sm_background; ?>, default], [<?php echo $hero_sm_background; ?>, small], [<?php echo $hero_md_background; ?>, medium], [<?php echo $hero_lg_background; ?>, large]" alt="<?php echo $hero_bg_image_alt; ?>" />
          <noscript><img src="<?php echo $hero_lg_background; ?>" alt="<?php echo $hero_bg_image_alt; ?>" /></noscript>
          <figcaption class="grid-x align-bottom">
            <div class="cell large-6">
              <div class="flickity-image">
                <a href="<?php if ($homeLinkChange) {
                            echo $homeLinkChange;
                          } else the_permalink(); ?>">
                  <img data-interchange="[<?php echo $hero_sm; ?>, default], [<?php echo $hero_sm; ?>, small]" alt="<?php echo $hero_image_alt; ?>" />
                  <noscript>
                    <img src="<?php echo $hero_sm; ?>" alt="<?php echo $hero_image_alt; ?>" />
                  </noscript>
                </a>
              </div>
              <div class="flickity-synopsis">
                <a href="<?php the_permalink(); ?>">
                  <h3><?php echo get_the_title(); ?></h3>
                </a>
                <a href="<?php the_permalink(); ?>">
                  <?php if (!empty($synopsis)) : ?>
                    <?php echo '<div class="synopsis-container"><p>' . $synopsisResult . '</p></div>'; ?>
                  <?php elseif (get_the_excerpt()) : ?>
                    <?php the_excerpt(); ?>
                  <?php else : ?>
                    <?php the_content(); ?>
                  <?php endif; ?>
                </a>
              </div>
            </div>
          </figcaption>
        </figure>
      </div>
    <?php //$count++;
    endforeach; ?>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
    ?>
  <?php endif; ?>
</div>

