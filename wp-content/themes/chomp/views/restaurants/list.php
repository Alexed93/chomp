<?php
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

<?php if( $restaurants->have_posts() ): ?>

    <?php while ( $restaurants->have_posts() ): $restaurants->the_post(); ?>

        <?php get_template_part('views/restaurants/loop'); ?>

    <?php endwhile; ?>

        <?php get_template_part('views/globals/pagination'); ?>

    <?php else: ?>

        <?php get_template_part('views/errors/404-posts'); ?>

<?php endif; wp_reset_query(); ?>
