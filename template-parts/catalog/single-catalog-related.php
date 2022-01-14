<?php
$ids = get_field('related_catalog_items', false, false);
if ($ids) :
  $catalog_query = new WP_Query(array(
    'post_type'       => 'catalog',
    'post__in'        => $ids,
    'posts_per_page'  => -1
  ));
  $pr_query = new WP_Query(array(
    'post_type'       => 'press_release',
    'post__in'        => $ids,
    'posts_per_page'  => -1
  ));
  $news_query = new WP_Query(array(
    'post_type'       => 'news',
    'post__in'        => $ids,
    'posts_per_page'  => -1
  ));
?>
  <div class="grid-x grid-container my-2">
    <header class="cell small-12 mb-1">
      <h4>RELATED INFO</h4>
    </header>
    <?php
    // get each post type's # of posts
    $catalog_post_count = $catalog_query->post_count;
    $pr_post_count = $pr_query->post_count;
    $news_post_count = $news_query->post_count;
    $post_count_all = 0;
    // if post type has posts add one to $post_count_all variable
    if ($catalog_post_count > 0) {
      $post_count_all++;
    }
    if ($pr_post_count > 0) {
      $post_count_all++;
    }
    if ($news_post_count > 0) {
      $post_count_all++;
    }
    // if only one post type on medium-up screens make layout 3 columns
    if ($post_count_all === 1) {
      $columns = 'medium-4';
      $margin_x = ' grid-margin-x';
    } elseif ($post_count_all === 2) {
      $columns = 'medium-6';
      $margin_x = ' related-cpt-wrapper';
    } else { // otherwise do full width
      $columns = 'medium-12';
      $margin_x = '';
    }
    ?>
    <style>
      @media print,
      screen and (min-width: 40em) {
        .related-cpt-wrapper {
          margin-left: -0.5rem;
          margin-right: -0.5rem;
        }

        .related-cpt-wrapper>.medium-6 {
          width: calc(50% - 1rem);
        }

        .related-cpt-wrapper>.cell {
          margin-left: 0.5rem;
          margin-right: 0.5rem;
        }
      }
    </style>
    <?php if ($pr_query->have_posts()) : $count = 0; ?>
      <div class="cell medium-auto p-2 related-cpt">
        <div class="grid-x<?php echo $margin_x; ?>">
          <?php while ($pr_query->have_posts()) :
            $pr_query->the_post();
            $count++;
            $title = get_the_title();
            $permalink = get_permalink();
            $post_type = get_post_type_object(get_post_type());
            $post_type = strtoupper($post_type->labels->singular_name);
          ?>
            <?php if ($count == 1) : ?>
              <h6 class="cell large-12 secondary-color category-intro mb-2">
                <?php echo $post_type; ?>
              </h6>
            <?php endif; // CARDS 
            ?>
            <div class="cell <?php echo $columns; ?> p-1 pag-img-wrapper mb-2">
              <a class="cell" href="<?php echo $permalink; ?>">
                <div class="grid-x">
                  <div class="cell small-9 pr-2">
                    <p><?php echo $title; ?></p>
                  </div>
                  <div class="cell small-3">
                    <?php echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
                  </div>
                </div>
              </a>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    <?php endif; ?>
    <?php if ($catalog_query->have_posts()) : $count = 0; ?>
      <div class="cell medium-auto p-2 related-cpt">
        <div class="grid-x<?php echo $margin_x; ?>">
          <?php while ($catalog_query->have_posts()) :
            $catalog_query->the_post();
            $count++;
            $title = get_the_title();
            $permalink = get_permalink();
            $post_type = get_post_type_object(get_post_type());
            $post_type = strtoupper($post_type->labels->singular_name);
          ?>
            <?php if ($count == 1) : ?>
              <h6 class="cell large-12 secondary-color category-intro mb-2">
                <?php echo $post_type; ?>
              </h6>
            <?php endif; // CARDS 
            ?>
            <div class="cell <?php echo $columns; ?> p-1 pag-img-wrapper mb-2">
              <a class="cell" href="<?php echo $permalink; ?>">
                <div class="grid-x">
                  <div class="cell small-9 pr-2">
                    <p><?php echo $title; ?></p>
                  </div>
                  <div class="cell small-3">
                    <?php echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
                  </div>
                </div>
              </a>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    <?php endif; ?>
    <?php if ($news_query->have_posts()) : $count = 0; ?>
      <div class="cell medium-auto p-2 related-cpt">
        <div class="grid-x<?php echo $margin_x; ?>">
          <?php while ($news_query->have_posts()) :
            $news_query->the_post();
            $count++;
            $title = get_the_title();
            $permalink = get_permalink();
            $post_type = get_post_type_object(get_post_type());
            $post_type = strtoupper($post_type->labels->singular_name);
          ?>
            <?php if ($count == 1) : ?>
              <h6 class="cell large-12 secondary-color category-intro mb-2 mx-2">
                <?php echo $post_type; ?>
              </h6>
            <?php endif; // CARDS 
            ?>
            <div class="cell <?php echo $columns; ?> p-1 pag-img-wrapper mb-2">
              <a class="cell" href="<?php echo $permalink; ?>">
                <div class="grid-x">
                  <div class="cell small-9 pr-2">
                    <p><?php echo $title; ?></p>
                  </div>
                  <div class="cell small-3">
                    <?php echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
                  </div>
                </div>
              </a>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
  </div>
<?php endif; ?>