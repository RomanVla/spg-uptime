<?php
    $footer_budges = get_theme_mod('footer_budges', '');
    $footer_buttons = get_theme_mod('footer_buttons', '');
?>

<div class="col-md-3 col-lg-3 col-sm-3 col-12 py-2">
    <div class="d-flex justify-content-center justify-content-sm-start mr-2">
        <?= do_shortcode($footer_budges) ?>
    </div>
</div>

<div class="col-md-6 col-lg-6 col-sm-6 col-12 py-2 text-center">

    <?php get_template_part('inc/content', 'copyright'); ?>

</div>

<div class="col-md-3 col-lg-3 col-sm-3 col-12 py-2">
    <div class="d-flex justify-content-center justify-content-sm-end">
        <?= do_shortcode($footer_buttons) ?>
    </div>
</div>