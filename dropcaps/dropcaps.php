<?php
/*
Plugin Name: Dropcaps
Plugin URI: http://ulyssesonline.com
Description: Makes the first letter of a post a dropcap.
Version: 0.1
Author: Ulysses Ronquillo
Author URI: http://ulyssesonline.com
*/

function dropcap_header() {
    echo('<link rel="stylesheet" type="text/css" media="screen" href="' . get_bloginfo('wpurl') . '/wp-content/plugins/dropcaps/dropcaps.css" />');
}

add_action('wp_head', 'dropcap_header');

function dropcaps($content='') {
    $pos = stripos($content, '<p>');
    if (($pos !== 0) || ($pos === false)) {
        return '<p class="dropcaps">' . $content . '</p>';
    } else {
        return '<p class="dropcaps"' . stristr($content, '>');
    }
}

add_filter('the_content', 'dropcaps', 7);

?>
