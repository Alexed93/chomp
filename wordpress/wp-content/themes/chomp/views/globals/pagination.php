<?php if( !is_front_page() ) : ?>
<nav class="pagination u-push-top@2 u-push-bottom"> <!-- Pagination start -->
    <?php if ( function_exists( 'wp_pagenavi' ) ) : ?>
        <?php wp_pagenavi( array( 'query' => $restaurants ) ); ?>
    <?php else: ?>
        <?php next_posts_link( '<span class="older">&laquo; Older posts</span>' ); ?>
        <?php previous_posts_link( '<span class="newer">Newer posts &raquo;</span>' ); ?>
    <?php endif; ?>
</nav> <!-- Pagination end -->
<?php endif; ?>
