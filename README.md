# Mirafox Test
Дополнительное тестовое задание от Mirafox

Настройки для nginx'а:

```
location / {
    rewrite ^/$ /web/ last;
    rewrite /(.*) /web/$1 last;
}
```

Для apache есть .htaccess.

Нужен mod_rewrite.
