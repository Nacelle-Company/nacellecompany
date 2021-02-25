<?php

/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */

get_header(); ?>

<div class="main-container">
    <div class="main-grid">
        <main>
            <div class="grid-container full align-center pt-3">
                <?php //cell for the content 
                ?>

                <header class="grid-container archive pb-2 pb-medium-0">

                    <div class="grid-x align-center-middle">

                        <div class="cell small-6">

                            <h1 class="entry-title">

                                <?php _e('Full Catalog', 'Nacelle') ?>

                            </h1>

                        </div>

                        <div class="cell small-6 text-right sorting">

                            <a data-toggle="searchOffCanvas">Sort & Filter</a>

                        </div>

                    </div>

                </header>


                <?php
                $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $per_page = '24';
                $catalog_items_args = array(
                    'post_type' => 'catalog',
                    'posts_per_page' => $per_page,
                    'paged' => $current_page,
                );
                $catalog_items = new WP_Query($catalog_items_args);
                ?>
                <div class="catalog-cards grid-x small-up-2 medium-up-4 large-up-6 align-top">

                    <?php if ($catalog_items->have_posts()) : $i = 1; ?>

                        <?php while ($catalog_items->have_posts()) : $catalog_items->the_post(); ?>

                            <div class="media-container animation-element cell medium-2 ">

                                <a href="<?php the_permalink(); ?>">

                                    <div class="callout callout-hover-reveal" data-callout-hover-reveal>

                                        <div class="callout-body">

                                            <?php
                                            $image = get_field('square_image');
                                            if (!empty($image)) : ?>
                                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php //echo esc_attr($image['alt']); 
                                                                                                        ?>" />
                                            <?php endif; ?>
                                        </div>

                                        <div class="callout-footer">

                                            <p><?php
                                                $trim_length = 20;  //desired length of text to display
                                                $value_more = ' . . .'; // what to add at the end of the trimmed text
                                                $custom_field = 'synopsis';
                                                $value = get_post_meta($post->ID, $custom_field, true);
                                                if ($value) {
                                                    echo wp_trim_words($value, $trim_length, $value_more);
                                                }
                                                ?></p>

                                        </div>

                                    </div>

                                </a>

                            </div>

                            <?php $i += 1; ?>
                        <?php endwhile; ?>
                </div>
                <div class="grid-x">
                    <div id="catalog-pagination" class=" cell text-center">
                        <?php
                        $big = 999999999; // need an unlikely intege

                        echo paginate_links(array(
                            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                            'format' => '?paged=%#%',
                            'current' => max(1, get_query_var('paged')),
                            'total' => $catalog_items->max_num_pages
                        ));
                        ?>
                    </div>
                </div>
            <?php else : ?>

                <?php get_template_part('template-parts/content', 'none'); ?>

            <?php endif; ?>





            </div>
            <?php wp_reset_postdata(); ?>
        </main>
    </div>
</div>

<?php get_footer();
