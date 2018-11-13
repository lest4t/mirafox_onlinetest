# Mirafox Test
Дополнительное тестовое задание от Mirafox

Настройки для nginx'а:

```
root /home/lest4t/www/mirafox_onlinetest/;
index index.php;

location / {
    rewrite ^/$ /web/ last;
    rewrite /(.*) /web/$1 last;
}
```

Для apache есть .htaccess.

Нужен mod_rewrite.
