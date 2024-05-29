<?php

// Exit if accessed directly. 
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! class_exists( 'Breezycv_Core' ) ) 
{
	
	class Breezycv_Core {
		// Vars
		private static $instance = null;
		public $version = '1.0.0.0';
		private $plugin_path = null;
		
		public function __construct() 
		{
			
			$this->includes();
			$this->init_hooks();
		}
		
		
		// Includes
		public function includes() 
		{

			require_once( __DIR__ . '/breezycv-elements.php' );
		}
		
		
		// Hook into actions and filters.
		private function init_hooks() 
		{

			add_action( 'plugins_loaded', [ $this, 'init' ] );
			
			add_action( 'wp_ajax_nopriv_fn_action_post_terms', 'fn_post_terms' );
			add_action( 'wp_ajax_fn_action_post_terms', 'fn_post_terms' );

		}
		
		
		// Check if elementor exists
		public function init() 
		{
			new \Breezycv\Breezycv_Elements();
		}

		public function admin_notice_missing_main_plugin() 
		{
			$message = sprintf(
				esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'breezycv-widgets' ),
				'<strong>' . esc_html__( 'Breezycv', 'breezycv-widgets' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'breezycv-widgets' ) . '</strong>'
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

		}
		
		public static function get_instance() 
		{
			// If the single instance hasn't been set, set it now.
			if ( null == self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}
	}
}


if ( ! function_exists( 'breezycv_load' ) ) 
{
	function breezycv_load() 
	{
		return breezycv_Core::get_instance();
	}
	
	breezycv_load();
}

/**
 * LMPixels Contact form action
 */

if( ! function_exists( 'breezycv_contact_action' ) ){
  function breezycv_contact_action(){
    // configure
    $sendTo = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('contact_form_email') : get_option("admin_email");
    $subject = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('contact_form_subject') : __( 'New message from contact form', 'breezycv-contact-form' );
    $from = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('contact_form_admin_email') : '';
    if(empty($from)){
        $from = $_REQUEST['email'];
    }
    $okMessage = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('contact_form_s_message') : __( 'Contact form successfully submitted. Thank you, I will get back to you soon!', 'breezycv-contact-form' );
    $errorMessage = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('contact_form_e_message') : __( 'There was an error while submitting the form. Please try again later', 'breezycv-contact-form' );
    $recaptcha = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('recaptcha/recaptcha_switcher') :  'on';
    $emailStartText = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('contact_form_text') : __( 'You have new message from Contact Form', 'breezycv-contact-form' );

    // let's do the sending
    if( $recaptcha == 'on' ) {
        $recaptchaClickMessage = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('recaptcha/on/contact_form_recaptcha_click_message') : __('Please click on the reCAPTCHA box.', 'breezycv-contact-form');
        $recaptchaErrorMessage = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('recaptcha/on/contact_form_recaptcha_error_message') : __('Robot verification failed, please try again.', 'breezycv-contact-form');
        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
            //your site secret key
            $recaptcha_secret_key = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('recaptcha/on/recaptcha_secret_key') : '6LdqmCAUAAAAANONcPUkgVpTSGGqm60cabVMVaON';
            //get verify response data
            $response = wp_remote_get('https://www.google.com/recaptcha/api/siteverify?secret='.$recaptcha_secret_key.'&response='.$_POST['g-recaptcha-response']);
            $responseVerify = $response['body'];

            $responseData = json_decode($responseVerify);
            if($responseData->success):
                try
                {
                    ob_start();
                    $emailText = nl2br(esc_html( $emailStartText )) . "<br>";

                    if(isset($_POST["cf_field"]) && is_array($_POST["cf_field"])){
                        $emailText .= implode(", <br>", array_filter($_POST["cf_field"]));
                    } else {
                        $fields = array('name' => 'Name', 'email' => 'Email', 'subject' => 'Subject', 'message' => 'Message');
                        foreach ($_POST as $key => $value) {
                            if (isset($fields[$key])) {
                                $emailText .= nl2br("$fields[$key]: $value\n");
                            }
                        }
                    }

                    $headers = array('Content-Type: text/html; charset="UTF-8";',
                        'From: ' . $from,
                        'Reply-To: ' . $from,
                        'Return-Path: ' . $from,
                    );
                    
                    wp_mail($sendTo, esc_html( $subject ), $emailText, implode("\n", $headers));
                    if ( !function_exists('wp_mail') ) {
                        throw new phpmailerException();
                    }
                    ob_end_clean();
                    throw new Exception($okMessage);
                } catch (phpmailerException $ee) {
                    $response_st = 'danger';
                    $response_m = esc_html( $errorMessage );
                } catch (Exception $e) {
                    $response_st = 'success';
                    $response_m = esc_html( $okMessage );
                }
                echo json_encode(array("type" => $response_st, "message" => $response_m));
                die();
            else:
                $responseArray = array('type' => 'danger', 'message' => esc_html( $recaptchaErrorMessage ));
                echo json_encode($responseArray);
                die();
            endif;
        } else {
            $responseArray = array('type' => 'danger', 'message' => esc_html( $recaptchaClickMessage));
            echo json_encode($responseArray);
            die();
        }
    } else {
        try
            {
                ob_start();
                $emailText = nl2br(esc_html( $emailStartText )) . "<br>";

                if(isset($_POST["cf_field"]) && is_array($_POST["cf_field"])){
                    $emailText .= implode(", <br>", array_filter($_POST["cf_field"]));
                } else {
                    $fields = array('name' => 'Name', 'email' => 'Email', 'subject' => 'Subject', 'message' => 'Message');
                    foreach ($_POST as $key => $value) {
                        if (isset($fields[$key])) {
                            $emailText .= nl2br("$fields[$key]: $value\n");
                        }
                    }
                }

                $headers = array('Content-Type: text/html; charset="UTF-8";',
                    'From: ' . $from,
                    'Reply-To: ' . $from,
                    'Return-Path: ' . $from,
                );
                
                wp_mail($sendTo, $subject, $emailText, implode("\n", $headers));
                if ( !function_exists('wp_mail') ) {
                    throw new phpmailerException();
                }
                ob_end_clean();
                throw new Exception($okMessage);
            } catch (phpmailerException $ee) {
                $response_st = 'danger';
                $response_m = $errorMessage;
            } catch (Exception $e) {
                $response_st = 'success';
                $response_m = $okMessage;
            }
            echo json_encode(array("type" => $response_st, "message" => $response_m));
            die();
    }

  }
}

add_action( 'wp_ajax_breezycv_contact_action',  'breezycv_contact_action');
add_action( 'wp_ajax_nopriv_breezycv_contact_action',  'breezycv_contact_action');

/* ================================================================================================ */
