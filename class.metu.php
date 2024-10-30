<?php
class Metu {
	private static $initiated = false;
	
	public static function init() {
		if ( ! self::$initiated ) {
			self::init_hooks();
		}
	}

	private static function init_hooks() {
		self::$initiated = true;
		add_action( 'wp_footer', array( 'Metu', 'load_resources' ) );
	}

	public static function load_resources () {
		if( ! empty( $metu_mbid = get_option( 'metu_mbid' ) ) && ( get_option( 'metu_status' ) ) ) {
			wp_register_script( 'metu.js', 'https://menu.metu.vn/static/js/sdk.js?container=body', array(), METU_VERSION );
			wp_add_inline_script( 'metu.js', 'window.MBID="' . $metu_mbid . '";', 'before' );
			wp_enqueue_script( 'metu.js' );
		}
	}

	public static function view( $name, array $args = array() ) {
		$args = apply_filters( 'metu_args', $args, $name );
		foreach ( $args AS $key => $val ) {
			$$key = $val;
		}
		load_plugin_textdomain( 'metu' );
		$file = METU_PLUGIN_DIR . 'views/'. $name . '.php';
		include( $file );
	}
}