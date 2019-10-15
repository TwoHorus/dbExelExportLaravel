rm database/db.sqlite 2&> /dev/null
 touch database/db.sqlite
php artisan migrate && php artisan db:seed
