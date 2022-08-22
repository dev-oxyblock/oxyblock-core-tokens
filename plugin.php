<?php
/*
Plugin Name:	Oxyblock Core - Tokens
Plugin URI:		https://core.oxyblock.xyz
Description:	Modern CSS Framework based on Oxyblock UI
Version:		0.2.0
Author:			Oxyblock
Author URI:		https://oxyblock.com/
License:		GPL-3.0+
License URI:	http://www.gnu.org/licenses/gpl-3.0.txt

This plugin is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
any later version.

This plugin is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with This plugin. If not, see {URI to Plugin License}.
*/

if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'wp_enqueue_scripts', 'oxyblockCoreTokens_enqueue_files' );
function oxyblockCoreTokens_enqueue_files() {
	if ( ! class_exists( 'CT_Component' ) ) { // if Oxygen is not active
		wp_enqueue_style( 'ob-core-tokens', plugin_dir_url( __FILE__ ) . 'assets/css/ob-core-tokens.css' );
	}
}

// 1000000 priority so it is executed after all Oxygen's styles
add_action( 'wp_head', 'oxyblockCoreTokens_enqueue_css_after_oxygens', 0 );
function oxyblockCoreTokens_enqueue_css_after_oxygens() {
	// if Oxygen is not active, abort.
	if ( ! class_exists( 'CT_Component' ) ) {
		return;
	}

	$styles = new WP_Styles;
	$styles->add( 'ob-core-tokens', plugin_dir_url( __FILE__ ) . 'assets/css/ob-core-tokens.css' );
	$styles->enqueue( array ( 'ob-core-tokens' ) );
	$styles->do_items();
}