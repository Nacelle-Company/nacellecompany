<?php
$term = get_queried_object();
$tax_page = is_tax(array('main_talent', 'producers', 'directors', 'writers'), $term);
if ($tax_page) {
    $content = get_field('wysiwyg', $term);
} else {
    $content = get_field('wysiwyg');
}
?>
<div class="grid-x mb-3 mt-4 grid-container">

    <div class="large-6 large-offset-3">

    <?php echo $content; ?>

    </div>

</div>