<?php

defined( 'ABSPATH' ) or die( 'You can\t access this file!' );

if ( ! class_exists( 'BlogOptions' ) ) :

    class BlogOptions {

        private $blog_categories;
                
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
        
            include_once 'inc/Categories.php';
               

            $this->blog_categories = new CategoryOptions ();

        }
    }

    new BlogOptions( __FILE__ );

endif;