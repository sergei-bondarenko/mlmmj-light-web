#!/bin/bash

if [ "$#" -ne 0 ]; then
  echo "This script prepaire system for mlmmj-light-web installation."
  exit 1
fi

install mlmmj, apg, apache2, exim, php_mod, altermime

useradd -r -s /bin/false mlmmj
chown mlmmj:mlmmj -R /var/spool/mlmmj
chmod -R g+s /var/spool/mlmmj
chmod -R g+w /var/spool/mlmmj
#change apache user in /etc/apache2/envvars
#exim config and filter
#/usr/bin/mlmmj-amime-receive
