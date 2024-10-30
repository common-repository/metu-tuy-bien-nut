<?php
/**
* @package METU
*/
/*
Plugin Name: METU
Plugin URI: https://metu.vn/
Description: METU công cụ cho phép bạn tạo ra menu thứ 2 xuất hiện bên dưới màn hình hiển thị của các thiết bị khi truy cập vào website.
Version: 2.0.2
Author: Momtech
Author URI: https://momtech.vn/
License: GNU General Public License v3 or later
License: GNU General Public License v3 or later
Text Domain: metu
*/
define( 'METU_VERSION', '2.0.2' );
define( 'METU_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( METU_PLUGIN_DIR . 'class.metu.php' );
add_action( 'init', array( 'Metu', 'init' ) );

if ( is_admin() ) {
	require_once( METU_PLUGIN_DIR . 'class.metu-admin.php' );
	add_action( 'init', array( 'Metu_Admin', 'init' ) );
}
