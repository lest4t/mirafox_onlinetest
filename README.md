# Mirafox Test
Дополнительное тестовое задание от Mirafox

### Развертывание проекта

Для проекта нужно чтобы был включен mod_rewrite на стороне сервера.


Для удобства можно создать отдельный VirtualHost (mirafox.loc for example) или 
можно все положить в папку для доступа по пути http://localhost/


Да nginx'а использовать rewrite правила:

```
location / {
    rewrite ^/$ /web/ last;
    rewrite /(.*) /web/$1 last;
}
```

Для apach'а существует htaccess-файлы. 

```
- /localhost
-- /config
-- /controllers
-- /dumps
-- /lib
-- /models
-- /views
-- /web
--- index.php
--- .htaccess
-- .htaccess
```

#### База данных

Проект использует БД MySQL.

В папке "dumps" есть дамп-файл mirafox.sql.

С помощью phpMyAdmin импортируйте данный файл.

В файле config/config.php внесите соответствующие изменения дла подключения к БД.

```
// Хост MySQL
Config::set('db_host', 'localhost');
// Пользователь MySQL
Config::set('db_user', 'mirafox');
// Пароль пользователя MySQL
Config::set('db_pass', 'mirafox');
// Имя DB
Config::set('db_name', 'mirafox');
```
