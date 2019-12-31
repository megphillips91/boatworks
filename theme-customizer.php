<?php


function msp_media_customize_register ($wp_customize){
  msp_remove_controls($wp_customize);
  msp_add_controls($wp_customize);
}
add_action( 'customize_register', 'msp_media_customize_register' );



/**
 * Add controls from parent theme customizer
 * @param  Object $wp_customize
 *
 */
function msp_add_controls($wp_customize){

  $wp_customize->add_setting(
    'theme_accent_color',
    array(
      'default'           => 'BF1D2D',
    )
  );

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'theme_accent_color',
      array(
        'section'  => 'colors',
        'priority' => 6,
        'label'=>'Accent Color'
      )
    )
  );

}




/**
 * Remove controls from parent theme customizer
 * @param  Object $wp_customize
 *
 */
function msp_remove_controls($wp_customize){
  //$wp_customize->remove_control('header_textcolor');
}

 ?>
