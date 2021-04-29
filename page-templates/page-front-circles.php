<?php
/*
Template Name: Front Circles
*/
get_header();

?>
<?php do_action('Nacelle_before_content'); ?>
<main class="grid-x front-circles">
    <div class="cell">
        <?php while (have_posts('')) : the_post(); ?>
            <?php get_template_part('template-parts/blocks/full-flickity-slider'); ?>
            <?php get_template_part('template-parts/blocks/circle-flickity-slider'); ?>
        <?php endwhile; ?>
        <?php get_template_part('template-parts/front-partners'); ?>
    </div>
</main>
<?php get_footer(); ?>