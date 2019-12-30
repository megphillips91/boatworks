jQuery(document).ready(function ($) {

// Author: Meg Phillips;
/* Scope: Javascript that affects theme */

var mastheadHeight = ($('.msp-site-branding').height()) + ($('.mm-header-above').height());
$('.site-content').css('padding-top', mastheadHeight);

var theme_accent_color = $('.mm-header-above').css('background-color');
/*
$('h3').css('color', theme_accent_color);

$('body p a').css('color', theme_accent_color);

$('body p a').mouseover(function() {
  $(this).css('color', '#000')
});
*/
}); //end jquery wrapper
