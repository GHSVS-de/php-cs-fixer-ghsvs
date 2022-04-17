

## Konfiguration
### Globale Rules/Regeln
- Konfiguriere Regeln in [`.php-cs-fixer.rules.php`](.php-cs-fixer.rules.php). Die Datei ist von mir. Sie enthält die globalen Regeln, die aus den Konfigurationsdateien anderer Repositories gezogen werden. Ich nenne sie folgend "Kind-Repos".

- Siehe auch https://github.com/FriendsOfPHP/PHP-CS-Fixer#usage

### Konfiguration eines Kind-Repos
- Lege in dem Repository, das gefixt werden soll eine Datei `.php-cs-fixer.php` an. Am Beispiel von Repo `plg_system_bs3ghsvs_bs5` sieht die z.B. so aus:

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

### npm-run-Scripte für Kind-Repo
- Lege in `package.json` dieses Repos hier (`php-cs-fixer-ghsvs`) je zwei npm-run-Scripte pro Kind-Repo an. Am Beispiel des Kind-Repos `plg_system_bs3ghsvs_bs5`:

```json
"scripts": {
 "plg_system_bs3ghsvs_bs5Dry": "vendor/bin/php-cs-fixer fix --config \"../plg_system_bs3ghsvs_bs5/.php-cs-fixer.php\" --dry-run",
 "plg_system_bs3ghsvs_bs5": "vendor/bin/php-cs-fixer fix --config \"../plg_system_bs3ghsvs_bs5/.php-cs-fixer.php\""
}
```
### Starten des Fixers für Kind-Repo
Am Beispiel des Repos `plg_system_bs3ghsvs_bs5`.
- `cd /mnt/z/git-kram/php-cs-fixer-ghsvs/`
`---dry-run`
- `npm run plg_system_bs3ghsvs_bs5Dry`
oder echter Fix
- `npm run plg_system_bs3ghsvs_bs5`

-----------------------------------------------------

# My personal build procedure (WSL 1, Debian, Win 10)

## `composer.json`

```json
{
    "require": {
			"friendsofphp/php-cs-fixer": "^3.0"
    }
}
```

## Installation
- `composer update`

## Ausführen:
Siehe oben.
