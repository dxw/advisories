# dxw Security

In the course of delivering and hosting WordPress websites for the public sector, we undertake a significant quantity of assurance work, to ensure that the sites we build and the plugins they rely on are secure.
We publish information about that work on this site.

* [Production](https://security.dxw.com)
* [Staging](https://security.staging.dxw.net)

Please use `develop/master` branches

## Project management
- [Trello](https://trello.com/b/Yl4BLYGS/security-dxw-com)

## Unit Tests

Run the tests with `vendor/bin/peridot specs`

The first time you do this you'll need to `composer install` from the root of
the project.

## Ghost Inspector tests
- TBC (Currently undergoing a redesign)

## API

The site exposes an JSON API of plugin inspections:

### Usage

    https://security.dxw.com/wp-json/v1/inspections/{{plugin slug}}
    e.g. https://security.dxw.com/wp-json/v1/inspections/twitter-widget-pro

### Example output

```json
[
  {
    "name": "Twitter Widget Pro",
    "slug": "twitter-widget-pro",
    "versions": "2.5.4",
    "date": "2013-07-18T18:37:05+00:00",
    "url": "http://localhost:8000/plugins/twitter-widget-pro/",
    "result": "No issues found"
  }
]
```
