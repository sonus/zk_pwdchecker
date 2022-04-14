GROUP = zsk
DEV_IMAGE = $(GROUP)/pwd
DOCKER_NETWORK = host
PHP_PATH = /usr/bin/php

ifeq ($(WORKSPACE),)
    MOUNTS:=-w /apps -v `pwd`/:/apps
else
    MOUNTS:=-w $(WORKSPACE)/ --volumes-from=$(HOSTNAME)
endif

define docker_run
	docker run --rm \
	    $(MOUNTS) \
	    ${1} \
	    ${2} \
	    ${3} \
	    ${4} \
	    ${5}
endef

dev-build:
	docker build -t $(DEV_IMAGE) .

composer-require-package:
	@read -p "Enter package name:" package; \
	$(call docker_run, $(DEV_IMAGE), composer require $$package -vvvv --ignore-platform-reqs)

composer-install:
	$(call docker_run, $(DEV_IMAGE), composer, install --ignore-platform-reqs)

composer-update:
	$(call docker_run, $(DEV_IMAGE), composer, update --ignore-platform-reqs)

# TODO : Run it with docker image
phpunit:
	composer run test

# TODO : Run it with docker image
phpcs-fix:
	composer run php-cs