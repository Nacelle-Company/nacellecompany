<?php

/**
 * The Circle Flickity Slider
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */
?>
<div class="carousel carousel-circle" data-flickity='{ "imagesLoaded": true, "wrapAround": true, "selectedAttraction": 1,"friction": 1, "cellAlign": "left" }'>
  <?php
  $post_objects = get_field('press_posts');
  if ($post_objects) :
    foreach ($post_objects as $post_object) :
      $link = get_field('link_to_article', $post_object->ID);
      $post_title = strip_tags(get_field('title', $post_object->ID));
      if ($link) :
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
      endif; ?>
      <div class="carousel-cell carousel-cell--circle">

        <div class="carousel-cell--title">
          <div class="carousel-cell--title-wrap">
            <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
              <div class="carousel-press-title">
                <h4>
                  <?php echo $post_title; ?>
                </h4>
                <span class="press-category">|
                  <?php
                  $categories = get_the_category($post_object->ID);

                  if (!empty($categories)) {
                    echo esc_html($categories[0]->name);
                  }
                  ?>
                </span>
              </div>
            </a>
          </div>
        </div>
        <div class="carousel-cell--img">
          <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?>
            <img class="circle-img" data-interchange="[<?php echo get_the_post_thumbnail_url($post_object->ID, 'fp-small'); ?>, small], [<?php echo get_the_post_thumbnail_url($post_object->ID, 'fp-medium'); ?>, medium]" />
          </a>
        </div>

      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</div>