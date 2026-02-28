<?php
if (!defined('ABSPATH')) exit;

require_once MAALIGODBL_PATH . 'core/logs.php';
require_once MAALIGODBL_PATH . 'core/database.php';
require_once MAALIGODBL_PATH . 'core/zip.php';
require_once MAALIGODBL_PATH . 'core/google-drive.php';
require_once MAALIGODBL_PATH . 'core/backup.php';
require_once MAALIGODBL_PATH . 'core/scheduler.php';

require_once MAALIGODBL_PATH . 'admin/dashboard.php';
require_once MAALIGODBL_PATH . 'admin/settings.php';
require_once MAALIGODBL_PATH . 'admin/ajax.php';

register_activation_hook(__FILE__, 'maaligodbl_schedule_backup');
register_deactivation_hook(__FILE__, 'maaligodbl_clear_schedule');