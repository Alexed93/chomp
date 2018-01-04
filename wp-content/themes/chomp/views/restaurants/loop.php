<div class="results test--flexbox"> <!-- Restaurants results start -->

    <?php
            // Get remaining restaurants
            $restaurants = chomp_get_restaurants(
                $excludes = '',
                $text = ''
            );
    ?>

    <?php if ( !is_front_page() ) : ?>

        <div class="u-push-top@2 u-push-bottom@2 sorting"> <!-- Search results sorting start -->

            <select class="btn btn--sorting-options"> <!-- Search results sorting options start -->
                <option value="relevance">Sort by relevance</option> <!-- Relevance -->
                <option value="name">Sort by name</option> <!-- Name -->
                <option value="options">Sort by features</option> <!-- Features -->
            </select> <!-- Search results sorting options end  -->

        </div> <!-- Search results sorting end -->

    <?php endif; ?>

    <div class="grid grid--flex results--grid"> <!-- Restaurants grid start -->

        <?php if ( $restaurants->have_posts() ) : ?>

            <?php while ( $restaurants->have_posts() ) : $restaurants->the_post(); ?>
                <?php get_template_part('views/restaurants/index'); ?>
            <?php endwhile; wp_reset_postdata(); ?>

            <!-- Pagination -->
            <?php if( !is_front_page() ) : ?>
                <?php $wp_query = $restaurants; get_template_part( 'views/globals/pagination' ); wp_reset_query(); ?>
            <?php endif; ?>

        <?php else : ?>
            <?php get_template_part( 'views/errors/404-posts' ); ?>
        <?php endif; wp_reset_postdata(); wp_reset_query(); ?>

    </div> <!-- Restaurants grid end -->

</div> <!-- Restaurants results end -->
