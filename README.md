# dxw Security

In the course of delivering and hosting WordPress websites for the public sector, we undertake a significant quantity of assurance work, to ensure that the sites we build and the plugins they rely on are secure.
We publish information about that work on this site.

* [Production](https://security.dxw.com)
* [Staging](https://security.staging.dxw.net)

Please use `develop/master` branches

## Project management
- [Trello](https://trello.com/b/Yl4BLYGS/security-dxw-com)


## Ghost Inspector tests
- TBC (Currently undergoing a redesign)

## Setup & running
- This project is setup via [WPC](https://github.com/dxw/wpc). To setup the project on first run, from the app root:

```
docker-compose up -d
bin/setup
```

(If you get a mysql error the first time, mysql hasn't finished setting up - just run `bin/setup` again).

To run the project after that, just:

`docker-compose up -d`

And to stop it:

`docker-compose down`

Admin username & password is `admin`.

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
### API Unit Tests

The API code is packaged as a plugin.

To run the tests, run `vendor/bin/peridot specs` from the plugin directory.

The first time you do this you'll need to `composer install` from the plugin
directory.
