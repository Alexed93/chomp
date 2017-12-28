<?php if( !is_front_page() ) : ?>

    <?php
        $ppp = '6';
        $restaurants = chomp_get_restaurants($ppp);
        $filter_output = $restaurants;
        $found_posts = $filter_output->found_posts;
        $total_pages = ceil($found_posts / $ppp);
        $page = (isset($_GET['filter_page'])) ? $_GET['filter_page'] : '1';
    ?>

    <?php if ( $total_pages > 1 ) : ?>

        <nav class="pagination">
            <div class="wp-pagenavi">

                <!-- Previous Results Page -->
                <?php if ($page != 1): ?>
                    <a href="<?php echo esc_url( add_query_arg( 'filter_page', $page-1 ) ); ?>" class="previouspostslink">
                        <i class="btn__icon btn__icon--arrow | icon icon--arrow-left-white"></i>
                        <span class="btn__inner">Previous</span>
                    </a>
                <?php endif; ?>

                <!-- Pagination -->
                <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                    <?php if($page == $i): ?>
                        <span class="current">
                            <span class="btn__inner"><?php echo $i; ?></span>
                        </span>
                    <?php else: ?>
                        <a href="<?php echo esc_url( add_query_arg( 'filter_page', $i ) ); ?>" class="page larger">
                            <span class="btn__inner"><?php echo $i; ?></span>
                        </a>
                    <?php endif; ?>
                <?php endfor; ?>

                <!-- Next Results Page -->
                <?php if ($page < $total_pages): ?>
                    <a href="<?php echo esc_url( add_query_arg( 'filter_page', $page+1 ) ); ?>" class="nextpostslink">
                        <span class="btn__inner">Next</span>
                        <i class="btn__icon btn__icon--arrow | icon icon--arrow-right-white"></i>
                    </a>
                <?php endif; ?>

            </div>
        </nav>

    <?php endif; ?>

<?php endif; ?>
