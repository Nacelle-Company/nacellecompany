<?php
/*
Template Name: Front Circles
*/
get_header();

?>

<?php do_action('Nacelle_before_content'); ?>
<?php $count = 0; ?>

<div class="grid-x">
    <div class="cell">

        <?php while (have_posts('')) : the_post(); ?>
            <?php get_template_part('template-parts/blocks/full-orbit-slider'); ?>

            <div class="circle-slider orbit" role="region" aria-label="Nacelle News Slider" data-orbit data-auto-play="false" data-use-m-u-i="false">

                <ul class="orbit-container" id="circle-posts">

                    <div class="grid-x background-slide-container">
                        <div class="small-12 medium-4 large-4 press-title-background columns">
                            <!-- <img class="press-title-background" src="http://localhost/nacelle/nacelle/wp-content/uploads/2019/07/news-slider-title-bkgnd.png" alt="press title background"> -->
                        </div>
                    </div>

                    <?php get_template_part('template-parts/blocks/circle-slider'); ?>

                </ul>

            </div>
        <?php endwhile; ?>
        <!-- END LOOP -->

        <?php get_template_part('template-parts/front-partners'); ?>

    </div>
</div>

<?php get_footer(); ?>