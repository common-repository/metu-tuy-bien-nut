<?php
class Metu_Admin {
	private static $initiated = false;
	private static $notices   = array();
	private static $api_url = 'https://api.metu.vn';
	
	public static function init() {
		if ( ! self::$initiated ) {
			self::init_hooks();
		}
		if ( isset( $_POST['action'] ) && $_POST['action'] == 'login-account' ) {
			self::save_account( sanitize_text_field( $_POST['login_username'] ), sanitize_text_field( $_POST['login_password'] ) );
		}
		if ( isset( $_POST['action'] ) && $_POST['action'] == 'register-account' ) {
			$metu_account = self::register_account( sanitize_text_field( $_POST['name'] ), sanitize_text_field( $_POST['email'] ), sanitize_text_field( $_POST['tel'] ), sanitize_text_field( $_POST['password'] ) );
			if ( ( $statusCode = $metu_account->statusCode ) == 200 ) {
				self::save_account( sanitize_text_field( $_POST['email'] ), sanitize_text_field( $_POST['password'] ) );
				self::$notices['status'] = 'register-true';
			} elseif ( $statusCode == 404) {
				self::$notices['status'] = 'email-false';
			} else {
				self::$notices['status'] = 'register-false';
			}
		}
	}

	public static function init_hooks() {
		self::$initiated = true;
		add_action( 'admin_init', array( 'Metu_Admin', 'admin_init' ) );
		add_action( 'admin_menu', array( 'Metu_Admin', 'admin_menu' ), 5 );
		add_action( 'admin_enqueue_scripts', array( 'Metu_Admin', 'load_resources' ) );
		add_action( 'wp_ajax_nopriv_switch_status', array( 'Metu_Admin', 'switch_status' ) );
		add_action( 'wp_ajax_switch_status', array( 'Metu_Admin', 'switch_status' ) );
	}

	public static function switch_status() {
		if ( self::get_status() ) {
			self::save_status( false );
		} else {
			self::save_status( true );
		}
		$get_status = self::get_status();
		wp_die( $get_status );
	}

	public static function load_resources() {
		wp_register_style( 'metu-admin.css', plugin_dir_url( __FILE__ ) . '_inc/metu-admin.css', array(), METU_VERSION );
		wp_enqueue_style( 'metu-admin.css');
		wp_register_script( 'jquery.validate.min.js', plugin_dir_url( __FILE__ ) . '_inc/jquery.validate.min.js', array('jquery'), METU_VERSION );
		wp_enqueue_script( 'jquery.validate.min.js' );
		wp_register_script( 'metu-admin.js', plugin_dir_url( __FILE__ ) . '_inc/metu-admin.js', array('jquery'), METU_VERSION );
		wp_enqueue_script( 'metu-admin.js' );
	}

	public static function admin_init() {
		load_plugin_textdomain( 'metu' );
	}

	public static function admin_menu() {
		self::load_menu();
	}

	public static function load_menu() {
		$hook = add_options_page( __('Metu', 'metu'), __('Metu', 'metu'), 'manage_options', 'metu-config', array( 'Metu_Admin', 'display_page' ) );
	}

	public static function save_account( $username, $password ) {
		$metu_account = self::check_account( $username, $password );
		if ( $metu_account->statusCode == 200 ) {
			self::$notices['status'] = 'login-true';
			self::save_username( $metu_account->data->username );
			self::save_mbid( $metu_account->data->business_id );
			self::save_status( true );
		} else {
			self::$notices['status'] = 'login-false';
		}
	}

	public static function save_username( $username ) {
		update_option( 'metu_username', $username );
	}

	public static function save_status( $status ) {
		update_option( 'metu_status', $status );
	}

	public static function get_status() {
		return apply_filters( 'metu_get_status', get_option('metu_status') );
	}

	public static function save_mbid( $mbid ) {
		update_option( 'metu_mbid', $mbid );
	}

	public static function get_mbid() {
		return apply_filters( 'metu_get_mbid', get_option('metu_mbid') );
	}

	public static function get_username() {
		return apply_filters( 'metu_get_username', get_option('metu_username') );
	}

	public static function delete_account() {
		delete_option( 'metu_username' );
		delete_option( 'metu_mbid' );
	}

	public static function display_page() {
		if ( ( isset( $_POST['action'] ) && $_POST['action'] == 'change-account' ) || isset( self::$notices['status'] ) && ( self::$notices['status'] == 'register-false' || self::$notices['status'] == 'login-false' || self::$notices['status'] == 'email-false' ) ) {
			self::display_start_page();
			return;
		}
		self::display_configuration_page();
	}

	public static function display_start_page() {
		$notices = array();
		if( ! empty(self::$notices) ) {
			$notices[] = self::$notices;    
		}
		Metu::view( 'start', compact( 'notices' ) );
	}

	public static function display_configuration_page() {
		if ( empty( $mbid = Metu_Admin::get_mbid() ) ) {
			self::display_start_page();
			return;
		}
		$notices = array();
		if( ! empty(self::$notices) ) {
			$notices[] = self::$notices;    
		}
		Metu::view( 'config', compact( 'notices' ) );
	}

	public static function check_account( $username, $password ) {
		$response = wp_remote_post( self::$api_url . "/login", array(
			'method' => 'POST',
			'timeout' => 45,
			'redirection' => 5,
			'httpversion' => '1.0',
			'blocking' => true,
			'body' => array( 'username' => $username, 'password' => $password ),
		));
		
		if ( is_wp_error( $response ) ) {
			$error_message = $response->get_error_message();
			echo "Something went wrong: $error_message";
		} else {
			$check_account = json_decode($response['body']);
			return $check_account;
		}
	}

	public static function register_account( $name, $email, $tel, $password ) {
		$response = wp_remote_post( self::$api_url . "/register", array(
			'method' => 'POST',
			'timeout' => 45,
			'redirection' => 5,
			'httpversion' => '1.0',
			'blocking' => true,
			'body' => array(
				'username' => $email,
				'password' => $password,
				'repassword' => $password,
				'name' => $name,
				'email' => $email,
				'phone' => $tel,
				'business_name' => $name,
				'source' => 'wp-plugin'
			),
		));

		if ( is_wp_error( $response ) ) {
			$error_message = $response->get_error_message();
			echo "Something went wrong: $error_message";
		} else {
			$register_account = json_decode($response['body']);
			return $register_account;
		}
	}

	public static function get_page_url( $page = 'config' ) {
		$args = array( 'page' => 'metu-config' );
		$url = add_query_arg( $args, admin_url( 'options-general.php' ) );
		return $url;
	}
}