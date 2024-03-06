code-style-check:
	./vendor/bin/phpcs --standard=phpcs.xml.dist

code-style-fix:
	./vendor/bin/phpcbf --standard=phpcs.xml.dist

code-check:
	./vendor/bin/phpmd src text ./.tools/phpmd/ruleset.xml
	./vendor/bin/phpstan analyze -c phpstan.dist.neon src
