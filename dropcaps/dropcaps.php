<?php

/*

Plugin Name: Dropcaps
Plugin URI: http://uly.me
Description: Makes the first letter of a post a dropcap.
Version: 0.2
Author: Ulysses Ronquillo
Author URI: http://uly.me

*/


// add stylesheet to wp_head

function urr_dropcaps_css_header() {
	wp_enqueue_style( 'prefix-style', plugins_url('dropcaps.css', __FILE__) );
}
add_action( 'wp_enqueue_scripts', 'urr_dropcaps_css_header' );


// modify content. find first word. css does first-letter does all the trick.

function urr_dropcaps($content='') {
	$pos = stripos($content, '<p>');
	if (($pos !== 0) || ($pos === false)) {
		return '<p class="dropcaps">' . $content . '</p>';
	} else {
		return '<p class="dropcaps"' . stristr($content, '>');
	}
}
add_filter('the_content', 'urr_dropcaps', 7);


/* end of file */