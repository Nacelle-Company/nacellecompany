<?php /*Template Name: Front Carousel*/ get_header(); ?>
<?php do_action('Nacelle_before_content'); ?>
<?php while (have_posts('')) : the_post(); ?>
  <main class="front-carousel grid-x main">
    <div class="cell tagline text-center">
      <h1 class="hide">
        <?php $blog_title = get_bloginfo();
        echo $blog_title; ?>
      </h1>
      <h2>
        <?php if (get_field('heading')) : the_field('heading');
        endif; ?>
      </h2>
    </div>
    <div class="cell">
      <?php get_template_part('template-parts/blocks/full-flickity-slider'); ?>
    </div>
    <div class="cell">
      <?php get_template_part('template-parts/blocks/wysiwyg'); ?>
    </div>
    <div class="cell">
      <?php get_template_part('template-parts/blocks/slider-news'); ?>
      <?php get_template_part('template-parts/blocks/slider-press'); ?>
    </div>
    <div class="cell">
      <?php get_template_part('template-parts/blocks/full-hero-video'); ?>
    </div>
  </main>
<?php endwhile; ?>
<?php get_footer(); ?>