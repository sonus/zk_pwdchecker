# ZK_PWD

API to validate passwords


## Local Development Setup Guide

### Requirements

* Docker

## Installation

Start the application in your local environment by running the following command.

*Please NOTE:* This command would take some time when you run it for the first time since it creates vendors, DB, DB migration etc.

```sh
docker network create api-net
docker-compose up --build
```

You can now view the application swagger interface at [http://localhost:8080/api](http://localhost:8080/api)
## Access Database

You can connect to DB using the following credentials
* Hostname: `localhost`
* username: `root`
* password: `root`

## Dev-tools

### Run PHP unit tests

```sh
    make phpunit
```

### Run php-cs-fixer

```sh
    make phpunit
```

### Troubleshoot

1. Already running local mysql

_You can either stop running MySQL instance or re-map the port configurations on following files: ``docker-compose.yml``,``.env.local``_
