<?php
$term = get_queried_object();
$artistName = $term->name;
echo the_field('bio', $term);
$description = term_description();
if (!empty($description)) :
?>
    <div class="cell grid-container primary-title my-3">
        <h2 class="entry-title mb-0"><?php echo $artistName . ' Bio'; ?></h2>
    </div>
    <div class="grid-x grid-container grid-padding-x">
        <div class="cell">
            <div class="grid-x align-center grid-padding-x">
                <div class="cell">
                    <?php echo $description; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>