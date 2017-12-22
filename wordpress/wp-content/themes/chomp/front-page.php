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
}

// Get featured cuisine
$featured_cuisines = get_field( 'featured_cuisine');
if( $featured_cuisines ){
    $featured_cuisine = $featured_cuisines->name;
}

// Hero image
$hero_image = get_field('hero_image');
if( $hero_image ){
    $hero_image_url = !empty( $hero_image ) ? $hero_image['sizes']['hero'] : '';
}

?>

<main>

    <div class="hero hero--home | u-push-top" <?php if($hero_image_url): ?> style="background-image: url('<?php echo $hero_image_url; ?>');" <?php endif; ?>> <!-- Hero start -->

        <div class="container container--small"> <!-- Hero container start -->

            <h1 class="u-align-center u-push-bottom/2">Lets go out
                <span class="u-weight-medium">
                    <?php echo $day_term; ?>
                </span>
            </h1> <!-- Dynamic depending on time of day e.g. today/tonight -->

            <form class="u-align-center u-push-bottom u-margin-center form form--search" action=""> <!-- Search form start -->

                <label for="search" class="is-hidden">Search for a restaurant</label>
                <input type="text" name="search" placeholder="What do you fancy?" class="search">

                <!-- Search button start -->
                <button type="button" class="search-submit">
                    <span class="icon icon--small icon--search"></span>
                    <span class="is-hidden">Search</span>
                </button>
                <!-- Search button end -->

                <!-- Popular searches examples start -->
                <div class="popular u-align-left u-push-top/2">Popular searches:
                    <a href="#" class="u-style-underline u-style-italic | popular__link">Leeds,</a>
                    <a href="#" class="u-style-underline u-style-italic | popular__link">Italian,</a>
                    <a href="#" class="u-style-underline u-style-italic | popular__link">Indian</a>...
                </div> <!-- Popular searches examples end -->

            </form> <!-- Search form end -->

        </div> <!-- Hero container end -->

    </div> <!-- Hero end -->

    <div class="promo-area u-pad-bottom@2"> <!-- Promoted restaurants start -->

        <div class="container"> <!-- Promoted restaurants container start -->

            <div class="featured test--flexbox cf"> <!-- Promoted restaurants flexbox start -->

                <h1 class="beta u-pad-top sub-heading">Top
                    <span class="u-weight-medium"><?php echo $featured_cuisine; ?></span>
                    picks for <span class="u-weight-medium"><?php echo $monthYear; ?></span>
                </h1> <!-- Dynamic depending on date and cuisine of the month -->

                <div class="grid grid--flex"> <!-- Promoted restaurants grid start -->

                    <div class="grid__item grid__item--4-12-bp4"> <!-- Featured card grid item start -->

                        <div class="card card--featured"> <!-- Featured card start -->

                            <div class="card__image"> <!-- Featured card image start -->
                                <img src="assets/dist/imgs/restaurants/Zucco.jpg" alt="Zucco">
                            </div> <!-- Featured card image end -->

                            <div class="card__detail"> <!-- Featured card detail start -->

                                <h1 class="delta u-weight-medium u-push-bottom/2">Zucco</h1> <!-- Featured card detail title -->
                                <h2 class="epsilon u-weight-medium u-push-bottom/2">603 Meanwood Road, LS6 4AY</h2> <!-- Featured card address  -->
                                <p class="u-zero-bottom">The menu changes regularly depending on what ingredients we can source from our suppliers on the day, however some items we are not allowed to change for fear of upsetting our regulars.</p> <!-- Featured card detail intro -->

                                <div class="card__inputs"> <!-- Featured card specific icons start -->

                                    <div class="details u-float-left"> <!-- Featured card specific icons container start -->
                                        <span class="icon icon--medium icon--Italian"></span>
                                        <span class="icon icon--medium icon--Family-Friendly"></span>
                                        <span class="icon icon--medium icon--Open-Late"></span>
                                        <span class="icon icon--medium icon--Parking"></span>
                                    </div> <!-- Featured card specific icons container end -->

                                    <a href="#" class="btn btn--primary cf u-float-right"> <!-- Featured card view button start -->
                                        <span class="btn--label">View</span>
                                        <span class="btn--icon">
                                            <span class="icon icon--small icon--chevron-right-white"></span>
                                        </span>
                                    </a> <!-- Featured card view button end -->

                                </div> <!-- Featured card specific icons end -->

                            </div> <!-- Featured card detail end -->

                        </div> <!-- Featured card end -->

                    </div> <!-- Featured card grid item end -->

                </div> <!-- Promoted restaurants grid end -->

                <!-- <a href="#" class="delta u-weight-light u-display-inline u-push-top sub-link">View all previous top picks</a> --> -->

                    <div class="voucher u-push-top@2 u-push-bottom u-display-inline"> <!-- Monthly voucher start -->
                        <img src="assets/dist/imgs/voucher.png" alt="Voucher" class="voucher__img"> <!-- Monthly voucher image start -->
                        <div class="voucher__text"> <!-- Monthly voucher text start -->
                            <h3 class="zeta u-push-bottom/2">Deal of the month:</h3> <!-- Monthly voucher title -->
                            <div class="qr cf">
                                <h2 class="gamma u-push-bottom/2 u-weight-medium deal">25% off your total bill at Trattoria Il Forno</h2>
                                <img src="assets/dist/imgs/qr.png" alt="QR Code to scan"> <!-- Monthly voucher QR image -->
                            </div>
                        </div> <!-- Monthly voucher text end -->
                    </div> <!-- Monthly voucher end -->

                <!-- Print monthly voucher button -->
                <a href="#" class="delta u-weight-light u-display-inline u-push-top sub-link">Print this deal</a>

            </div> <!-- Promoted restaurants flexbox end -->

        </div> <!-- Promoted restaurants container end -->

    </div> <!-- Promoted restaurants end -->

    <div class="container additional-restaurants cf"> <!-- Additional restaurants start -->

        <h1 class="beta u-push-top sub-heading--inverted u-weight-medium">Other popular restaruants in Leeds</h1>

        <div class="results test--flexbox"> <!-- Additional restaurants results start -->
            <div class="grid grid--flex results--grid"> <!-- Additional restaurants results grid start -->

                <div class="grid__item grid__item--6-12-bp2"> <!-- Additional restaurants results grid item start -->

                   <div class="card card--animated"> <!-- Additional restaurants card start -->

                        <div class="card__detail"> <!-- Additional restaurants card text start -->
                            <h1 class="delta u-weight-medium u-push-bottom/2">The Man Behind the Curtain</h1>
                            <h2 class="epsilon u-weight-medium u-push-bottom/2">68-78 Vicar Lane, LS1 7JH</h2>
                            <p class="u-zero-bottom">Our Permanent collection is served as a set tasting menu of between 10 and 14 courses, for tables of up to 5 people.</p>

                            <div class="card__inputs"> <!-- Additional restaurant card specific icons start -->

                                <div class="details u-float-left"> <!-- Additional restaurant card specific icons container start -->
                                    <span class="icon icon--medium icon--English"></span>
                                    <span class="icon icon--medium icon--Parking"></span>
                                    <span class="icon icon--medium icon--Alcohol"></span>
                                </div> <!-- Additional restaurant card specific icons container end -->

                                <a href="#" class="btn btn--primary cf u-float-right"> <!-- Additional restaurant card view button start -->
                                    <span class="btn--label">View</span>
                                    <span class="btn--icon">
                                        <span class="icon icon--small icon--chevron-right-white"></span>
                                    </span>
                                </a> <!-- Additional restaurant card view button end -->

                            </div> <!-- Additional restaurant card specific icons end -->

                        </div> <!-- Additional restaurant card detail end -->

                    </div> <!-- Additional restaurant card end -->

                </div> <!-- Additional restaurant card grid item end -->

            </div> <!-- Additional restaurants grid end -->

        <a href="#" class="delta u-weight-light u-display-inline u-push-top u-push-bottom@2 sub-link">View more restaurants</a>

        </div> <!-- Additional restaurants results end -->

    </div> <!-- Additional restaurants end -->

</main>

<?php get_footer(); ?>
