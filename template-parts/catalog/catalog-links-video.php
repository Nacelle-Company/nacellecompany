<?php
$youTubeV = get_post_meta(get_the_ID(), 'youtube_video', true);
$itunesV = get_post_meta(get_the_ID(), 'itunes_video', true);
$googlePlayV = get_post_meta(get_the_ID(), 'google_play_video', true);
$amazonV = get_post_meta(get_the_ID(), 'amazon_video', true);
$steamV = get_post_meta(get_the_ID(), 'steam_video', true);
$microsoftV = get_post_meta(get_the_ID(), 'microsoft_video', true);
$vuduV = get_post_meta(get_the_ID(), 'vudu_video', true);
$vimeoV = get_post_meta(get_the_ID(), 'vimeo_video', true);
$netflixV = get_post_meta(get_the_ID(), 'netflix_video', true);
$animalNationV = get_post_meta(get_the_ID(), 'animal_nation_video', true);
$hooplaV = get_post_meta(get_the_ID(), 'hoopla_video', true);
$tubiV = get_post_meta(get_the_ID(), 'tubi_video', true);
$breakerV = get_post_meta(get_the_ID(), 'breaker_video_link', true);
$huluV = get_post_meta(get_the_ID(), 'hulu_video', true);
$epixV = get_post_meta(get_the_ID(), 'epix_video', true);
$comcastV = get_post_meta(get_the_ID(), 'comcast', true);
$redboxV = get_post_meta(get_the_ID(), 'redbox', true);
$walmartV = get_post_meta(get_the_ID(), 'walmart', true);
$targetV = get_post_meta(get_the_ID(), 'target', true);
$fandangoV = get_post_meta(get_the_ID(), 'fandango', true);
$mtv2V = get_post_meta(get_the_ID(), 'mtv2_video', true);
?>
<?php if ($youTubeV) : ?>
    <div class="cell">
        <a href="<?php echo $youTubeV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $youTubeV; ?>" target="_blank" rel="noreferrer">
            <strong>
                <?php _e("YouTube", 'Nacelle'); ?>
            </strong>
            <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
            </svg>
        </a>
    </div>
<?php endif; ?>
<?php if ($itunesV) : ?>
    <div class="cell">
        <a href="<?php echo $itunesV; ?>" class="catalog-title button hollow expanded apple-link" title="Watch <?php the_title_attribute(); ?> on <?php echo $itunesV; ?>" target="_blank" rel="noreferrer">
            <strong>
                <?php _e("Apple TV", 'Nacelle'); ?>
            </strong>
            <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
            </svg>
        </a>
    </div>
<?php endif; ?>
<?php if ($googlePlayV) : ?>
    <div class="cell">
        <a href="<?php echo $googlePlayV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $googlePlayV; ?>" target="_blank" rel="noreferrer">
            <strong>
                <?php _e("Google Play", 'Nacelle'); ?>
            </strong>
            <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
            </svg>
        </a>
    </div>
<?php endif; ?>
<?php if ($amazonV) : ?>
    <div class="cell">
        <a href="<?php echo $amazonV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $amazonV; ?>" target="_blank" rel="noreferrer">
            <strong>
                <?php _e("Amazon", 'Nacelle'); ?>
            </strong>
            <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
            </svg>
        </a>
    </div>
<?php endif; ?>
<?php if ($steamV) : ?>
    <div class="cell">
        <a href="<?php echo $steamV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $steamV; ?>" target="_blank" rel="noreferrer">
            <strong>
                <?php _e("Steam", 'Nacelle'); ?>
            </strong>
            <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
            </svg>
        </a>
    </div>
<?php endif; ?>
<?php if ($microsoftV) : ?>
    <div class="cell">
        <a href="<?php echo $microsoftV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $microsoftV; ?>" target="_blank" rel="noreferrer">
            <strong>
                <?php _e("Microsoft", 'Nacelle'); ?>
            </strong>
            <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
            </svg>
        </a>
    </div>
<?php endif; ?>
<?php if ($vuduV) : ?>
    <div class="cell">
        <a href="<?php echo $vuduV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $vuduV; ?>" target="_blank" rel="noreferrer">
            <strong>
                <?php _e("Vudu", 'Nacelle'); ?>
            </strong>
            <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
            </svg>
        </a>
    </div>
<?php endif; ?>
<?php if ($vimeoV) : ?>
    <div class="cell">
        <a href="<?php echo $vimeoV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $vimeoV; ?>" target="_blank" rel="noreferrer">
            <strong>
                <?php _e("Vimeo", 'Nacelle'); ?>
            </strong>
            <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
            </svg>
        </a>
    </div>
<?php endif; ?>
<?php if ($netflixV) : ?>
    <div class="cell">
        <a href="<?php echo $netflixV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $netflixV; ?>" target="_blank" rel="noreferrer">
            <strong>
                <?php _e("Netflix", 'Nacelle'); ?>
            </strong>
            <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
            </svg>
        </a>
    </div>
<?php endif; ?>
<?php if ($animalNationV) : ?>
    <div class="cell">
        <a href="<?php echo $animalNationV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $animalNationV; ?>" target="_blank" rel="noreferrer">
            <strong>
                <?php _e("Animal Nation", 'Nacelle'); ?>
            </strong>
            <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
            </svg>
        </a>
    </div>
<?php endif; ?>
<?php if ($breakerV) : ?>
    <div class="cell">
        <a href="<?php echo $breakerV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $breakerV; ?>" target="_blank" rel="noreferrer">
            <strong>
                <?php _e("Breaker", 'Nacelle'); ?>
            </strong>
            <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
            </svg>
        </a>
    </div>
<?php endif; ?>

<?php if ($huluV) : ?>
    <div class="cell">
        <a href="<?php echo $huluV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $huluV; ?>" target="_blank" rel="noreferrer">
            <strong>
                <?php _e("HULU", 'Nacelle'); ?>
            </strong>
            <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
            </svg>
        </a>
    </div>
<?php endif; ?>
<?php if ($epixV) : ?>
    <div class="cell">
        <a href="<?php echo $epixV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $epixV; ?>" target="_blank" rel="noreferrer">
            <strong>
                <?php _e("EPIX", 'Nacelle'); ?>
            </strong>
            <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
            </svg>
        </a>
    </div>
<?php endif; ?>
<?php if ($comcastV) : ?>
    <div class="cell">
        <a href="<?php echo $comcastV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $comcastV; ?>" target="_blank" rel="noreferrer">
            <strong>
                <?php _e("Comcast", 'Nacelle'); ?>
            </strong>
        </a>
    </div>
<?php endif; ?>
<?php if ($redboxV) : ?>
    <div class="cell">
        <a href="<?php echo $redboxV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $redboxV; ?>" target="_blank" rel="noreferrer">
            <strong>
                <?php _e("Redbox", 'Nacelle'); ?>
            </strong>
            <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
            </svg>
        </a>
    </div>
<?php endif; ?>

<?php if ($walmartV) : ?>
    <div class="cell">
        <a href="<?php echo $walmartV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $walmartV; ?>" target="_blank" rel="noreferrer">
            <strong>
                <?php _e("Walmart", 'Nacelle'); ?>
            </strong>
            <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
            </svg>
        </a>
    </div>
<?php endif; ?>
<?php if ($targetV) : ?>
    <div class="cell">
        <a href="<?php echo $targetV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $targetV; ?>" target="_blank" rel="noreferrer">
            <strong>
                <?php _e("Target", 'Nacelle'); ?>
            </strong>
            <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
            </svg>
        </a>
    </div>
<?php endif; ?>
<?php if ($fandangoV) : ?>
    <div class="cell">
        <a href="<?php echo $fandangoV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $fandangoV; ?>" target="_blank" rel="noreferrer">
            <strong>
                <?php _e("Fandango", 'Nacelle'); ?>
            </strong>
        </a>
    </div>
<?php endif; ?>
<?php if ($hooplaV) : ?>
    <div class="cell">
        <a href="<?php echo $hooplaV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $hooplaV; ?>" target="_blank" rel="noreferrer">
            <strong>
                <?php _e("Hoopla", 'Nacelle'); ?>
            </strong>
            <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
            </svg>
        </a>
    </div>
<?php endif; ?>
<?php if ($mtv2V) : ?>
    <div class="cell">
        <a href="<?php echo $mtv2V; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $mtv2V; ?>" target="_blank" rel="noreferrer">
            <strong>
                <?php _e("MTV2", 'Nacelle'); ?>
            </strong>
            <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
            </svg>
        </a>
    </div>
<?php endif; ?>
<?php if ($tubiV) : ?>
    <div class="cell">
        <a href="<?php echo $tubiV; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $tubiV; ?>" target="_blank" rel="noreferrer">
            <strong>
                <?php _e("Tubi", 'Nacelle'); ?>
            </strong>
            <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
            </svg>
        </a>
    </div>
<?php endif; ?>
<?php
if (have_rows('new_link')) :
    while (have_rows('new_link')) : the_row();
        $linkTitle = get_sub_field('link_title');
        $linkURL = get_sub_field('link_url');
        if (!empty($linkTitle)) : ?>
            <div class="cell">
                <a href="<?php echo $linkURL; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $linkTitle; ?>" target="_blank" rel="noreferrer">
                    <strong>
                        <?php echo $linkTitle; ?>
                    </strong>
                    <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                    </svg>
                </a>
            </div>
        <?php endif; ?>
    <?php endwhile; ?>
<?php else : ?>
<?php endif; ?>