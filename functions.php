<?php
/*function divi__child_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'divi__child_theme_enqueue_styles' );

add_action( 'wp_enqueue_scripts', function () {
    $template_dir = get_stylesheet_directory_uri();

    wp_enqueue_script('jquery');

    wp_enqueue_script(
        'jquery_functions',
        $template_dir . '/js/functions.js',
        array( 'jquery' ),
        null,
        true
    );
} );
*/
//you can add custom functions below this line:
// include custom stylesheet
// get theme version
function wpmix_get_version() {
    $theme_data = wp_get_theme();
    return $theme_data->Version;
}
$theme_version = wpmix_get_version();
global $theme_version;

// get random number
function wpmix_get_random() {
    $randomizr = '-' . rand(100,999);
    return $randomizr;
}
$random_number = wpmix_get_random();
global $random_number;


function wpmix_queue_css() {
    global $theme_version, $random_number;
    if (!is_admin()) {
        wp_register_style('custom_styles', get_template_directory_uri().'/style.css', false, $theme_version . $random_number);
        wp_enqueue_style('custom_styles');
    }
}
add_action('wp_print_styles', 'wpmix_queue_css');




include('testimonials-shortcode.php');
add_shortcode('testimonials', 'testimonials_function');


add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    $parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css',
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
}


function ajax_load_work_posts($hook) {

    wp_enqueue_script( 'load_work_posts', get_stylesheet_directory_uri() . '/js/load_work.js', array(), '1.0.0', true );

    wp_localize_script( 'load_posts', 'ajax_info', array(
        'ajax_url'  => admin_url('admin-ajax.php'),
        'ajax_nonce'     => wp_create_nonce('load_posts_nonce')
    ));

}

add_action('wp_enqueue_scripts', 'ajax_load_work_posts');

add_action('wp_ajax_load_work_posts_api', 'load_work_posts_api_callback');
add_action('wp_ajax_nopriv_load_work_posts_api', 'load_work_posts_api_callback');

function load_work_posts_api_callback(){

    global $xcluded_ids;
    global $no_more_items;

    if ( ! wp_verify_nonce( $_POST['nonce'], 'load_posts_nonce' ) ) {
        die( __( 'Security check', 'textdomain' ) );
    }

    ob_start();
        get_template_part('blog/load_more_work', 'page' );
        $more_posts_template = ob_get_contents();
        ob_end_clean();


    $data = array(
        'page' => $_POST['data']['page'],
        'more_posts' => $more_posts_template,
        'excluded_ids' => $xcluded_ids,
        'no_more_items' => $no_more_items
    );

    echo json_encode($data);

    die;
}






/**
 * Proper way to enqueue scripts and styles.
 */

function ajax_load_posts($hook) {

    wp_enqueue_script( 'load_posts', get_stylesheet_directory_uri() . '/js/load_posts.js', array(), '1.0.0', true );

    wp_localize_script( 'load_posts', 'ajax_info', array(
        'ajax_url'  => admin_url('admin-ajax.php'),
        'ajax_nonce'     => wp_create_nonce('load_posts_nonce')
    ));

}

add_action('wp_enqueue_scripts', 'ajax_load_posts');

add_action('wp_ajax_load_posts_api', 'load_posts_api_callback');
add_action('wp_ajax_nopriv_load_posts_api', 'load_posts_api_callback');

function load_posts_api_callback(){

    global $xcluded_ids;
    global $no_more_items;

    if ( ! wp_verify_nonce( $_POST['nonce'], 'load_posts_nonce' ) ) {
        die( __( 'Security check', 'textdomain' ) );
    }

    ob_start();
        get_template_part('blog/load_more', 'page' );
        $more_posts_template = ob_get_contents();
        ob_end_clean();


    $data = array(
        'page' => $_POST['data']['page'],
        'more_posts' => $more_posts_template,
        'excluded_ids' => $xcluded_ids,
        'no_more_items' => $no_more_items
    );

    echo json_encode($data);

    die;
}

if (!function_exists('rs_the_excerpt')) {

    function rs_the_excerpt($limit = 500) {
        global $post;

        $result = "";
        $content = strip_tags( get_the_excerpt());
        if($content != ""){

            if(strlen($content) > $limit)
                $result = trim(substr($content, 0, $limit)) . '...';
            else
                $result = trim(substr($content, 0, $limit));

            $result = "<p>$result</p>";
        }
        echo $result;
    }

 }

 if (!function_exists('rs_the_title')) {

    function rs_the_title($limit = 500) {
        global $post;

        $result = "";
        $content = strip_tags( get_the_title());
        if($content != ""){

            if(strlen($content) > $limit)
                $result = trim(substr($content, 0, $limit)) . '...';
            else
                $result = trim(substr($content, 0, $limit));
        }
        echo $result;
    }

 }



// Turn Off Caching

$min    = WP_DEBUG ? '': '.min';
$file   = "/style.css";
$url    = get_stylesheet_directory_uri() . $file;
$path   = get_stylesheet_directory() . $file;
$handle = get_stylesheet() . '-style';


// Overridden?
if ( is_child_theme() && is_readable( get_stylesheet_directory() . $file ) )
{
    $url  = get_stylesheet_directory_uri() . $file;
    $path = get_stylesheet_directory()     . $file;
}

$modified = filemtime( $path );

add_action( 'wp_loaded', function() use ( $handle, $url, $modified ) {
    wp_register_style( $handle, $url, [], $modified );
});

add_action( 'wp_enqueue_scripts', function() use ( $handle ) {
    wp_enqueue_style( $handle );
});

// Ads
include_once 'cpt/cpt.php';
