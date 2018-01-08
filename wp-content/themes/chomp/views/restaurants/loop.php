    <?php

            $excludes = '';
            $featured_restaurant = '';
            $search_text = '';

            if( is_front_page() ) {

                // Get the IDs of the 3 restuarants marked as "featured"
                $excludes = get_field('featured_restaurants');

                if($excludes):

                    $featured_restaurant = array();

                    foreach ($excludes as $excluded):
                        $featured_restaurant[] = $excluded->ID;
                    endforeach;

                    // Run the custom query with excludes
                    $restaurants = chomp_get_restaurants(
                        $excludes = $featured_restaurant,
                        $search_text = ''
                    );

                endif;
            // Checks to see: IF there is a search box AND it's not empty OR a restaurant feature checkbox has been ticket
            } elseif ( isset($_GET['search']) && !empty($_GET['search']) || !empty($_GET['restaurant_feature']) ) {

                // Assign any text in the search box to a variable
                $search_text = $_GET['search'];

                // Check to see if the restaurant_feature array (the checkboxes) are not all empty
                if( !empty($_GET['restaurant_feature']) ) {
                    // For each value in the array...
                    foreach($_GET['restaurant_feature'] as $selected) {
                        // Try tidy up (get rid of special chars and what)
                        $search_text = chomp_format_search($selected);
                    }
                }

                // Run the custom query with whatever was in the search box
                $restaurants = chomp_get_restaurants(
                    $excludes = '',
                    $search_text
                );

            } else {

                // Check to see if the restaurant_feature array (the checkboxes) are not all empty
                if( !empty($_GET['restaurant_feature']) ) {
                    // For each value in the array...
                    foreach($_GET['restaurant_feature'] as $selected) {
                        // Try tidy up (get rid of special chars and what)
                        $search_text = chomp_format_search($selected);
                    }
                }

                // Run the custom query
                $restaurants = chomp_get_restaurants(
                    $excludes = '',
                    $search_text
                );

            }
    ?>

<!-- If it's not the front page, make this sort by thing -->
<?php if( !is_front_page() ) : ?>
    <div class="u-push-top@2 u-push-bottom@2 sorting"> <!-- Search results sorting start -->

         <select class="btn btn--sorting-options"> <!-- Search results sorting options start -->
             <option value="relevance">Sort by relevance</option> <!-- Relevance -->
             <option value="name">Sort by name</option> <!-- Name -->
             <option value="options">Sort by features</option> <!-- Features -->
         </select> <!-- Search results sorting options end  -->

    </div> <!-- Search results sorting end -->
<?php endif; ?>

<div class="results test--flexbox"> <!-- Restaurants results start -->

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
