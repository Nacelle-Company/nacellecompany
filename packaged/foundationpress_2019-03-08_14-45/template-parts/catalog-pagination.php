
<?php
/**
 * The Catalog Pagination
 *
 * Used on content-catalog.php
 *
 * @package Comedy_Dynamics
 * @since Comedy_Dynamics 1.0.0
 */

// http://www.ambrosite.com/plugins/next-previous-post-link-plus-for-wordpress#faq
$album_cat = in_category('1974');
$series_cat = in_category('1976');
$special_cat = in_category('1975');
$film_cat = in_category('1973');
$production_series_cat = in_category('1979');
$production_special_cat = in_category('1980');
?>

<?php if ($series_cat) : ?>
    <div class="cell text-center">
        <?php previous_post_link_plus(array('order_by' => 'post_title','in_cats' => '1976', 'format' => '%link', 'link' => '<i class="fas fa-long-arrow-alt-left"></i></br>Prev')); ?>
    </div>
    <div class="cell text-center">
        <?php next_post_link_plus(array('order_by' => 'post_title','in_cats' => '1976','loop' => 'true', 'format' => '%link', 'link' => '<i class="fas fa-long-arrow-alt-right"></i></br>Next')); ?>
    </div>

<?php elseif ($album_cat) : ?>
    <div class="cell text-center">
        <?php previous_post_link_plus(array('order_by' => 'post_title','in_cats' => '1974', 'format' => '%link', 'link' => '<i class="fas fa-long-arrow-alt-left"></i></br>Prev')); ?>
    </div>
    <div class="cell text-center">
        <?php next_post_link_plus(array('order_by' => 'post_title','in_cats' => '1974','loop' => 'true', 'format' => '%link', 'link' => '<i class="fas fa-long-arrow-alt-right"></i></br>Next')); ?>
    </div>

<?php elseif ($special_cat) : ?>
    <div class="cell text-center">
        <?php previous_post_link_plus(array('order_by' => 'post_title','in_cats' => '1975', 'format' => '%link', 'link' => '<i class="fas fa-long-arrow-alt-left"></i></br>Prev')); ?>
    </div>
    <div class="cell text-center">
        <?php next_post_link_plus(array('order_by' => 'post_title','in_cats' => '1975','loop' => 'true', 'format' => '%link', 'link' => '<i class="fas fa-long-arrow-alt-right"></i></br>Next')); ?>
    </div>

<?php elseif ($film_cat) : ?>
    <div class="cell text-center">
        <?php previous_post_link_plus(array('order_by' => 'post_title','in_cats' => '1973', 'format' => '%link', 'link' => '<i class="fas fa-long-arrow-alt-left"></i></br>Prev')); ?>
    </div>
    <div class="cell text-center">
        <?php next_post_link_plus(array('order_by' => 'post_title','in_cats' => '1973','loop' => 'true', 'format' => '%link', 'link' => '<i class="fas fa-long-arrow-alt-right"></i></br>Next')); ?>
    </div>

<?php elseif ($production_series_cat) : ?>
    <div class="cell text-center">
        <?php previous_post_link_plus(array('order_by' => 'post_title','in_cats' => '1979', 'format' => '%link', 'link' => '<i class="fas fa-long-arrow-alt-left"></i></br>Prev')); ?>
    </div>
    <div class="cell text-center">
        <?php next_post_link_plus(array('order_by' => 'post_title','in_cats' => '1979','loop' => 'true', 'format' => '%link', 'link' => '<i class="fas fa-long-arrow-alt-right"></i></br>Next')); ?>
    </div>

<?php elseif ($production_special_cat) : ?>
    <div class="cell text-center">
        <?php previous_post_link_plus(array('order_by' => 'post_title','in_cats' => '1980', 'format' => '%link', 'link' => '<i class="fas fa-long-arrow-alt-left"></i></br>Prev')); ?>
    </div>
    <div class="cell text-center">
        <?php next_post_link_plus(array('order_by' => 'post_title','in_cats' => '1980','loop' => 'true', 'format' => '%link', 'link' => '<i class="fas fa-long-arrow-alt-right"></i></br>Next')); ?>
    </div>

<?php endif; ?>
