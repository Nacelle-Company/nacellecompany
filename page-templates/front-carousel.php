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

                <h1 class="hide">Comedy Dynamics</h1>

                <h2>
                    <strong>
                        <?php the_field('heading'); ?>
                    </strong>
                </h2>

            </div>

        </div>

        <!-- orbit carousel -->
        <div class="cell">
            <?php get_template_part('template-parts/blocks/clean-hero-slider'); ?>
        </div>

        <!-- post strip -->
        <div class="cell">
            <?php get_template_part('template-parts/blocks/news-gallery'); ?>
        </div>

    </main>

<?php endwhile; ?>
<!-- END LOOP -->

<div class="grid-x mb-3 mt-4 align-center">

    <div class="large-6">

        <h4 style="text-align:center !important;font-family: MontserratRegular,sans-serif !important;">

            <?php the_field('additional_bottom_content'); ?>

        </h4>

    </div>

</div>



<?php get_footer(); ?>