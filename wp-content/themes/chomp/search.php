<?php

/**
 ***************************************************************************
 * Search Template
 ***************************************************************************
 *
 * All template filenames should be prefixed with `tpl-` to help group them
 * within the theme. Prefix your template name with either 'Admin' or 'Theme':
 * - Admin = doesn't use the usual excerpt/content (aka. set and forget)
 * - Theme = something the client can actively use.
 *
 * Template Name: Admin - Search
 *
 */



// Get the header
get_header();

?>

<?php
    if( $_GET['search'] && !empty($_GET['search']) ) {
        $text = $_GET['search'];
    }

    $restaurants = chomp_get_restaurants(
        $excludes = '',
        $text
    );
?>

<div class="container cf"> <!-- Search results container start -->
    <div class="results test--flexbox"> <!-- Restaurants results start -->
        <div class="grid grid--flex results--grid">
            <?php if ( $restaurants->have_posts() ) : ?>

                <?php while ( $restaurants->have_posts() ) : $restaurants->the_post(); ?>
                    <?php get_template_part('views/restaurants/index'); ?>
                <?php endwhile; wp_reset_query(); ?>

            <?php else : ?>
                <?php get_template_part( 'views/errors/404-posts' ); ?>
            <?php endif; wp_reset_query(); ?>
        </div>
    </div>
</div>



<?php get_footer(); ?>
