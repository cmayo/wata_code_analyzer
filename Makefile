code-style-check:
	./vendor/bin/phpcs --standard=phpcs.xml.dist

code-style-fix:
	./vendor/bin/phpcbf --standard=phpcs.xml.dist

code-check:
	./vendor/bin/phpmd src text ./.tools/phpmd/ruleset.xml
	./vendor/bin/phpstan analyze -c phpstan.dist.neon src

dehook:
	rm .git/hooks/commit-msg
	rm .git/hooks/post-checkout
	rm .git/hooks/post-commit
	rm .git/hooks/post-merge
	rm .git/hooks/post-rewrite
	rm .git/hooks/pre-commit
	rm .git/hooks/pre-push
	rm .git/hooks/prepare-commit-msg
