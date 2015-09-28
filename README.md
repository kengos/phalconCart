# phalconCart

## Commands

### Migrations

Create migration files

```sh
bin/phinx create -c config/phinx.yml CreateUsers
```

Apply migration

```sh
bin/phinx migrate -c config/phinx.yml -e development
```

### Dev Server

Backend server

```sh
cd web/backend
php -S 0.0.0.0:8000
```

Frontend server

```sh
cd web/frontend
php -S 0.0.0.0:8000
```