<?php $author = get_post_meta( $post->ID, '_tommusrhodus_quote_format_author', 1 ); ?>

<div class="card card-body justify-content-between bg-primary text-light o-hidden">

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
        the_title( '<h2>', '</h2>' );
        echo '<span class="text-small opacity-70">'. esc_html( $author ) .'</span>';
        ?>
    </div>

</div>