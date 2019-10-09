
<?php
$format = get_post_format();
$hero_layout = get_post_meta( $post->ID, '_tommusrhodus_post_single_hero_layout_override', 1 );
if(!( '' == $hero_layout || false == $hero_layout || 'none' == $hero_layout )){
    $hero_layout = get_theme_mod( 'post_single_hero_layout' , 'basic' );
}
$video_provider = get_post_meta( $post->ID, '_tommusrhodus_video_provider', 1 );
$video_url = get_post_meta( $post->ID, '_tommusrhodus_video_url', 1 );
$content_class = ( is_active_sidebar( 'blog_page_sidebar' ) ) ? 'col-sm-12 col-md-8 col-lg-9' : 'col-xs-12';
?>

<section class="p-0" data-reading-position>
    <div class="container">

        <div class="row">

            <div class="<?php echo esc_attr( $content_class ); ?>">

                <?php if( 'video' == $format ) : ?>

                    <div class="row justify-content-center position-relative">
                        <div class="col-lg-10 col-xl-8">
                            <div class="rounded o-hidden">
                                <div class="plyr" data-plyr-provider="<?php echo esc_attr( $video_provider ); ?>" data-plyr-embed-id="<?php echo esc_attr( $video_url ); ?>"></div>
                            </div>
                        </div>
                    </div>

                <?php elseif( has_post_thumbnail() && 'basic' == $hero_layout ) : ?>

                    <div class="row justify-content-center position-relative post-thumbnail-wrapper">
                        <div class="col-lg-10 col-xl-8">
                            <?php the_post_thumbnail( 'large', array( 'class' => 'rounded' ) ); ?>
                        </div>
                    </div>

                <?php endif; ?>

                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xl-8">
                        <article class="article">
                            <?php
                            the_content();
                            wp_link_pages();
                            the_tags( '', '', '' );
                            ?>
                        </article>
                    </div>
                </div>

            </div>

            <?php
            if ( is_active_sidebar('blog_page_sidebar') ) { ?>
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <?php dynamic_sidebar( 'blog_page_sidebar' ); ?>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>

<?php
