<?php

defined( 'ABSPATH' ) or die( 'You can\t access this file!' );

class CategoryOptions {
    
    public function __construct()
    {
        add_action( 'admin_init', array($this, 'categories_admin_configuration') );
        add_action( 'admin_menu', array($this, 'configuration_register_options_page'));
    }

    public function categories_admin_configuration() {
        add_option( 'divi_categories_to_show', '');
        register_setting( 'blog_configurations', 'divi_categories_to_show', 'divi_custom_configuration_callback' );
        
    }

    public function configuration_register_options_page() {
        add_options_page('Divi Blog Options', 'Divi Blog Options', 'manage_options', 'divi_blog_custom_options', array($this, 'configuration_options_page'));
    }

    public function configuration_options_page()
    {
        ?>
            <div>
                <h2>Blog categories configuration</h2>
                <form method="post" action="options.php">
                    <?php settings_fields( 'blog_configurations' ); ?>
                    <table class="wp-list-table widefat fixed striped posts"> 
                      
                        <tr valign="top">
                            <th scope="row"><label for="divi_categories_to_show">Number of categories to show on Blog</label></th>
                            <td><input type="text" id="divi_categories_to_show" name="divi_categories_to_show" class="regular-text" value="<?php echo get_option('divi_categories_to_show'); ?>" /></td>
                        </tr>
                        
                    </table>
                    <?php  submit_button(); ?>
                </form>
            </div>
        <?php
    }


}
