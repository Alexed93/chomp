<?php
    global $wp_query;
    // Results pagination offset
    $offset = isset( $_GET["offset"] ) ? sanitize_text_field( $_GET["offset"] ) : 0;
    $found_posts = $wp_query->found_posts;
    $ppp = $wp_query->query_vars["posts_per_page"];
    $total_pages = $wp_query->max_num_pages;
?>

<?php if ( $total_pages > 1 ) : ?>

<div class="grid__item grid__item--12-12-bp2">
    <div class="pagination u-push-top u-push-bottom">
        <?php if ($offset): ?>
            <!-- Previous Results Page -->
            <a href="<?php echo esc_url( add_query_arg( 'offset', $offset-$ppp ) ); ?>" class="first">Previous</a>
        <?php endif; ?>

        <!-- Pagination -->
        <ol class="pages list--unset list--inline u-display-inline">
            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                <li class="<?php echo ((($i*$ppp)-$ppp) == $offset ? "disabled" : ""); ?>">
                    <a href="<?php echo esc_url( add_query_arg( 'offset', ($i*$ppp)-$ppp ) ); ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
        </ol>

        <?php if ($found_posts-$offset > $ppp): ?>
            <!-- Next Results Page -->
            <a href="<?php echo esc_url( add_query_arg( 'offset', $offset+$ppp ) ); ?>" class="last">Next</a>
        <?php endif; ?>
    </div>
</div>

<?php endif; ?>
