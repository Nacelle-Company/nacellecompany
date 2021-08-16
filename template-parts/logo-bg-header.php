<?php
$title = '';
if (is_archive()) {
    $title = post_type_archive_title('<h1 class="entry-title">', false);
    $archiveClass = 'flex-container cell px-2';
    if(is_archive('press')) {
        $plusNews = ' & News';
    }
} else {
    $title = the_title('<h1 class="entry-title">', '</h1>', false);
}
?>
<header class="logo-bg-header <?php echo $archiveClass; ?>" id="header">
    <?php echo $title; echo $plusNews; ?>
    <span class="screen-reader-text">
        <?php wp_title(''); ?>
    </span>
</header>