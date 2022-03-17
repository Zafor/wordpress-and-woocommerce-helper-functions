<?php 

$allProducts = wc_get_products([
    'posts_per_page' => -1
]);

foreach($allProducts as $product){
    $productID = $product->get_id();
    $postId  = get_post_meta($productID, 'linked_post_id', true);
    $postTitle = get_post( $postId )->post_title;
    wp_update_post([
        'ID' => $product->get_id(),
        'post_title' => $postTitle
    ]);
}


// project:xplrme
// I used a post meta in product to link the post id into the product. 