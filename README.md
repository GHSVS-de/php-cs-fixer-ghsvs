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

#### PSR-12-Regeln verwenden?
Vorsicht! PSR-12 verwendet für die Einrückung 4 Leerzeichen pro ehemals 1 Tabulator.

Ich verwende das PSR-12-Set deshalb nur, wenn ich Code im Joomla-Repo einreichen will.

Joomla rennt jeder Spinnerei hinterherrennt, selbst, wenn wie hier Code für manche Leute, die hohen Zoom im Editor benötigen, unlesbar wird, weil die Zeilen ellenlang und unruhig werden (Hintergrund: Man kann in einem Editor einen Tab so konfigurieren, dass er z.B. als 2 Leerzeichen angezeigt wird, aber nicht, dass 4 Leerzeichen als 2 im Editor dargestellt werden).

Wenn du PSR-12 verwenden willst, dann ändere in obigem Code diese Zeilen:

```PHP
...
$phpCsFixerRules = require_once '../php-cs-fixer-ghsvs/.php-cs-fixer.rules_psr12.php;
...
$config
	// ->setRiskyAllowed(true)
	// ->setIndent("\t")
	->setRules($phpCsFixerRules)
	->setFinder($mainFinder);
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
#### `---dry-run`
- `npm run plg_system_bs3ghsvs_bs5Dry`
#### oder echter Fix
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
- `cd /mnt/z/git-kram/php-cs-fixer-ghsvs/`
- `composer update`

## Ausführen pro Kind-Repo
Siehe oben.

## Auch ein guter Tipp
Mir aber derzeit zu aufwändig.

https://laravel-news.com/sharing-php-cs-fixer-rules-across-projects-and-teams
