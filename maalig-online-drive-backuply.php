<?php
/**
 * @wordpress-plugin
 * Plugin Name: Maalig-Online-Drive-Backuply By IAMPMPKSAMY
 * Plugin URI: https://www.pmpksamy.com/backuply
 * Description: A lightweight yet powerful WordPress backup solution that enables secure Local Backup and Google Drive Backup with automated scheduling, manual restore options, and admin dashboard monitoring.
 * Version: 1.0.0
 * Requires at least: 6.0
 * Requires PHP: 8.0
 * Author: IAMPMPKSAMY (PMPKSAMY)
 * Author URI: https://www.pmpksamy.com
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: online-drive-backuply
 * Domain Path: /languages
 * Network: false
*/

if (!defined('ABSPATH')) exit;

define('MAALIGODBL_PATH', plugin_dir_path(__FILE__));
define('MAALIGODBL_URL', plugin_dir_url(__FILE__));

//require_once MAALIGODBL_PATH . 'vendor/autoload.php';
require_once MAALIGODBL_PATH . 'core/init.php';