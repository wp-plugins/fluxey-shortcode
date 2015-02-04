<?php
/*
Plugin Name: Fluxey Wordpress Shortcode Plugin
Description: Enables embedding of Fluxey Surveys using shortcodes. Usage: <code>[fluxey id="A1B2C3D4"]</code>. You can also find this code on the fluxey Share page.
Version: 1.0
Author: Matthew Kidd / Fluxey
Author URI: https://fluxey.com
License: GPL2
*/

function createFluxeyShortcode($atts) {
    $fluxeyVars = shortcode_atts( array(
        'height' => '600',
        'id' => '',
		'width' => '800',

    ), $atts );

	if (!$fluxeyVars['id']) {

		$error = "
		<div style='border: 5px solid red; border-radius: 10px; padding: 15px; margin: 30px 15px'>
			<h3>Oops!</h3>
			<p>There is something wrong with your Fluxey shortcode. Head over to fluxey and copy-paste a new one from the <a href='https://fluxey.com/app' target='_blank'>Share page</a>.</p><p>You can also <a href='https://fluxey.com/wordpress' target='_blank'>Learn More Here</a>.</p>
		</div>";

		return $error;

	} else {

		return "<iframe src='http://fluxey.com/r/" . $fluxeyVars['id'] . "' allowTransparency='true' seamless height='" . $fluxeyVars['height'] . "px' width='" . $fluxeyVars['width'] . "px' ></iframe>";

	}
}

add_shortcode('fluxey', 'createFluxeyShortcode');