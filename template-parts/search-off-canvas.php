<?php
/**
 * Template part for off canvas menu
 *
 * @package Comedy_Dynamics
 * @since Comedy_Dynamics 1.0.0
 */

?>
<div class="off-canvas-wrapper">
	<div class="off-canvas position-right" id="searchOffCanvas" data-off-canvas>
		<div class="off-canvas-content" data-off-canvas-content>
			<button class="close-button" aria-label="Close menu" type="button" data-close>
			  <span aria-hidden="true">&times;</span>
			</button>
			<div class="grid-x grid-margin-y align-center-middle" style="height: 90vh;">
				<div class="cell align-self-middle filter-sidebar">

				<?php
                $categories = array( 1973, 1974, 1975, 1976, 1979, 1980 );

                if (is_category($categories)) :?>

				<?php

                if (is_category(1973)) { // film
                    echo '<h4 class="ml-2">Search Films</h4>';
                    echo do_shortcode('[searchandfilter id="4737"]'); // film
                } elseif (is_category(1976)) { //series
                    echo '<h4 class="ml-2">Search Series</h4>';
                    echo do_shortcode('[searchandfilter id="4740"]');
                } elseif (is_category(1975)) { //special
                    echo '<h4 class="ml-2">Search Specials</h4>';
                    echo do_shortcode('[searchandfilter id="4741"]');
                } elseif (is_category(1974)) { //album
                    echo '<h4 class="ml-2">Search Albums</h4>';
                    echo do_shortcode('[searchandfilter id="4742"]');
                }

                endif;

                ?>

				</div>
			</div>
		</div>
	</div>
</div>
