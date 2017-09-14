Миграции и сиды
=========
Выполнить миграцию: `php artisan migrate`

Откатить миграцию: `php artisan migrate:rollback`

Накатить данные: `php artisan db:seed`

Основные команды для разработки
=========
Создать модель: `php artisan make:model Model`

Создать модель + миграцию + контроллер: `php artisan make:model -mc`

Создать контроллер: `php artisan make:controller NameController`

Создать контроллер почты: `php artisan make:mail MailName`

Запустить слушатель очередей: `php artisan queue:listen`

Запустить слушатель очередей как демона: `php artisan queue:work --daemon --tries=3`

Если не работает что то после создания классов/моделей, или надо просто пересобрать проект:
`composer dump-autoload` затем `php artisan optimize`

