<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class Lexicata_Form {

	/**
	 * The single instance of Lexicata_Form.
	 * @var 	object
	 * @access  private
	 * @since 	1.0.0
	 */
	private static $_instance = null;

	/**
	 * Settings class object
	 * @var     object
	 * @access  public
	 * @since   1.0.0
	 */
	public $settings = null;

	/**
	 * The version number.
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $_version;

	/**
	 * The token.
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $_token;

	/**
	 * The main plugin file.
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $file;

	/**
	 * The main plugin directory.
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $dir;

	/**
	 * The plugin assets directory.
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $assets_dir;

	/**
	 * The plugin assets URL.
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $assets_url;

	/**
	 * Suffix for Javascripts.
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $script_suffix;

	/**
	 * Constructor function.
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function __construct ( $file = '', $version = '1.0.0' ) {
		$this->_version = $version;
		$this->_token = 'lexicata_form';

		// Load plugin environment variables
		$this->file = $file;
		$this->dir = dirname( $this->file );
		$this->assets_dir = trailingslashit( $this->dir ) . 'assets';
		$this->assets_url = esc_url( trailingslashit( plugins_url( '/assets/', $this->file ) ) );

		$this->script_suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		register_activation_hook( $this->file, array( $this, 'install' ) );

        // Register shortcodes
        add_shortcode('lexicata-contact-form', array($this, 'setup_contact_form'));

		// Load frontend JS & CSS
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ), 10 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 10 );

		// Load admin JS & CSS
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ), 10, 1 );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_styles' ), 10, 1 );

		// Load API for generic admin functions
		if ( is_admin() ) {
			$this->admin = new Lexicata_Form_Admin_API();
		}

		// Handle localisation
		$this->load_plugin_textdomain();
		add_action( 'init', array( $this, 'load_localisation' ), 0 );
	} // End __construct ()

	/**
	 * Wrapper function to register a new post type
	 * @param  string $post_type   Post type name
	 * @param  string $plural      Post type item plural name
	 * @param  string $single      Post type item single name
	 * @param  string $description Description of post type
	 * @return object              Post type class object
	 */
	public function register_post_type ( $post_type = '', $plural = '', $single = '', $description = '', $options = array() ) {

		if ( ! $post_type || ! $plural || ! $single ) return;

		$post_type = new Lexicata_Form_Post_Type( $post_type, $plural, $single, $description, $options );

		return $post_type;
	}

	/**
	 * Wrapper function to register a new taxonomy
	 * @param  string $taxonomy   Taxonomy name
	 * @param  string $plural     Taxonomy single name
	 * @param  string $single     Taxonomy plural name
	 * @param  array  $post_types Post types to which this taxonomy applies
	 * @return object             Taxonomy class object
	 */
	public function register_taxonomy ( $taxonomy = '', $plural = '', $single = '', $post_types = array(), $taxonomy_args = array() ) {

		if ( ! $taxonomy || ! $plural || ! $single ) return;

		$taxonomy = new Lexicata_Form_Taxonomy( $taxonomy, $plural, $single, $post_types, $taxonomy_args );

		return $taxonomy;
	}

	/**
	 * Load frontend CSS.
	 * @access  public
	 * @since   1.0.0
	 * @return void
	 */
	public function enqueue_styles () {
		wp_register_style( $this->_token . '-frontend', esc_url( $this->assets_url ) . 'css/frontend.css', array(), $this->_version );
		wp_enqueue_style( $this->_token . '-frontend' );
	} // End enqueue_styles ()

	/**
	 * Load frontend Javascript.
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function enqueue_scripts () {
		wp_register_script( $this->_token . '-frontend', esc_url( $this->assets_url ) . 'js/frontend' . $this->script_suffix . '.js', array( 'jquery' ), $this->_version );
		wp_enqueue_script( $this->_token . '-frontend' );
	} // End enqueue_scripts ()

	/**
	 * Load admin CSS.
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function admin_enqueue_styles ( $hook = '' ) {
		wp_register_style( $this->_token . '-admin', esc_url( $this->assets_url ) . 'css/admin.css', array(), $this->_version );
		wp_enqueue_style( $this->_token . '-admin' );
	} // End admin_enqueue_styles ()

	/**
	 * Load admin Javascript.
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function admin_enqueue_scripts ( $hook = '' ) {
		wp_register_script( $this->_token . '-admin', esc_url( $this->assets_url ) . 'js/admin' . $this->script_suffix . '.js', array( 'jquery' ), $this->_version );
		wp_enqueue_script( $this->_token . '-admin' );
	} // End admin_enqueue_scripts ()

	/**
	 * Load plugin localisation
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function load_localisation () {
		load_plugin_textdomain( 'lexicata-form', false, dirname( plugin_basename( $this->file ) ) . '/lang/' );
	} // End load_localisation ()

	/**
	 * Load plugin textdomain
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function load_plugin_textdomain () {
	    $domain = 'lexicata-form';

	    $locale = apply_filters( 'plugin_locale', get_locale(), $domain );

	    load_textdomain( $domain, WP_LANG_DIR . '/' . $domain . '/' . $domain . '-' . $locale . '.mo' );
	    load_plugin_textdomain( $domain, false, dirname( plugin_basename( $this->file ) ) . '/lang/' );
	} // End load_plugin_textdomain ()

	/**
	 * Main Lexicata_Form Instance
	 *
	 * Ensures only one instance of Lexicata_Form is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @static
	 * @see Lexicata_Form()
	 * @return Main Lexicata_Form instance
	 */
	public static function instance ( $file = '', $version = '1.0.0' ) {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self( $file, $version );
		}
		return self::$_instance;
	} // End instance ()

	/**
	 * Cloning is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __clone () {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?' ), $this->_version );
	} // End __clone ()

	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __wakeup () {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?' ), $this->_version );
	} // End __wakeup ()

	/**
	 * Installation. Runs on activation.
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function install () {
		$this->_log_version_number();
	} // End install ()

	/**
	 * Log the plugin version number.
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	private function _log_version_number () {
		update_option( $this->_token . '_version', $this->_version );
	} // End _log_version_number ()

    /**
	 * Setup the contact form html and submit logic
	 * @access  public
	 * @since   1.0.0
	 * @return  html contact form
	 */
    public function setup_contact_form()
    {
	    if(!$this->check_auth_token())
            return "<strong>Please configure the Lexicata Contact Form plugin in the settings panel</strong>";
        else
        {
            ob_start();
                $this->contact_form_submit_logic();
                $this->load_contact_form_html();
            return ob_get_clean();
        }
    }

    /**
	 * Generate the contact form html
	 * @access  public
	 * @since   1.0.0
	 * @return  html
	 */
    public function load_contact_form_html()
    {
        include(dirname(__FILE__).'/templates/form.php');
    }

    /**
	 * Verify the auth token is configured
	 * @access  public
	 * @since   1.0.0
	 * @return  boolean
	 */
    public function check_auth_token()
    {
        $token = get_option('lf_authorization_token');
        #probaby needs to be made more robust
        if(!empty($token))
            return true;
        else
            return false;
    }

    /**
	 * Generate the contact form html
	 * @access  public
	 * @since   1.0.7
	 * @return  html contact form
	 */
    public function contact_form_submit_logic()
    {
        if(isset($_POST['lf_submit']))
        {
            //sanitize form values
            $lf_first_name = sanitize_text_field( $_POST["lf_first_name"] );
            $lf_last_name = sanitize_text_field( $_POST["lf_last_name"] );
            $lf_email = sanitize_email( $_POST["lf_email"] );
            $lf_phone = sanitize_text_field( $_POST["lf_phone"] );
            $lf_message = esc_textarea( stripslashes( $_POST["lf_message"] ));
            $lf_honeypot = sanitize_text_field( $_POST["leave_this_blank_url"] );
            $lf_honeypot_time = sanitize_text_field( $_POST["leave_this_alone"] );

            //manual validation
            if(empty($lf_first_name))
                $errors['first_name'] = "<li>First Name is invalid</li>";
            if(empty($lf_last_name))
                $errors['first_name'] = "<li>Last Name is invalid</li>";
            if(empty($lf_email))
                $errors['email'] = "<li>Email is invalid</li>";
            if(empty($lf_message))
                $errors['message'] = "<li>Message is invalid</li>";
            if(!empty($lf_phone) && strlen(preg_replace('/\D/','',$lf_phone)) == 0) #allow blank but not garbage
                $errors['phone'] = "<li>Phone is invalid</li>";

            if(!empty($errors))
            {
                $html = '<ul class="lf_errors">';
                foreach($errors as $key => $value)
                   $html .= $value;
                $html .= '</ul>';

                echo $html;
                return false;
            }
            elseif($this->check_honeypot(compact('lf_honeypot','lf_honeypot_time')))
            {
                $this->log_error("Bot Detected; submission denied; lead dump: ".print_r(compact('lf_first_name','lf_last_name','lf_email','lf_phone','lf_message','lf_referrer','lf_honeypot','lf_honeypot_time'),true));

                #pretend it was successful
                echo "<h3 class='lf_success'>invalid</h3>";
                unset($_POST);
            }
            else
            {
                $lf_phone = preg_replace('/\D/','',$lf_phone);
                $lf_referrer = $_SERVER['HTTP_REFERER'];
                $lead = compact('lf_first_name','lf_last_name','lf_email','lf_phone','lf_message','lf_referrer');
                if($this->submit_lead($lead))
                {
                    echo "<h3 class='lf_success'>".get_option('lf_successful_submit_message')."</h3>";

                    if(get_option('lf_google_analytics_id'))
                    {
                        echo "
                        <!-- Google Analytics -->
                        <script>
                        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

                        ga('create', '".get_option('lf_google_analytics_id')."', 'auto');
                        ga('send', 'event', {
                          'eventCategory': 'LexicataForm',
                          'eventAction': 'SuccessfulSubmission',
                          //'eventLabel': 'Label',
                          //'eventValue': 55
                        });
                        </script>
                        <!-- End Google Analytics -->
                        ";
                    }

                    unset($_POST);
                }
                else
                {
                    echo "<h3 class='lf_failure'>Unfortunately an error has occured. Please try again later.</h3>";
                }
            }
        }
    }

    /**
	 * Submit lead to Lexicata API
	 * @access  private
	 * @since   1.0.6
	 * @return  boolean
	 */
    private function submit_lead($lead)
    {
        $url = "http://lexicata.com/inbox_leads";

        $array = Array(
            'auth_token' => get_option('lf_authorization_token'),
            'inbox_lead' => Array(
                'from_first' => $lead['lf_first_name'],
                'from_last' => $lead['lf_last_name'],
                'from_message' => $lead['lf_message'],
                'from_email' => $lead['lf_email'],
                'from_phone' => $lead['lf_phone'],
                'referring_url' => $lead['lf_referrer']
                )
            );
        $json = json_encode($array);

        $args = array(
            'headers' => array(
                'Content-Type' => 'application/json;'
            ),
            'body' => $json
        );

        $response = wp_remote_post($url,$args);

        if($response['response']['code'] == 201)
            return true;
        elseif(is_wp_error($response))
        {
            $error_message = $response->get_error_message();
            $this->log_error("wp http_api error: http status: {$response['response']['code']}; error message: $error_message");
            $this->log_error("wp http_api response dump: ".print_r($response,true));
            return false;
        }
        else
        {
            #currently no documented error codes from the lexicata api, so this will need to be made more robust
            #once that happens
            $this->log_error("Not a wp http_api error; response dump: ".print_r($response,true));
            return false;
        }
    }

    /**
	 * Log errors
	 * @access  public
	 * @since   1.0.1
	 * @return  void
	 */

    public static function log_error($error)
    {
        #file usually located at /wp-content/debug.log
        #make sure the following are uncommented in wp-config.php
        #define('WP_DEBUG', true);
        #define('WP_DEBUG_LOG', true);

       error_log("==LEXICATA-FORM-ERROR==: ".$error);
    }

    /**
	 * Check Honeypot
	 * @access  public
	 * @since   1.0.4
	 * @return  bool
	 */

    public static function check_honeypot($array)
    {
        #check to see if submission was made by a bot:
        #1.) if form was completed in less time than it would take a human; or
        #2.) if an input field, that should be hidden by css, has a value

        $time_to_complete_form_for_human = '5'; #seconds; need to account for auto fill

        $current_completion_time = time() - base64_decode($array['lf_honeypot_time']);

        if($current_completion_time < $time_to_complete_form_for_human)
            return true;

        if(!empty($array['lf_honeypot']))
            return true;

        return false;
    }
}
