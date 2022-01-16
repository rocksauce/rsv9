<?php

defined('ABSPATH') or die('You can\t access this file!');

class CategoryOptions
{

    public function __construct()
    {
        add_action('admin_init', array($this, 'categories_admin_configuration'));
        add_action('admin_menu', array($this, 'configuration_register_options_page'));
    }

    public function categories_admin_configuration()
    {
        add_option('divi_categories_to_show', '');
        register_setting('blog_configurations', 'divi_categories_to_show', 'divi_custom_configuration_callback');

        add_option('divi_404_title', '');
        register_setting('blog_configurations', 'divi_404_title', 'divi_custom_configuration_callback');

        add_option('divi_404_message', '');
        register_setting('blog_configurations', 'divi_404_message', 'divi_custom_configuration_callback');

        add_option('divi_thank_you_title', '');
        register_setting('blog_configurations', 'divi_thank_you_title', 'divi_custom_configuration_callback');

        add_option('divi_thank_you_message', '');
        register_setting('blog_configurations', 'divi_thank_you_message', 'divi_custom_configuration_callback');
    }

    public function configuration_register_options_page()
    {
        add_options_page('Divi Custom Theme Options', 'Divi Custom Theme Options', 'manage_options', 'divi_blog_custom_options', array($this, 'configuration_options_page'));
    }

    public function configuration_options_page()
    {
?>
        <div>
            <h2>Custom theme configurations</h2>
            <form method="post" action="options.php">
                <?php settings_fields('blog_configurations'); ?>
                <table class="wp-list-table widefat fixed striped posts">
                    <tr>
                        <th colspan="2">
                            <h3>Blog</h3>
                        </th>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="divi_categories_to_show">Number of categories to show on Blog</label></th>
                        <td><input type="text" id="divi_categories_to_show" name="divi_categories_to_show" class="regular-text" value="<?php echo get_option('divi_categories_to_show'); ?>" /></td>
                    </tr>

                    <tr>
                        <th colspan="2">
                            <h3>404</h3>
                        </th>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="divi_404_title"> Title</label></th>
                        <td><input type="text" id="divi_404_title" name="divi_404_title" class="regular-text" value="<?php echo get_option('divi_404_title'); ?>" /></td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="divi_404_message"> Message</label></th>
                        <td><input type="text" id="divi_404_message" name="divi_404_message" class="regular-text" value="<?php echo get_option('divi_404_message'); ?>" /></td>
                    </tr>

                    <tr>
                        <th colspan="2">
                            <h3>Thank You</h3>
                        </th>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="divi_thank_you_title"> Title</label></th>
                        <td><input type="text" id="divi_thank_you_title" name="divi_thank_you_title" class="regular-text" value="<?php echo get_option('divi_thank_you_title'); ?>" /></td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="divi_thank_you_message"> Message</label></th>
                        <td><input type="text" id="divi_thank_you_message" name="divi_thank_you_message" class="regular-text" value="<?php echo get_option('divi_thank_you_message'); ?>" /></td>
                    </tr>

                </table>



                <?php submit_button(); ?>
            </form>
        </div>
<?php
    }
}
