- `composer.json`

```
{
    "require": {
			"friendsofphp/php-cs-fixer": "^3.0"
    }
}
```
- Konfiguriere Regeln in `.php-cs-fixer.rules.php`. Die Datei ist von mir. Sie enthält die globalen Regeln, die aus den Konfigurationsdateien anderer Repositories gezogen werden.

- Lege in dem Repository das gefixt werden soll eine Datei `.php-cs-fixer.php` an. Am Beispiel von Repo `plg_system_bs3ghsvs_bs5` sieht die z.B. so aus:

```PHP
<?php
$mainFinder = PhpCsFixer\Finder::create()
	->exclude('node_modules')
	->exclude('build')
	->exclude('dist')
	->in(
		[
			__DIR__,
		]

	);

$config = new PhpCsFixer\Config();

$phpCsFixerRules = require_once '../php-cs-fixer-ghsvs/.php-cs-fixer.rules.php';

$config
	->setRiskyAllowed(true)
	->setIndent("\t")
	->setRules($phpCsFixerRules)
	->setFinder($mainFinder);

return $config;
```

- Lege in `package.json` dieses Repos hier (`php-cs-fixer-ghsvs`) zwei npm-run-Scripts an:

```json
...
	"scripts": {
...
		"plg_system_bs3ghsvs_bs5Dry": "vendor/bin/php-cs-fixer fix --config \"../plg_system_bs3ghsvs_bs5/.php-cs-fixer.php\" --dry-run",
		"plg_system_bs3ghsvs_bs5": "vendor/bin/php-cs-fixer fix --config \"../plg_system_bs3ghsvs_bs5/.php-cs-fixer.php\""
...
	}
...

```
- https://github.com/FriendsOfPHP/PHP-CS-Fixer#usage


- `cd /mnt/z/git-kram/php-cs-fixer-ghsvs/`
- `composer update`

Meine Testdateien liegen in `src-test/`.

Ausführen:
- `vendor/bin/php-cs-fixer fix`

`--dry-run` zeigt nur Liste von Dateien, die ausgeführt würden und fehlerhafte Dateien, die nicht ausgeführt werden können.
- `vendor/bin/php-cs-fixer fix --dry-run`

Einzelne Datei:
- `vendor/bin/php-cs-fixer fix src-test/blubber.php`
