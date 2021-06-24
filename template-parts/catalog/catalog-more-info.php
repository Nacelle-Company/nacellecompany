<?php
$runtime = get_post_meta(get_the_ID(), 'runtime', true);
$date = get_post_meta(get_the_ID(), 'release_date', true);
$show_date = get_post_meta(get_the_ID(), 'show_release_date', true);
$genres = get_the_terms($post->ID, 'genre');
?>
<div class="grid-x catalog-more-info meta-accordion catalog-bottom-meta medium-order-1 large-order-2" id="meta_accordion">
    <article class="accordion cell" data-accordion data-allow-all-closed="true">
        <section class="accordion-item" data-accordion-item>
            <a href="#meta_accordion" data-smooth-scroll data-animation-duration="700" data-offset="245">
                <div class="grid-x px-medium-3 px-large-4 align-middle">
                    <div class="cell small-6">
                        <div class="grid-x accordion-line"></div>
                    </div>
                    <div class="cell small-6 large-5 pl-medium-2 pl-large-3">
                        <button class="accordion-title flex-container clear primary-color pl-medium-1 pl-large-0" title="More info on <?php the_title(); ?>">More info
                            <?php get_template_part('template-parts/svg/icon-down-angle'); ?>
                        </button>
                    </div>
                </div>
            </a>
            <div class="grid-x accordion-content" data-tab-content>
                <div class="flex-container grid-x align-right">
                    <div class="cell large-6 py-2">
                        <div class="grid-x small-padding-collapse">
                            <div class="cell medium-12">
                                <?php if ($runtime) : ?>
                                    <div class="grid-x">
                                        <div class="cell small-4 title">
                                            <h3 class="sm-title"><?php _e('Runtime:', 'nacelle'); ?></h3>
                                        </div>
                                        <div class="cell small-8">
                                            <p><?php echo $runtime; ?></p>
                                        </div>
                                    </div>
                                <?php endif ?>
                                <?php if ($show_date) : ?>
                                    <?php $date = new DateTime($date); ?>
                                    <div class="grid-x">
                                        <div class="cell small-4 title">
                                            <h3 class="sm-title"><?php _e('Premiere:', 'nacelle'); ?></h3>
                                        </div>
                                        <div class="cell small-8">
                                            <p><?php echo $date->format('m/d/Y'); ?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($genres) : ?>
                                    <div class="grid-x">
                                        <div class="cell small-4 title">
                                            <h3 class="sm-title"><?php _e('Genre(s):', 'nacelle'); ?></h3>
                                        </div>
                                        <div class="cell small-8">
                                            <p>
                                                <?php $i = 1;
                                                foreach ($genres as $genre) {
                                                    $genre_link = get_term_link($genre, 'genre');
                                                    if (is_wp_error($genre_link)) {
                                                        continue;
                                                    }
                                                    echo $genre->name;
                                                    echo ($i < count($genres)) ? ", " : "";
                                                    $i++;
                                                } ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if (get_post_meta(get_the_ID(), 'rating', true)) : ?>
                                    <div class="grid-x">
                                        <div class="cell small-4 title">
                                            <h3 class=" sm-title"><?php _e('Rating:', 'nacelle'); ?></h3>
                                        </div>
                                        <div class="cell small-8">
                                            <p><?php echo get_post_meta(get_the_ID(), 'rating', true); ?></p>
                                        </div>
                                    </div>
                                <?php endif ?>
                                <?php if (get_post_meta(get_the_ID(), 'copyright', true)) : ?>
                                    <div class="grid-x">
                                        <div class="cell small-4 title">
                                            <h3 class="sm-title"><?php _e('Copyright:', 'nacelle'); ?></h3>
                                        </div>
                                        <div class="cell small-8">
                                            <p><?php echo get_post_meta(get_the_ID(), 'copyright', true); ?></p>
                                        </div>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </article>
</div>