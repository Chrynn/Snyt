# Snyt

website for restaurant with small CMS

> more tech-info find in project's Wiki (tab in Github repository)

## Start project

- start containers
```
docker-compse up -d
```

- join php container
```
docker exec php bash
```

- install dependencies
```
composer install
```

- add `local.neon` file to `config` folder
```neon
parameters:

database:
    dsn: 'mysql:host=127.0.0.1;dbname=test'
    user:
    password:
```

- run `localhost:80` in your browser