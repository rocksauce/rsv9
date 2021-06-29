<?php

defined( 'ABSPATH' ) or die( 'You can\t access this file!' );

class TestimonialsPost {
    
    public function __construct()
    {
        add_action( 'init', array($this, 'create_testimonials_post_type'), 0 );

        add_action( 'add_meta_boxes', array( $this, 'add_meta_box'));
        add_action( 'save_post',      array( $this, 'save'), 10, 3);
        
    }

    public function create_testimonials_post_type() {

        // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Testimonials', 'Post Type General Name', 'rsv9-theme' ),
            'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'rsv9-theme' ),
            'menu_name'           => __( 'Testimonials', 'rsv9-theme' ),
            'parent_item_colon'   => __( 'Parent Testimonial', 'rsv9-theme' ),
            'all_items'           => __( 'All Testimonials', 'rsv9-theme' ),
            'view_item'           => __( 'View Testimonial', 'rsv9-theme' ),
            'add_new_item'        => __( 'Add New Testimonial', 'rsv9-theme' ),
            'add_new'             => __( 'Add New', 'rsv9-theme' ),
            'edit_item'           => __( 'Edit Testimonial', 'rsv9-theme' ),
            'update_item'         => __( 'Update Testimonial', 'rsv9-theme' ),
            'search_items'        => __( 'Search Testimonial', 'rsv9-theme' ),
            'not_found'           => __( 'Not Found', 'rsv9-theme' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'rsv9-theme' ),
        );
            
        // Set other options for Custom Post Type
            
        $args = array(
            'label'               => __( 'Testimonials', 'rsv9-theme' ),
            'description'         => __( 'Testimonials and reviews', 'rsv9-theme' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title', 'editor', 'author', 'thumbnail' ),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array( 'genres' ),
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */ 
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 40,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'show_in_rest'        => true,
            'menu_icon'           => 'dashicons-editor-quote',
        
        );
            
        // Registering your Custom Post Type
        register_post_type( 'testimonials', $args );
        
    }

    

    public function add_meta_box( $post_type ) {
        // Limit meta box to certain post types.
        $post_types = array( 'testimonials');
    
        if ( in_array( $post_type, $post_types ) ) {
            add_meta_box(
                'about_the_client_customer',
                __( 'About the Customer / Client', 'rsv9-theme' ),
                array( $this, 'render_meta_box_content' ),
                'testimonials',
                'advanced',
                'high'
            );
        }
    }

    public function render_meta_box_content( $post ) {

        // Add an nonce field so we can check for it later.
        wp_nonce_field( 'rsv9_inner_custom_box_testimonial', 'rsv9_inner_custom_box_testimonial_nonce' );
    
        // Use get_post_meta to retrieve an existing value from the database.
        $postion = get_post_meta( $post->ID, 'position_value_key', true );
        $compnay = get_post_meta( $post->ID, 'company_value_key', true );
        $compnay_url = get_post_meta( $post->ID, 'company_url_value_key', true );
    
        // Display the form, using the current value.
        ?>
            <h5>Position</h5>
            <input required class="components-text-control__input" type="text" name="rsv9_position" id="rsv9_position" value="<?php echo esc_attr( $postion ); ?>">
            <h5>Company</h5>
            <input  required class="components-text-control__input" type="text" name="rsv9_company" id="rsv9_company" value="<?php echo esc_attr( $compnay ); ?>">
            <h5>Company URL (Use <strong>http://</strong> or <strong>https://</strong>) </h5>
            <input required class="components-text-control__input" type="text" name="rsv9_company_url" id="rsv9_company_url" value="<?php echo esc_attr( $compnay_url ); ?>">
        <?php
    }

    public function save( $post_id, $post, $update ) {

        /*
            * We need to verify this came from the our screen and with proper authorization,
            * because save_post can be triggered at other times.
            */
        if ( ! $update) {
            return $post_id;
        }

        // Check if our nonce is set.
        if ( ! isset( $_POST['rsv9_inner_custom_box_testimonial_nonce'] ) ) {
            return $post_id;
        }

        
    
        $nonce = $_POST['rsv9_inner_custom_box_testimonial_nonce'];
    
        // Verify that the nonce is valid.
        if ( ! wp_verify_nonce( $nonce, 'rsv9_inner_custom_box_testimonial' ) ) {
            return $post_id;
        }
    
        /*
            * If this is an autosave, our form has not been submitted,
            * so we don't want to do anything.
            */
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
        }
    
        // Check the user's permissions.
        if ( 'page' == $_POST['post_type'] ) {
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            }
        } else {
            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;
            }
        }
    
        /* OK, it's safe for us to save the data now. */
    
        // Sanitize the user input.
        $position = sanitize_text_field( $_POST['rsv9_position'] );
        $compnay = sanitize_text_field( $_POST['rsv9_company'] );
        $compnay_url = sanitize_text_field( $_POST['rsv9_company_url'] );
    
        // Update the meta field.
        update_post_meta( $post_id, 'position_value_key', $position );
        update_post_meta( $post_id, 'company_value_key', $compnay );
        update_post_meta( $post_id, 'company_url_value_key', $compnay_url );

    }

}
