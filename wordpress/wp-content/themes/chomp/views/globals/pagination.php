<?php if( !is_front_page() ) : ?>
	<nav class="pagination u-push-top@2 u-push-bottom"> <!-- Pagination start -->
	    <?php if ( function_exists( 'wp_pagenavi' ) ) : ?>
	        <?php wp_pagenavi(); ?>
	    <?php endif; ?>
	</nav> <!-- Pagination end -->
<?php endif; ?>



            <ul class="list--unset list--inline"> <!-- Pagination list start -->

                <li class="first">
                    <a href="#" class="">Previous page</a>
                </li>

                <li class="pagination_active">
                    <a href="#" class="">1</a>
                </li>

                <li class="">
                    <a href="#" class="">2</a>
                </li>

                <li class="">
                    <a href="#" class="">3</a>
                </li>

                <li class="last">
                    <a href="#" class=" ">Next page</a>
                </li>

            </ul> <!-- Pagination list end -->

