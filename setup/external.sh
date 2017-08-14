#!/bin/sh
set -e

##
## This code will be run during setup, OUTSIDE the container.
##
## Because `whippet` running inside the container wouldn't be able to connect
## to private repositories.
##

whippet deps install
