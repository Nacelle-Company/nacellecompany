<?php
$ids = get_field('related_catalog_items', false, false);
if ($ids) :
  $catalog_query = new WP_Query(array(
    'post_type'        => 'catalog',
    'post__in'      => $ids
  ));
  $pr_query = new WP_Query(array(
    'post_type'        => 'press_release',
    'post__in'      => $ids
  ));
  $news_query = new WP_Query(array(
    'post_type'        => 'news',
    'post__in'      => $ids
  ));
?>
  <div class="grid-x grid-container my-2">
    <header class="cell small-12 mb-1">
      <h4>RELATED INFO</h4>
    </header>
    <?php if ($pr_query->have_posts() && $catalog_query->have_posts() && $news_query->have_posts()) {
      $columns = '3';
      echo '<h1>' . $columns . '</h1>';
    }
      ?>
    <?php if ($pr_query->have_posts()) : $count = 0; ?>
      <div class="cell medium-4 p-2 related-cpt">
        <?php while ($pr_query->have_posts()) :
          $pr_query->the_post();
          $count++;
          $title = get_the_title();
          $permalink = get_permalink();
          $post_type = get_post_type_object(get_post_type());
          $post_type = strtoupper($post_type->labels->singular_name);
        ?>
          <?php if ($count == 1) : ?>
            <h6 class="cell large-12 mb-1 secondary-color category-intro">
              <?php echo $post_type; ?>
            </h6>
          <?php endif; // CARDS 
          ?>
          <div class="grid-x p-1 pag-img-wrapper">
            <a class="cell" href="<?php echo $permalink; ?>">
              <div class="grid-x">
                <div class="cell large-9 pr-2">
                  <p><?php echo $title; ?></p>
                </div>
                <div class="cell large-3">
                  <?php echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
                </div>
              </div>
            </a>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
    <?php if ($catalog_query->have_posts()) : $count = 0; ?>
      <div class="cell medium-4 p-2 related-cpt">
        <?php while ($catalog_query->have_posts()) :
          $catalog_query->the_post();
          $count++;
          $title = get_the_title();
          $permalink = get_permalink();
          $post_type = get_post_type_object(get_post_type());
          $post_type = strtoupper($post_type->labels->singular_name);
        ?>
          <?php if ($count == 1) : ?>
            <h6 class="cell large-12 mb-1 secondary-color category-intro">
              <?php echo $post_type; ?>
            </h6>
          <?php endif; // CARDS 
          ?>
          <div class="grid-x p-1 pag-img-wrapper">
            <a class="cell" href="<?php echo $permalink; ?>">
              <div class="grid-x">
                <div class="cell large-9">
                  <p><?php echo $title; ?></p>
                </div>
                <div class="cell large-3">
                  <?php echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
                </div>
              </div>
            </a>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
    <?php if ($news_query->have_posts()) : $count = 0; ?>
      <div class="cell medium-4 p-2 related-cpt">
        <?php while ($news_query->have_posts()) :
          $news_query->the_post();
          $count++;
          $title = get_the_title();
          $permalink = get_permalink();
          $post_type = get_post_type_object(get_post_type());
          $post_type = strtoupper($post_type->labels->singular_name);
        ?>
          <?php if ($count == 1) : ?>
            <h6 class="cell large-12 mb-1 secondary-color category-intro">
              <?php echo $post_type; ?>
            </h6>
          <?php endif; // CARDS 
          ?>
          <div class="grid-x p-1 pag-img-wrapper">
            <a class="cell" href="<?php echo $permalink; ?>">
              <div class="grid-x">
                <div class="cell large-9">
                  <p><?php echo $title; ?></p>
                </div>
                <div class="cell large-3">
                  <?php echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
                </div>
              </div>
            </a>
          </div>
        <?php endwhile; ?>
      </div>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
  </div>
<?php endif; ?>