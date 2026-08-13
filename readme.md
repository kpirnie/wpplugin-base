# PLUGIN NAME

[![GitHub Issues](https://img.shields.io/github/issues/kpirnie/wpplugin-kp-agent-ready?style=for-the-badge&logo=github&color=006400&logoColor=white&labelColor=000)](https://github.com/kpirnie/wpplugin-kp-agent-ready/issues)
[![Last Commit](https://img.shields.io/github/last-commit/kpirnie/wpplugin-kp-agent-ready?style=for-the-badge&labelColor=000)](https://github.com/kpirnie/wpplugin-kp-agent-ready/commits/main)
[![MIT](https://img.shields.io/badge/License-GPLv3-orange.svg?style=for-the-badge&logo=opensourceinitiative&logoColor=white&labelColor=000)](LICENSE)

[![PHP](https://img.shields.io/badge/Min.%20php8.2-777BB4?logo=php&logoColor=white&style=for-the-badge&labelColor=000)](https://php.net)
[![WordPress](https://img.shields.io/badge/Min.%20WP-6.8-3858e9?logo=wordpress&logoColor=white&style=for-the-badge&labelColor=000)](https://wordpress.org)
[![Kevin Pirnie](https://img.shields.io/badge/-KevinPirnie.com-000d2d?style=for-the-badge&labelColor=000&logoColor=white&logo=data:image/svg%2Bxml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgc3Ryb2tlPSJ3aGl0ZSIgc3Ryb2tlLXdpZHRoPSIxLjgiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCI+CiAgPGNpcmNsZSBjeD0iMTIiIGN5PSIxMiIgcj0iMTAiLz4KICA8ZWxsaXBzZSBjeD0iMTIiIGN5PSIxMiIgcng9IjQuNSIgcnk9IjEwIi8+CiAgPGxpbmUgeDE9IjIiIHkxPSIxMiIgeDI9IjIyIiB5Mj0iMTIiLz4KICA8bGluZSB4MT0iNC41IiB5MT0iNi41IiB4Mj0iMTkuNSIgeTI9IjYuNSIvPgogIDxsaW5lIHgxPSI0LjUiIHkxPSIxNy41IiB4Mj0iMTkuNSIgeTI9IjE3LjUiLz4KPC9zdmc+Cg==)](https://kevinpirnie.com/)

PLUGIN DESCRIPTION

## Requirements

* PHP 8.2 or higher
* WordPress 6.8 or higher
* Single-site only — the plugin refuses network activation

## Repository layout

REPO LAYOUT

## Building

```bash
composer install
npm install
./build.sh
```

`build.sh` wipes `distribute` and rebuilds it every time. It checks that the plugin header version, the `KP_AGENT_READY_VERSION` constant and the readme stable tag all agree, copies the PHP and the supporting files, builds the autoloader, and generates `languages/kp-agent-ready.pot` with WP-CLI. `composer.json` ships alongside it.

There are no translation files in `source`. The `.pot` is generated on each build and lives only in `distribute/languages`.

## Releasing

Tag the commit and push it. The release workflow stages `distribute` under the plugin slug, zips it, and publishes the zip on the tag.

```bash
git tag v1.1.98
git push --tags
```

## Installing

Install `distribute` as the plugin directory, or download the zip from a release. There is nothing to configure to get started — every module ships off by default and is toggled from the settings page.

## Architecture



## Data



## Coding standards

PSR-12 with the WordPress coding standards on top. Class files are namespaced under `KP\AgentReady`. Every superglobal read is unslashed and sanitized, every output is escaped, and every write path checks a nonce and a capability.

Run Plugin Check against `distribute`, not `source` - the built tree is what ships.

## License

This project is licensed under the MIT License - see the LICENSE file for details.
