<?php

defined( 'ABSPATH' ) or die( 'You can\t access this file!' );

class AdCtaPost {
    
    public function __construct()
    {
        add_action( 'init', array($this, 'create_ad_post_type'), 0 );

        add_action( 'add_meta_boxes', array( $this, 'add_meta_box'));
        add_action( 'save_post',      array( $this, 'save'), 10, 3);
        
    }

    public function create_ad_post_type() {

        // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Ads', 'Post Type General Name', 'rsv9-theme' ),
            'singular_name'       => _x( 'ad-cta', 'Post Type Singular Name', 'rsv9-theme' ),
            'menu_name'           => __( 'Ads', 'rsv9-theme' ),
            'parent_item_colon'   => __( 'Parent Ad', 'rsv9-theme' ),
            'all_items'           => __( 'All Ads', 'rsv9-theme' ),
            'view_item'           => __( 'View Ad', 'rsv9-theme' ),
            'add_new_item'        => __( 'Add New Ad', 'rsv9-theme' ),
            'add_new'             => __( 'Add New', 'rsv9-theme' ),
            'edit_item'           => __( 'Edit Ad', 'rsv9-theme' ),
            'update_item'         => __( 'Update Ad', 'rsv9-theme' ),
            'search_items'        => __( 'Search Ad', 'rsv9-theme' ),
            'not_found'           => __( 'Not Found', 'rsv9-theme' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'rsv9-theme' ),
        );
            
        // Set other options for Custom Post Type
            
        $args = array(
            'label'               => __( 'Ads CTA', 'rsv9-theme' ),
            'description'         => __( 'Ads CTA and reviews', 'rsv9-theme' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title', 'editor', 'author', 'thumbnail' ),
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
            'menu_icon'           => 'dashicons-megaphone',
        
        );
            
        // Registering your Custom Post Type
        register_post_type( 'ad-cta', $args );
        
    }

    

    public function add_meta_box( $post_type ) {
        // Limit meta box to certain post types.
        $post_types = array( 'ad-cta');
    
        if ( in_array( $post_type, $post_types ) ) {
            add_meta_box(
                'aditional_links',
                __( 'Aditional ad links', 'rsv9-theme' ),
                array( $this, 'render_meta_box_content' ),
                $post_type,
                'advanced',
                'high'
            );
        }
    }

    public function render_meta_box_content( $post ) {

        // Add an nonce field so we can check for it later.
        wp_nonce_field( 'rsv9_add_cta_box', 'rsv9_add_cta_box_nonce' );
    
        // Use get_post_meta to retrieve an existing value from the database.
        $link_one = get_post_meta( $post->ID, '_add_cta_link_one', true );
        $link_one_url = get_post_meta( $post->ID, '_add_cta_link_one_url', true );
        $link_two = get_post_meta( $post->ID, '_add_cta_link_two', true );
        $link_two_url = get_post_meta( $post->ID, '_add_cta_link_two_url', true );
    
        // Display the form, using the current value.
        ?>
        
            <h5>Link One</h5>
            <input required class="components-text-control__input" type="text" name="rsv9_ad_link_one" id="rsv9_ad_link_one" value="<?php echo esc_attr( $link_one ); ?>">
            <h5>Link One URL URL (Use <strong>http://</strong> or <strong>https://</strong>)</h5>
            <input required class="components-text-control__input" type="text" name="rsv9_ad_link_one_url" id="rsv9_ad_link_one_url" value="<?php echo esc_attr( $link_one_url ); ?>">

            <h5>Link Two</h5>
            <input required class="components-text-control__input" type="text" name="rsv9_ad_link_two" id="rsv9_ad_link_two" value="<?php echo esc_attr( $link_two ); ?>">
            <h5>Link Two URL URL (Use <strong>http://</strong> or <strong>https://</strong>)</h5>
            <input required class="components-text-control__input" type="text" name="rsv9_ad_link_two_url" id="rsv9_ad_link_two_url" value="<?php echo esc_attr( $link_two_url ); ?>">

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
        if ( ! isset( $_POST['rsv9_add_cta_box_nonce'] ) ) {
            return $post_id;
        }
    
        $nonce = $_POST['rsv9_add_cta_box_nonce'];
    
        // Verify that the nonce is valid.
        if ( ! wp_verify_nonce( $nonce, 'rsv9_add_cta_box' ) ) {
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
        $link_one = sanitize_text_field( $_POST['rsv9_ad_link_one']);
        $link_one_url = sanitize_text_field( $_POST['rsv9_ad_link_one_url']);
        $link_two = sanitize_text_field( $_POST['rsv9_ad_link_two']);
        $link_two_url = sanitize_text_field( $_POST['rsv9_ad_link_two_url']);
    
        // Update the meta field.
        update_post_meta( $post_id, '_add_cta_link_one', $link_one );
        update_post_meta( $post_id, '_add_cta_link_one_url', $link_one_url );
        update_post_meta( $post_id, '_add_cta_link_two', $link_two );
        update_post_meta( $post_id, '_add_cta_link_two_url', $link_two_url );

    }

}
