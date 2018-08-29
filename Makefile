help:
	@perl -ne 'print if /^[0-9a-zA-Z_-]+:.*?## .*$$/' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-20s\033[0m %s\n", $$1, $$2}'

install: ## Install all depencencies
	@composer install

test: install ## Run Unit testing
	@./vendor/bin/phpunit --bootstrap vendor/autoload.php --testdox tests

.PHONY: install test
