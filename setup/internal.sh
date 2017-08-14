#!/bin/sh
set -e

##
## This code will be run during setup, INSIDE the container.
##

##############
# Config
##############
title="dxwsecurity"
theme=dxw-security-2017/templates
plugins="advanced-custom-fields-pro co-authors-plus page-excerpt dxw-sec-api"
content=/usr/src/app/setup/content

wp core install --skip-email --admin_user=admin --admin_password=admin --admin_email=admin@localhost.invalid --url=http://localhost --title="$title"

# Plugins
for plugin in $plugins
do
  if wp plugin is-installed $plugin
  then
    wp plugin activate $plugin
  else
    echo "\033[96mWarning:\033[0m Plugin '"$plugin"' could not be found. Have you installed it?"
  fi
done

# Theme
if wp theme is-installed $theme
then

  wp theme activate $theme
else
  echo "\033[96mWarning:\033[0m Theme '"$theme"' could not be found. Have you installed it?"
fi

# Content
if [ "$(ls -A $content)" ]
then
  if wp plugin is-installed wordpress-importer
  then
    wp plugin activate wordpress-importer
    for file in $content/*.xml
    do
      echo "Importing $file..."
      wp import $file --authors=skip
    done
  else
    echo "WordPress Importer not installed... installing now"
    wp plugin install wordpress-importer --activate
    for file in $content/*.xml
    do
      echo "Importing $file..."
      wp import $file --authors=skip
    done
    wp plugin uninstall wordpress-importer --deactivate
  fi

else
  echo "No content to be imported"
fi

# Other setup
wp menu create header-menu
wp menu item add-custom header-menu Advisories http://localhost/advisories
wp menu item add-custom header-menu Plugins http://localhost/plugins
wp menu item add-custom header-menu About http://localhost/about
wp menu location assign header-menu header
wp option set show_on_front page
wp option set page_on_front 3052
wp option update blogdescription "WordPress security advisories, audit and assurance"
