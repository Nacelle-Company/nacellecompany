<?php
$term = get_queried_object();
$tax_page = is_tax(array('main_talent', 'producers', 'directors', 'writers'), $term);
if ($tax_page) {
    $content = get_field('wysiwyg', $term);
} else {
    // $content = get_field('wysiwyg');
    $content = get_post_meta(get_the_ID(), 'wysiwyg', true);
}
?>
<div class="grid-x grid-padding-y flex-container align-center-middle" loading="lazy">
    <div class="cell small-10 large-6 mt-4">
        <?php echo $content; ?>
    </div>
</div>

<script>
    var images = document.querySelectorAll('img');
    console.log(images);
    images.forEach(element => {
        element.setAttribute('loading', 'lazy');
    });
    console.log(images);
</script>