  <div class="carousel carousel-circle" data-flickity='{ 
  "wrapAround": true, 
  "imagesLoaded": true,
  "selectedAttraction": 1, 
  "friction": 1
}'>
    <?php
    $post_objects = get_field('press_posts');
    if ($post_objects) :
      foreach ($post_objects as $post_object) :
        $link = get_field('link_to_article', $post_object->ID);
        if ($link) :
          $link_url = $link['url'];
          $link_title = $link['title'];
          $link_target = $link['target'] ? $link['target'] : '_self';
        endif; ?>
        <div class="carousel-cell carousel-cell--circle">

          <div class="carousel-cell--title">
            <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?>
              <br><br>
              <?php echo get_field('title', $post_object->ID); ?>
              <br>
              <span class="press-category">|
                <?php
                $categories = get_the_category($post_object->ID);

                if (!empty($categories)) {
                  echo esc_html($categories[0]->name);
                }
                ?>
              </span>
            </a>
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
