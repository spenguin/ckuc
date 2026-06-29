<?php
/**
 * Render Products section on Home Page
 */

function products_listing( $atts = [], $content = null, $tag = '' )
{ 
    $args   = [
        'post_type'         => 'product',
        'posts_per_page'    => -1
    ];

    $query = new WP_Query($args);

    if( $query->have_posts()): ?>
        <div class="products max-wrapper">
            <?php
                while($query->have_posts()): $query->the_post(); //var_dump( get_post_taxonomies( get_the_ID() ));
                    $terms = get_the_terms( get_the_ID(), 'product_brand');//var_dump($terms);//wp_get_post_terms( get_the_ID(), ['product_brand'], ['fields'=>'name'] );?>
                    <div class="products__item">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                            <?php the_title('<p class="products__item--title">', '</p>'); ?>
                            <p class="products__item--publisher"><?php echo $terms[0]->name; ?></p>
                        </a>
                    </div>
                <?php endwhile; ?>
        </div>
    <?php endif; wp_reset_postdata();


}