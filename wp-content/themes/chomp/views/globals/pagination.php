<?php
    global $wp_query;
    // Results pagination offset
    $offset = isset( $_GET["offset"] ) ? sanitize_text_field( $_GET["offset"] ) : 0;
    $found_posts = $wp_query->found_posts;
    $ppp = $wp_query->query_vars["posts_per_page"];
    $total_pages = $wp_query->max_num_pages;
?>

<?php var_dump($ppp); ?>

<?php if ( $total_pages > 1 ) : ?>

    <div class="pagination">
        <?php if ($offset): ?>
            <!-- Previous Results Page -->
            <a href="<?php echo esc_url( add_query_arg( 'offset', $offset-$ppp ) ); ?>" class="prev">Previous</a>
        <?php endif; ?>

        <!-- Pagination -->
        <ol class="pages">
            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                <li>
                    <a href="<?php echo esc_url( add_query_arg( 'offset', ($i*$ppp)-$ppp ) ); ?>" class="<?php echo ((($i*$ppp)-$ppp) == $offset ? "disabled" : ""); ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
        </ol>

        <?php if ($found_posts-$offset > $ppp): ?>
            <!-- Next Results Page -->
            <a href="<?php echo esc_url( add_query_arg( 'offset', $offset+$ppp ) ); ?>" class="next">Next</a>
        <?php endif; ?>
    </div>

<?php endif; ?>
