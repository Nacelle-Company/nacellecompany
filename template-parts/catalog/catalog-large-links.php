<?php if (get_field('show_video_links')) { ?>

    <div class="grid-x catalog-large-links grid-container grid-padding-x" id="catalog_links">

        <div class="cell link-lg">
            <h2 class="white-color">
                Watch Now
            </h2>
            <div class="grid-x grid-padding-x">

                <?php // large links ?>
                <?php
                // Check rows exists.
                if (have_rows('new_large_link')) :

                    while (have_rows('new_large_link')) : the_row();

                        $videoLinkTitle = get_sub_field('link_title');
                        $videoLinkURL = get_sub_field('link_url');
                        $videoHoverTitle = get_sub_field('hover_title');


                        $img_size_lg = 'fp-large';
                        $img_size_md = 'fp-medium';
                        $img_size_sm = 'fp-small';

                        $videoLinkImage = get_sub_field('link_image');                      // Catalog Image
                        $imageHorizontal = get_field('horizontal_image');          // Custom Image

                        $videoLinkImageAlt = $videoLinkImage['alt']; /* Get image object alt */
                        $imageHorizontalAlt = $imageHorizontal['alt'];

                        /* Get custom sizes of our image sub_field */
                        $linkCustomImageLG = $videoLinkImage['sizes'][$img_size_lg];
                        $linkCustomImageMD = $videoLinkImage['sizes'][$img_size_md];
                        $linkCustomImageSM = $videoLinkImage['sizes'][$img_size_sm];

                        // custom featured image
                        $imageHorizontalLG = $imageHorizontal['sizes'][$img_size_lg];
                        $imageHorizontalMD = $imageHorizontal['sizes'][$img_size_md];
                        $imageHorizontalSM = $imageHorizontal['sizes'][$img_size_sm];
                ?>

                        <?php if (get_sub_field('show_large')) : ?>

                            <?php if (!empty($videoLinkImage)) : ?>

                                <div class="cell medium-6">

                                    <div class="callout callout-hover-reveal" data-callout-hover-reveal>

                                        <div class="callout-body">

                                            <div class="image-hover-wrapper">

                                                <a href="<?php echo $videoLinkURL; ?>" class="catalog-title" title="Watch <?php the_title_attribute(); ?> on <?php echo $videoLinkTitle; ?>" target="_blank" rel="noreferrer">

                                                    <span class="image-hover-wrapper-banner"><strong><?php echo $videoLinkTitle; ?></strong></span>

                                                    <img class="feat-pg" data-interchange="[<?php echo $linkCustomImageSM; ?>, small], [<?php echo $linkCustomImageMD; ?>, medium], [<?php echo $linkCustomImageLG; ?>, large]" alt="<?php echo $imageHorizontalAlt; ?>" />
                                                    <noscript>
                                                        <img src="<?php echo $linkCustomImageSM; ?>" alt="<?php echo $videoLinkImageAlt; ?>" />
                                                    </noscript>

                                                    <span class="image-hover-wrapper-reveal">

                                                        <p><strong><?php echo $videoHoverTitle; ?></strong><br>
                                                            <?php get_template_part('template-parts/svg/icon-play', ''); ?>
                                                        </p>

                                                    </span>

                                                </a>

                                                </span>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            <?php else : ?>

                                <div class="cell medium-6">

                                    <div class="callout callout-hover-reveal" data-callout-hover-reveal>

                                        <div class="callout-body">

                                            <?php // no image uploaded ?>
                                            <div class="image-hover-wrapper">

                                                <a href="<?php echo $videoLinkURL; ?>" class="catalog-title solo" title="Permanent Link to <?php the_title_attribute(); ?>" target="_blank" rel="noreferrer">

                                                    <span class="image-hover-wrapper-banner"><strong><?php echo $videoLinkTitle; ?></strong></span>

                                                    <img class="feat-pg" data-interchange="[<?php echo $imageHorizontalSM; ?>, small], [<?php echo $imageHorizontalMD; ?>, medium], [<?php echo $imageHorizontalLG; ?>, large]" alt="<?php echo $imageHorizontalAlt; ?>" />
                                                    <noscript>
                                                        <img src="<?php echo $imageHorizontalSM; ?>" alt="<?php echo $imageHorizontalAlt; ?>" />
                                                    </noscript>

                                                    <span class="image-hover-wrapper-reveal">

                                                        <p><strong>Watch Now</strong><br>
                                                            <?php get_template_part('template-parts/svg/icon-play', ''); ?>
                                                        </p>

                                                    </span>

                                                </a>

                                                </span>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            <?php endif; ?>

                        <?php else : ?>

                            <div class="cell large-4 medium-12 small-12">

                                <div class="callout callout-hover-reveal" data-callout-hover-reveal>

                                    <div class="callout-body image-hover-wrapper solo-link">

                                        <span class="image-hover-wrapper-reveal">

                                            <a href="<?php echo $videoLinkURL; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $videoLinkTitle; ?>" target="_blank" rel="noreferrer">

                                                <p><strong><?php echo $videoLinkTitle; ?></strong></p>

                                            </a>

                                        </span>

                                    </div>

                                </div>

                            </div>

                        <?php endif; ?>

                <?php
                    // End loop.
                    endwhile;

                // No value.
                else :
                // Do something...


                endif;
                ?>
                <?php // END custom VIDEO link ?>
                <?php get_template_part('template-parts/catalog/catalog-links-video'); ?>

            </div>

        </div>

    </div>

<?php }; ?>

<?php if (get_field('show_audio_links')) { ?>

    <div class="grid-x catalog-large-links grid-container grid-padding-x mt-medium-3" id="catalog_links">

        <div class="cell link-lg">
            <h2 class="white-color">
                Listen Now
            </h2>
            <div class="grid-x grid-padding-x">

                <?php // large links ?>
                <?php
                // Check rows exists.
                if (have_rows('audio_new_large_link')) :

                    while (have_rows('audio_new_large_link')) : the_row();

                        $videoLinkTitle = get_sub_field('audio_link_title');
                        $videoLinkURL = get_sub_field('audio_link_url');
                        $videoHoverTitle = get_sub_field('audio_hover_title');


                        $img_size_lg = 'fp-large';
                        $img_size_md = 'fp-medium';
                        $img_size_sm = 'fp-small';

                        $videoLinkImage = get_sub_field('audio_link_image');                      // Catalog Image
                        $imageHorizontal = get_field('horizontal_image');          // Custom Image

                        $videoLinkImageAlt = $videoLinkImage['alt']; /* Get image object alt */
                        $imageHorizontalAlt = $imageHorizontal['alt'];

                        /* Get custom sizes of our image sub_field */
                        $linkCustomImageLG = $videoLinkImage['sizes'][$img_size_lg];
                        $linkCustomImageMD = $videoLinkImage['sizes'][$img_size_md];
                        $linkCustomImageSM = $videoLinkImage['sizes'][$img_size_sm];

                        // custom featured image
                        $imageHorizontalLG = $imageHorizontal['sizes'][$img_size_lg];
                        $imageHorizontalMD = $imageHorizontal['sizes'][$img_size_md];
                        $imageHorizontalSM = $imageHorizontal['sizes'][$img_size_sm];
                ?>

                        <?php if (get_sub_field('audio_show_large')) : ?>

                            <?php if (!empty($videoLinkImage)) : ?>

                                <div class="cell medium-6">

                                    <div class="callout callout-hover-reveal" data-callout-hover-reveal>

                                        <div class="callout-body">

                                            <div class="image-hover-wrapper">

                                                <a href="<?php echo $videoLinkURL; ?>" class="catalog-title" rel="bookmark" title="Watch <?php the_title_attribute(); ?> on <?php echo $videoLinkTitle; ?>" target="_blank" rel="noreferrer">

                                                    <span class="image-hover-wrapper-banner"><strong><?php echo $videoLinkTitle; ?></strong></span>

                                                    <img class="feat-pg" data-interchange="[<?php echo $linkCustomImageSM; ?>, small], [<?php echo $linkCustomImageMD; ?>, medium], [<?php echo $linkCustomImageLG; ?>, large]" alt="<?php echo $imageHorizontalAlt; ?>" />
                                                    <noscript>
                                                        <img src="<?php echo $linkCustomImageSM; ?>" alt="<?php echo $videoLinkImageAlt; ?>" />
                                                    </noscript>

                                                    <span class="image-hover-wrapper-reveal">

                                                        <p><strong><?php echo $videoHoverTitle; ?></strong><br>
                                                            <?php get_template_part('template-parts/svg/icon-play', ''); ?>
                                                        </p>

                                                    </span>

                                                </a>

                                                </span>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            <?php else : ?>

                                <div class="cell medium-6">

                                    <div class="callout callout-hover-reveal" data-callout-hover-reveal>

                                        <div class="callout-body">

                                            <?php // no image uploaded ?>
                                            <div class="image-hover-wrapper">

                                                <a href="<?php echo $videoLinkURL; ?>" class="catalog-title solo" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" target="_blank" rel="noreferrer">

                                                    <span class="image-hover-wrapper-banner"><strong><?php echo $videoLinkTitle; ?></strong></span>

                                                    <img class="feat-pg" data-interchange="[<?php echo $imageHorizontalSM; ?>, small], [<?php echo $imageHorizontalMD; ?>, medium], [<?php echo $imageHorizontalLG; ?>, large]" alt="<?php echo $imageHorizontalAlt; ?>" />
                                                    <noscript>
                                                        <img src="<?php echo $imageHorizontalSM; ?>" alt="<?php echo $imageHorizontalAlt; ?>" />
                                                    </noscript>

                                                    <span class="image-hover-wrapper-reveal">

                                                        <p><strong>Watch Now</strong><br>
                                                            <?php get_template_part('template-parts/svg/icon-play', ''); ?>
                                                        </p>

                                                    </span>

                                                </a>

                                                </span>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            <?php endif; ?>

                        <?php else : ?>

                            <div class="cell large-4 medium-12 small-12">

                                <div class="callout callout-hover-reveal" data-callout-hover-reveal>

                                    <div class="callout-body image-hover-wrapper solo-link">

                                        <span class="image-hover-wrapper-reveal">

                                            <a href="<?php echo $videoLinkURL; ?>" class="catalog-title button hollow expanded" rel="bookmark" title="Watch <?php the_title_attribute(); ?> on <?php echo $videoLinkTitle; ?>" target="_blank" rel="noreferrer">

                                                <p><strong><?php echo $videoLinkTitle; ?></strong></p>

                                            </a>

                                        </span>

                                    </div>

                                </div>

                            </div>

                        <?php endif; ?>

                <?php
                    // End loop.
                    endwhile;

                // No value.
                else :
                // Do something...


                endif;
                ?>
                <?php // END custom VIDEO link ?>
                <?php get_template_part('template-parts/catalog/catalog-links-audio'); ?>

            </div>
        </div>

    </div>
<?php }; ?>