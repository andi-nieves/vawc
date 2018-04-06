<?php
/*
Plugin Name: AndiSystems
Description: Customized admin functions for the client
Author: Andy Nieves
Author Email: andinieves151720@gmail.com
*/
if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );

}

// Hook for adding admin menus
add_action('admin_menu', 'mt_add_pages');

// action function for above hook
function mt_add_pages() {
    // Add a new submenu under Settings:
    //add_options_page(__('Test Settings','menu-test'), __('Test Settings','menu-test'), 'manage_options', 'testsettings', 'mt_settings_page');

    // Add a new submenu under Tools:
    //add_management_page( __('Test Tools','menu-test'), __('Test Tools','menu-test'), 'manage_options', 'testtools', 'mt_tools_page');

    // Add a new top-level menu (ill-advised):
    add_menu_page(__('VAWC','menu-vawc'), __('VAWC','menu-vawc'), 'manage_options', 'vawc', 'mt_vawc' );

    // Add a submenu to the custom top-level menu:
    add_submenu_page('vawc', __('Add New','menu-test'), __('Add New','menu-test'), 'manage_options', 'vawc-add-new', 'mt_vawc_new');

    // Add a second submenu to the custom top-level menu:
    // add_submenu_page('vawc', __('Test Sublevel 2','menu-test'), __('Test Sublevel 2','menu-test'), 'manage_options', 'sub-page2', 'mt_sublevel_page2');
}

// mt_settings_page() displays the page content for the Test Settings submenu
// function mt_settings_page() {
//     echo "<h2>" . __( 'VAWC', 'menu-test' ) . "</h2>";
// }
//
// // mt_tools_page() displays the page content for the Test Tools submenu
// function mt_tools_page() {
//     echo "<h2>" . __( 'Test Tools', 'menu-test' ) . "</h2>";
// }

// mt_toplevel_page() displays the page content for the custom Test Toplevel menu
function mt_vawc() {
    echo "<h2>" . __( 'VAWC', 'menu-test' ) . "</h2>";
		echo '<input name="first_name" type="text" id="first_name" value="" />';
}

// mt_sublevel_page() displays the page content for the first submenu
// of the custom Test Toplevel menu
function mt_vawc_new() {
    echo "<h2>" . __( 'Test Sublevel x', 'menu-test' ) . "</h2>";
    if ( class_exists( 'WP_List_Table' ) ) {
      echo "EXISTS";
    }
}

// mt_sublevel_page2() displays the page content for the second submenu
// of the custom Test Toplevel menu
// function mt_sublevel_page2() {
//     echo "<h2>" . __( 'Test Sublevel2', 'menu-test' ) . "</h2>";
// }

?>
