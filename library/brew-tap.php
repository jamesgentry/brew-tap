<?php

/*
Author: James Gentry
URL: http://jamesgentry.us

Recommended plugins and extra functions to use.
Cloaking email addresses
BFI Thumb functions
Change welcome text in Admin Menu from Howdy to Welcome
*/

// First up, recommended plugins for theme
// Include the TGM_Plugin_Activation class.
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // This is an example of how to include a plugin pre-packaged with a theme.
        // array(
        //     'name'               => 'TGM Example Plugin', // The plugin name.
        //     'slug'               => 'tgm-example-plugin', // The plugin slug (typically the folder name).
        //     'source'             => get_stylesheet_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
        //     'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        //     'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
        //     'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
        //     'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
        //     'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        // ),

        // This is an example of how to include a plugin from a private repo in your theme.
        // array(
        //     'name'               => 'TGM New Media Plugin', // The plugin name.
        //     'slug'               => 'tgm-new-media-plugin', // The plugin slug (typically the folder name).
        //     'source'             => 'https://s3.amazonaws.com/tgm/tgm-new-media-plugin.zip', // The plugin source.
        //     'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        //     'external_url'       => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // If set, overrides default API URL and points to an external URL.
        // ),

        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name'      => 'iThemes Security',
            'slug'      => 'better-wp-security',
            'required'  => false,
        ),
        array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),
        array(
            'name'      => 'Bootstrap for Contact Form 7',
            'slug'      => 'bootstrap-for-contact-form-7',
            'required'  => false,
        ),
        // array(
        //     'name'      => 'Developer',
        //     'slug'      => 'developer',
        //     'required'  => false,
        // ),

    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}

/** Use BFI thumb resizer
// Usage: echo "<img src='" . bfi_thumb( "URL-to-image.jpg", $params ) . "'/>";

RESIZE BY WIDTH ONLY
$params = array( 'width' => 400 );
bfi_thumb( "URL-to-image.jpg", $params );

RESIZE BY WIDTH AND HEIGHT
$params = array( 'width' => 400, 'height' => 300 );
bfi_thumb( "URL-to-image.jpg", $params );

CROP
$params = array( 'width' => 400, 'height' => 300, 'crop' => true );
bfi_thumb( "URL-to-image.jpg", $params );

CHANGE OPACITY (CHANGES IMAGE INTO A PNG)
$params = array( 'opacity' => 80 );
bfi_thumb( "URL-to-image.jpg", $params );

GRAYSCALE
$params = array( 'grayscale' => true );
bfi_thumb( "URL-to-image.jpg", $params );

COLORIZE
$params = array( 'color' => '#ff0000' );
bfi_thumb( "URL-to-image.jpg", $params );

NEGATE
$params = array( 'negate' => true );
bfi_thumb( "URL-to-image.jpg", $params );

MULTIPLE PARAMETERS
$params = array( 'width' => 400, 'height' => 300, 'opacity' => 50, 'grayscale' => true, 'colorize' => '#ff0000' );
bfi_thumb( "URL-to-image.jpg", $params );
*/

require_once('BFI_Thumb.php');
// To change the upload subdirectory to wp-content/uploads/other_dir
// uncomment the line below and edit the directory
// @define( BFITHUMB_UPLOAD_DIR, 'other_dir' );

function bfi_img( $thumb_size, $params ) {
  global $post;
  //$params = $params;
  $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID, '' ), $thumb_size );
  $custom_img_src = bfi_thumb( $imgsrc[0], $params );
  return $custom_img_src;
}
/* so we can use it like this:
// <img src="<?php echo bfi_img('full', $params);?>" />
// <div style="background: transparent url('<?php echo bfi_img('full', $params ); ?>') no-repeat top center;"></div>
*/

// Cloaking email addresses
// Shortcode usage: [antibot email="name@email.com"]
function antibot_sc( $atts ) {
  extract( shortcode_atts( array(
    'email' => ''
  ), $atts ) );
  return antibot( $email );
}
add_shortcode( 'antibot', 'antibot_sc' );

// Don't fixed Wordpress to WordPress in content
remove_filter( 'the_title', 'capital_P_dangit', 11 );
remove_filter( 'the_content', 'capital_P_dangit', 11 );
remove_filter( 'comment_text', 'capital_P_dangit', 31 );

/** Remove some menu items, just to be neat or make it harder to reach
  * Pages are still accessible this way, but you need to know the url
  * Just uncomment the add_action function below to use it.
  */
function remove_admin_menus(){
  if ( function_exists('remove_menu_page') ) {
      remove_menu_page('edit-comments.php');
      remove_menu_page( 'themes.php' );
      remove_menu_page( 'plugins.php' );
      remove_menu_page( 'tools.php' );
  }
}
//add_action('admin_menu', 'remove_admin_menus');

// Replace Howdy admin bar message
function change_howdy($translated, $text, $domain) {
    if (false !== strpos($translated, 'Howdy'))
        return str_replace('Howdy', 'Welcome', $translated);
    return $translated;
}

add_filter('gettext', 'change_howdy', 10, 3);

// Add featured image col to admin for easy viewing
add_filter('manage_posts_columns', 'posts_columns', 5);
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);

function posts_columns($defaults){
    $defaults['riv_post_thumbs'] = __('Thumbs');
    return $defaults;
}

function posts_custom_columns($column_name, $id){
    if($column_name === 'riv_post_thumbs'){
      echo the_post_thumbnail(array(50,50));
    }
}

// end
?>
