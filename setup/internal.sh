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
wp menu create Services
wp menu item add-post Services 40 --title="Plugin reviews"
wp menu item add-post Services 26 --title="Plugin inspections"
wp menu item add-post Services 71 --title="Disclosure policy"
wp menu item add-post Services 69 --title="Terms of service"
wp menu location assign Services footer_first
wp menu create Github
wp menu item add-custom Github Whippet https://github.com/dxw/whippet
wp menu item add-custom Github "2FA plugin" https://github.com/dxw/2fa
wp menu item add-custom Github Iguana https://github.com/dxw/iguana
wp menu location assign Github footer_second
wp menu create "More from dxw"
wp menu item add-custom "More from dxw" dxw https://dxw.com
wp menu item add-custom "More from dxw" "Govpress by dxw" https://govpress.com
wp menu location assign "More from dxw" footer_third

wp option set show_on_front page
wp option set page_on_front 3052
wp option update blogdescription "WordPress security advisories, audit and assurance"
