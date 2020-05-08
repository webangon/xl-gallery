<?php
/**
 * register and display shortcode
 */

add_action( 'init', 'register_shortcodes');

function register_shortcodes(){
   add_shortcode('demo-gallery', 'demo_gallery_init');
}

function demo_gallery_init() {

   $setting = get_option('dg_images');
   $img_array = explode(',', $setting);

   foreach ($img_array as $item){
   	 $img .= '<img src='.$item.'>';
   }

   $out = '<div style="display:none;" class="demo-gallery">'.$img.'</div>';
   return $out;
}

