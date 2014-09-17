<?php
/*
  Plugin Name: Intranet Only
  Description: Enables shortcode for displaying content based on whether a viewer is behind your firewall.
  Author: David Colarusso
  Author URI: http://www.davidcolarusso.com
 
  Shows content only if the viewer 
  shares a network with your server. 
  Content is wrapped in a green SPAN 
  so users know shortcode is in use.
  
  Shortcode Example:
  
  [intra]content[/intra]
  
*/
function intranet_only($atts, $content = null) {
	$ip = $_SERVER['REMOTE_ADDR'];
	if ( ! filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE) )
	{
		// viewer is on same network as server
		return '<span style="background:#ddffdd">'.$content.'</span>';
	}
}

add_shortcode('intra', 'intranet_only');
?>
