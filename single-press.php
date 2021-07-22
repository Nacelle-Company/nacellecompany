<?php

/**
 * The template for displaying all single Press posts
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */

get_header(); ?>

<?php get_template_part('template-parts/featured-image'); ?>
<main class="main-container">
  <div class="main-grid">
    <div class="main-content">
      <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('template-parts/content', 'news'); ?>
        <?php comments_template(); ?>
      <?php endwhile; ?>
    </div>
    <?php get_sidebar(); ?>
  </div>
</main>
<?php get_footer();
