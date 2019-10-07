
<div class="row mb-4">
	<?php
        $first_post = true;

		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class( $first_post ? 'col-md-6 col-lg-8 d-flex' : 'col-md-6 col-lg-4 d-flex' ); ?> data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $wp_query->current_post + 1 ); ?>00">

            <?php
                if ($first_post) {
                    get_template_part('loop/content', 'post-card-first-spg');
                } else {
                    get_template_part('loop/content', 'post-card-spg');
                }

                $first_post = false;
            ?>

        </div>
    <?php

		endwhile;	
		else : 
			
			get_template_part( 'loop/content', 'none' );
			
		endif;
	?>
</div>

<?php get_template_part( 'inc/content', 'pagination' );