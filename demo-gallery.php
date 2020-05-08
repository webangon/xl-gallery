<?php
/**
 * Plugin Name: Demo Gallery
 * Plugin URI:  https://codecanyon.net/user/xldevelopment
 * Description: Demo gallery using theme option panel
 * Version:     1.0.0
 * Author:      Ashraf
 * Author URI:  http://webangon.com/
 * Text Domain: demo-gallery
 * License:     GPL-3.0+
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die();
}

if ( ! class_exists( 'Demo_Gallery' ) ) {

	class Demo_Gallery {

		private static $instance = null;

		private $plugin_url = null;

		private $plugin_path = null;

		public function __construct() {
			add_action( 'init', array( $this, 'lang' ), 10 );
			add_action( 'admin_print_scripts', array( $this, 'admin_scripts' ), 10 );
			add_action( 'wp_enqueue_scripts', array( $this, 'frontend_scripts' ), 10 );
		}

		public function lang() {
			load_plugin_textdomain( 'demo-gallery', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
		}

		public static function get_instance() {
			// If the single instance hasn't been set, set it now.
			if ( null == self::$instance ) {
				self::$instance = new self;
				self::$instance->constant();
				self::$instance->includes();
			}
			return self::$instance;
		}

        private function constant() {

            // Plugin Folder Path
            if (!defined('DEMO_GALLERY_DIR')) {
                define('DEMO_GALLERY_DIR', plugin_dir_path(__FILE__));
            }

            // Plugin Folder URL
            if (!defined('DEMO_GALLERY_URL')) {
                define('DEMO_GALLERY_URL', plugin_dir_url(__FILE__));
            }

        }		

        public function includes(){
        	require_once DEMO_GALLERY_DIR . 'admin/options.php';
        	require_once DEMO_GALLERY_DIR . 'frontend/shortcode.php';
        }

		public function admin_scripts() {
			if (isset($_GET['page']) && $_GET['page'] == 'theme-panel'){
				 wp_enqueue_media();
				 wp_enqueue_script('my-upload', DEMO_GALLERY_URL.'admin/js/admin.js');
			 }
		}

		public function frontend_scripts() {

			wp_enqueue_script('slick-slider', DEMO_GALLERY_URL.'frontend/js/slick.js', array('jquery'), '', true);
			wp_enqueue_style('slick-slider', DEMO_GALLERY_URL.'frontend/css/slick.css');
			wp_enqueue_script('custom-gallery', DEMO_GALLERY_URL.'frontend/js/custom.js');

		}

	} 
}

if ( ! function_exists( 'Demo_Gallery' ) ) {

	/**
	 * Returns instance of the plugin class.
	 *
	 * @since  1.0.0
	 * @return Demo_Gallery
	 */
	function Demo_Gallery() {
		return Demo_Gallery::get_instance();
	}
}

Demo_Gallery();

