# Installation and validation guide

## Read before installing

Version 1.0.0 is experimental. Its verified scope is local archive creation. Google Drive upload and restore are not complete production workflows.

Use a staging clone, keep an independent backup, and confirm adequate free disk space before running the plugin.

## Requirements

- WordPress 6.0 or later
- PHP 8.0 or later
- PHP Zip extension
- Administrator and filesystem access
- Free disk space greater than the WordPress files plus database export

## WordPress Admin

1. Download `maalig-online-drive-backuply.zip` from the latest GitHub release.
2. Open **Plugins → Add New Plugin → Upload Plugin**.
3. Upload the ZIP, install it, and activate **Maalig Online Drive Backuply**.
4. Open **Maalig Backup** and run a manual backup on staging.
5. Download the resulting archive and inspect its files and `database.sql`.
6. Perform a recovery test in an isolated WordPress environment.

## Git and WP-CLI

```bash
cd /path/to/wordpress/wp-content/plugins
git clone https://github.com/iampmpksamy/WordPress_Maalig_Online_Drive_Backuply.git
cd /path/to/wordpress
wp plugin activate maalig-online-drive-backuply
```

## Operational warnings

- Do not keep the only backup on the same server as the WordPress site.
- Confirm that `wp-content/maalig-backups/` cannot be browsed or downloaded by unauthorized visitors.
- Monitor disk space, PHP execution time, and memory during archive creation.
- Do not enable or depend on Google Drive or restore behavior until those paths have been completed and independently tested.
