## Used by
- [mod_administratorlinkghsvs](https://github.com/GHSVS-de/mod_administratorlinkghsvs)
- [mod_contactghsvs](https://github.com/GHSVS-de/mod_contactghsvs)
- [mod_custom_blankghsvs](https://github.com/GHSVS-de/mod_custom_blankghsvs)
- [mod_splideghsvs](https://github.com/GHSVS-de/mod_splideghsvs)
- [mod_tocghsvs](https://github.com/GHSVS-de/mod_tocghsvs)
- [plg_system_bs3ghsvs_bs5](https://github.com/GHSVS-de/plg_system_bs3ghsvs_bs5)
- [plg_system_characterscounterghsvs](https://github.com/GHSVS-de/plg_system_characterscounterghsvs)
- [plg_system_convertformsghsvs](https://github.com/GHSVS-de/plg_system_convertformsghsvs)
- [plg_system_hyphenateghsvs](https://github.com/GHSVS-de/plg_system_hyphenateghsvs)
- [plg_system_importfontsghsvs](https://github.com/GHSVS-de/plg_system_importfontsghsvs)
- [plg_system_onuserghsvs](https://github.com/GHSVS-de/plg_system_onuserghsvs)
- [plg_content_prismhighlighterghsvs](https://github.com/GHSVS-de/plg_content_prismhighlighterghsvs)
- [tpl_bs4ghsvs](https://github.com/GHSVS-de/tpl_bs4ghsvs)

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
