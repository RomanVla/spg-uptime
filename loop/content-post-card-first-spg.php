<?php
    $author = get_post_meta($post->ID, '_tommusrhodus_quote_format_author', 1);
?>

<?php if ( !wp_is_mobile() && spg_has_post_thumbnail('spg-blog-post-main') ) : ?>

    <div class="position-relative width-100">

        <div class="card card-body justify-content-between o-hidden p-0">

            <div class="position-absolute width-100 h-100 p-2 mb-3 text-light d-flex justify-content-between flex-column">

                <div class="text-small d-flex">

                    <div class="mr-2">

                        <?php
                        if ($categories = get_the_category()) {
                            foreach ($categories as $cat) {
                                echo '<div class="mr-2 post-category">' . esc_html($cat->name) . '</div>';
                            }
                        }
                        ?>

                        <div class="text-muted"> <?php the_time(get_option('date_format')); ?></div>

                    </div>

                </div>

                <div>
                    <?php
                    the_title('<a href="' . get_permalink() . '"><h2>', '</h2></a>');
                    echo '<span class="text-small opacity-70">' . esc_html($author) . '</span>';
                    ?>
                </div>

            </div>

            <?php echo '<a href="' . get_permalink()  . '" class="position-absolute width-100 h-100 blackout" ></a>' ?>

            <?php the_post_thumbnail('spg-blog-post-main', array('class' => 'card-img-top width-100', 'post-id' => $post->ID)); ?>

        </div>


    </div>

<?php else : ?>

    <div class="position-relative width-100 mb-3">

        <div class="card card-body justify-content-between bg-primary text-light o-hidden position-absolute width-100 h-100">

            <div class="d-flex justify-content-between mb-3">
                <div class="text-small d-flex">

                    <div class="mr-2">

                        <?php
                        if( $categories = get_the_category() ){
                            foreach( $categories as $cat ){
                                echo '<div class="mr-2 post-category">'. esc_html( $cat->name ) .'</div>';
                            }
                        }
                        ?>

                        <div class="text-muted"> <?php the_time( get_option( 'date_format' ) ); ?></div>

                    </div>

                </div>
            </div>

            <div>
                <?php
                the_title( '<a href="' . get_permalink() . '"><h2>', '</h2></a>' );
                echo '<span class="text-small opacity-70">'. esc_html( $author ) .'</span>';
                ?>
            </div>

        </div>

        <?php
            echo '<a href="' . get_permalink()  . '" class="position-absolute width-100 h-100 blackout" ></a>'
        ?>

    </div>

<?php endif; ?>