<?php
// widgets with acf

add_filter('dynamic_sidebar_params', 'my_dynamic_sidebar_params');

function my_dynamic_sidebar_params($params)
{

    // get widget vars
    $widget_name = $params[0]['widget_name'];
    $widget_id = $params[0]['widget_id'];

    // add color style to before_widget
    $facebook = get_field('facebook', 'widget_' . $widget_id);
    $twitter = get_field('twitter', 'widget_' . $widget_id);
    $instagram = get_field('instagram', 'widget_' . $widget_id);
    $youtube = get_field('youtube', 'widget_' . $widget_id);
    $soundcloud = get_field('soundcloud', 'widget_' . $widget_id);
    $spotify = get_field('spotify', 'widget_' . $widget_id);
    $showContactModal = get_field('show_contact_modal', 'widget_' . $widget_id);
    $contactModal = get_field('contact_modal', 'widget_' . $widget_id);

?>

    <div class="flex-container flex-dir-column large-flex-dir-row align-middle align-right social">

        <?php if (!empty($showContactModal)) : ?>
            <div class="contact-modal mb-2 mb-medium-0">
                <button class="button clear px-0 mb-0" data-open="contactModal">
                    <?php _e('Contact', 'nacelle'); ?>
                </button>
            </div>
        <?php endif; ?>
        <div class="flex-container align-middle align-justify icon-wrapper">
            <?php if (!empty($facebook)) : ?>
                <div class="icon cell auto p-2 p-large-1 text-center">
                    <a href="<?php echo $facebook; ?>" target="_blank" aria-label="visit <?php echo get_bloginfo(); ?> facebook">
                        <?php get_template_part('template-parts/svg/icon-facebook'); ?>
                    </a>
                </div>
            <?php endif; ?>
            <?php if (!empty($twitter)) : ?>
                <div class="icon cell auto p-2 p-large-1 text-center">
                    <a href="<?php echo $twitter; ?>" target="_blank" aria-label="visit <?php echo get_bloginfo(); ?> twitter">
                        <?php get_template_part('template-parts/svg/icon-twitter'); ?>
                    </a>
                </div>
            <?php endif; ?>
            <?php if (!empty($instagram)) : ?>
                <div class="icon cell auto p-2 p-large-1 text-center">
                    <a href="<?php echo $instagram; ?>" target="_blank" aria-label="visit <?php echo get_bloginfo(); ?> instagram">
                        <?php get_template_part('template-parts/svg/icon-instagram'); ?>
                    </a>
                </div>
            <?php endif; ?>

            <?php if (!empty($youtube)) : ?>
                <div class="icon cell auto p-2 p-large-1 text-center">
                    <a href="<?php echo $youtube; ?>" target="_blank" aria-label="visit <?php echo get_bloginfo(); ?> youtube">
                        <?php get_template_part('template-parts/svg/icon-youtube'); ?>
                    </a>
                </div>
            <?php endif; ?>

            <?php if (!empty($soundcloud)) : ?>
                <div class="icon cell auto p-2 p-large-1 text-center">
                    <a href="<?php echo $soundcloud; ?>" target="_blank" aria-label="visit <?php echo get_bloginfo(); ?> soundcloud">
                        <?php get_template_part('template-parts/svg/icon-soundcloud'); ?>
                    </a>
                </div>
            <?php endif; ?>

            <?php if (!empty($spotify)) : ?>
                <div class="icon cell auto p-2 p-large-1 text-center">
                    <a href="<?php echo $spotify; ?>" target="_blank" aria-label="visit <?php echo get_bloginfo(); ?> spotify">
                        <?php get_template_part('template-parts/svg/icon-spotify'); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php
    // the modal
    ?>
    <div class="reveal" id="contactModal" data-reveal>
        <?php echo $contactModal; ?>
        <button class="close-button" data-close aria-label="Close reveal" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
    // return
    return $params;
} // END my_dynamic_sidebar_params function
?>