<?php

/**
 ***************************************************************************
 * Partial: Header
 ***************************************************************************
 *
 * This partial is used to define the markup for the site's global header
 * and navigation.
 *
 */



?>

<a href="#navigation" class="is-hidden">Skip to Navigation</a>

<header class="header"> <!-- Header area -->

    <!-- Secondary nav -->
    <!-- <div class="nav nav--secondary"> --> <!-- Log in/out, My account -->
        <!-- <div class="container"> --> <!-- Container for secondary nav -->

            <!-- <ul> -->
                <!-- <li class="nav__item">
                    <span class="icon icon--small icon--user-icon"></span>
                    <a href="#" class="nav__link u-display-inline">My account</a>
                 </li>--> <!-- End my account -->

                <!-- <li class="nav__item">
                    <span class="icon icon--small icon--logout"></span>
                    <a href="#" class="nav__link u-display-inline">Logout</a>
                </li> --> <!-- End log in/out -->
            <!-- </ul> -->

        <!-- </div> --> <!-- End container secondary nav -->
    <!-- </div> --> <!-- End secondary nav -->

    <div class="container cf u-push-top"> <!-- Container for primary nav -->

        <!-- Main logo link -->
        <a href="/wordpress" class="logo header__logo">
            <span class="is-hidden"><?php bloginfo( 'name' ); ?></span>
            <span class="icon icon--logo"></span> <!-- Main logo icon -->
        </a>

        <!-- Mobile navigation (burger menu) -->
        <button class="toggle | js-toggle-nav | header__toggle header__toggle--nav" role="button" aria-label="Toggle navigation">
            <span class="toggle__label | is-hidden">Toggle navigation</span>
            <span class="toggle__icon toggle__icon--nav | icon icon--medium icon--menu-open"></span>
        </button>

        <!-- Primary nav -->
        <nav class="nav-container | header__nav" id="navigation" role="navigation"> <!-- Container for primary nav -->
            <ul class="nav nav--primary">
                <?php wp_nav_menu( array('theme_location' => 'primary', 'items_wrap' => '%3$s') ); ?>
            </ul>
        </nav>

    </div> <!-- End container primary nav and logo -->

    <!-- Breadcrumbs -->
    <?php if(!is_front_page() && !is_404()) : ?>
    <div class="container u-push-top/2">
        <?php get_template_part('views/globals/breadcrumbs'); ?>
    </div>
    <?php endif; ?>

</header>
