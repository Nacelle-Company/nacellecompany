<?php
$term = get_queried_object();

$artistName = $term->name;
$bio = get_field('bio', $term);
$profile_image = get_field('profile_pic', $term);

// bio photo size
$profile_img_size_lg = 'fp-large';
$profile_img_size_md = 'fp-medium';
$profile_img_size_sm = 'fp-small';

$profile_hero_image_alt = $profile_image['alt']; /* Get image object alt */
/* Get custom sizes of our image sub_field */
$profile_hero_lg = $profile_image['sizes'][$profile_img_size_lg];
$profile_hero_md = $profile_image['sizes'][$profile_img_size_md];
$profile_hero_sm = $profile_image['sizes'][$profile_img_size_sm];
// END variables

?>
<div class="cell grid-container primary-title my-3">
    <h2 class="entry-title mb-0"><?php echo $artistName . ' Bio'; ?></h2>
</div>
<!-- BIO SECTION -->
<div class="grid-x grid-container grid-padding-x">

    <div class="cell">

        <div class="grid-x align-center grid-padding-x grid-padding-y">

            <?php
            if (!empty($profile_image)) :
            ?>

                <div class="cell small-6 profile-image">

                    <img rel="preconnect" class="my-hero superman" data-interchange="[<?php echo $profile_hero_md; ?>, default], [<?php echo $profile_hero_sm; ?>, small], [<?php echo $profile_hero_md; ?>, medium]" alt="<?php echo $profile_hero_image_alt; ?>" />

                    <noscript><img src="<?php echo $profile_hero_lg; ?>" alt="<?php echo $profile_hero_image_alt; ?>" /></noscript>

                </div>

            <?php endif; ?>

            <div class="cell small-6">

                <?php $description = get_field('bio', $term);
                echo $description; ?>

            </div>

        </div>

    </div>

</div>