<?php

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
   wp_enqueue_style( 'msp-media-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'parent-style' ),
        wp_get_theme()->get('Version')
    );
    wp_enqueue_style( 'site-style', get_stylesheet_directory_uri().'/site-style.css' );
    wp_enqueue_style( 'cb-style', get_stylesheet_directory_uri().'/cb-style.css' );
    wp_enqueue_style( 'bw-product-styles', get_stylesheet_directory_uri().'/product.css' );
    wp_enqueue_style( 'woocommerce-css', get_stylesheet_directory_uri().'/woocommerce.css' );
    wp_enqueue_style('open-sans-google-font', 'https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css');
    wp_enqueue_script( 'msp-media-theme-js', get_theme_file_uri().'/theme.js', array( 'jquery' ),'',true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

//include the child theme modifications to the customizer
require_once plugin_dir_path( __FILE__ ) . 'theme-customizer.php';
require_once plugin_dir_path( __FILE__ ) . 'site-functions.php';

//make header above
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

//add theme-accent-color styles to the header
add_action('wp_head', 'theme_accent_color_styles');
function theme_accent_color_styles(){
  $content = '<style type="text/css" >';
  $content .= '
    h3, body p a {
      color: '.get_theme_mod('theme_accent_color').';
    }

  ';
  $content .= '</style>';
  echo $content;
}


add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );
}


 ?>
