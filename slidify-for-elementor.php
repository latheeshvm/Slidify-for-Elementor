<?php

/**
 *
 * @link              https://github.com/LatCodes/Slidify-for-Elementor
 * @since             8.0.0
 * @package           Cggowl
 *
 * @wordpress-plugin
 * Plugin Name:       Slidify For Elementor
 * Plugin URI:        https://github.com/LatCodes/Slidify-for-Elementor
 * Description:       Create custom carousel layout for posts, pages & custom post types. Unlimited design possiblites, With Custom Field Support.
 * Version:           8.0.0
 * Author:            V M Latheesh
 * Author URI:        https://twitter.com/latgamedev
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cggowl
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
defined( 'ABSPATH' ) || exit;
define( 'CGGOWL_VERSION', '8.0.0' );
define( 'CGGOWL_PLUGIN_FILE', __FILE__ );

function cggowl_activate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cggowl-activator.php';
	Cggowl_Activator::cggowl_activate();
}

function cggowl_deactivate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cggowl-deactivator.php';
	Cggowl_Deactivator::cggowl_deactivate();
}

register_activation_hook( __FILE__, 'cggowl_activate' );
register_deactivation_hook( __FILE__, 'cggowl_deactivate' );

// Core plugin functionality
require plugin_dir_path( __FILE__ ) . 'includes/elementor/cggowl-elementor-widget-register.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-cggowl-upgrade.php';


function cggowl_transient_del_save_post_callback($post_id){
    global $post;
		require_once(ABSPATH . 'wp-admin/includes/screen.php');
		$screen = get_current_screen();
		if( !is_object($post) ){
			     return;
		}
    if ($post->post_type == 'acf-field-group'){
				delete_transient( 'cggowl_acf_list_transient' );
        return;
    }
}
add_action('save_post','cggowl_transient_del_save_post_callback');
add_action('after_delete_post','cggowl_transient_del_save_post_callback');



