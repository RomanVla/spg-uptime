<?php if ($cta_content = get_theme_mod('blog_cta')) : ?>

    <section>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-10 col-xl-8">
                    <?php echo do_shortcode($cta_content); ?>
                </div>
            </div>
        </div>
    </section>

    <?php
endif; ?>

<?php if ( is_active_sidebar('mobile_blog_sidebar')) { ?>
    <section class="d-block d-md-none">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-10 col-xl-8">

                    <?php dynamic_sidebar('mobile_blog_sidebar'); ?>

                </div>
            </div>
        </div>
    </section>
<?php
}

