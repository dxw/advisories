#!/bin/sh
set -e

##
## This code will be run during setup, INSIDE the container.
##

##############
# Config
##############
title="dxwsecurity"
theme=dxw-advisories
plugins="advanced-custom-fields-pro akismet co-authors-plus dxw-security-api page-excerpt publishing-reminders wp-to-twitter"
content=/usr/src/app/setup/content

wp core install --skip-email --admin_user=admin --admin_password=admin --admin_email=admin@localhost.invalid --url=http://localhost --title="$title"

for plugin in $plugins
do
  if wp plugin is-installed $plugin
  then
    wp plugin activate $plugin 
  else
    echo "\033[96mWarning:\033[0m Plugin '"$plugin"' could not be found. Have you installed it?"
  fi
done

if wp theme is-installed $theme
then
  
  wp theme activate $theme
else
  echo "\033[96mWarning:\033[0m Theme '"$theme"' could not be found. Have you installed it?"
fi

import() {
  for file in $content/*.xml
  do
    echo "Importing $file..."
    wp import $file --authors=skip
  done
}

if [ "$(ls -A $content)" ]
then
  if wp plugin is-installed wordpress-importer
  then
    wp plugin activate wordpress-importer
    import
  else
    echo "WordPress Importer not installed... installing now"
    wp plugin install wordpress-importer --activate
    import
    wp plugin uninstall wordpress-importer --deactivate
  fi
else
  echo "No content to be imported"
fi
