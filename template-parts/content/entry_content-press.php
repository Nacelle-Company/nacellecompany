<?php
/**
 * Template part for displaying a Press Release post's content.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$press_release_intro = get_post_meta( get_the_ID(), 'intro', true );
$related_posts       = get_post_meta( get_the_ID(), 'talent_name', true );
$related_posts_news  = get_post_meta( get_the_ID(), 'related_to', true );
$boilerplate         = get_option( 'options_boilerplate' );
$news_link           = get_post_meta( get_the_ID(), 'link_to_article', true );

?>
<?php
// The post thumbnail.
if ( has_post_thumbnail() ) :
    if ( $news_link ) :
        ?>
    <a href="<?php echo esc_html( $news_link ); ?>" class="post-image" target="_blank">
        <?php the_post_thumbnail( 'medium_large', array( 'class' => 'post-image' ) ); ?>
    </a>
    <?php else : ?>
        <?php the_post_thumbnail( 'medium_large', array( 'class' => 'post-image' ) ); ?>
    <?php endif; ?>
<?php endif; ?>
<div class="post-title">
    <div class="post-date">
        <?php
        $location = get_post_meta( get_the_ID(), 'location', true );
        $time     = get_the_time( 'm.j.y' );
        echo '<p><strong>';
        echo esc_html( $location ) . ' ';
        echo '</strong>';
        echo esc_html( $time );
        echo '</p>';
        ?>
    </div>
    <?php
    if ( $news_link ) :
        ?>
        <a href="<?php echo esc_html( $news_link ); ?>" class="post-title__link" target="_blank">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            <h4>
                <?php esc_html_e( 'Read more', 'wp-rig' ); ?>
                <?php get_template_part( 'template-parts/svg/icon-external-link' ); ?>
            </h4>
        </a>
    <?php else : ?>
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    <?php endif; ?>

    <h3 class="post-intro">
        <?php
        if ( ! empty( $press_release_intro ) ) {
            echo wp_kses( $press_release_intro, 'post' );
        }
        ?>
    </h3>

</div>
<div class="post-content">
    <?php
    the_content(
        sprintf(
            wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wp-rig' ),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
            get_the_title()
        )
    );
    ?>

</div>
<footer class="post-footer">
    <?php
    get_template_part( 'template-parts/modules/social-share' );
    if ( get_post_meta( get_the_ID(), 'show_boilerplate', true ) ) {
        if ( ! empty( $boilerplate ) ) {
            echo '<div class="boilerplate">';
            echo wp_kses( $boilerplate, 'post' );
            echo '</div>';
        }
    }
    // Related posts.
    if ( $related_posts ) {
        wp_rig()->print_styles( 'wp-rig-related_posts' );
    }
    wp_rig()->display_related_posts( $related_posts );
    // Pagination.
    wp_rig()->print_styles( 'wp-rig-pagination-post' );
    wp_rig()->display_pagination();
    get_template_part( 'template-parts/modules/post-back-btn' );
    ?>

</footer>
<?php
