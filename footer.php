<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package Comedy_Dynamics
 * @since Comedy_Dynamics 1.0.0
 */
?>
<footer class="footer">
    <div class="footer-container">
        <div class="footer-grid grid-x align-center-middle small-up-1 medium-up-1">
            <?php dynamic_sidebar('l-footer-widgets');?>
            <?php dynamic_sidebar('c-footer-widgets');?>
            <?php dynamic_sidebar('r-footer-widgets');?>
            <!-- https://gist.github.com/morgyface/d8c1c4246843bf0f0c76959b68faa95f -->
            <?php //if (dynamic_sidebar('r-footer-widgets')) :?>
            <?php //if (have_rows('social_media', 'options')):?>
                <!-- <section class="cell text-right"> -->
                    <?php //while (have_rows('social_media', 'options')) : the_row();?>
                    <?php
                    // $socialchannel = get_sub_field('social_channel', 'options');
                    //     $socialurl = get_sub_field('social_url', 'options');
                    //     echo '<a class="nav-link" rel="nofollow noopener noreferrer" href="' . $socialurl . '" target="_blank">';
                    //     echo '<i class="fab fa-' . $socialchannel . '" aria-hidden="true"></i>';
                    //     echo '<span class="sr-only hidden">' . ucfirst($socialchannel) . '</span>';
                    //     echo "</a>";
                        ?>
                    <?php //endwhile;?>
                </section>

            <?php // endif;?>
        </div>
    </div>
<!-- modal content -->
    <div class="reveal" id="newsletterModal1" data-reveal>

        <!-- Begin Mailchimp Signup Form -->
        <link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">
        <style type="text/css">
        #mc_embed_signup{clear:left;width:100%;}
        /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
          We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
        </style>
        <div id="mc_embed_signup">
        <form action="https://facebook.us11.list-manage.com/subscribe/post?u=c42b29416d69f04ad505ddce6&amp;id=65b3e80609" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <div id="mc_embed_signup_scroll">
            <label for="mce-EMAIL">Newsletter Sign Up</label>
            <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_c42b29416d69f04ad505ddce6_65b3e80609" tabindex="-1" value=""></div>
                <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
            </div>
        </form>
        </div>
        <!--End mc_embed_signup-->

      <button class="close-button" data-close aria-label="Close reveal" type="button">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
<!-- modal conent -->
</footer>
<?php if (get_theme_mod('wpt_mobile_menu_layout') === 'offcanvas') : ?>
	</div><!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer();?>

</body>
</html>
