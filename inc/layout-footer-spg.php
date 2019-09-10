<footer class="pb-4 bg-primary-3 text-light" id="footer">
    <div class="container">

        <?php get_template_part('inc/content', 'footer-cta'); ?>

        <div class="row mb-2">
            <?php
            if (is_active_sidebar('default_footer_1') && !(is_active_sidebar('default_footer_2'))) {
                echo '<div class="col">';
                    dynamic_sidebar('default_footer_1');
                echo '</div>';
            }
            if (is_active_sidebar('default_footer_2') && !(is_active_sidebar('default_footer_3'))) {
                echo '<div class="col-md-6 col-lg-6 col-sm-6 col-12 py-2">';
                    echo '<div class="widget">';
                        echo get_custom_logo('');
                    echo '</div>';
                    dynamic_sidebar('default_footer_1');
                echo '</div><div class="col-md-6 col-lg-6 col-sm-6 col-12 py-2">';
                    dynamic_sidebar('default_footer_2');
                echo '</div><div class="clear"></div>';
            }
            if (is_active_sidebar('default_footer_3')) {
                echo '<div class="col-md-4 col-lg-4 col-sm-4 col-12 py-2">';
                    echo get_custom_logo();
                    dynamic_sidebar('default_footer_1');
                echo '</div><div class="col-md-4 col-lg-4 col-sm-4 col-12 py-2">';
                    dynamic_sidebar('default_footer_2');
                echo '</div><div class="col-md-4 col-lg-4 col-sm-4 col-12 py-2">';
                    dynamic_sidebar('default_footer_3');
                echo '</div><div class="clear"></div>';

            }
            ?>
        </div>

        <div class="row justify-content-center">
            <div class="col col-md-auto text-center">

                <?php get_template_part('inc/content', 'footer-social'); ?>

            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col col-md-auto text-center">

                <?php get_template_part('inc/content', 'copyright'); ?>

            </div>
        </div>

    </div>
</footer>