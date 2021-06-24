<?php if (get_field('show_video_links')) : ?>
    <div class="grid-x px-medium-3 px-large-4 small-margin-collapse" id="catalog_links">
        <div class="cell link-lg">
            <h2 class="h3">
                <?php _e('Watch Now', 'nacelle'); ?>
            </h2>
            <div class="grid-x grid-margin-x large-up-3">
                <?php if (have_rows('new_large_link')) : ?>
                    <?php while (have_rows('new_large_link')) : the_row();
                        $videoLinkTitle = get_sub_field('link_title');
                        $videoLinkURL = get_sub_field('link_url');
                        $videoHoverTitle = get_sub_field('hover_title');
                        $img_size_lg = 'fp-large';
                        $img_size_md = 'fp-medium';
                        $img_size_sm = 'fp-small';
                        $videoLinkImage = get_sub_field('link_image');
                        $imageHorizontal = get_field('horizontal_image');
                        $videoLinkImageAlt = $videoLinkImage['alt'];
                        $imageHorizontalAlt = $imageHorizontal['alt'];
                        $linkCustomImageLG = $videoLinkImage['sizes'][$img_size_lg];
                        $linkCustomImageMD = $videoLinkImage['sizes'][$img_size_md];
                        $linkCustomImageSM = $videoLinkImage['sizes'][$img_size_sm];
                        $imageHorizontalLG = $imageHorizontal['sizes'][$img_size_lg];
                        $imageHorizontalMD = $imageHorizontal['sizes'][$img_size_md];
                        $imageHorizontalSM = $imageHorizontal['sizes'][$img_size_sm];
                        $word = "apple";
                        $mystring = $videoLinkTitle;
                        if (strpos($mystring, $word) !== false) {
                            $apple = 'apple-link';
                        } else {
                            $apple = '';
                        }

                        if (get_sub_field('show_large')) : ?>
                            <?php if (!empty($videoLinkImage)) : ?>
                                <div class="cell">
                                    <div class="callout" data-callout-hover-reveal>
                                        <div class="callout-body">
                                            <div class="image-hover-wrapper">
                                                <a href="<?php echo $videoLinkURL; ?>" class="catalog-title <?php echo $apple; ?>" title="Watch <?php the_title_attribute(); ?> on <?php echo $videoLinkTitle; ?>" target="_blank" rel="noreferrer">
                                                    <span class="image-hover-wrapper-banner">
                                                        <strong>
                                                            <?php echo $videoLinkTitle; ?>
                                                        </strong>
                                                    </span>
                                                    <img class="feat-pg" data-interchange="[<?php echo $linkCustomImageSM; ?>, small], [<?php echo $linkCustomImageMD; ?>, medium], [<?php echo $linkCustomImageLG; ?>, large]" alt="<?php echo $videoLinkImageAlt; ?>" />
                                                    <noscript>
                                                        <img src="<?php echo $linkCustomImageSM; ?>" alt="<?php echo $videoLinkImageAlt; ?>" />
                                                    </noscript>
                                                    <span class="image-hover-wrapper-reveal">
                                                        <p><strong><?php echo $videoHoverTitle; ?></strong><br>
                                                            <?php get_template_part('template-parts/svg/icon-play', ''); ?>
                                                        </p>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="cell">
                                    <div class="callout" data-callout-hover-reveal>
                                        <div class="callout-body">
                                            <div class="image-hover-wrapper">

                                                <a href="<?php echo $videoLinkURL; ?>" class="catalog-title solo <?php echo $apple; ?>" title="Permanent Link to <?php the_title_attribute(); ?>" target="_blank" rel="noreferrer">
                                                    <span class="image-hover-wrapper-banner">
                                                        <strong>
                                                            <?php echo $videoLinkTitle; ?>
                                                        </strong>
                                                        <svg class="icon" width="20" height="20" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M16.875 12.5h-1.25a.625.625 0 00-.625.625V17.5H2.5V5h5.625c.345 0 .625-.28.625-.625v-1.25a.625.625 0 00-.625-.625h-6.25C.839 2.5 0 3.34 0 4.375v13.75C0 19.161.84 20 1.875 20h13.75c1.036 0 1.875-.84 1.875-1.875v-5a.625.625 0 00-.625-.625zM19.063 0h-5c-.835 0-1.252 1.012-.665 1.602l1.396 1.395-9.52 9.517a.938.938 0 000 1.329l.885.884a.937.937 0 001.328 0l9.516-9.52 1.395 1.395c.586.585 1.602.175 1.602-.665v-5A.937.937 0 0019.062 0z" />
                                                        </svg>
                                                    </span>
                                                    <img class="feat-pg" data-interchange="[<?php echo $imageHorizontalSM; ?>, small], [<?php echo $imageHorizontalMD; ?>, medium], [<?php echo $imageHorizontalLG; ?>, large]" alt="<?php echo $imageHorizontalAlt; ?>" />
                                                    <noscript>
                                                        <img src="<?php echo $imageHorizontalSM; ?>" alt="<?php echo $imageHorizontalAlt; ?>" />
                                                    </noscript>
                                                    <span class="image-hover-wrapper-reveal">
                                                        <p><strong><?php _e('Watch Now', 'nacelle'); ?></strong><br>
                                                            <?php get_template_part('template-parts/svg/icon-play', ''); ?>
                                                        </p>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php else : ?>
                            <div class="cell">
                                <div class="callout" data-callout-hover-reveal>
                                    <div class="callout-body image-hover-wrapper">
                                        <span class="image-hover-wrapper-reveal">
                                            <a href="<?php echo $videoLinkURL; ?>" class="catalog-title button hollow expanded <?php echo $apple; ?>" title="Watch <?php the_title_attribute(); ?> on <?php echo $videoLinkTitle; ?>" target="_blank" rel="noreferrer"><strong><?php echo $videoLinkTitle; ?></strong><svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                                                </svg></a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php else : ?>
                <?php endif; ?>
                <?php get_template_part('template-parts/catalog/catalog-links-video'); ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if (get_field('show_audio_links')) : ?>
    <div class="grid-x px-medium-3 px-large-4 small-margin-collapse" id="catalog_links">
        <div class="cell link-lg">
            <h2 class="h3"><?php _e('Listen Now', 'nacelle'); ?></h2>
            <div class="grid-x grid-margin-x large-up-2 xlarge-up-3">
                <?php if (have_rows('audio_new_large_link')) : ?>
                    <?php while (have_rows('audio_new_large_link')) : the_row();
                        $videoLinkTitle = get_sub_field('audio_link_title');
                        $videoLinkURL = get_sub_field('audio_link_url');
                        $videoHoverTitle = get_sub_field('audio_hover_title');
                        $img_size_lg = 'fp-large';
                        $img_size_md = 'fp-medium';
                        $img_size_sm = 'fp-small';
                        $videoLinkImage = get_sub_field('audio_link_image');
                        $imageHorizontal = get_field('horizontal_image');
                        $videoLinkImageAlt = $videoLinkImage['alt'];
                        $imageHorizontalAlt = $imageHorizontal['alt'];
                        $linkCustomImageLG = $videoLinkImage['sizes'][$img_size_lg];
                        $linkCustomImageMD = $videoLinkImage['sizes'][$img_size_md];
                        $linkCustomImageSM = $videoLinkImage['sizes'][$img_size_sm];
                        $imageHorizontalLG = $imageHorizontal['sizes'][$img_size_lg];
                        $imageHorizontalMD = $imageHorizontal['sizes'][$img_size_md];
                        $imageHorizontalSM = $imageHorizontal['sizes'][$img_size_sm];
                        if (get_sub_field('audio_show_large')) : ?>
                            <?php if (!empty($videoLinkImage)) : ?>
                                <div class="cell">
                                    <div class="callout" data-callout-hover-reveal>
                                        <div class="callout-body">
                                            <div class="image-hover-wrapper">
                                                <a href="<?php echo $videoLinkURL; ?>" class="catalog-title" rel="bookmark" title="Watch <?php the_title_attribute(); ?> on <?php echo $videoLinkTitle; ?>" target="_blank" rel="noreferrer">
                                                    <span class="image-hover-wrapper-banner"><strong><?php echo $videoLinkTitle; ?></strong></span>
                                                    <img class="feat-pg" data-interchange="[<?php echo $linkCustomImageSM; ?>, small], [<?php echo $linkCustomImageMD; ?>, medium], [<?php echo $linkCustomImageLG; ?>, large]" alt="<?php echo $imageHorizontalAlt; ?>" />
                                                    <noscript>
                                                        <img src="<?php echo $linkCustomImageSM; ?>" alt="<?php echo $videoLinkImageAlt; ?>" />
                                                    </noscript>
                                                    <span class="image-hover-wrapper-reveal">
                                                        <p><strong><?php echo $videoHoverTitle; ?></strong><br><?php get_template_part('template-parts/svg/icon-play', ''); ?></p>
                                                    </span>
                                                </a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="cell">
                                    <div class="callout" data-callout-hover-reveal>
                                        <div class="callout-body">
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
                            <div class="cell">
                                <div class="callout" data-callout-hover-reveal>
                                    <div class="callout-body image-hover-wrapper">
                                        <span class="image-hover-wrapper-reveal">
                                            <a href="<?php echo $videoLinkURL; ?>" class="catalog-title button hollow expanded" rel="bookmark" title="Watch <?php the_title_attribute(); ?>on <?php echo $videoLinkTitle; ?>" target="_blank" rel="noreferrer"><strong><?php echo $videoLinkTitle; ?></strong><svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                                                </svg></a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php else : ?>
                <?php endif; ?>
                <?php get_template_part('template-parts/catalog/catalog-links-audio'); ?>
            </div>
        </div>
    </div>
<?php endif; ?>