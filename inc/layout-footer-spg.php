<footer class="pb-0 bg-primary-3 text-light" id="footer">
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

    <div class="d-flex justify-content-center align-items-center navbar-dark py-2 footer-strip">

        <?= do_shortcode('[uptime_stars number_of_stars="4.5"]') ?>
        <div class="d-flex mr-2">
            Rated 4.9/5.0 by 25 clients for web development, mobile development and design services.
        </div>
        <div class="d-flex mr-2">
            <a class="text-small hover-arrow px-2" href="/privacy-policy/"> <small>Terms of service</small> </a>
            <a class="text-small hover-arrow px-2" href="/privacy-policy/"> <small>Privacy Policy</small> </a>
        </div>
        <div class="d-flex mr-2">
            <a href="//www.dmca.com/Protection/Status.aspx?ID=432ef90d-6d95-4c7b-88d7-943b3c94c58a" title="DMCA.com Protection Status" class="dmca-badge"> <img src ="https://images.dmca.com/Badges/dmca_protected_6_120.png?ID=432ef90d-6d95-4c7b-88d7-943b3c94c58a"  alt="DMCA.com Protection Status" /></a>  <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
        </div>
    </div>

</footer>