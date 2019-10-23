<?php
	$image    = get_theme_mod( 'post_archive_background_image' );
	$title    = get_theme_mod( 'post_archive_title', 'Blog' );
	$subtitle = get_theme_mod( 'post_archive_subtitle' );
?>

<?php if( $image ) : ?>

<section class="has-divider text-light jarallax bg-dark o-hidden" data-jarallax data-speed="0.5" data-overlay>
	
	<img src="<?php echo esc_url( $image ); ?> "alt="Image" class="jarallax-img opacity-50">

<?php else : ?>

<section class="has-divider o-hidden" data-overlay>
	
<?php endif; ?>

	<div class="container pb-0">
		<div class="row">
			<div class="col-xl-5 col-lg-6 col-md-8">
				<h1 class="display-4"><?php echo wp_kses_post( $title ); ?></h1>
				<p class="lead mb-0"><?php echo wp_kses_post( $subtitle ); ?></p>
			</div>
		</div>
	</div>

</section>

