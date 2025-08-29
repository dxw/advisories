# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [v2.0.0] - 2025-08-29

### Removed

* Remove all support for user avatars
* Remove gravatar.com from the CSP

## [v1.1.0] - 2025-08-29

### Changed

* Add Gravatar to img-src in CSP
* Only supply a CSP on the front-end of the site
* Do not supply a CSP on the WordPress login page
* Remove 'unsafe-inline' from script-src in CSP and add a nonce to all scripts

## [v1.0.1] - 2025-06-26

### Changed

* Explicitly do not cache preview pages

## [v1.0.0] - 2025-06-24

### Added

* Add Cache-Control headers to site
* Add Strict-Transport-Policy header to site when served on non-local environments
* Add Content-Security-Policy to site
