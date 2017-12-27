<?php

/**
 ***************************************************************************
 * Partial: Footer
 ***************************************************************************
 *
 * This partial is used to define the markup for the site's global footer
 * and/or copyright info.
 *
 */

// Get Fields
$telephone = get_field('contact_telephone', 13);
$fax = get_field('contact_fax', 13);
$email = get_field('contact_email', 13);

$formatted_fax = chomp_format_tel($fax);
$formatted_telephone = chomp_format_tel($telephone);

$address_1 = get_field('contact_address_line_1', 13);
$address_2 = get_field('contact_address_line_2', 13);
$address = '';
$postcode = get_field('contact_address_postcode', 13);

if($address_1 && $address_2) {
    $address = $address_1." ".$address_2;
}

$twitter = get_field('chomp_twitter', 13);
$facebook = get_field('chomp_facebook', 13);

?>

<footer>
    <div class="footer u-push-top/2"> <!-- Footer start -->
        <div class="container"> <!-- Footer container start -->
        	<div class="grid zeta"> <!-- Footer grid start -->

        		<div class="grid__item grid__item--5-12-bp3"> <!-- Newsletter signup start -->
        		    <form class="form form--sign-up" action=""> <!-- Newsletter signup form start -->
        		        <label for="email" class="zeta u-weight-medium u-zero-bottom">Sign up to our weekly newsletter:</label>
        		        <input type="email" name="email" placeholder="Enter your email address" class="sign-up">
        		        <button type="button" class="sign-up-submit">
        		        	<span class="icon icon--small icon--chevron-right-white"></span>
        		        	<span class="is-hidden">Submit</span>
        		        </button>
        		    </form> <!-- Newsletter signup form end -->
        		</div> <!-- Newsletter signup end -->

                <?php if($address && $postcode): ?>
				<div class="grid__item grid__item--2-12-bp3"> <!-- Address start -->
				    <h3 class="zeta u-weight-medium u-zero-bottom">Write to us:</h3>
				    <p class="u-weight-light">Chomp HQ<br>
				    <?php echo $address; ?><br>
				    <?php echo $postcode; ?></p>
				</div> <!-- Address end -->
                <?php endif; ?>

                <?php if($formatted_telephone): ?>
				<div class="grid__item grid__item--2-12-bp3"> <!-- Contact start -->
				    <h3 class="zeta u-weight-medium u-zero-bottom">Call us:</h3>
				    <a href="tel:<?php echo $formatted_telephone; ?>" class="u-weight-light footer__link"><?php echo $telephone; ?></a> <!-- Call us link -->
                    <?php if($formatted_fax): ?>
				    <h3 class="zeta u-weight-medium u-zero-bottom u-push-top">Fax us:</h3>
				    <a href="tel:<?php echo $formatted_fax; ?>" class="u-weight-light footer__link"><?php echo $fax; ?></a> <!-- Fax us link -->
                    <?php endif; ?>
				</div> <!-- Contact end -->
                <?php endif; ?>

				<div class="grid__item grid__item--3-12-bp3"> <!-- Social Media start -->
				    <div class="social-media">
                        <?php if($twitter): ?>
				        <a href="<?php echo $twitter; ?>" class="icon icon--large icon--twitter--italian"></a> <!-- Twitter -->
                        <?php endif; ?>
                        <?php if($facebook): ?>
				        <a href="<?php echo $facebook; ?>" class="icon icon--large icon--facebook--italian u-push-left@2"></a> <!-- Facebook -->
                        <?php endif; ?>
                        <?php if($email): ?>
				        <a href="mailto:<?php echo $email; ?>" class="icon icon--large icon--email--italian u-push-left@2"></a> <!-- Email -->
                        <?php endif; ?>
				    </div>
				</div> <!-- Social Media end -->

    		</div> <!-- Footer grid end -->
		</div> <!-- Footer container end -->
    </div> <!-- Footer end -->
</footer>

<div class="copyright | u-push-top/2"> <!-- Copyright start -->
    <div class="container"> <!-- Copyright container start -->
        <ul class="zeta | copyright__links"> <!-- Copyright links start -->
            <li class="copyright__link">Copyright &copy; Chomp | Created by
            	<a href="mailto:alexed93@gmail.com" class="link">Alex Edwards</a> <!-- My contact email -->
            </li>
            <li class="copyright__link">|</li> <!-- Splitter -->
            <li class="copyright__link">
            	<a href="#">To top</a> <!-- To top link -->
            </li>
            <li class="copyright__link">|</li> <!-- Splitter -->
            <li class="copyright__link">
            	<a href="#">Accessibility</a> <!-- Accessibility page link -->
            </li>
        </ul> <!-- Copyright links end -->
    </div> <!-- Copyright container end -->
</div> <!-- Copyright end -->


<?php wp_footer(); ?>

</body>
</html>
