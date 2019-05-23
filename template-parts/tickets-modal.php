
<div class="cell medium-4">

	<button class="button hollow success" data-open="ticketsModal">

		<?php the_field('tickets_button_title'); ?>

	</button>

</div>

<!-- tickets modal -->
<?php if( have_rows('repeater') ): ?>

<div class="grid-x reveal" id="ticketsModal" data-reveal>

	<div class="cell">

		<header class="text-center">
			<h3><?php _e('Theatres', 'comedy-dynamics'); ?></h3>
		</header>

	</div>

	<div class="grid-x medium-up-2 large-up-3 grid-padding-x">

	<?php while( have_rows('repeater') ): the_row();

		// vars
		$title = get_sub_field('title');
		$link = get_sub_field('link');
		$date = get_sub_field('date');
		$info = get_sub_field('info');
		$showOnSale = get_sub_field('show_on_sale');
		$onSale = get_sub_field('on_sale');

		?>


			<div class="cell text-center details-container">

				<p><strong><?php echo $title; ?></strong></p>



				<details name="hello">
					<summary>

						<h5>
							<strong>
							<?php _e('Info', 'comedy-dynamics'); ?>
							</strong>
						</h5>

					</summary>

					<div class="info">

						<!-- 			on sale -->
						<?php if( $showOnSale ): ?>

							<?php if( $onSale ): ?>

								<p class="on-sale"><strong>ON SALE</strong></p>

							<?php else: ?>

								<p>Not on sale</p>

							<?php endif; ?>

						<?php endif; ?>
					<!-- 			on sale END -->

						<p>
						<?php echo $date; ?>
						</p>

						<p class="info-text">
						<strong><?php echo $info; ?></strong>
						</p>

		<!-- 				link -->
						<?php if( $link ): ?>
							<a class="hollow" href="<?php echo $link; ?>" target="_blank">
						<?php endif; ?>

							<?php _e('View', 'comedy-dynamics'); ?>

						<?php if( $link ): ?>
						</a>
						<?php endif; ?>
		<!-- 				link END-->

					</div>

				</details>

			</div>

		<?php endwhile; ?>
	</div>
	<button class="close-button" data-close aria-label="Close reveal" type="button">

			<span aria-hidden="true">&times;</span>

	</button>

</div>

<?php endif; ?>

<!-- end tickets modal -->
