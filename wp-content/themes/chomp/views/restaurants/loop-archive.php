<h1 class="u-push-top" style="background: red; color: white; font-size: 4rem; padding: 1em; text-align: center;">THIS TEMPLATE IS BROKEN ATM</h1>

<div class="u-push-top@2 u-push-bottom@2 sorting"> <!-- Search results sorting start -->

     <select class="btn btn--sorting-options"> <!-- Search results sorting options start -->
         <option value="relevance">Sort by relevance</option> <!-- Relevance -->
         <option value="name">Sort by name</option> <!-- Name -->
         <option value="options">Sort by features</option> <!-- Features -->
     </select> <!-- Search results sorting options end  -->

</div> <!-- Search results sorting end -->

<div class="results test--flexbox"> <!-- Restaurants results start -->

    <?php
            $terms = get_terms( 'cuisine', array(
                'orderby'    => 'count',
                'hide_empty' => 0
            ) );

            foreach( $terms as $term ) {

                // Define the query
                $args = array(
                    'post_type' => 'restaurant',
                    'cuisine' => $term->slug
                );

                $query = new WP_Query( $args );

            }

    ?>

    <div class="grid grid--flex results--grid"> <!-- Restaurants grid start -->

        <?php if ( $query->have_posts() ) : ?>

            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <?php get_template_part('views/restaurants/index'); ?>
            <?php endwhile; ?>

        <?php else : ?>
            <?php get_template_part( 'views/errors/404-posts' ); ?>
        <?php endif; ?>

    </div> <!-- Restaurants grid end -->

</div> <!-- Restaurants results end -->
