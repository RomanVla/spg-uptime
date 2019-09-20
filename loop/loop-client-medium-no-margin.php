<ul class="d-flex flex-wrap justify-content-center list-unstyled">
	<?php 
		$i = 1;
		if ( have_posts() ) : while ( have_posts() ) : the_post();
		?>
			
			<li class="mx-md-4 mx-3" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $i ); ?>00">
				<?php the_post_thumbnail( 'medium', array( 'class' => 'icon icon-medium opacity-20' ) ); ?>
			</li>
			
		<?php
		$i++;
		endwhile;	
		else : 
			
			get_template_part( 'loop/content', 'none' );
			
		endif;
	?>
</ul>