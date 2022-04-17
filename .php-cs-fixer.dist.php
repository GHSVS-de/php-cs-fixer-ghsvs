<?php
/*
Siehe README.md
 */

$topFilesFinder = PhpCsFixer\Finder::create()
	->in(
		[
			__DIR__ . '/src-test/nur-test/mod_articles_category',
		]
	)
	->files()
	->depth(0);

$mainFinder = PhpCsFixer\Finder::create()
	->in(
		[
			__DIR__ . '/src-test',
		]
	)
	->append($topFilesFinder)
	;

$config = new PhpCsFixer\Config();

// Meine Rules einbinden ($phpCsFixerRules).
$phpCsFixerRules = require_once '.php-cs-fixer.rules.php';

$config
	->setRiskyAllowed(true)
	->setIndent("\t")
	->setRules($phpCsFixerRules)
	->setFinder($mainFinder);

return $config;
