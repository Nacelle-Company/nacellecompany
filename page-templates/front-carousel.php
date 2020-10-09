<?php
/*
Template Name: Front Carousel
*/
get_header(); ?>

<?php do_action('Nacelle_before_content'); ?>

<?php while (have_posts('')) : the_post(); ?>

    <main class="main grid-x front-carousel">

        <!-- header -->
        <div class="cell tagline">

            <div class="medium-12 cell text-center">

                <h1 class="hide"><?php $blog_title = get_bloginfo();
                                    echo $blog_title; ?></h1>

                <h2>
                    <strong>
                        <?php if (get_field('heading')) : the_field('heading');
                        endif; ?>
                    </strong>
                </h2>

            </div>

        </div>

        <!-- orbit carousel -->
        <div class="cell">
            <?php get_template_part('template-parts/blocks/full-orbit-slider'); ?>
        </div>
        <!-- wysiwyg content -->
        <div class="cell">
            <?php get_template_part('template-parts/blocks/wysiwyg'); ?>
        </div>
        <!-- news carousel -->
        <div class="cell">
            <?php get_template_part('template-parts/blocks/slider-news'); ?>
            <br>
            <?php get_template_part('template-parts/blocks/slider-press'); ?>
        </div>

        <div class="cell">
            <?php get_template_part('template-parts/blocks/full-hero-video'); ?>

        </div>

    </main>

<?php endwhile; ?>
<!-- END LOOP -->

<?php get_footer(); ?>