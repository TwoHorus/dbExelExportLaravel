#!/usr/bin/env bash
clear
echo 'doing the following to accept all changes and clear all caches:'
echo ''
echo 'php artisan view:clear
php artisan cache:clear
php artisan route:clear
php artisan route:list'
if [ "$1" == "dump" ];
then
  echo 'composer dump-autoload -o'
  echo ''
  composer dump-autoload -o
else
  echo ''
fi
php artisan view:clear \
&& php artisan cache:clear \
&& php artisan route:clear \
&& php artisan route:list
echo ''
