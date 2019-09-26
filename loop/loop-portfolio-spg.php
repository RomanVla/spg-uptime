<?php get_template_part( 'inc/content-portfolio', 'filters' ); ?>

<div class="row" data-isotope-collection data-isotope-id="projects">	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		<div id="portfolio-<?php the_ID(); ?>" <?php post_class( 'col-sm-6 col-lg-4 mb-4' ); ?> data-isotope-item data-category="<?php echo esc_attr( TommusRhodus_Framework()->the_terms( $post->ID, 'portfolio_category', 'name', ' ' ) ); ?>">
			<a href="<?php the_permalink(); ?>">
                    <div class="rounded is-shadow-box d-flex align-items-end" style='min-height: 500px; background-repeat: no-repeat; background-size: contain; background-image: url("<?php echo get_the_post_thumbnail_url() ?>")'>
                        <div class="project-label">
				            <div class="text-small text-muted px-4 project-label__term"><?php echo esc_attr( TommusRhodus_Framework()->the_terms( $post->ID, 'portfolio_category', 'name', ' ' ) ); ?></div>
                            <div class="px-2 text-light project-label__title">
                                <?php the_title( '<h4 class="mb-0">', '</h4>' ); ?>
                            </div>
                        </div>
                    </div>
                <?php
                    if( has_excerpt() ){
                    echo '<div class="text-small text-dark pt-2">'. get_the_excerpt() .'</div>';
                    }
                 ?>
			</a>
		</div>
			
	<?php
		endwhile;	
		else : 
			
			get_template_part( 'loop/content', 'none' );
			
		endif;
	?>
</div>