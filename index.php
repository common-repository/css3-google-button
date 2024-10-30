<?php
/*
Plugin Name: CSS3 Google Button
Plugin URI: http://liljosh.com/css3-google-buttons/
Description: Adds a CSS3 Google Button inside your post. You can choose from orange, blue, or gray and even add a search icon. Just add [GOOGLEBUTTON target="http://liljosh.com" color="orange"]Button Caption[/GOOGLEBUTTON] inside your post. If you would like to use the search icon just use "search icon" as the button caption.
Version: 1.1
Author: Lil Josh
Author URI: http://liljosh.com/
Min WP Version: 2.5.0
Max WP Version: 3.3.1
*/

add_action('wp_head', 'addHeaderCode');
add_shortcode('GOOGLEBUTTON', 'googlebutton_func');

function googlebutton_func($Attributes, $Content = null)
{
	extract(shortcode_atts( array(
      'target' => 'http://liljosh.com',
      'color' => 'gray'
	), $Attributes));
	
	$color 		= strtolower(str_replace("#","",$color));
	$target		= $target;
	if(!($color == "orange" || $color == "gray" || $color == "blue")){
	  $color = "gray";
	}
	if(strtolower($Content) == "search icon"){
		$Content = '<img src="' . get_bloginfo('wpurl') . '/wp-content/plugins/css3-google-button/search.png" alt="Search" />';
	}
	$ReturnValue = '<a href="'.$target.'" class="'.$color.'">'.do_shortcode($Content).'</a>';
	
	return $ReturnValue;
}

function css3_google_button($Caption = null, $TargetURL = null, $BackgroundColor = null)
{
	if(is_null($TargetURL))	{
		$TargetURL = "http://liljosh.com";
	}
	
	if(is_null($Caption))	{
		$Caption = "CSS3 Google Button";
	}
	
	if(is_null($BackgroundColor)) {
		$BackgroundColor = "gray";
	}else {
		$BackgroundColor = strtolower(str_replace("#", "", $BackgroundColor));
	}
	
	if(strtolower($Caption) == "search icon"){
		$Caption = '<img src="' . get_bloginfo('wpurl') . '/wp-content/plugins/css3-google-button/search.png" alt="Search" />';
	}
	echo '<a class="'.$BackgroundColor.'" href="'.$TargetURL.'">'.do_shortcode($Caption).'</a>';
}

function addHeaderCode() 
{
	echo '<link type="text/css" rel="stylesheet" href="' . get_bloginfo('wpurl') . '/wp-content/plugins/css3-google-button/google_button.css" />' . "\n";
}
?>