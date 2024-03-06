<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude('var')
;

return (new PhpCsFixer\Config())
    ->setRules([
        'trailing_comma_in_multiline' => ['elements' => ['arguments']],
    ])
    ->setFinder($finder)
;
