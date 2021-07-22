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

			<div class="grid-x grid-margin-y align-center-middle oc-container pt-4 px-2 px-2">

				<div class="cell align-self-middle filter-sidebar">

					<?php
					$categories = array(1973, 4, 1975, 1976, 1979, 1980);

					if (is_category($categories)) : ?>

						<?php // film 
						?>
						<?php if (is_category(1973)) : ?>

							<h4><?php _e('Search Films', 'nacelle'); ?></h4>

							<?php echo do_shortcode('[searchandfilter slug="film-search"]'); ?>

							<?php // series 
							?>
						<?php elseif (is_category(1976)) : ?>

							<h4><?php _e('Search Series', 'nacelle'); ?></h4>

							<?php echo do_shortcode('[searchandfilter slug="series-search"]'); ?>

							<?php // specials 
							?>
						<?php elseif (is_category(1975)) : ?>

							<h4><?php _e('Search Specials', 'nacelle'); ?></h4>

							<?php echo do_shortcode('[searchandfilter slug="special-search"]'); ?>

							<?php // albums 
							?>
						<?php elseif (is_category(4)) : ?>

							<h4><?php _e('Search Albums', 'nacelle'); ?></h4>

							<?php echo do_shortcode('[searchandfilter slug="distribution-album-catalog-sidebar"]'); ?>

							<?php // production series 
							?>
						<?php elseif (is_category(1979)) : ?>

							<h4><?php _e('Search Series', 'nacelle'); ?></h4>

							<?php echo do_shortcode('[searchandfilter slug="production-series-search"]'); ?>

							<?php // production special 
							?>
						<?php elseif (is_category(1980)) : ?>

							<h4><?php _e('Search Specials', 'nacelle'); ?></h4>

							<?php echo do_shortcode('[searchandfilter slug="production-special-search"]'); ?>

						<?php endif; ?>
					<?php else : ?>

						<h4><?php _e('Search Catalog', 'nacelle'); ?></h4>

						<?php echo do_shortcode('[searchandfilter slug="album-search-2"]'); ?>

					<?php endif; ?>

				</div>

			</div>

		</div>

	</div>

</div>