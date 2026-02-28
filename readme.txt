=== Maalig Online Drive Backuply ===
Contributors: iampmpksamy
Tags: backup, google drive backup, local backup, database backup, file backup
Requires at least: 6.0
Tested up to: 6.9
Requires PHP: 8.0
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Lightweight WordPress backup plugin supporting Local Storage and Google Drive Backup with a clean dashboard interface.

== Description ==

Online Drive Backuply (ODBL) is a lightweight and performance-focused WordPress backup plugin designed for secure Local and Google Drive backups.

This minimal version (V1.0.0) includes essential backup functionality for:

• Full site backup (Files + Database)
• Manual backup generation
• Local server storage
• Google Drive cloud backup integration

The plugin is built using clean OOP architecture and does not collect or transmit any user data to external tracking systems.

This version focuses only on Local Backup and Google Drive Backup for stability and performance.

== Features ==

* Full WordPress Files Backup
* Full Database Backup (SQL Export)
* One-click Manual Backup
* Local Backup Storage (Server)
* Google Drive Backup Integration
* Backup Logs Tracking
* Secure Admin Dashboard (dashboard.php)
* Settings Management Panel (settings.php)
* Lightweight and Optimized Code
* No Third-party Tracking Scripts
* Clean OOP Structure

This plugin only connects to Google Drive API when configured by the administrator.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/online-drive-backuply` directory.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Go to the "Online Drive Backuply" menu in admin dashboard.
4. Configure Local path and Google Drive API settings.
5. Start creating backups.

== Frequently Asked Questions ==

= Does this plugin collect user data? =
No. The plugin does not collect, store, or transmit user data.

= Does it require Google Drive? =
No. Google Drive integration is optional. You can use Local Backup only.

= Does it support automatic scheduled backups? =
Not in V1.0.0. This version supports manual backup only.

= Is it lightweight? =
Yes. It is built for performance and minimal overhead.

== Screenshots ==

1. Dashboard – Backup Overview
2. Settings Page – Google Drive Configuration
3. Backup Logs Page
4. Manual Backup Trigger Button

== Changelog ==

= 1.0.0 =
* Initial release
* Local Backup Support (Files + Database)
* Google Drive Backup Integration
* Admin Dashboard Interface
* Settings Configuration Panel
* Manual Backup Trigger
* Backup Logs System

== Upgrade Notice ==

= 1.0.0 =
Initial stable release of Online Drive Backuply with Local and Google Drive backup support.