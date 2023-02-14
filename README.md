# dxw advisories

In the course of delivering and hosting WordPress websites for the public sector, we undertake a significant quantity of assurance work, to ensure that the sites we build and the plugins they rely on are secure.
We publish information about that work on this site.

* [Production](https://security.dxw.com)
* [Staging](https://advisories.staging.dxw-govpress.dalmatian.dxw.net)

Please use `develop/main` branches.

## Project management
- [Trello](https://trello.com/b/Yl4BLYGS/security-dxw-com)


## Ghost Inspector tests

- [Production](https://app.ghostinspector.com/suites/62504446fe7446ec5add4df6)
- [Staging](https://app.ghostinspector.com/suites/623b40d4f29837f4fb8fd15e)

## Getting started

Run the setup (first-time run only):

```bash
script/setup
```

Start the server:

```bash
script/server
```

You can also run the server in detached mode (i.e. without any output to your console):

```bash
script/server -d
```

Once the server has started, the following containers will be running:

* WordPress: http://localhost (username/password: `admin`/`admin`)
* MailCatcher: http://localhost:1080
* Beanstalk Console: http://localhost:2080
* MySQL: http://localhost:3306 (username/password: `root`/`foobar`)

For a /bin/sh console running on the WordPress container, run `script/console`
For a MySQL console, run `bin/wp db cli`

## Plugins & Themes

Use [Whippet](https://github.com/dxw/whippet) to manage plugins or external themes.

See the [theme README](wp-content/themes/dxw-security-2017/README.md) for more on how to develop the theme.

## API

The site exposes an JSON API of plugin inspections:

### Usage

```bash
curl -L https://security.dxw.com/wp-json/v1/inspections/{{plugin slug}}
```

For example:

```bash
curl -L https://security.dxw.com/wp-json/v1/inspections/twitter-widget-pro
```

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
