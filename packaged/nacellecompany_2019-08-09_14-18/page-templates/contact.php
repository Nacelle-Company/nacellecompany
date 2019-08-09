<?php
/*
Template Name: Contact
*/
get_header(); ?>

<header class="featured-hero contact">
			<div class="grid-x">
			<div class="cell">
				<h1 class="text-center"><?php the_field('header_title'); ?></h1>
			</div>
	</div>
</header>

<main class="main-grid">

	<div class="entry-content grid-container">
		<div class="grid-x grid-margin-x grid-padding-x align-center-middle text-center">
			<div class="cell medium-12">
				<?php the_content();?>
			</div>
		</div>
		<?php while (have_posts()) : the_post(); ?>

			<!-- https://gist.github.com/morgyface/d8c1c4246843bf0f0c76959b68faa95f -->
					<?php if (have_rows('social_media', 'option')): ?>
						<div class="grid-x social">
							<div class="cell text-center">
								<?php while (have_rows('social_media', 'option')) : the_row(); ?>
					            <?php $socialchannel = get_sub_field('social_channel', 'option');
                      $socialurl = get_sub_field('social_url', 'option');
                      echo '<a class="nav-link" rel="nofollow noopener noreferrer" href="' . $socialurl . '" target="_blank">';
                      echo '<i class="fab fa-' . $socialchannel . '" aria-hidden="true"></i>';
                      echo '<span class="sr-only hidden">' . ucfirst($socialchannel) . '</span>';
                      echo "</a>";
                      ?>
					            <?php endwhile; ?>
							</div>
						</div>

			        <?php endif; ?>


		<?php endwhile; ?>
		<?php edit_post_link(__('(Edit)', 'nacelle'), '<span class="edit-link">', '</span>');?>
	</div>

</main>
<?php get_footer();
