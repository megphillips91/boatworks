<?php


/**
 * @snippet       Apply a Coupon Programmatically if Product @ Cart - WooCommerce
 * @compatible    WC 3.8
 */

add_action( 'woocommerce_before_cart', 'apply_demo_coupon' );

function apply_demo_coupon() {
    $coupon_code = 'demo-charter-bookings';
    if ( WC()->cart->has_discount( $coupon_code ) ) return;
    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
      $product = wc_get_product($cart_item['product_id']);
      $cats = $product->get_category_ids();
      foreach($cats as $cat_id){
        if(22 == $cat_id){
          WC()->cart->add_discount( $coupon_code );
          wc_print_notices();
          break;
        }
      }
    }
}


 ?>
