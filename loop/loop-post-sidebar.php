<?php $class = ( is_active_sidebar( 'primary' ) ) ? 'col-md-8 col-lg-9' : 'col-xs-12'; ?>

<div class="row mb-4">
	
	<div class="<?php echo esc_attr( $class ); ?>">
		<?php
            $first_post = true;

			if ( have_posts() ) : while ( have_posts() ) : the_post();

				get_template_part( 'loop/content-post-sidebar', $first_post ? 'first' : get_post_format() );
                $first_post = false;

			endwhile;	
			else : 
				
				get_template_part( 'loop/content', 'none' );
				
			endif;
			
			get_template_part( 'inc/content', 'pagination' );
		?>
	</div>
	
	<?php get_sidebar(); ?>
	
</div>