<?php
/**
 * Plugin Name: simple Shortcode
 * Author: Rupom
 * Description: shortcode practise
 * Version: 1.0
 */

function sht_google_button(){
    $google = "https://www.google.com/";
    $data = sprintf('<a href="%s" target="_blank">%s</a>',$google,"Google");
    return $data; 
}
add_shortcode("google","sht_google_button");

function sht_google_button_two($attributes){
    $default = array(
        'url' => 'https://www.google.com/',
        'title' => 'Google2',
    );
    $google_attribute = shortcode_atts($default,$attributes); 
    $data = sprintf('<a href="%s" target="_blank">%s</a>',$google_attribute['url'],$google_attribute['title']);
    return $data; 
}
add_shortcode("google2","sht_google_button_two");

function google_map_callback($location){
    $default_location = array(
        'place' => 'Rangpur',
        'zoom' => '11'
    );
    $map_location = shortcode_atts($default_location, $location);
    $map = <<<EOD
    <div>
        <iframe width="500" height="500"
            src="https://maps.google.com/maps?q={$map_location['place']}&t=&z={$map_location['zoom']}&ie=UTF8&iwloc=&output=embed"
            frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
        </iframe>
    </div>;
    EOD;
    return $map;
}
add_shortcode("map","google_map_callback");

?>