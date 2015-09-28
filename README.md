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