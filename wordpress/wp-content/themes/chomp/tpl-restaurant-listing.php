<?php

/**
 ***************************************************************************
 * Example Template
 ***************************************************************************
 *
 * All template filenames should be prefixed with `tpl-` to help group them
 * within the theme. Prefix your template name with either 'Admin' or 'Theme':
 * - Admin = doesn't use the usual excerpt/content (aka. set and forget)
 * - Theme = something the client can actively use.
 *
 * Template Name: Admin - Restaurant-Listings
 * Template Post Type: page
 *
 */



// Get the header
get_header();

?>

<main>

    <div class="hero hero--index | u-push-top"> <!-- Hero start -->
        <div class="container container--small"> <!-- Hero container start -->

            <h1 class="u-align-center u-push-bottom/2 beta">Showing
                <span class="u-weight-medium">73</span> results for:
            </h1> <!-- Dynamic depending on how many results -->

            <h2 class="u-align-center u-push-bottom/2 gamma u-weight-medium">Chinese
                <span class="u-weight-light">restaurants with</span> Family Friendly
            </h2> <!-- Dynamic depending on filter type -->

        </div> <!-- Hero container end -->
    </div> <!-- Hero end -->

    <div class="search-area u-pad-bottom"> <!-- Search area start -->

        <div class="container"> <!-- Search area container start -->

            <div class="search-options cf"> <!-- Search options start -->

                <div class="search-area"> <!-- Search area start -->

                    <h3 class="u-push-bottom/2 u-weight-medium">Search again</h3>

                    <form class="u-push-bottom form form-search--filter" action=""> <!-- Search form start -->

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

                    <div class="filter-toggle"> <!-- Search filters toggle start -->

                        <h3 class="delta u-weight-medium u-display-inline u-push-bottom/2">Show filters</h3>
                        <input type="checkbox" id="switch" class="toggle-switch js-toggle-form" />
                        <label for="switch" class="toggle-switch__label">Toggle</label>

                    </div> <!-- Search filters toggle end -->

                </div> <!-- Search area end -->

            </div> <!-- Search options end -->

            <div class="filter-area u-push-top"> <!-- Search filters start -->

                <form action=""> <!-- Search filters form start -->

                    <div class="options-additional"> <!-- Search filters (Features) form options area start -->

                        <h3 class="u-weight-medium u-push-bottom/2">Filter it down</h3>

                        <ul class="options-additional__list"> <!-- Search filters (Features) form options start -->

                            <li class=""> <!-- Family Friendly -->
                                <input type="checkbox" class="checkbox" id="option1" value="family">
                                <label for="option1" class="u-display-inline u-push-left/2 u-weight-light">Family friendly</label>
                            </li>

                            <li class=""> <!-- Open late -->
                                <input type="checkbox" class="checkbox" id="option2" value="openlate">
                                <label for="option2" class="u-display-inline u-push-left/2 u-weight-light">Open late</label>
                            </li>

                            <li class=""> <!-- Parking -->
                                <input type="checkbox" class="checkbox" id="option3" value="parking">
                                <label for="option3" class="u-display-inline u-push-left/2 u-weight-light">Customer parking</label>
                            </li>

                            <li class=""> <!-- Serves alcohol -->
                                <input type="checkbox" class="checkbox" id="option4" value="alcohol">
                                <label for="option4" class="u-display-inline u-push-left/2 u-weight-light">Serves alcohol</label>
                            </li>

                        </ul> <!-- Search filters (Features) form options end -->

                    </div> <!-- Search filters (Features) form options area end -->

                    <div class="options-cuisine"> <!-- Search filters (Cuisine) form options area start -->

                        <h3 class="u-weight-medium u-push-bottom/2">Try something else</h3>

                        <ul class="options-cuisine__list cf"> <!-- Search filters (Cuisine) form options start -->

                            <li class=""> <!-- Chinese -->
                                <input type="checkbox" class="checkbox" id="cuisine1" value="chinese">
                                <label for="cuisine1" class="u-display-inline u-push-left/2 u-weight-light">Chinese</label>
                            </li>

                            <li class=""> <!-- English -->
                                <input type="checkbox" class="checkbox" id="cuisine2" value="english">
                                <label for="cuisine2" class="u-display-inline u-push-left/2 u-weight-light">English</label>
                            </li>

                            <li class=""> <!-- American -->
                                <input type="checkbox" class="checkbox" id="cuisine3" value="american">
                                <label for="cuisine3" class="u-display-inline u-push-left/2 u-weight-light">American</label>
                            </li>

                            <li class=""> <!-- Indian -->
                                <input type="checkbox" class="checkbox" id="cuisine4" value="indian">
                                <label for="cuisine4" class="u-display-inline u-push-left/2 u-weight-light">Indian</label>
                            </li>

                            <li class=""> <!-- Italian -->
                                <input type="checkbox" class="checkbox" id="cuisine5" value="italian">
                                <label for="cuisine5" class="u-display-inline u-push-left/2 u-weight-light">Italian</label>
                            </li>

                            <li class=""> <!-- French -->
                                <input type="checkbox" class="checkbox" id="cuisine6" value="french">
                                <label for="cuisine6" class="u-display-inline u-push-left/2 u-weight-light">French</label>
                            </li>

                            <li class=""> <!-- Thai -->
                                <input type="checkbox" class="checkbox" id="cuisine7" value="thai">
                                <label for="cuisine7" class="u-display-inline u-push-left/2 u-weight-light">Thai</label>
                            </li>

                        </ul> <!-- Search filters (Cuisine) form options end -->

                    </div> <!-- Search filters (Cuisine) form options area end -->

                    <div class="form-buttons"> <!-- Search filters form buttons start -->

                        <input type="submit" value="Search" class="submit btn u-push-right"> <!-- Search -->
                        <input type="reset" value="Reset filters" class="filter_clear btn btn--reset u-style-underline u-weight-medium"> <!-- Clear/Reset -->

                    </div> <!-- Search filters form buttons end -->

                </form> <!-- Search filters toggle form end -->

            </div> <!-- Search filters end -->

        </div> <!-- Search area container end -->

    </div> <!-- Search area end -->

    <div class="container cf"> <!-- Search results container start -->

        <div class="u-push-top@2 u-push-bottom@2 sorting"> <!-- Search results sorting start -->

            <select class="btn btn--sorting-options"> <!-- Search results sorting options start -->
                <option value="relevance">Sort by relevance</option> <!-- Relevance -->
                <option value="name">Sort by name</option> <!-- Name -->
                <option value="options">Sort by features</option> <!-- Features -->
            </select> <!-- Search results sorting options end  -->

        </div> <!-- Search results sorting end -->

        <div class="results test--flexbox"> <!-- Search results start -->

            <div class="grid grid--flex results--grid"> <!-- Search results grid start -->

                <div class="grid__item grid__item--6-12-bp2"> <!-- Search results grid item start -->

                   <div class="card card--animated"> <!-- Search results card start -->

                        <div class="card__detail"> <!-- Search results card text start -->
                            <h1 class="delta u-weight-medium u-push-bottom/2">The Man Behind the Curtain</h1>
                            <h2 class="epsilon u-weight-medium u-push-bottom/2">68-78 Vicar Lane, LS1 7JH</h2>
                            <p class="u-zero-bottom">Our Permanent collection is served as a set tasting menu of between 10 and 14 courses, for tables of up to 5 people.</p>

                            <div class="card__inputs"> <!-- Search result card specific icons start -->

                                <div class="details u-float-left"> <!-- Search result card specific icons container start -->
                                    <span class="icon icon--medium icon--English"></span>
                                    <span class="icon icon--medium icon--Parking"></span>
                                    <span class="icon icon--medium icon--Alcohol"></span>
                                </div> <!-- Search result card specific icons container end -->

                                <a href="#" class="btn btn--primary cf u-float-right"> <!-- Search result card view button start -->
                                    <span class="btn--label">View</span>
                                    <span class="btn--icon">
                                        <span class="icon icon--small icon--chevron-right-white"></span>
                                    </span>
                                </a> <!-- Search result card view button end -->

                            </div> <!-- Search result card specific icons end -->

                        </div> <!-- Search result card detail end -->

                    </div> <!-- Search result card end -->

                </div> <!-- Search result card grid item end -->

            </div> <!-- Search results grid end -->

        </div> <!-- Search results end -->

    </div> <!-- Search results container end -->

</main>

<?php get_footer(); ?>
