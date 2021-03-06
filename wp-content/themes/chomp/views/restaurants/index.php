<?php
    // Get cuisine
    $restaurant_cuisine = get_the_terms( get_the_ID(), 'cuisine' );
    $restaurant_cuisine_name = $restaurant_cuisine[0]->name;

    // Build address line
    $address_line = get_field('restaurant_address_line');
    $postcode = get_field('restaurant_postcode');
    if( $address_line && $postcode ):
        $address = $address_line.", ".$postcode;
    endif;

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

<div class="grid__item grid__item--6-12-bp2"> <!-- Additional restaurants results grid item start -->

   <div class="card card--animated"> <!-- Additional restaurants card start -->

        <div class="card__detail"> <!-- Additional restaurants card text start -->
            <h1 class="delta u-weight-medium u-push-bottom/2"><?php echo the_title(); ?></h1>
            <h2 class="epsilon u-weight-medium u-push-bottom/2"><?php echo $address; ?></h2>
            <p class="u-zero-bottom"><?php the_excerpt(); ?></p>

            <div class="card__inputs"> <!-- Additional restaurant card specific icons start -->

                <div class="details u-float-left"> <!-- Additional restaurant card specific icons container start -->
                    <span class="icon icon--medium icon--<?php echo $restaurant_cuisine_name; ?>"></span>
                    <?php if($restaurant_features): ?>
                        <?php foreach($restaurant_features as $restaurant_feature): ?>
                            <span class="icon icon--medium icon--<?php echo $feature_icon[$restaurant_feature]; ?>"></span>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div> <!-- Additional restaurant card specific icons container end -->

                <a href="<?php echo get_page_link(); ?>" class="btn btn--primary cf u-float-right"> <!-- Additional restaurant card view button start -->
                    <span class="btn--label">View</span>
                    <span class="btn--icon">
                        <span class="icon icon--small icon--chevron-right-white"></span>
                    </span>
                </a> <!-- Additional restaurant card view button end -->

            </div> <!-- Additional restaurant card specific icons end -->

        </div> <!-- Additional restaurant card detail end -->

    </div> <!-- Additional restaurant card end -->

</div> <!-- Additional restaurant card grid item end -->
