<?php

defined( 'ABSPATH' ) or die( 'You can\t access this file!' );

if ( ! class_exists( 'CustomPostTypes' ) ) :

    class CustomPostTypes {

        private $testimonials;
        private $add_cta;
                
        /**
         * Construct the plugin.
        */
        public function __construct() {
            add_action( 'after_setup_theme', array( $this, 'init' ) );
        }

        /**
         * Initialize the plugin.
        */
        public function init() {
        
            include_once 'inc/testimonials.php';
            include_once 'inc/ad-cta.php';
               

            $this->testimonials = new TestimonialsPost();
            $this->add_cta = new AdCtaPost();

        }
    }

    $testimonialsPostType = new CustomPostTypes( __FILE__ );

endif;