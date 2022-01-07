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
  <header class="grid-x mb-2">
    <h4>RELATED INFO</h4>
  </header>

  <div class="grid-x grid-padding-x small-margin-collapse">
    <?php if ($pr_query->have_posts()) : $count = 0; ?>

      <?php while ($pr_query->have_posts()) :
        $pr_query->the_post();
        $count++;
        $title = get_the_title();
        $permalink = get_permalink();
        $post_type = get_post_type_object(get_post_type());
        $post_type = strtoupper($post_type->labels->singular_name);
      ?>

        <?php if ($count == 1) : ?>
          <h6 class="cell large-12 secondary-color">
            <?php echo $post_type; ?>
          </h6>
        <?php endif; ?>

        <div class="cell medium-4 mb-2">
          <a href="<?php echo $permalink; ?>" class="grid-x pag-img-wrapper">
            <div class="cell large-6">
              <?php echo $title; ?>
            </div>
            <div class="cell auto mr-2 text-center">
              <?php echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
            </div>
          </a>
        </div>

      <?php endwhile; ?>

    <?php endif; ?>

    <?php if ($catalog_query->have_posts()) : $count = 0; ?>

      <?php while ($catalog_query->have_posts()) :
        $catalog_query->the_post();
        $count++;
        $title = get_the_title();
        $permalink = get_permalink();
        $post_type = get_post_type_object(get_post_type());
        $post_type = strtoupper($post_type->labels->singular_name);
      ?>

        <?php if ($count == 1) : ?>
          <h6 class="cell large-12 secondary-color">
            <?php echo $post_type; ?>
          </h6>
        <?php endif; ?>

        <div class="cell medium-4 mb-2">
          <a href="<?php echo $permalink; ?>" class="grid-x pag-img-wrapper">
            <div class="cell large-6">
              <?php echo $title; ?>
            </div>
            <div class="cell auto mr-2 text-center">
              <?php echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
            </div>
          </a>
        </div>

      <?php endwhile; ?>

    <?php endif; ?>

    <?php if ($news_query->have_posts()) : $count = 0; ?>

      <?php while ($news_query->have_posts()) :
        $news_query->the_post();
        $count++;
        $title = get_the_title();
        $permalink = get_permalink();
        $post_type = get_post_type_object(get_post_type());
        $post_type = strtoupper($post_type->labels->singular_name);
      ?>

        <?php if ($count == 1) : ?>
          <h6 class="cell large-12 secondary-color">
            <?php echo $post_type; ?>
          </h6>
        <?php endif; ?>

        <div class="cell medium-4 mb-2">
          <a href="<?php echo $permalink; ?>" class="grid-x pag-img-wrapper">
            <div class="cell large-6">
              <?php echo $title; ?>
            </div>
            <div class="cell auto mr-2 text-center">
              <?php echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
            </div>
          </a>
        </div>

      <?php endwhile; ?>

      <?php wp_reset_postdata(); ?>

    <?php endif; ?>
  </div>
<?php endif; ?>