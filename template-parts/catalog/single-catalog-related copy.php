<?php
$featured_posts = get_post_meta(get_the_ID(), 'related_catalog_items', true);
var_dump('related_catalog_items', $post->ID);
if ($featured_posts) : ?>
  <header class="grid-x px-medium-3 px-large-4 mb-2">
    <h4>RELATED INFO</h4>
  </header>
  <div class="grid-x grid-padding-x small-margin-collapse">
    <?php while (have_posts($featured_posts)) : the_post(); ?>
      <?php the_title(); ?>
    <?php endwhile; ?>
    <?php
    $shown = false;
    foreach ($featured_posts as $post) : setup_postdata($post);
      $post_type = get_post_type_object(get_post_type());
      $post_type_capitalized = strtoupper($post_type->labels->singular_name);
      if (!$shown) {
        echo $post_type_capitalized;
      }

      // variables 
      $title = get_the_title();
      $permalink = get_permalink();

      if ($post_type->name === 'press_release') : ?>

        <div class="cell medium-4 mb-2">
          <a href="<?php echo $permalink; ?>" class="grid-x pag-img-wrapper">
            <div class="cell large-6">
              <?php echo $title; ?>
            </div>
            <div class="cell auto mr-2 text-center">
              <?php echo get_the_post_thumbnail($prev->ID, 'thumbnail'); ?>
            </div>
          </a>
        </div>
      <?php endif; ?>

    <?php $shown = true;
    endforeach; ?>
  </div>
  <?php wp_reset_postdata(); ?>
<?php endif; ?>