<header class="logo-bg-header grid-x grid-padding-x">
    <div class="cell">
        <?php
            if (is_single()) {
                the_title('<h1 class="entry-title">', '</h1>');
            } else {
                the_title('<h2 class="entry-title">', '</h2>');
            }
        ?>
    </div>
</header>
