<div class="meta-accordion catalog-bottom-meta grid-container-full pl-medium-3">
    <div class="grid-x">

        <article class="accordion cell" data-accordion data-allow-all-closed="true">
            <section class="accordion-item" data-accordion-item>
                <a href="#" class="accordian-open">
                    <div class="grid-x align-middle mx-0">
                        <div class="cell medium-7">
                            <div class="grid-x accordion-line"></div>
                        </div>
                        <div class="cell medium-5">
                            <button class="accordion-title clear primary-color" title="More info on <?php the_title(); ?>">More info
                                <?php get_template_part('template-parts/svg/icon-down-angle', ''); ?>

                            </button>
                        </div>
                    </div>
                </a>
                <div class="accordion-content grid-container-full" data-tab-content>
                    <div class="grid-container grid-x pl-medium-0">
                        <div class="cell medium-4">
                            <!-- spacer -->
                        </div>
                        <div class="cell medium-8 tbp-1">
                            <div class="grid-x">
                                <div class="cell medium-12 extra-metadata">

                                    <!-- Writers -->

                                    <?php if ($writers) : ?>

                                        <div class="grid-x">

                                            <div class="cell small-4 title">
                                                <h3 class="md-gray-color sm-title"><?php _e('Writer(s):', 'nacelle'); ?></h3>
                                            </div>

                                            <div class="cell small-8">

                                                <p>
                                                    <?php $writerstr = array();
                                                    foreach ($writers as $writer) {
                                                        $writerstr[] = $writer->name;
                                                    }
                                                    echo implode(", ", $writerstr);
                                                    ?>
                                                </p>

                                            </div>

                                        </div>

                                    <?php endif; ?>

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
    </div>
</div> <!-- end catalog-bottom-meta -->