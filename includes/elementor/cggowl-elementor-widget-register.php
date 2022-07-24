<?php
if (!defined('ABSPATH'))
  {
    exit;
  }
  final class CGGOWL_Elementor_Cggowl_Extension {

  	/**
  	 * Plugin Version
  	 *
  	 * @since 1.0.0
  	 *
  	 * @var string The plugin version.
  	 */
  	const CGGOWL_VERSION = '7.6.0';

  	/**
  	 * Minimum Elementor Version
  	 *
  	 * @since 1.0.0
  	 *
  	 * @var string Minimum Elementor version required to run the plugin.
  	 */
  	const CGGOWL_MINIMUM_ELEMENTOR_VERSION = '3.6.0';

  	/**
  	 * Minimum PHP Version
  	 *
  	 * @since 1.0.0
  	 *
  	 * @var string Minimum PHP version required to run the plugin.
  	 */
  	const CGGOWL_MINIMUM_PHP_VERSION = '7.0';

  	/**
  	 * Instance
  	 *
  	 * @since 1.0.0
  	 *
  	 * @access private
  	 * @static
  	 *
  	 */
  	private static $cggowl_instance = null;

  	/**
  	 * Instance
  	 *
  	 * Ensures only one instance of the class is loaded or can be loaded.
  	 *
  	 * @since 1.0.0
  	 *
  	 * @access public
  	 * @static
  	 *
  	 */
  	public static function cggowl_instance() {

  		if ( is_null( self::$cggowl_instance ) ) {
  			self::$cggowl_instance = new self();
  		}
  		return self::$cggowl_instance;

  	}

  	/**
  	 * Constructor
  	 *
  	 * @since 1.0.0
  	 *
  	 * @access public
  	 */
  	public function __construct() {

  		add_action( 'init', [ $this, 'cggowl_i18n' ] );
  		add_action( 'plugins_loaded', [ $this, 'cggowl_init' ] );

  	}

  	/**
  	 * Load Textdomain
  	 *
  	 * Load plugin localization files.
  	 *
  	 * Fired by `init` action hook.
  	 *
  	 * @since 1.0.0
  	 *
  	 * @access public
  	 */
  	public function cggowl_i18n() {

  		load_plugin_textdomain( 'cggowl' );

  	}

  	/**
  	 * Initialize the plugin
  	 *
  	 * Load the plugin only after Elementor (and other plugins) are loaded.
  	 * Checks for basic plugin requirements, if one check fail don't continue,
  	 * if all check have passed load the files required to run the plugin.
  	 *
  	 * Fired by `plugins_loaded` action hook.
  	 *
  	 * @since 1.0.0
  	 *
  	 * @access public
  	 */
  	public function cggowl_init() {

  		// Check if Elementor installed and activated
  		if ( ! did_action( 'elementor/loaded' ) ) {
  			add_action( 'admin_notices', [ $this, 'cggowl_admin_notice_missing_main_plugin' ] );
  			return;
  		}

  		// Check for required Elementor version
  		if ( ! version_compare( ELEMENTOR_VERSION, self::CGGOWL_MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
  			add_action( 'admin_notices', [ $this, 'cggowl_admin_notice_minimum_elementor_version' ] );
  			return;
  		}

  		// Check for required PHP version
  		if ( version_compare( PHP_VERSION, self::CGGOWL_MINIMUM_PHP_VERSION, '<' ) ) {
  			add_action( 'admin_notices', [ $this, 'cggowl_admin_notice_minimum_php_version' ] );
  			return;
  		}

  		// Add Plugin actions
  		add_action( 'elementor/widgets/widgets_registered', [ $this, 'cggowl_init_widgets' ] );
  		add_action( 'elementor/controls/controls_registered', [ $this, 'cggowl_init_controls' ] );

      //register the css and the javascript
      add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'cggowl_register_css' ] , 10 );
      add_action( 'elementor/frontend/after_register_scripts', [ $this, 'cggowl_register_js' ] , 10);


  	}

    public function cggowl_register_css(){
        wp_enqueue_style( 'cggowlcorecss', plugins_url( 'css/cggowl_core.min.css', __FILE__ ) );
    }

    public function cggowl_register_js(){
       wp_enqueue_script( 'cggowlcorejsjquery', plugin_dir_url( __FILE__ ) . 'js/cggowlcorejsjquery.js', array('jquery'),'1.0.0', true );
    }

  	/**
  	 * Admin notice
  	 *
  	 * Warning when the site doesn't have Elementor installed or activated.
  	 *
  	 * @since 1.0.0
  	 *
  	 * @access public
  	 */
  	public function cggowl_admin_notice_missing_main_plugin() {

  		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

  		$cggowl_message = sprintf(
  			/* translators: 1: Plugin name 2: Elementor */
  			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'cggowl' ),
  			'<strong>' . esc_html__( 'Slidify for Elementor', 'cggowl' ) . '</strong>',
  			'<strong>' . esc_html__( 'Elementor', 'cggowl' ) . '</strong>'
  		);

  		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $cggowl_message );

  	}

  	/**
  	 * Admin notice
  	 *
  	 * Warning when the site doesn't have a minimum required Elementor version.
  	 *
  	 * @since 1.0.0
  	 *
  	 * @access public
  	 */
  	public function cggowl_admin_notice_minimum_elementor_version() {

  		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

  		$cggowl_message = sprintf(
  			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
  			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'cggowl' ),
  			'<strong>' . esc_html__( 'Slidify for Elementor', 'cggowl' ) . '</strong>',
  			'<strong>' . esc_html__( 'Elementor', 'cggowl' ) . '</strong>',
  			 self::CGGOWL_MINIMUM_ELEMENTOR_VERSION
  		);

  		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $cggowl_message );

  	}

  	/**
  	 * Admin notice
  	 *
  	 * Warning when the site doesn't have a minimum required PHP version.
  	 *
  	 * @since 1.0.0
  	 *
  	 * @access public
  	 */
  	public function cggowl_admin_notice_minimum_php_version() {

  		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

  		$cggowl_message = sprintf(
  			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
  			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'cggowl' ),
  			'<strong>' . esc_html__( 'Slidify for Elementor', 'pggo' ) . '</strong>',
  			'<strong>' . esc_html__( 'PHP', 'cggowl' ) . '</strong>',
  			 self::CGGOWL_MINIMUM_PHP_VERSION
  		);

  		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $cggowl_message );

  	}

  	/**
  	 * Init Widgets
  	 *
  	 * Include widgets files and register them
  	 *
  	 * @since 1.0.0
  	 *
  	 * @access public
  	 */
  	public function cggowl_init_widgets() {

      require_once( __DIR__ . '/class-cggowl-image-render.php');
  		// Include Widget files

      require_once( __DIR__ . '/postcarousel/cggowl_post_carousel_widget2.php' );

      \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Elementor_Cggowl_Post_Carousel2() );

  	}

  	/**
  	 * Init Controls
  	 *
  	 * Include controls files and register them
  	 *
  	 * @since 1.0.0
  	 *
  	 * @access public
  	 */
  	public function cggowl_init_controls() {
        // NOt required
  	}

  }

  CGGOWL_Elementor_Cggowl_Extension::cggowl_instance();


function cggowl_add_elementor_widget_categories($cggowl_elements_manager)
{

    $cggowl_elements_manager->add_category(
        'cggowl-category',
        [
            'title' => esc_html__('Slidify for Elementor', 'cggowl'),
            'icon'  => 'fa fa-braille',
        ]
    );

}
add_action('elementor/elements/categories_registered', 'cggowl_add_elementor_widget_categories');


