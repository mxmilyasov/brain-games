install:
	composer install

update:
	composer update

brain-games:
	./bin/brain-games

brain-even:
	./bin/brain-even

validate:
	composer validate

lint:
	composer run-script phpcs -- --standard=PSR12 src bin