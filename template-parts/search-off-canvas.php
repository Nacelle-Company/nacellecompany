<?php
/**
 * Template part for off canvas menu
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */

?>
<div class="off-canvas-wrapper">

	<div class="off-canvas position-right" id="searchOffCanvas" data-off-canvas>

		<div class="off-canvas-content" data-off-canvas-content>

			<button class="close-button" aria-label="Close menu" type="button" data-close>

			  <span aria-hidden="true">&times;</span>

			</button>

			<div class="grid-x grid-margin-y align-center-middle oc-container">

				<div class="cell align-self-middle filter-sidebar">

				<?php
                $categories = array( 1973, 1974, 1975, 1976, 1979, 1980 );

                if (is_category($categories)) :?>

					<!-- film -->
					<?php if (is_category(1973)) : ?>

	                    <h4 class="ml-2"><?php _e('Search Films', 'comedy-dynamics'); ?></h4>

	                    <?php echo do_shortcode('[searchandfilter slug="film-search"]'); ?>

					<!-- series -->
	            	<?php elseif (is_category(1976)) : ?>

						<h4 class="ml-2"><?php _e('Search Series', 'comedy-dynamics'); ?></h4>

						<?php echo do_shortcode('[searchandfilter slug="series-search"]'); ?>

					<!-- specials -->
	                <?php elseif (is_category(1975)) : ?>

						<h4 class="ml-2"><?php _e('Search Specials', 'comedy-dynamics'); ?></h4>

	                    <?php echo do_shortcode('[searchandfilter slug="special-search"]'); ?>

					<!-- albums -->
	                <?php elseif (is_category(1974)) : ?>

	                    <h4 class="ml-2"><?php _e('Search Albums', 'comedy-dynamics'); ?></h4>

	                    <?php echo do_shortcode('[searchandfilter slug="album-search"]'); ?>

					<!-- production series -->
	                <?php elseif (is_category(1979)) : ?>

	                    <h4 class="ml-2"><?php _e('Search Series', 'comedy-dynamics'); ?></h4>

	                    <?php echo do_shortcode('[searchandfilter slug="production-series-search"]'); ?>

					<!-- production special -->
	                <?php elseif (is_category(1980)) : ?>

	                    <h4 class="ml-2"><?php _e('Search Specials', 'comedy-dynamics'); ?></h4>

	                    <?php echo do_shortcode('[searchandfilter slug="production-special-search"]'); ?>

	                <?php endif; ?>

				<?php endif; ?>

				</div>

			</div>

		</div>

	</div>

</div>
