<?php

$term = get_queried_object();

// for the catalog pages
// simply get the video_embedd field
// no need to worry about the talent pages
$video_embedd_exist = get_field('video_embedd');
if ($video_embedd_exist) {
    echo the_field('video_embedd');
}

$artistSlug = $term->slug;
// args
$embedd_args = array(
    'post_type'         => 'catalog',
    'orderby'           => 'DSC',
    'posts_per_page'    => 1,
    'meta_key' => 'video_embedd',
    'meta_value' => array(''),
    'meta_compare' => 'NOT IN',
    'tax_query' => array(
        'relation' => 'OR',
        array(
            'taxonomy' => 'main_talent',
            'field'    => 'slug',
            'terms'    => $artistSlug,
        ),
        array(
            'taxonomy' => 'producers',
            'field'    => 'slug',
            'terms'    => $artistSlug,
        ),
        array(
            'taxonomy' => 'directors',
            'field'    => 'slug',
            'terms'    => $artistSlug,
        ),
        array(
            'taxonomy' => 'writers',
            'field'    => 'slug',
            'terms'    => $artistSlug,
        ),
    ),
);
$talent_args = array(
    'post_type'         => 'catalog',
    'orderby'           => 'DSC',
    'posts_per_page'    => 1,
    'meta_key' => 'main_talent_hero_video',
    'meta_value' => array(''),
    'meta_compare' => 'NOT IN',
    'tax_query' => array(
        'relation' => 'OR',
        array(
            'taxonomy' => 'main_talent',
            'field'    => 'slug',
            'terms'    => $artistSlug,
        ),
        array(
            'taxonomy' => 'producers',
            'field'    => 'slug',
            'terms'    => $artistSlug,
        ),
        array(
            'taxonomy' => 'directors',
            'field'    => 'slug',
            'terms'    => $artistSlug,
        ),
        array(
            'taxonomy' => 'writers',
            'field'    => 'slug',
            'terms'    => $artistSlug,
        ),
    ),
);
// var_dump($talent_args);
// The EMBEDD Query
$query_embedd = new WP_Query($embedd_args);

// The EMBEDD Loop
while ( $query_embedd->have_posts() ) {
$query_embedd->the_post();
    // talent page shows this
    $videoEmbedd = get_field('video_embedd', $post->ID);
    $videoTalent = get_field('main_talent_hero_video', $term);
    if(!empty($videoTalent)) {
        echo $videoTalent;
    } elseif ($videoEmbedd) {
        echo $videoEmbedd;
    }
}
wp_reset_postdata();



/* The TALENT Query (without global var) */
$query_talent = new WP_Query($talent_args);

// The TALENT Loop
while ( $query_talent->have_posts() ) {
$query_talent->the_post();
    // $videoTalent = get_field('main_talent_hero_video', $term);
    // echo $videoTalent;
}

// Restore original Post Data
wp_reset_postdata();
