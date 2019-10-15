

    <div class="card o-hidden">

        <div class="card-body d-flex flex-column">

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

            <?php
            the_title( '<a href="'. get_permalink() .'"><h4 class="card-title mb-3">', '</h4></a>' );

            if( has_excerpt() ){
                echo '<p class="flex-grow-1">'. get_the_excerpt() .'</p>';
            } else {
                echo '<div class="flex-grow-1"></div>';
            }
            ?>

        </div>

        <?php if( !wp_is_mobile() && has_post_thumbnail() ) : ?>

            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'large', array( 'class' => 'card-img-top' ) ); ?>
            </a>

        <?php endif; ?>

    </div>