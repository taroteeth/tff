<?php

if (function_exists('add_theme_support'))
{
  // Add Menu Support
  add_theme_support('menus');

  // Add Thumbnail Theme Support
  add_theme_support('post-thumbnails');
	add_image_size('xlarge', 1366, '', true); // XL Thumbnail
  add_image_size('large', 700, '', true); // Large Thumbnail
  add_image_size('medium', 250, '', true); // Medium Thumbnail
  add_image_size('small', 120, '', true); // Small Thumbnail
  add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

  // Enables post and comment RSS feed links to head
  add_theme_support('automatic-feed-links');

  // Localisation Support
  load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

// Load Scripts
function load_custom_scripts()
{
  if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
    wp_register_script('jquery', get_template_directory_uri() . '/bower_components/jquery/dist/jquery.min.js', array());
    wp_enqueue_script('jquery', $in_footer = true);

    wp_register_script('bxslider', get_template_directory_uri() . '/bower_components/bxslider-4/dist/jquery.bxslider.min.js', array('jquery'));
    wp_enqueue_script('bxslider', $in_footer = true);

    wp_register_script('custom_scripts', get_template_directory_uri() . '/js/dist/all.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('custom_scripts', $src = '', $deps = array(), $ver = false, $in_footer = true);
  }
}
add_action('init', 'load_custom_scripts');

// Custom Admin Scripts for ACF
function my_admin_enqueue_scripts()
{
	wp_enqueue_script( 'custom-admin-script', get_template_directory_uri() . '/js/admin/custom-admin-script.js', array(), '1.0.0', true );
}
add_action('acf/input/admin_enqueue_scripts', 'my_admin_enqueue_scripts');

// Load Styles
function load_custom_styles()
{
  wp_register_style('custom_styles', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
  wp_enqueue_style('custom_styles');
}
add_action('wp_enqueue_scripts', 'load_custom_styles');

 // WYSIWYG Custom Buttons
 require( 'inc/custom-editor-buttons/buttons.php' );

// Add page slug to body class
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}
add_filter('body_class', 'add_slug_to_body_class');

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
  global $wp_widget_factory;
  remove_action('wp_head', array(
    $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
    'recent_comments_style'
  ));
}
add_action('widgets_init', 'my_remove_recent_comments_style');

//Allow svg file uploads
function cc_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// Remove Admin bar
function remove_admin_bar()
{
  return false;
}
add_filter('show_admin_bar', 'remove_admin_bar');

// Ajax url variable
function wordpress_ajaxurl(){ ?>
	<script type="text/javascript">
	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
	</script>
<?php }
add_action('wp_head', 'wordpress_ajaxurl');

// Knowledge Base Query
include('inc/functions/knowledge-base-query.php');

// Custom Button
include('inc/button.php');

?>
