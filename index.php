
<?php
require_once('header.php'); 
?>

<div class="container">
 <br>
 <table class="table table-striped">
  <thead>
    <tr>
      <th scope="row"></th>
      <th scope="col">colaboradores</th>
      <th scope="col">gastos</th>
      <th scope="col">Libros</th>
    </tr>
    <tbody>
    <tr><th scope="row">1</th><td><a href="bloggers.php">Bloggers</a></td>
    <td><a href="gastos.php">Resumen</a> </td>
    <td><a href="libros.php">Libros</a></td>
     <tr><th scope="row">2</th>
    <td><a href="distribuidores.php">distribuidores</a></td> 
    <td><a href="ventas.php">ventas</a></td>
    <td><a href="autores.php">Autores</a></td>
    <tr><th scope="row">3</th><td><a href="librerias.php">librerias</a>
  </thead>
  </tbody>
</table>



</div>
<?php
die("");
/**
 * DEFINE PATHS
 */
define('WPMM_PATH', plugin_dir_path(__FILE__));
define('WPMM_CLASSES_PATH', WPMM_PATH . 'includes/classes/');
define('WPMM_FUNCTIONS_PATH', WPMM_PATH . 'includes/functions/');
define('WPMM_LANGUAGES_PATH', basename(WPMM_PATH) . '/languages/');
define('WPMM_VIEWS_PATH', WPMM_PATH . 'views/');
define('WPMM_CSS_PATH', WPMM_PATH . 'assets/css/');

/**
 * DEFINE URLS
 */
define('WPMM_URL', plugin_dir_url(__FILE__));
define('WPMM_JS_URL', WPMM_URL . 'assets/js/');
define('WPMM_CSS_URL', WPMM_URL . 'assets/css/');
define('WPMM_IMAGES_URL', WPMM_URL . 'assets/images/');
define('WPMM_AUTHOR_UTM', '?utm_source=wpplugin&utm_medium=wpmaintenance');

/**
 * OTHER DEFINES
 */
define('WPMM_ASSETS_SUFFIX', (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) ? '' : '.min');

/**
 * FUNCTIONS
 */
require_once(WPMM_FUNCTIONS_PATH . 'helpers.php');
if (is_multisite() && !function_exists('is_plugin_active_for_network')) {
    require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
}

/**
 * FRONTEND
 */
require_once(WPMM_CLASSES_PATH . 'wp-maintenance-mode-shortcodes.php');
require_once(WPMM_CLASSES_PATH . 'wp-maintenance-mode.php');
register_activation_hook(__FILE__, array('WP_Maintenance_Mode', 'activate'));
register_deactivation_hook(__FILE__, array('WP_Maintenance_Mode', 'deactivate'));

add_action('plugins_loaded', array('WP_Maintenance_Mode', 'get_instance'));

/**
 * DASHBOARD
 */
if (is_admin()) {
    require_once(WPMM_CLASSES_PATH . 'wp-maintenance-mode-admin.php');
    add_action('plugins_loaded', array('WP_Maintenance_Mode_Admin', 'get_instance'));
}
echo "aaaa";