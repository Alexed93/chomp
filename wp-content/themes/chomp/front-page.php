<?php

/**
 ***************************************************************************
 * Front Page Template
 ***************************************************************************
 *
 * This is used as a bespoke template for the homepage
 *
 * More info can be found here:
 * http://codex.wordpress.org/Creating_a_Static_Front_Page
 *
 */



// Get the header
get_header();

// Hero image
$hero_image = get_field('hero_image');
if( $hero_image ){
    $hero_image_url = !empty( $hero_image ) ? $hero_image['sizes']['hero'] : '';
}

// Check the time of day and generate the correct message
// With help from https://stackoverflow.com/questions/8652502/run-code-depending-on-the-time-of-day
date_default_timezone_set('UTC');

$hour = date('H', time());
$month = date('F', time());
$year = date('Y', time());
$monthYear = $month." ".$year;

$day_term = "";

if( $hour > 6 && $hour <= 11) {
  $day_term = "this morning";
}
else if($hour > 11 && $hour <= 17) {
  $day_term = "this afternoon";
}
else if($hour > 17 && $hour <= 23) {
  $day_term = "tonight";
}
else {
    $day_term = "soon";
}

// Get featured cuisine
$featured_cuisines = get_field('featured_cuisine');
if( $featured_cuisines ){
    $featured_cuisine = $featured_cuisines->name;
}

$site_logo = 'icon--logo--';
$site_color = 'site_color--';

if (null !== $featured_cuisines) :
    $site_color .= $featured_cuisines->name;
else:
    $site_color .= 'default';
endif;

// Get featured restaurants
$featured_restaurants = get_field('featured_restaurants');

?>

<main>

    <div class="hero hero--home | u-push-top" <?php if($hero_image_url): ?> style="background-image: url('<?php echo $hero_image_url; ?>');" <?php endif; ?>> <!-- Hero start -->

        <div class="container container--small"> <!-- Hero container start -->

            <h1 class="u-align-center u-push-bottom/2">Lets go out
                <span class="u-weight-medium">
                    <?php echo $day_term; ?>
                </span>
            </h1> <!-- Dynamic depending on time of day e.g. today/tonight -->

            <form class="u-align-center u-push-bottom u-margin-center form form--search <?php echo $site_color; ?> " action="/restaurants/" method="get"> <!-- Search form start -->

                <label for="search" class="is-hidden">Search for a restaurant</label>
                <input type="text" name="search" placeholder="What do you fancy?" class="search">

                <!-- Search button start -->
                <button type="submit" class="search-submit">
                    <span class="icon icon--small icon--search"></span>
                    <span class="is-hidden">Search</span>
                </button>
                <!-- Search button end -->

                <!-- Popular searches examples start -->
                <?php get_template_part('views/globals/popular-searches'); ?>
                <!-- Popular searches examples end -->

            </form> <!-- Search form end -->

        </div> <!-- Hero container end -->

    </div> <!-- Hero end -->

    <div class="promo-area u-pad-bottom@2"> <!-- Promoted restaurants start -->

        <div class="container"> <!-- Promoted restaurants container start -->

            <div class="featured test--flexbox cf"> <!-- Promoted restaurants flexbox start -->

                <h1 class="beta u-pad-top sub-heading">Top
                    <span class="u-weight-medium"><?php echo $featured_cuisine; ?></span>
                    restaurants for <span class="u-weight-medium"><?php echo $monthYear; ?></span>
                </h1> <!-- Dynamic depending on date and cuisine of the month -->

                <div class="grid grid--flex"> <!-- Promoted restaurants grid start -->

                    <?php if( $featured_restaurants ): ?>
                        <?php foreach ( $featured_restaurants as $featured_restaurant ): ?>
                            <?php
                                // Get thumbnail
                                $restaurant_thumbnail = get_field('restaurant_thumbnail', $featured_restaurant->ID);

                                if( $restaurant_thumbnail ):
                                    $thumbnail = $restaurant_thumbnail['sizes']['featured_restaurant'];
                                    $alt = $restaurant_thumbnail['alt'];
                                else:
                                    $thumbnail = get_stylesheet_directory_uri() . "/assets/dist/imgs/placeholder_restaurant.svg";
                                endif;

                                // Get link
                                $restaurant_link = get_page_link($featured_restaurant);

                                // Build address
                                $address_line = get_field('restaurant_address_line', $featured_restaurant->ID);
                                $postcode = get_field('restaurant_postcode', $featured_restaurant->ID);
                                if( $address_line && $postcode ):
                                    $address = $address_line.", ".$postcode;
                                endif;
                            ?>

                    <div class="grid__item grid__item--4-12-bp4"> <!-- Featured card grid item start -->

                        <div class="card card--featured"> <!-- Featured card start -->

                            <div class="card__image"> <!-- Featured card image start -->
                                <img src="<?php echo $thumbnail; ?>" alt="<?php echo $alt; ?>" title="<?php echo $alt; ?>">
                            </div> <!-- Featured card image end -->

                            <div class="card__detail"> <!-- Featured card detail start -->

                                <h1 class="delta u-weight-medium u-push-bottom/2"><?php echo get_the_title($featured_restaurant->ID); ?></h1> <!-- Featured card detail title -->
                                <h2 class="epsilon u-weight-medium u-push-bottom/2"><?php echo $address; ?></h2> <!-- Featured card address  -->
                                <p class="u-push-bottom"><?php echo wp_trim_words(get_the_excerpt($featured_restaurant->ID), 25, "..."); ?></p> <!-- Featured card detail intro -->

                                <div class="card__inputs"> <!-- Featured card specific icons start -->

                                    <?php
                                        // Get cuisine
                                        $restaurant_cuisine = get_the_terms( $featured_restaurant->ID, 'cuisine' );
                                        $restaurant_cuisine_name = $restaurant_cuisine[0]->name;

                                        // Get features
                                        $restaurant_features = get_field('restaurant_features', $featured_restaurant->ID);

                                        if(in_array('alcohol', $restaurant_features)):
                                            $feature_icon['alcohol'] = "Alcohol";
                                        endif;

                                        if(in_array('family_friendly', $restaurant_features)):
                                            $feature_icon['family_friendly'] = "Family-Friendly";
                                        endif;

                                        if(in_array('open_late', $restaurant_features)):
                                            $feature_icon['open_late'] = "Open-Late";
                                        endif;

                                        if(in_array('parking', $restaurant_features)):
                                            $feature_icon['parking'] = "Parking";
                                        endif;
                                    ?>

                                    <div class="details u-float-left"> <!-- Featured card specific icons container start -->

                                        <span class="icon icon--medium icon--<?php echo $restaurant_cuisine_name; ?>"></span>

                                        <?php if($restaurant_features): ?>
                                            <?php foreach($restaurant_features as $restaurant_feature): ?>
                                                <span class="icon icon--medium icon--<?php echo $feature_icon[$restaurant_feature]; ?>"></span>
                                            <?php endforeach; wp_reset_postdata(); ?>
                                        <?php endif; ?>

                                    </div> <!-- Featured card specific icons container end -->

                                    <a href="<?php echo $restaurant_link; ?>" class="btn btn--primary cf u-float-right"> <!-- Featured card view button start -->
                                        <span class="btn--label">View</span>
                                        <span class="btn--icon">
                                            <span class="icon icon--small icon--chevron-right-white"></span>
                                        </span>
                                    </a> <!-- Featured card view button end -->

                                </div> <!-- Featured card specific icons end -->

                            </div> <!-- Featured card detail end -->

                        </div> <!-- Featured card end -->

                    </div> <!-- Featured card grid item end -->

                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; wp_reset_query(); ?>

                </div> <!-- Promoted restaurants grid end -->

                <!-- <a href="#" class="delta u-weight-light u-display-inline u-push-top sub-link">View all previous top picks</a> -->

                    <?php
                        $voucher_qr = get_field('voucher_qr_code');
                        if( $voucher_qr ):

                            // Voucher QR
                            $qr_image = $voucher_qr['sizes']['medium'];

                            // Voucher image
                            $voucher_image = get_field( 'voucher_image' );
                            $image = $voucher_image['sizes']['large'];
                            $alt = $voucher_image['alt'];

                            // Voucher text
                            $voucher_text = get_field( 'voucher_text' );
                    ?>

                    <div class="voucher u-push-top@2 u-push-bottom u-display-inline"> <!-- Monthly voucher start -->
                        <img style="-webkit-print-color-adjust: exact;" src="<?php echo $image; ?>" alt="<?php echo $alt; ?>" title="<?php echo $alt; ?>" class="voucher__img"><!-- Monthly voucher image start -->
                        <div class="voucher__text"> <!-- Monthly voucher text start -->
                            <h3 class="zeta u-push-bottom/2">Voucher of the month:</h3> <!-- Monthly voucher title -->
                            <div class="qr cf">
                                <h2 class="gamma u-push-bottom/2 u-weight-medium deal"><?php echo $voucher_text; ?></h2> <!-- Monthly voucher ACF text -->
                                <img src="<?php echo $qr_image; ?>" alt="QR Code for this months voucher" title="QR Code for this months voucher"> <!-- Monthly voucher QR image -->
                            </div>
                        </div> <!-- Monthly voucher text end -->
                    </div> <!-- Monthly voucher end -->

                    <?php endif; ?>

                <!-- Print monthly voucher button -->
                <a id="js-voucher-print" style="cursor: pointer;" class="delta u-weight-light u-display-inline u-push-top sub-link">Print this deal</a>

            </div> <!-- Promoted restaurants flexbox end -->

        </div> <!-- Promoted restaurants container end -->

    </div> <!-- Promoted restaurants end -->

    <div class="container additional-restaurants cf"> <!-- Additional restaurants start -->

        <h1 class="beta u-push-top sub-heading--inverted u-weight-medium">Other popular restaruants in Leeds</h1>

        <?php get_template_part('views/restaurants/loop'); ?> <!-- Additional restaurants results -->

    </div> <!-- Additional restaurants end -->

</main>

<?php get_footer(); ?>
