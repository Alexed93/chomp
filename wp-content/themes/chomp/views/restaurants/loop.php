<div class="u-push-top@2 u-push-bottom@2 sorting"> <!-- Search results sorting start -->

     <select class="btn btn--sorting-options"> <!-- Search results sorting options start -->
         <option value="relevance">Sort by relevance</option> <!-- Relevance -->
         <option value="name">Sort by name</option> <!-- Name -->
         <option value="options">Sort by features</option> <!-- Features -->
     </select> <!-- Search results sorting options end  -->

</div> <!-- Search results sorting end -->

<div class="results test--flexbox"> <!-- Restaurants results start -->

    <?php

            $excludes = '';
            $featured_restaurant = '';

            if( is_front_page() ) {

                // Get the IDs of the 3 restuarants marked as "featured"
                $excludes = get_field('featured_restaurants');

                if($excludes):

                    $featured_restaurant = array();

                    foreach ($excludes as $excluded):
                        $featured_restaurant[] = $excluded->ID;
                    endforeach;

                    // Get remaining restaurants
                    $restaurants = chomp_get_restaurants(
                        $excludes = $featured_restaurant,
                        $text = ''
                    );

                endif;

            } elseif ( isset($_GET['search']) && !empty($_GET['search']) ) {

                // Get remaining restaurants from search text
                $text = $_GET['search'];

                $restaurants = chomp_get_restaurants(
                    $excludes = '',
                    $text
                );

            } else {

                // Get remaining restaurants
                $restaurants = chomp_get_restaurants(
                    $excludes = '',
                    $text = ''
                );

            }
    ?>

    <div class="grid grid--flex results--grid"> <!-- Restaurants grid start -->

        <?php if ( $restaurants->have_posts() ) : ?>

            <?php while ( $restaurants->have_posts() ) : $restaurants->the_post(); ?>
                <?php get_template_part('views/restaurants/index'); ?>
            <?php endwhile; ?>

            <!-- Pagination -->
            <?php if( !is_front_page() ) : ?>
                <?php $wp_query = $restaurants; get_template_part( 'views/globals/pagination' ); wp_reset_query(); ?>
            <?php endif; ?>

        <?php else : ?>
            <?php get_template_part( 'views/errors/404-posts' ); ?>
        <?php endif; wp_reset_query(); ?>

    </div> <!-- Restaurants grid end -->

</div> <!-- Restaurants results end -->
