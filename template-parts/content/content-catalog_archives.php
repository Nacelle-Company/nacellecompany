<?php

/**
 * The template used to display archive content
 * https://www.smashingmagazine.com/2015/04/building-custom-wordpress-archive-page/
 */
?>

<div class="cell small-order-2 medium-order-1 medium-6 productions pt-3" id="more">
    <header>
        <div class="grid-x grid-padding-x">
            <div class="cell medium-12 section-title">
                <h2><?php the_field("left_title"); ?></h2>
            </div>
        </div>
    </header>
    <div class="entry-content" id="entry-content" style="border-right: 1px solid white;">
        <div class="grid-x grid-padding-x grid-padding-y medium-up-1 macro-cat-cards">
            <?php
            $production_query = array(
                'post_type'              => array('catalog'),
                'posts_per_page'         => '30',
                'order'                  => 'DESC',
                'orderby'                => 'date',
                'tax_query'              => array(
                    'relation' => 'AND',
                    array(
                        'taxonomy'         => 'category',
                        'terms'            => array('production', ' distribution'),
                        'field'            => 'slug',
                    ),
                    array(
                        'taxonomy'         => 'category',
                        'terms'            => 'podcast',
                        'field'            => 'slug',
                        'operator'         => 'NOT IN',
                    ),
                ),
            );
            // var_dump($production_query);
            if ($production_query->have_posts()) {

                while ($production_query->have_posts()) {
                    $production_query->the_post();

                    $date = get_field('release_date', false, false);
                    $synopsis = get_field('synopsis');
                    // make date object
                    $date = new DateTime($date);

                    // display the categories
                    // https://developer.wordpress.org/reference/functions/wp_list_categories/
                    $taxonomy = 'category';

                    // Get the term IDs assigned to post.
                    $post_terms = wp_get_object_terms($post->ID, $taxonomy, array('fields' => 'ids'));

                    // Separator between links.
                    $separator = '/ ';

                    if (!empty($post_terms) && !is_wp_error($post_terms)) {

                        $term_ids = implode(',', $post_terms);

                        $terms = wp_list_categories(array(
                            'title_li' => '',
                            'style'    => 'none',
                            'echo'     => false,
                            'taxonomy' => $taxonomy,
                            'include'  => $term_ids
                        ));

                        $terms = rtrim(trim(str_replace('<br />',  $separator, $terms)), $separator);
                    }
                    // END display the categories


                    $img_size_lg = 'fp-large';
                    $img_size_md = 'fp-medium';
                    $img_size_sm = 'fp-small';

                    $imageSquare = get_field('square_image');                        // Catalog Image
                    // $imageHorizontalYES = get_field('custom_square_image_yes');   // QUESTION Custom Image?
                    $imageHorizontal = get_field('horizontal_image');          // Custom Image

                    // $imageSquareAlt = $imageSquare['alt']; /* Get image object alt */
                    // $imageHorizontalAlt = $imageHorizontal['alt'];

                    /* Get custom sizes of our image sub_field */
                    // $imageSquareLG = $imageSquare['sizes'][$img_size_lg];
                    // $imageSquareMD = $imageSquare['sizes'][$img_size_md];
                    // $imageSquareSM = $imageSquare['sizes'][$img_size_sm];

                    // custom featured image
                    $imageHorizontalLG = $imageHorizontal['sizes'][$img_size_lg];
                    $imageHorizontalMD = $imageHorizontal['sizes'][$img_size_md];
                    $imageHorizontalSM = $imageHorizontal['sizes'][$img_size_sm];

            ?>

                    <div class="cell">

                        <div class="callout" data-callout-hover-reveal>

                            <div class="callout-body">

                                <?php // IMAGE 
                                ?>


                                <div class="img-container">


                                    <?php if ($imageHorizontal) : ?>

                                        <a href="<?php the_permalink() ?>" class="catalog-title" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">

                                            <img class="feat-pg horizontal" data-interchange="[<?php echo $imageHorizontalSM; ?>, default], [<?php echo $imageHorizontalSM; ?>, small], [<?php echo $imageHorizontalMD; ?>, medium], [<?php echo $imageHorizontalLG; ?>, large]" alt="<?php echo $imageHorizontalAlt; ?>" />
                                            <noscript>
                                                <img src="<?php echo $imageHorizontalSM; ?>" alt="<?php echo $imageHorizontalAlt; ?>" />
                                            </noscript>
                                        </a>

                                    <?php else : ?>

                                        <a href="<?php the_permalink() ?>" class="catalog-title" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">

                                            <img class="feat-pg" data-interchange="[<?php echo $imageSquareSM; ?>, small], [<?php echo $imageSquareMD; ?>, medium], [<?php echo $imageSquareLG; ?>, large]" alt="<?php echo $imageSquareAlt; ?>" />
                                            <noscript>
                                                <img src="<?php echo $imageSquareSM; ?>" alt="<?php echo $imageSquareAlt; ?>" />
                                            </noscript>
                                        </a>

                                    <?php endif; ?>

                                </div>



                            </div>

                            <div class="callout-footer">
                                <div class="callout-content">
                                    <div class="grid-x">
                                        <div class="cell medium-6">
                                            <h4><?php echo $date->format('Y'); ?></h4>
                                        </div>
                                        <div class="cell medium-6 text-right">
                                            <?php echo  $terms; ?>
                                        </div>
                                    </div>
                                    <a href="<?php the_permalink() ?>" class="catalog-title" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
                                        <h4><?php the_title(); ?></h4>
                                    </a>
                                    <div class="callout-synopsis">
                                        <?php
                                        if (get_the_content()) {
                                            the_content();
                                        } else {
                                            echo $synopsis;
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>

            <?php
                }
                wp_reset_postdata();
            }
            ?>

        </div>

    </div>

</div>

<div class="cell small-order-1 medium-order-2 medium-6 podcasts pt-3">

    <header>

        <div class="grid-x grid-padding-x">

            <div class="cell medium-12 section-title">

                <h2><?php the_field("right_title"); ?></h2>

            </div>

        </div>

    </header><?php // .entry-header 
                ?>

    <div class="entry-content" id="entry-content">

        <div class="grid-x grid-padding-x grid-padding-y medium-up-1 macro-cat-cards">

            <?php
            $podcast_query = new WP_Query(array(
                'post_type' => 'catalog',
                'posts_per_page' => 10,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'slug',
                        'terms'    => 'podcast',
                    ),
                ),
            ));

            if ($podcast_query->have_posts()) {

                while ($podcast_query->have_posts()) {
                    $podcast_query->the_post();

                    $date = get_field('release_date', false, false);
                    $synopsis = get_field('synopsis');
                    // make date object
                    $date = new DateTime($date);

                    // display the categories
                    // https://developer.wordpress.org/reference/functions/wp_list_categories/
                    $taxonomy = 'category';

                    // Get the term IDs assigned to post.
                    $post_terms = wp_get_object_terms($post->ID, $taxonomy, array('fields' => 'ids'));

                    // Separator between links.
                    $separator = '/ ';

                    if (!empty($post_terms) && !is_wp_error($post_terms)) {

                        $term_ids = implode(',', $post_terms);

                        $terms = wp_list_categories(array(
                            'title_li' => '',
                            'style'    => 'none',
                            'echo'     => false,
                            'taxonomy' => $taxonomy,
                            'include'  => $term_ids
                        ));

                        $terms = rtrim(trim(str_replace('<br />',  $separator, $terms)), $separator);
                    }
                    // END display the categories


                    $img_size_lg = 'fp-large';
                    $img_size_md = 'fp-medium';
                    $img_size_sm = 'fp-small';

                    $imageSquare = get_field('square_image');                        // Catalog Image
                    // $imageHorizontalYES = get_field('custom_square_image_yes');   // QUESTION Custom Image?
                    $imageHorizontal = get_field('horizontal_image');          // Custom Image

                    // $imageSquareAlt = $imageSquare['alt']; /* Get image object alt */
                    // $imageHorizontalAlt = $imageHorizontal['alt'];

                    /* Get custom sizes of our image sub_field */
                    // $imageSquareLG = $imageSquare['sizes'][$img_size_lg];
                    // $imageSquareMD = $imageSquare['sizes'][$img_size_md];
                    // $imageSquareSM = $imageSquare['sizes'][$img_size_sm];

                    // custom featured image
                    $imageHorizontalLG = $imageHorizontal['sizes'][$img_size_lg];
                    $imageHorizontalMD = $imageHorizontal['sizes'][$img_size_md];
                    $imageHorizontalSM = $imageHorizontal['sizes'][$img_size_sm];

            ?>

                    <div class="cell">

                        <div class="callout" data-callout-hover-reveal>

                            <div class="callout-body">

                                <?php // IMAGE 
                                ?>


                                <div class="img-container">


                                    <?php if ($imageHorizontal) : ?>

                                        <a href="<?php the_permalink() ?>" class="catalog-title" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">

                                            <img class="feat-pg horizontal" data-interchange="[<?php echo $imageHorizontalSM; ?>, default], [<?php echo $imageHorizontalSM; ?>, small], [<?php echo $imageHorizontalMD; ?>, medium], [<?php echo $imageHorizontalLG; ?>, large]" alt="<?php echo $imageHorizontalAlt; ?>" />
                                            <noscript>
                                                <img src="<?php echo $imageHorizontalSM; ?>" alt="<?php echo $imageHorizontalAlt; ?>" />
                                            </noscript>
                                        </a>

                                    <?php else : ?>

                                        <a href="<?php the_permalink() ?>" class="catalog-title" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">

                                            <img class="feat-pg" data-interchange="[<?php echo $imageSquareSM; ?>, small], [<?php echo $imageSquareMD; ?>, medium], [<?php echo $imageSquareLG; ?>, large]" alt="<?php echo $imageSquareAlt; ?>" />
                                            <noscript>
                                                <img src="<?php echo $imageSquareSM; ?>" alt="<?php echo $imageSquareAlt; ?>" />
                                            </noscript>
                                        </a>

                                    <?php endif; ?>

                                </div>



                            </div>

                            <div class="callout-footer">

                                <div class="callout-content">
                                    <div class="grid-x">
                                        <div class="cell medium-6">
                                            <?php // DATE 
                                            ?>
                                            <h4><?php echo $date->format('Y'); ?></h4>

                                        </div>
                                        <div class="cell medium-6 text-right">
                                            <?php
                                            // Display post categories. 
                                            echo  $terms;
                                            ?>
                                        </div>
                                    </div>

                                    <?php // TITLE 
                                    ?>
                                    <a href="<?php the_permalink() ?>" class="catalog-title" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
                                        <h4><?php the_title(); ?></h4>
                                    </a>
                                    <div class="callout-synopsis">
                                        <?php
                                        if (get_the_content()) {
                                            the_content();
                                        } else {
                                            echo $synopsis;
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>

            <?php
                }
                wp_reset_postdata();
            }
            ?>

        </div>

    </div><?php // .entry-content 
            ?>

</div><?php // #post-## 
        ?>