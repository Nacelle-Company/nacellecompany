<?php
/**
 * Template part for displaying an archive catalog item.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;
?>
<article id="post-<?php the_ID(); ?>">
<?php

	get_template_part( 'template-parts/content/entry_archive_catalog_card' );
?>
</article>
