.PHONY: qa phpstan phpcs phpmd codecept

PHP=docker run --rm -it -v $(shell pwd):/project -w /project jeckel/php-test:7.3-cli-alpine

default: qa
qa: phpstan phpcs phpmd codecept

phpstan:
	@${PHP} ./vendor/bin/phpstan analyse

phpcs:
	@${PHP} ./vendor/bin/phpcs

phpmd:
	@${PHP} ./vendor/bin/phpmd src text cleancode,codesize,design,naming,unusedcode

codecept:
	@${PHP} ./vendor/bin/codecept run --coverage

test: codecept
