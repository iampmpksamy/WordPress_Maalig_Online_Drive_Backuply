=== Maalig Online Drive Backuply ===
Contributors: iampmpksamy
Tags: backup, google drive backup, local backup, database backup, file backup
Requires at least: 6.0
Tested up to: 6.9
Requires PHP: 8.0
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Experimental WordPress local archive builder with database export, progress tracking, and retained backup history.

== Description ==

Maalig Online Drive Backuply 1.0.0 is an experimental WordPress backup utility for creating local site archives during development and staging validation.

The current source implements:

• Full site backup (Files + Database)
• Manual backup generation
• Local server storage
• Retention of the five newest local archives

The plugin is built using clean OOP architecture and does not collect or transmit any user data to external tracking systems.

The Google Drive settings and restore classes are not a complete production workflow in this release. Test archives and recovery procedures on a non-production site before relying on the plugin.

== Features ==

* Full WordPress Files Backup
* Full Database Backup (SQL Export)
* One-click Manual Backup
* Local Backup Storage (Server)
* Backup Logs Tracking
* Secure Admin Dashboard (dashboard.php)
* Settings Management Panel (settings.php)
* Lightweight and Optimized Code
* No Third-party Tracking Scripts
* Clean OOP Structure

Do not treat an archive as verified until it has been downloaded, inspected, and restored successfully in an isolated environment.

== Installation ==

1. Download the source ZIP from the latest GitHub release.
2. Upload the plugin files to the `/wp-content/plugins/maalig-online-drive-backuply` directory.
3. Activate the plugin through the **Plugins** screen in WordPress.
4. Open **Maalig Backup** in the admin dashboard.
5. Run a backup on a staging site and validate the resulting ZIP before production evaluation.

== Frequently Asked Questions ==

= Does this plugin collect user data? =
No. The plugin does not collect, store, or transmit user data.

= Does it require Google Drive? =
No. The verified capability in this release is local archive creation. The Google Drive flow is incomplete and should not be relied on.

= Does it support automatic scheduled backups? =
Scheduler code exists, but the current release has not been validated as a production scheduling system. Use the manual flow during evaluation.

= Is it lightweight? =
Yes. It is built for performance and minimal overhead.

== Support ==

* Plugin page: https://pluginshub.pmpksamy.com/wordpress/maalig-online-drive-backuply/
* Documentation and installation guide: https://github.com/iampmpksamy/WordPress_Maalig_Online_Drive_Backuply/wiki
* Bug reports and feature requests: https://github.com/iampmpksamy/WordPress_Maalig_Online_Drive_Backuply/issues

== Screenshots ==

1. Dashboard – Backup Overview
2. Settings Page – Google Drive Configuration
3. Backup Logs Page
4. Manual Backup Trigger Button

== Changelog ==

= 1.0.0 =
* Initial release
* Local Backup Support (Files + Database)
* Google Drive settings interface included, but upload is not complete in this release
* Admin Dashboard Interface
* Settings Configuration Panel
* Manual Backup Trigger
* Backup Logs System
* Public metadata, limitations, installation guidance, and support URLs synchronized with the source audit

== Upgrade Notice ==

= 1.0.0 =
Experimental local archive release for staging evaluation; cloud upload and restore are incomplete.
