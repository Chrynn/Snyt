# Welcome to Snyt repository project

## Used technologies

- `Layouts` Adobe XDesign
- `Devops` [Docker](https://www.docker.com/) & Apache virtual server
- `Frontend` HTML stylesheet [Latte](https://latte.nette.org/cs/)
- `Backend` [PHP](https://www.php.net/) framework [Nette](https://nette.org/cs/)
- `Database` MYSQL with [Adminer](https://www.adminer.org/cs/) interface, [Dibi](https://dibiphp.com/cs/) (database layer)

## Start project

- clone repository
```
git clone git@github.com:Chrynn/Snyt.git
```

- start containers
```
docker-compse up -d
```

- join php container
```
docker exec -it snyt-php-1 bash
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

- identify yourself to git

```
git config --global user.name "Your name"
```
```
git config --global user.email "you@example.com"
```

- run `localhost:80` in your browser