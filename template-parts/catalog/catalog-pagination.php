<?php

/**
 * The Catalog Pagination
 *
 * Used on content-catalog.php
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */

// http://www.ambrosite.com/plugins/next-previous-post-link-plus-for-wordpress#faq
$album_cat = in_category('album');
$series_cat = in_category('series');
$special_cat = in_category('special');
$film_cat = in_category('film');
$production_series_cat = in_category('series-production');
$production_special_cat = in_category('special-production');
$news = is_singular('news');
$pressRelease = is_singular('press_release');
?>

<?php if ($series_cat) : ?>
    <div class="cell text-center">
        <?php previous_post_link_plus(array(
            'order_by' => 'post_title',
            'in_cats' => '1976',
            'format' => '%link',
            'link' => '<svg class="icon" width="20" height="10" xmlns="http://www.w3.org/2000/svg"><path d="M5.98 6.74h13.48c.3 0 .54-.24.54-.53V3.7c0-.3-.24-.54-.54-.54H5.98V1.11c0-.95-1.15-1.43-1.82-.75L.3 4.2c-.41.42-.41 1.1 0 1.51l3.85 3.84c.67.68 1.82.2 1.82-.75V6.74z" fill-rule="nonzero" /></svg></br>Prev'
        )); ?>
    </div>
    <div class="cell text-center">
        <?php next_post_link_plus(array(
            'order_by' => 'post_title',
            'in_cats' => '1976',
            'loop' => 'true',
            'format' => '%link',
            'link' => '<svg class="icon" width="20" height="10" xmlns="http://www.w3.org/2000/svg"><path d="M14.02 3.17H.54c-.3 0-.54.24-.54.54v2.5c0 .3.24.53.54.53h13.48V8.8c0 .95 1.15 1.43 1.82.75l3.85-3.84c.41-.42.41-1.1 0-1.51L15.84.36a1.07 1.07 0 00-1.82.75v2.06z" fill-rule="nonzero" /></svg></br>Next'
        )); ?>
    </div>

<?php elseif ($album_cat) : ?>
    <div class="cell text-center">
        <?php previous_post_link_plus(array(
            'order_by' => 'post_title',
            'in_cats' => '1974',
            'format' => '%link',
            'link' => '<svg class="icon" width="20" height="10" xmlns="http://www.w3.org/2000/svg"><path d="M5.98 6.74h13.48c.3 0 .54-.24.54-.53V3.7c0-.3-.24-.54-.54-.54H5.98V1.11c0-.95-1.15-1.43-1.82-.75L.3 4.2c-.41.42-.41 1.1 0 1.51l3.85 3.84c.67.68 1.82.2 1.82-.75V6.74z" fill-rule="nonzero" /></svg></br>Prev'
        )); ?>
    </div>
    <div class="cell text-center">
        <?php next_post_link_plus(array(
            'order_by' => 'post_title',
            'in_cats' => '1974',
            'loop' => 'true',
            'format' => '%link',
            'link' => '<svg class="icon" width="20" height="10" xmlns="http://www.w3.org/2000/svg"><path d="M14.02 3.17H.54c-.3 0-.54.24-.54.54v2.5c0 .3.24.53.54.53h13.48V8.8c0 .95 1.15 1.43 1.82.75l3.85-3.84c.41-.42.41-1.1 0-1.51L15.84.36a1.07 1.07 0 00-1.82.75v2.06z" fill-rule="nonzero" /></svg></br>Next'
        )); ?>
    </div>

<?php elseif ($special_cat) : ?>
    <div class="cell text-center">
        <?php previous_post_link_plus(array(
            'order_by' => 'post_title',
            'format' => '%link',
            'in_cats' => '1975',
            'format' => '%link',
            'link' => '<svg class="icon" width="20" height="10" xmlns="http://www.w3.org/2000/svg"><path d="M5.98 6.74h13.48c.3 0 .54-.24.54-.53V3.7c0-.3-.24-.54-.54-.54H5.98V1.11c0-.95-1.15-1.43-1.82-.75L.3 4.2c-.41.42-.41 1.1 0 1.51l3.85 3.84c.67.68 1.82.2 1.82-.75V6.74z" fill-rule="nonzero" /></svg></br>Prev'
        )); ?>
    </div>
    <div class="cell text-center">
        <?php next_post_link_plus(array(
            'order_by' => 'post_title',
            'in_cats' => '1975',
            'loop' => 'true',
            'format' => '%link',
            'link' => '<svg class="icon" width="20" height="10" xmlns="http://www.w3.org/2000/svg"><path d="M14.02 3.17H.54c-.3 0-.54.24-.54.54v2.5c0 .3.24.53.54.53h13.48V8.8c0 .95 1.15 1.43 1.82.75l3.85-3.84c.41-.42.41-1.1 0-1.51L15.84.36a1.07 1.07 0 00-1.82.75v2.06z" fill-rule="nonzero" /></svg></br>Next'
        )); ?>
    </div>

<?php elseif ($film_cat) : ?>
    <div class="cell text-center">
        <?php previous_post_link_plus(array(
            'order_by' => 'post_title',
            'in_cats' => '1973',
            'format' => '%link',
            'link' => '<svg class="icon" width="20" height="10" xmlns="http://www.w3.org/2000/svg"><path d="M5.98 6.74h13.48c.3 0 .54-.24.54-.53V3.7c0-.3-.24-.54-.54-.54H5.98V1.11c0-.95-1.15-1.43-1.82-.75L.3 4.2c-.41.42-.41 1.1 0 1.51l3.85 3.84c.67.68 1.82.2 1.82-.75V6.74z" fill-rule="nonzero" /></svg></br>Prev'
        )); ?>
    </div>
    <div class="cell text-center">
        <?php next_post_link_plus(array(
            'order_by' => 'post_title',
            'in_cats' => '1973',
            'loop' => 'true',
            'format' => '%link',
            'link' => '<svg class="icon" width="20" height="10" xmlns="http://www.w3.org/2000/svg"><path d="M14.02 3.17H.54c-.3 0-.54.24-.54.54v2.5c0 .3.24.53.54.53h13.48V8.8c0 .95 1.15 1.43 1.82.75l3.85-3.84c.41-.42.41-1.1 0-1.51L15.84.36a1.07 1.07 0 00-1.82.75v2.06z" fill-rule="nonzero" /></svg></br>Next'
        )); ?>
    </div>

<?php elseif ($production_series_cat) : ?>
    <div class="cell text-center">
        <?php previous_post_link_plus(array(
            'order_by' => 'post_title',
            'in_cats' => '1979',
            'format' => '%link',
            'link' => '<svg class="icon" width="20" height="10" xmlns="http://www.w3.org/2000/svg"><path d="M5.98 6.74h13.48c.3 0 .54-.24.54-.53V3.7c0-.3-.24-.54-.54-.54H5.98V1.11c0-.95-1.15-1.43-1.82-.75L.3 4.2c-.41.42-.41 1.1 0 1.51l3.85 3.84c.67.68 1.82.2 1.82-.75V6.74z" fill-rule="nonzero" /></svg></br>Prev'
        )); ?>
    </div>
    <div class="cell text-center">
        <?php next_post_link_plus(array(
            'order_by' => 'post_title',
            'in_cats' => '1979',
            'loop' => 'true', 'format' => '%link',
            'link' => '<svg class="icon" width="20" height="10" xmlns="http://www.w3.org/2000/svg"><path d="M14.02 3.17H.54c-.3 0-.54.24-.54.54v2.5c0 .3.24.53.54.53h13.48V8.8c0 .95 1.15 1.43 1.82.75l3.85-3.84c.41-.42.41-1.1 0-1.51L15.84.36a1.07 1.07 0 00-1.82.75v2.06z" fill-rule="nonzero" /></svg></br>Next'
        )); ?>
    </div>

<?php elseif ($production_special_cat) : ?>
    <div class="cell text-center">
        <?php previous_post_link_plus(array(
            'order_by' => 'post_title',
            'in_cats' => '1980',
            'format' => '%link',
            'link' => '<svg class="icon" width="20" height="10" xmlns="http://www.w3.org/2000/svg"><path d="M5.98 6.74h13.48c.3 0 .54-.24.54-.53V3.7c0-.3-.24-.54-.54-.54H5.98V1.11c0-.95-1.15-1.43-1.82-.75L.3 4.2c-.41.42-.41 1.1 0 1.51l3.85 3.84c.67.68 1.82.2 1.82-.75V6.74z" fill-rule="nonzero" /></svg></br>Prev'
        )); ?>
    </div>
    <div class="cell text-center">
        <?php next_post_link_plus(array(
            'order_by' => 'post_title',
            'in_cats' => '1980',
            'loop' => 'true',
            'format' => '%link',
            'link' => '<svg class="icon" width="20" height="10" xmlns="http://www.w3.org/2000/svg"><path d="M14.02 3.17H.54c-.3 0-.54.24-.54.54v2.5c0 .3.24.53.54.53h13.48V8.8c0 .95 1.15 1.43 1.82.75l3.85-3.84c.41-.42.41-1.1 0-1.51L15.84.36a1.07 1.07 0 00-1.82.75v2.06z" fill-rule="nonzero" /></svg></br>Next'
        )); ?>
    </div>

<?php elseif ($news || $pressRelease) : ?>
    <div class="grid-x medium-up-2 grid-margin-x align-stretch">
        <div class="cell flex-container pag-img-wrapper prev mb-2">
            <div class="grid-y p-2 align-center">
                <div class="cell flex-container">
                    <?php
                    $prevBefore = '<div class="flex-container align-middle"><svg class="icon" width="20" height="10" xmlns="http://www.w3.org/2000/svg"><path d="M5.98 6.74h13.48c.3 0 .54-.24.54-.53V3.7c0-.3-.24-.54-.54-.54H5.98V1.11c0-.95-1.15-1.43-1.82-.75L.3 4.2c-.41.42-.41 1.1 0 1.51l3.85 3.84c.67.68 1.82.2 1.82-.75V6.74z" fill-rule="nonzero" /></svg><h4 class="mb-0 pl-1">Prev</h4></div>';
                    previous_post_link_plus(array(
                        'order_by' => 'post_title',
                        'format' => '%link',
                        'thumb' => 'thumbnail',
                        'link' => $prevBefore . '%title',
                        'before' => '<div class="flex-container align-center-middle">',
                        'after' => '</div>',
                        'tooltip' => 'Previous news post'
                    )); ?>
                </div>
            </div>
        </div>
        <div class="cell flex-container pag-img-wrapper next mb-2">
            <div class="grid-y p-2 align-center">
                <div class="cell flex-container">
                    <?php
                    $nextBefore = '<div class="flex-container align-middle align-right"><h4 class="mb-0 pr-1">Next</h4><svg class="icon" width="20" height="10" xmlns="http://www.w3.org/2000/svg"><path d="M14.02 3.17H.54c-.3 0-.54.24-.54.54v2.5c0 .3.24.53.54.53h13.48V8.8c0 .95 1.15 1.43 1.82.75l3.85-3.84c.41-.42.41-1.1 0-1.51L15.84.36a1.07 1.07 0 00-1.82.75v2.06z" fill-rule="nonzero" /></svg></div>';
                    next_post_link_plus(array(
                        'order_by' => 'post_title',
                        'format' => '%link',
                        'thumb' => 'thumbnail',
                        'loop' => true,
                        'link' => $nextBefore . '%title',
                        'before' => '<div class="flex-container align-center-middle text-right">',
                        'after' => '</div>',
                        'tooltip' => 'Next news post'
                    )); ?>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>