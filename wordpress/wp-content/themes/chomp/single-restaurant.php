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
$images = filterValidImages('restaurant_gallery_image', 3);

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
			    <span class="icon icon--medium icon--Phone u-float-left u-push-right"></span>
			    <h2 class="u-weight-medium epsilon u-zero-bottom">Phone number:</h2>
			    <a href="tel:<?php echo $formatted_telephone; ?>" class="epsilon u-weight-light"><?php echo $telephone; ?></a>
			</div>
			<!-- Restaurant detail - phone number - end -->
			<?php endif; ?>

			<?php if($website): ?>
			<!-- Restaurant detail - website - start -->
			<div class="detail__section detail__section--web u-push-bottom">
			    <span class="icon icon--medium icon--Website u-float-left u-push-right"></span>
			    <h2 class="u-weight-medium epsilon u-zero-bottom">Website:</h2>
			    <a href="<?php echo $website; ?>" class="epsilon u-weight-light"><?php echo $website; ?></a>
			</div>
			<!-- Restaurant detail - website - end -->
			<?php endif; ?>


			<!-- Restaurant detail - opening hours - start -->
			<div class="detail__section detail__section--opening u-push-bottom">
			    <span class="icon icon--medium icon--Opening u-float-left u-push-right"></span>
			    <h2 class="u-weight-medium epsilon u-zero-bottom">Opening hours:</h2>
			    <ul class="list--unset opening-hours__list u-display-inline">
			        <li class="opening-hours-list__item">Monday-Friday: 17:00-22:00</li>
			        <li class="opening-hours-list__item">Saturday: 16:30-22:30</li>
			        <li class="opening-hours-list__item">Sunday: Closed</li>
			    </ul>
			</div>
			<!-- Restaurant detail - opening hours - end -->



			<!-- Restaurant detail - features - start -->
			<div class="details u-push-top">
			    <span class="icon icon--medium icon--Chinese"></span>
			    <span class="icon icon--medium icon--Parking"></span>
			    <span class="icon icon--medium icon--Alcohol"></span>
			    <span class="icon icon--medium icon--Open-Late"></span>
			</div>
			<!-- Restaurant detail - features - end -->

		</div> <!-- Summary card detail end -->

	</div> <!-- Restaurant summary card container end -->

	<div class="container u-weight-light"> <!-- Content area container start -->

	    <div class="grid"> <!-- Content area grid start -->

	        <div class="grid__item grid__item--9-12-bp3"> <!-- Content area start -->

				<h1 class="beta u-push-bottom/2">A bit about us</h1>
				<h2 class="delta u-push-bottom/2">A Family Run Award Winning Chinese Restaurant.</h2> <!-- Restaurant sub-title -->

				<!-- Restaurant content field -->
				<p>Zen Rendezvous is a multi award winning contemporary oriental restaurant with rave reviews from national media including appearances on Channel 4’s ‘Gordon Ramsey’s F Word – Best Local UK Restaurant’.</p>

				<p>The restaurant boasts an extensive menu which features dishes from the East suiting all tastes. Our comprehensive wine list complements all our exquisite flavours.</p>

				<p>A family business originally established in 1991, Zen Rendezvous was previously known as Jade Unicorn before its transformation in 2000. Over the years, Zen has pushed the boundaries of traditional oriental restaurants by providing a blend of classic and modern decor and introduced more diverse dishes. This has led to Zen becoming an award winning restaurant.</p>

				<p>We pride ourselves on providing diners with a memorable eating experience from the moment they step foot through the door. Be it a romantic dinner, a business dinner or just a family gathering we will ensure that you enjoy every moment within our restaurant.</p>

				<p>Zen looks forward to your company.</p>

				<h1 class="beta u-push-bottom/2 u-push-top">Downloads</h1>
				<h2 class="delta u-push-bottom">View what’s on offer</h2>

				<div class="downloads u-pad u-display-inline u-push-bottom@2"> <!-- Restaurant downloads area start -->

					<div class="download__link u-align-center u-display-inline u-push-right@2"> <!-- Restaurant download start -->

					    <a href="assets/dist/downloads/file-example.pdf"> <!-- Restaurant download file -->
					        <span class="icon icon--xlarge icon--download u-zero-bottom download__icon"></span> <!-- Restaurant download icon -->
					        A La Cart <!-- Restaurant download title -->
					    </a>

					</div> <!-- Restaurant download end -->

				</div> <!-- Restaurant downloads area end -->

				<h1 class="beta u-push-bottom/2">Where to find us</h1>
				<h2 class="delta u-push-bottom">10-12 The Green Guiseley, Leeds, LS20 9BT</h2> <!-- Restaurant address -->
				<div id="map" class="u-push-bottom@2"></div> <!-- Restaurant Google Map -->

				<h1 class="beta u-push-bottom/2">Comments</h1>
				<h2 class="delta u-push-bottom">Read about what other Chompers thought, or add your own comment</h2>

				<div class="comments"> <!-- Restaurant comments start -->

					<form class="form form--comment" action=""> <!-- Restaurant create comment start -->
					    <textarea class="comment-entry u-push-bottom/2" placeholder="What did you think?"></textarea>
					    <input type="submit" value="Post" class="submit btn u-push-right">
					    <input type="reset" value="Clear" class="filter_clear btn btn--reset u-style-underline u-weight-medium">
					</form> <!-- Restaurant create comment end -->

					<div class="u-pad comment cf u-push-bottom"> <!-- Restaurant comment start -->
					    <img src="assets/dist/imgs/noprofile.svg" alt="Missing profile picture" class="profilepicture">
					    <div class="comment__text">
					        <h3 class="delta u-weight-medium u-push-bottom/2">Alex Edwards</h3>
					        <p>this place is amazing!!!!!! best chinese ever, wish it was cheaper tho lol</p>
					    </div>
					</div> <!-- Restaurant create comment end -->

					<div class="pagination u-push-top@2 u-push-bottom@2"> <!-- Pagination start -->

					    <ul class="list--unset list--inline"> <!-- Pagination list start -->

					        <li class="first">
					            <a href="#" class="">Previous page</a>
					        </li>

					        <li class="pagination_active">
					            <a href="#" class="">1</a>
					        </li>

					        <li class="">
					            <a href="#" class="">2</a>
					        </li>

					        <li class="">
					            <a href="#" class="">3</a>
					        </li>

					        <li class="last">
					            <a href="#" class=" ">Next page</a>
					        </li>

					    </ul> <!-- Pagination list end -->

					</div> <!-- Pagination end -->

				</div> <!-- Restaurant comments end -->

        	</div> <!-- Content area end -->

        	<div class="grid__item grid__item--3-12-bp3 cf"> <!-- Restaurant sidebar grid start -->

                <div class="sidebar cf"> <!-- Restaurant sidebar start -->

					<!-- Restaurant trip-advisor start -->
					<div class="trip-advisor u-push-bottom TA_selfserveprop" id="TA_selfserveprop33">
					    <ul id="EcKBw4i4jI" class="TA_links qAfZLFtOfs">
					        <li id="oyuDA9S9q" class="I7ExMxaf0XT">
					            <a target="_blank" href="https://www.tripadvisor.co.uk/">
					                <img src="https://www.tripadvisor.co.uk/img/cdsi/img2/branding/150_logo-11900-2.png" alt="TripAdvisor"/>
					            </a>
					        </li>
					    </ul>
					</div>
					<!-- Restaurant trip-advisor end -->

					<?php get_template_part( 'views/globals/share-nav' ); ?> <!-- Social media sharing buttons -->

            	</div> <!-- Restaurant sidebar end -->

        	</div> <!-- Restaurant sidebar grid end -->

    	</div> <!-- Content area grid end -->

	</div> <!-- Content area container end -->

</main>

<?php get_footer(); ?>
