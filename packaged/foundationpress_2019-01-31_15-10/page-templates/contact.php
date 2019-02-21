<?php
/*
Template Name: Contact
*/
get_header(); ?>

<?php get_template_part('template-parts/featured-image-lg-title-contact'); ?>
<main class="main-grid">
	<header class="hide">
	<?php
        if (is_single()) {
            the_title('<h1 class="entry-title">', '</h1>');
        } else {
            the_title('<h1 class="entry-title">', '</h1>');
        }
    ?>
	</header>
	<div class="entry-content grid-container">
		<div class="grid-x grid-margin-x grid-padding-x align-center-middle text-center">
			<div class="cell medium-12">
				<?php the_field('text_content'); ?>
			</div>
			<div class="cell medium-6">
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
		<?php // edit_post_link(__('(Edit)', 'comedy-dynamics'), '<span class="edit-link">', '</span>');?>
	</div>

</main>
<?php get_footer();
