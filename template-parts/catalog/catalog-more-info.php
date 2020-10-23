<?php

$runtime = get_field('runtime');
$date = get_field('release_date', false, false);
$genres = get_the_terms($post->ID, 'genre');

?>
<div class="grid-x catalog-more-info meta-accordion catalog-bottom-meta mt-2" id="meta_accordion">
    <article class="accordion cell" data-accordion data-allow-all-closed="true">
        <section class="accordion-item" data-accordion-item>
            <a class="accordian-open" href="#meta_accordion" data-smooth-scroll data-animation-duration="700" data-offset="245">
                <div class="grid-container grid-x pb-2">
                    <div class="cell medium-6 pl-medium-1">
                        <div class="grid-x accordion-line"></div>
                    </div>
                    <div class="cell medium-5 ml-medium-2 pl-medium-2">
                        <button class="accordion-title clear primary-color mt-2 mt-medium-0" title="More info on <?php the_title(); ?>">More info
                            <?php get_template_part('template-parts/svg/icon-down-angle'); ?>
                        </button>
                    </div>
                </div>
            </a>
            <div class="grid-x accordion-content" data-tab-content>
                <div class="grid-container grid-x">
                    <div class="cell medium-8 medium-offset-4 tbp-1">
                        <div class="grid-x grid-padding-x small-padding-collapse px-medium-2">
                            <div class="cell medium-12 extra-metadata">

                                <!-- Runtime -->
                                <?php if ($runtime) : ?>
                                    <div class="grid-x">

                                        <div class="cell small-4 title">
                                            <h3 class="md-gray-color sm-title"><?php _e('Runtime:', 'nacelle'); ?></h3>
                                        </div>

                                        <div class="cell small-8">
                                            <p><?php echo $runtime; ?></p>
                                        </div>

                                    </div>
                                <?php endif ?>

                                <!-- Premiere -->
                                <!-- make date object -->
                                <?php $date = new DateTime($date); ?>
                                <div class="grid-x">
                                    <div class="cell small-4 title">
                                        <h3 class="md-gray-color sm-title"><?php _e('Premiere:', 'nacelle'); ?></h3>
                                    </div>
                                    <div class="cell small-8">
                                        <p><?php echo $date->format('m/d/Y'); ?></p>
                                    </div>
                                </div>

                                <!-- Genre -->
                                <?php if ($genres) : ?>
                                    <div class="grid-x">
                                        <div class="cell small-4 title">

                                            <h3 class="md-gray-color sm-title"><?php _e('Genre(s):', 'nacelle'); ?></h3>

                                        </div>
                                        <div class="cell small-8">

                                            <?php $i = 1;

                                            foreach ($genres as $genre) {
                                                $genre_link = get_term_link($genre, 'genre');
                                                if (is_wp_error($genre_link)) {
                                                    continue;
                                                }
                                                echo $genre->name;

                                                echo ($i < count($genres)) ? ", " : "";
                                                // Increment counter
                                                $i++;
                                            } ?>

                                        </div>
                                    </div>
                                <?php endif; ?>
                                <!-- end genres -->

                                <!-- rating -->
                                <?php if (get_field('rating')) : ?>
                                    <div class="grid-x">
                                        <div class="cell small-4 title">

                                            <h3 class="md-gray-color sm-title"><?php _e('Rating:', 'nacelle'); ?></h3>

                                        </div>
                                        <div class="cell small-8">

                                            <p><?php the_field('rating')['value'] ?></p>

                                        </div>
                                    </div>
                                <?php endif ?>

                                <!-- copyright -->
                                <?php if (get_field('copyright')) : ?>

                                    <div class="grid-x">
                                        <div class="cell small-4 title">

                                            <h3 class="md-gray-color sm-title"><?php _e('Copyright:', 'nacelle'); ?></h3>

                                        </div>
                                        <div class="cell small-8">

                                            <p><?php the_field('copyright')['value'] ?></p>

                                        </div>
                                    </div>

                                <?php endif ?>
                                <!-- end copyright -->

                            </div> <!-- end of 8cells -->
                        </div>
                    </div><!-- end of 7cells container -->
                </div>
            </div> <!-- end accordian content -->
        </section> <!-- end accordian section -->
    </article>
</div> <!-- end catalog-bottom-meta -->