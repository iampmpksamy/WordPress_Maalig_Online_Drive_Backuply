# Maalig Online Drive Backuply

Maalig Online Drive Backuply `1.0.0` is an experimental WordPress utility for building local full-site archives with a database export.

## Current status

This repository is published for evaluation and continued development. The audited source creates local ZIP archives, adds a SQL database dump, reports manual progress in WordPress Admin, and retains the five newest archives.

The Google Drive upload and restore paths are not complete production workflows in this release. Do not rely on them for disaster recovery.

## Requirements

- WordPress 6.0 or later
- PHP 8.0 or later
- PHP Zip extension
- Sufficient local disk space for a complete site archive
- Administrator and filesystem access

## Installation

Download the latest release ZIP and upload it from **WordPress Admin → Plugins → Add New Plugin → Upload Plugin**. Evaluate it on staging before considering production use.

See the complete [installation and validation guide](docs/INSTALLATION.md) or the [project wiki](https://github.com/iampmpksamy/maalig-online-drive-backuply/wiki).

## Verified capabilities

- Manual full-site ZIP creation
- SQL database export inside the archive
- WordPress Admin backup trigger and progress display
- Local archive listing
- Five-archive local retention
- Backup activity logging

## Known limitations

- Google Drive upload is incomplete.
- Restore code is not a validated recovery workflow.
- Large sites may exceed PHP execution time, memory, or disk limits.
- Local archives reside under `wp-content/maalig-backups/`; review web-server access controls before testing.

## Support

- [Plugins Hub page](https://pluginshub.pmpksamy.com/wordpress/maalig-online-drive-backuply/)
- [Documentation wiki](https://github.com/iampmpksamy/maalig-online-drive-backuply/wiki)
- [Bug reports and feature requests](https://github.com/iampmpksamy/maalig-online-drive-backuply/issues)
- [Support policy](docs/SUPPORT.md)

## Author

[IAMPMPKSAMY](https://pmpksamy.com/)

## License

Licensed under `GPL-2.0-or-later`. See [LICENSE](LICENSE).
