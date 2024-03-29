<?php
$card_background = spg_has_post_thumbnail('spg-blog-post-card') ? '' :  'bg-primary-2 text-light';
?>

    <div class="card o-hidden d-block">

        <div class="card-body d-flex flex-column pb-0">

            <div class="d-flex justify-content-between mb-2">
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
            the_title( '<a class="mb-2" href="'. get_permalink() .'"><h4>', '</h4></a>' );

            ?>

        </div>

        <div class="card-thumbnail position-relative">

            <?php
            $card_thumbnail_css = 'card-thumbnail__img';
            if( has_excerpt() ){
                $card_thumbnail_css = 'card-thumbnail__img__50';
                echo '<p class="flex-grow-1 card-thumbnail__text mb-0 pb-0">'. get_the_excerpt() .'</p>';
            }
            ?>

            <?php if( !wp_is_mobile() && spg_has_post_thumbnail('spg-blog-post-card') ) : ?>

                <a class="position-absolute <?= $card_thumbnail_css ?>" href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( 'spg-blog-post-card', array( 'class' => 'card-img-top' ) ); ?>
                </a>

            <?php else : ?>

                <div class="position-absolute <?= $card_thumbnail_css ?> bg-primary-2">
                </div>

            <?php ?>

            <?php endif; ?>

        </div>

    </div>