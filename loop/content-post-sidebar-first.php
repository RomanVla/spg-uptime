<?php $link = get_post_meta( $post->ID, '_tommusrhodus_link_format_url', 1 ); ?>

<div class="pr-lg-4">
	<div class="card card-body justify-content-between bg-primary text-light">
		
		<div class="d-flex justify-content-between mb-3">
			<div class="text-small d-flex">
				<?php get_template_part( 'inc/content-post', 'meta' ); ?>
		    </div>
		</div>

		<div>
			<?php 
		        the_title( '<a href="'. get_permalink() .'"> <h2>', '</h2> </a>' );
	      	?>
	  	</div>

        <div class="flex-grow-1">
            <p><?php tommusrhodus_get_excerpt( 35 ); ?> <a href="<?php echo get_permalink(); ?>" class="hover-arrow"><?php echo esc_html_e( 'Continue Reading', 'uptime' ); ?></a></p>
        </div>

	</div>
</div>