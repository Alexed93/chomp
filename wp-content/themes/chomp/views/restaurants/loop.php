<div class="results test--flexbox"> <!-- Restaurants results start -->

    <?php if ( have_posts() ): while ( have_posts() ): the_post();

    $excludes = '';
       $featured_restaurant = '';
       if( is_front_page() ) :
           // Get the IDs of the 3 restuarants marked as "featured"
           $excludes = get_field('featured_restaurants');
           if($excludes):
               $featured_restaurant = array();
               foreach ($excludes as $excluded):
                   $featured_restaurant[] = $excluded->ID;
               endforeach;
               // Get remaining restaurants
               $restaurants = chomp_get_restaurants(
                   $count = 6,
                   $excludes = $featured_restaurant
               );
           endif;
       else:
           // Get remaining restaurants
           $restaurants = chomp_get_restaurants(
               $count = 6
           );
       endif;

    ?>

    <div class="grid grid--flex results--grid"> <!-- Restaurants grid start -->

        <?php if ( $restaurants->have_posts() ) : ?>
            <?php while ( $restaurants->have_posts() ) : $restaurants->the_post(); ?>
            <?php get_template_part('views/restaurants/index'); ?>
        <?php endwhile; ?>

        <?php if( !is_front_page() ) : ?>
            <?php $wp_query = $restaurants; get_template_part( 'views/globals/pagination' ); wp_reset_query(); ?>
        <?php endif; ?>

        <?php else : ?>
            <?php get_template_part( 'views/errors/404-posts' ); ?>
        <?php endif; wp_reset_query(); ?>

    </div> <!-- Restaurants grid end -->

    <?php endwhile; else: ?>
        <?php get_template_part( 'views/errors/404-posts' ); ?>
    <?php endif; ?>

    <?php if( is_front_page() ) : ?>
        <a href="<?php echo get_page_link(20); ?>" class="delta u-weight-light u-display-inline u-push-top u-push-bottom@2 sub-link">View more restaurants</a>
    <?php endif; ?>

</div> <!-- Restaurants results end -->
