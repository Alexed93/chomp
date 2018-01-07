<?php

/**
 ***************************************************************************
 * Single restaurant
 ***************************************************************************
 *
 * This template is used to show a single restaurant page
 *
 */



// Get the header
get_header();

// Get featured cuisine
$featured_cuisines = get_field('featured_cuisine', 7);
$opening_icon = 'icon--opening--';
$website_icon = 'icon--website--';
$phone_icon = 'icon--phone--';
$download_icon = 'icon--download--';

if (null !== $featured_cuisines) :
    $opening_icon .= $featured_cuisines->name;
    $website_icon .= $featured_cuisines->name;
    $phone_icon .= $featured_cuisines->name;
    $download_icon .= $featured_cuisines->name;
else:
    $opening_icon .= 'default';
    $website_icon .= 'default';
    $phone_icon .= 'default';
    $download_icon .= 'default';
endif;

// Hero image
$hero_image = get_field('hero_image');
if( $hero_image ){
    $hero_image_url = !empty( $hero_image ) ? $hero_image['sizes']['hero'] : '';
}

// Get cuisine
$restaurant_cuisine = get_the_terms( get_the_ID(), 'cuisine' );
$restaurant_cuisine_name = $restaurant_cuisine[0]->name;

// Build address line
$address_line = get_field('restaurant_address_line');
$postcode = get_field('restaurant_postcode');
if( $address_line && $postcode ):
    $address = $address_line.", ".$postcode;
endif;

// Get contact fields
$telephone = get_field('restaurant_telephone');
$website = get_field('restaurant_website');

$formatted_telephone = chomp_format_tel($telephone);

// Get slider images
$images = filterValidACF('restaurant_gallery_image', 6);

// Get downloads
$downloads = filterValidACF('restaurant_downloadable_file', 6);

// Get map
$map = get_field('restaurant_google_map');

?>

<main>

    <div class="hero hero--detail | u-push-top" <?php if($hero_image_url): ?> style="background-image: url('<?php echo $hero_image_url; ?>');" <?php endif; ?>> <!-- Hero start -->

        <div class="container container--small"> <!-- Hero container start -->

            <h1 class="u-align-center u-push-bottom/2 beta"><?php echo the_title(); ?></h1> <!-- Name change depending on post -->

            <h2 class="u-align-center u-push-bottom/2 gamma u-weight-medium"><?php echo $restaurant_cuisine_name; ?>
                <span class="u-weight-light u-style-italic">restaurant at</span> <?php echo $address; ?>
            </h2> <!-- Dynamic depending on address -->

        </div> <!-- Hero container end -->

    </div> <!-- Hero end -->

    <div class="container cf card summary u-push-bottom@2"> <!-- Restaurant summary card container start -->

        <div class="slider__container"> <!-- Slick slider container start -->

            <?php if($images): ?>

                <div class="slider slider-for"> <!-- Slick slider start -->
                <?php foreach ($images as $image) : ?>
                    <img src="<?php echo $image['sizes']['gallery']; ?>" alt="<?php echo $image['alt']; ?>" /> <!-- Slick slider image -->
                <?php endforeach; ?>
                </div> <!-- Slick slider end -->

                <div class="slider-nav"> <!-- Slick slider navigation start -->
                    <?php foreach ($images as $image) : ?>
                        <img src="<?php echo $image['sizes']['gallery_thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" /> <!-- Slick slider image -->
                    <?php endforeach; ?>
                </div> <!-- Slick slider navigation end -->

                <?php else: ?>

                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/dist/imgs/placeholder_restaurant.svg" alt="There are no images of this restaurant available." /> <!-- Slick slider image -->

            <?php endif; ?>

        </div> <!-- Slick slider container end -->

        <div class="summary-detail"> <!-- Summary card detail start -->

            <h1 class="delta u-push-bottom/2">Summary of
                <span class="u-weight-medium"><?php echo the_title(); ?></span> <!-- Dynamic based on restaurant name -->
            </h1>

            <?php if($telephone): ?>
            <!-- Restaurant detail - phone number - start -->
            <div class="detail__section detail__section--phone u-push-bottom">
                <span class="icon icon--medium u-float-left u-push-right <?php echo $phone_icon; ?>"></span>
                <h2 class="u-weight-medium epsilon u-zero-bottom">Phone number:</h2>
                <a href="tel:<?php echo $formatted_telephone; ?>" class="epsilon u-weight-light"><?php echo $telephone; ?></a>
            </div>
            <!-- Restaurant detail - phone number - end -->
            <?php endif; ?>

            <?php if($website): ?>
            <!-- Restaurant detail - website - start -->
            <div class="detail__section detail__section--web u-push-bottom">
                <span class="icon icon--medium u-float-left u-push-right <?php echo $website_icon; ?>"></span>
                <h2 class="u-weight-medium epsilon u-zero-bottom">Website:</h2>
                <a href="<?php echo $website; ?>" class="epsilon u-weight-light"><?php echo $website; ?></a>
            </div>
            <!-- Restaurant detail - website - end -->
            <?php endif; ?>

            <!-- Restaurant detail - opening hours - start -->
            <div class="detail__section detail__section--opening u-push-bottom">
                <span class="icon icon--medium u-float-left u-push-right <?php echo $opening_icon; ?>"></span>
                <h2 class="u-weight-medium epsilon u-zero-bottom">Opening hours:</h2>

                <?php
                    // Get hours
                    $monday     = get_field( 'restaurant_monday' );
                    $tuesday    = get_field( 'restaurant_tuesday' );
                    $wednesday  = get_field( 'restaurant_monday' );
                    $thursday   = get_field( 'restaurant_thursday' );
                    $friday     = get_field( 'restaurant_friday' );
                    $saturday   = get_field( 'restaurant_saturday' );
                    $sunday     = get_field( 'restaurant_sunday' );

                    $restaurant_hours_check = get_field('restaurant_hours_check');
                ?>

                <ul class="list--unset opening-hours__list u-display-inline"> <!-- Restaurant detail - opening hours list - start -->

                    <!-- If Monday to Friday checkbox is checked and has a value-->
                    <?php if( $restaurant_hours_check && get_field('restaurant_montofri') ): ?>
                        <li class="opening-hours-list__item">Monday-Friday: <?php the_field('restaurant_montofri'); ?></li>
                    <?php endif; ?>

                    <!-- If Monday to Friday checkbox is not checked -->
                    <?php if( !$restaurant_hours_check ): ?>
                        <?php if($monday): ?>
                            <li class="opening-hours-list__item">Monday: <?php echo $monday; ?></li>
                        <?php endif; ?>

                        <?php if($tuesday): ?>
                            <li class="opening-hours-list__item">Tuesday: <?php echo $tuesday; ?></li>
                        <?php endif; ?>

                        <?php if($wednesday): ?>
                            <li class="opening-hours-list__item">Wednesday: <?php echo $wednesday; ?></li>
                        <?php endif; ?>

                        <?php if($thursday): ?>
                            <li class="opening-hours-list__item">Thursday: <?php echo $thursday; ?></li>
                        <?php endif; ?>

                        <?php if($friday): ?>
                            <li class="opening-hours-list__item">Friday: <?php echo $friday; ?></li>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if($saturday): ?>
                        <li class="opening-hours-list__item">Saturday: <?php echo $saturday; ?></li>
                    <?php else: ?>
                        <li class="opening-hours-list__item">Saturday: Closed</li>
                    <?php endif; ?>

                    <?php if($sunday): ?>
                        <li class="opening-hours-list__item">Sunday: <?php echo $sunday; ?></li>
                    <?php else: ?>
                        <li class="opening-hours-list__item">Sunday: Closed</li>
                    <?php endif; ?>

                </ul> <!-- Restaurant detail - opening hours list - end -->

            </div>
            <!-- Restaurant detail - opening hours - end -->

            <?php
                // Get cuisine
                $restaurant_cuisine = get_the_terms( get_the_ID(), 'cuisine' );
                $restaurant_cuisine_name = $restaurant_cuisine[0]->name;

                // Get features
                $restaurant_features = get_field('restaurant_features');

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

            <!-- Restaurant detail - features - start -->
            <div class="details u-push-top">
                <span class="icon icon--medium icon--<?php echo $restaurant_cuisine_name; ?>"></span>
                <?php if($restaurant_features): ?>
                    <?php foreach($restaurant_features as $restaurant_feature): ?>
                        <span class="icon icon--medium icon--<?php echo $feature_icon[$restaurant_feature]; ?>"></span>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <!-- Restaurant detail - features - end -->

        </div> <!-- Summary card detail end -->

    </div> <!-- Restaurant summary card container end -->

    <div class="container u-weight-light"> <!-- Content area container start -->

        <div class="grid grid--spaced"> <!-- Content area grid start -->

            <div class="grid__item grid__item--9-12-bp4"> <!-- Content area start -->

                <h1 class="beta u-push-bottom/2">A bit about us</h1>
                <?php if( get_field('restaurant_subtitle') ): ?>
                    <h2 class="delta u-push-bottom/2 u-push-right@2"><?php the_field('restaurant_subtitle'); ?></h2> <!-- Restaurant sub-title -->
                <?php endif; ?>

                <!-- Restaurant content area -->
                <?php if( !empty(the_content()) ): ?>
                    <?php the_content(); ?>
                <?php endif; ?>

                <!-- Downloads section start -->
                <?php if($downloads): ?>
                    <h1 class="beta u-push-bottom/2 u-push-top">Downloads</h1>
                    <h2 class="delta u-push-bottom">View what’s on offer</h2>

                    <div class="downloads u-pad u-display-inline u-push-bottom@2"> <!-- Restaurant downloads area start -->
                    <?php foreach ($downloads as $download) : ?>
                        <div class="download__link u-display-inline u-push-right@2"> <!-- Restaurant download start -->
                            <a href="<?php echo $download['url']; ?>"> <!-- Restaurant download file -->
                                <span class="icon icon--xlarge u-push-bottom/2 download__icon <?php echo $download_icon; ?>"></span> <!-- Restaurant download icon -->
                                <p class="u-zero-bottom"><?php echo $download['title']; ?></p> <!-- Restaurant download title -->
                            </a>
                        </div> <!-- Restaurant download end -->
                    <?php endforeach; ?>
                    </div> <!-- Restaurant downloads area end -->
                <?php endif; ?>
                <!-- Downloads section end -->

                <?php if( !empty($map) ): ?>
                    <h1 class="beta u-push-bottom/2">Where to find us</h1>
                    <h2 class="delta u-push-bottom"><?php echo $address; ?></h2> <!-- Restaurant address -->
                    <div class="acf-map u-push-bottom@2">
                        <div class="marker" data-lat="<?php echo $map['lat']; ?>" data-lng="<?php echo $map['lng']; ?>"></div> <!-- Restaurant Google Map -->
                    </div>
                <?php endif; ?>

            </div> <!-- Content area end -->

            <div class="grid__item grid__item--3-12-bp4 cf"> <!-- Restaurant sidebar grid start -->
                <?php get_sidebar('restaurant'); ?>
            </div> <!-- Restaurant sidebar grid end -->

            <!-- If comments are open or we have at least one comment, load up the comment template. -->
            <?php if ( comments_open() || get_comments_number() ) : ?>
                <div class="grid__item grid__item--9-12-bp4"> <!-- Comments grid item start -->
                    <h1 class="beta u-push-bottom/2">Comments</h1>
                    <h2 class="delta u-push-bottom">Read about what other Chompers thought, or add your own comment</h2>
                    <?php comments_template(); ?>
                </div> <!-- Comments grid item end -->
            <?php endif; ?>

        </div> <!-- Content area grid end -->

    </div> <!-- Content area container end -->

</main>

<?php get_footer(); ?>
