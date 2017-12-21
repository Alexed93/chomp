<?php
    // Get access to $post object
    global $post;
    // Get twitter handle
    $twitter = get_field('restaurant_twitter', 'restaurant-details');
    // define links
    $links = array(
        'facebook' => 'https://www.facebook.com/sharer/sharer.php?u=' . get_permalink(),
        'twitter'  => "https://twitter.com/intent/tweet?text=" . urlencode($post->post_title . " - " . get_permalink($post->ID)),
        'mail'     => 'mailto:?subject='. get_the_title() .'&body=Take a look at this restaurant - ' . get_permalink(),
        'gplus'    => 'https://plus.google.com/share?url=' . get_permalink()
    );
?>

<h2>Share this restaurant</h2>

<nav class="list--inline" role="menu" aria-label="Share Links">
    <li class="share__item">
        <a href="<?php echo $links['facebook']; ?>" class="share__link">
            <span class="icon icon--large icon--social-fb"></span>
            <span class="is-hidden">Share this Post on Facebook</span>
        </a>
    </li>
    <li class="share__item">
        <a href="<?php echo $links['twitter']; ?>" class="share__link">
            <span class="icon icon--large icon--social-tw"></span>
            <span class="is-hidden">Share this Post on Twitter</span>
        </a>
    </li>
    <li class="share__item">
        <a href="<?php echo $links['mail']; ?>" class="share__link">
            <span class="icon icon--large icon--social-mail"></span>
            <span class="is-hidden">Share this Post via Email</span>
        </a>
    </li>
    <li class="share__item">
        <a href="<?php echo $links['gplus']; ?>" class="share__link">
            <span class="icon icon--large icon--social-gp"></span>
            <span class="is-hidden">Share this Post on Google Plus</span>
        </a>
    </li>
</nav>
