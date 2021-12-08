# PHP POO project crud

Ressources
```
https://whimsical.com/afpa-crm-THwRnYHX7yk5dd82brrtBT
https://dbdiagram.io/d/618b9fbd02cf5d186b4f1ee7
```

Run server
```bash
php -S 127.0.0.1:8000 -t ./public
```

### Composer autoloader

Run composer
```bash
composer init
composer dump-autoload
```

```
 "autoload": {
        "psr-4": {
            "App\\src\\" : "src/",
            "App\\config\\": "config/"
        }
    },
```

### PHP STAN

[phpstant](https://github.com/phpstan/phpstan)
Run install
```bash
composer require --dev phpstan/phpstan
```

Run analyse
```bash
vendor/bin/phpstan analyse -l 5 src
```

You can create phpstan.neon.dist
```
parameters:
    level: 0
    paths:
        - src
```

And run
```bash
vendor/bin/phpstan analyse
```

## Requirements

- Linux (Ubuntu 20.04 or other)
- PHP

Your can use Dcoker for mount php workflow [simple-docker-php](https://github.com/ThomasMouchelet/simple-docker-php)

## Author

- [@ThomasMouchelet](https://github.com/ThomasMouchelet)


