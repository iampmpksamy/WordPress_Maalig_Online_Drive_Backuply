<?php
/**
 * @wordpress-plugin
 * Plugin Name: Maalig Online Drive Backuply
 * Plugin URI: https://pluginshub.pmpksamy.com/wordpress/maalig-online-drive-backuply/
 * Description: Experimental local full-site archive builder with database export, manual backup progress, and retained backup history.
 * Version: 1.0.0
 * Requires at least: 6.0
 * Requires PHP: 8.0
 * Author: IAMPMPKSAMY
 * Author URI: https://pmpksamy.com/
 * Support URI: https://github.com/iampmpksamy/maalig-online-drive-backuply/issues
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: online-drive-backuply
 * Domain Path: /languages
 * Network: false
*/

if (!defined('ABSPATH')) exit;

define('MAALIGODBL_PATH', plugin_dir_path(__FILE__));
define('MAALIGODBL_URL', plugin_dir_url(__FILE__));
define('MAALIGODBL_VERSION', '1.0.0');
define('MAALIGODBL_BACKUP_DIR', WP_CONTENT_DIR . '/maalig-backups/');

require_once MAALIGODBL_PATH . 'core/init.php';
