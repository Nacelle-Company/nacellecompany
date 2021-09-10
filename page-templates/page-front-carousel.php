<?php /*Template Name: Front Carousel*/
get_header(); ?>
<?php do_action('Nacelle_before_content'); ?>
<?php while (have_posts('')) : the_post(); ?>
  <main class="front-carousel main">
    <?php get_template_part('template-parts/blocks/full-flickity-slider'); ?>
    <?php get_template_part('template-parts/blocks/wysiwyg'); ?>
    <div class="cell">
      <?php // get_template_part('template-parts/blocks/slider-news'); ?>
      <?php get_template_part('template-parts/blocks/press-grid'); ?>
    </div>
  </main>
<?php endwhile; ?>
<?php get_footer(); ?>
