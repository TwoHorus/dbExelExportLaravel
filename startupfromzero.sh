composer update
./overviewlaravel.sh
./rebuildDB.sh
open ./redirectafter3seconds.html
php artisan serve --host=0.0.0.0 --port=8000
