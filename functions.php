<?php

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
   wp_enqueue_style( 'boatworks-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'parent-style' ),
        wp_get_theme()->get('Version')
    );
    wp_enqueue_style('open-sans-google-font', 'https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css');
    wp_enqueue_style( 'woocommerce-css', get_stylesheet_directory_uri().'/woocommerce.css' );
    wp_enqueue_style( 'boatworks-product-styles', get_stylesheet_directory_uri().'/product.css' );
    //get_stylesheet_directory_uri() . '/style.css'
    wp_enqueue_script( 'boatworks-js', get_stylesheet_directory_uri() . '/theme.js', array( 'jquery' ),'',true );

}
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

require_once plugin_dir_path( __FILE__ ) . 'theme-customizer.php';


add_action('mm_header_above', 'mm_header_above_html');
function mm_header_above_html(){
  $content = '';
  if(is_user_logged_in()){
    $content .= '<div class="admin-bar-spacer"></div>';
  }
  $content .= '
  <div class="mm-header-above" style="background-color: '.get_theme_mod('theme_accent_color').'"><ul>
    <li><a href="tel:+18773579020"><i class="fa fa-phone"></i></a></li>
    <li><a href="/my-account/"><i class="fa fa-user"></i></a></li>
    <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
  </ul></div>';
  echo $content;
}

add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );
}

add_filter('twentyseventeen_starter_content', 'boatworks_starter_widgets');

function boatworks_starter_widgets($starter_content){
  $starter_content['widgets'] = array();
  return $starter_content;
}

add_filter( 'body_class', 'boatworks_body_classes', 12, 2 );
function boatworks_body_classes($class){
  if(is_plugin_active('woocommerce/woocommerce.php') && is_product()){
    $class = str_replace("has-sidebar","",$class);
  }
  return $class;
}





 ?>
