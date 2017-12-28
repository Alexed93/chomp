<?php

/**
***************************************************************************
* Sidebar - Restaurant
***************************************************************************
*
* The sidebar used for single restaurant pages. Will house
* trip advisor widget and social media sharing tools
*
*/

$post_id = get_the_ID();

// Get trip advisor info
$trip_advsior_field = get_field( 'restaurant_trip_advisor' );
$trip_advsior_html = htmlspecialchars_decode($trip_advsior_field);

?>

<aside class="sidebar cf" role="complementary"> <!-- Restaurant sidebar start -->

    <?php if( $trip_advsior_html ): ?>
    <!-- Restaurant trip-advisor start -->

        <?php echo html_entity_decode($trip_advsior_html); ?>

    <!-- Restaurant trip-advisor end -->
    <?php endif; ?>

    <?php get_template_part( 'views/globals/share-nav' ); ?> <!-- Social media sharing buttons -->

</aside> <!-- Restaurant sidebar end -->

