- `composer.json`

```
{
    "require": {
			"friendsofphp/php-cs-fixer": "^3.0"
    }
}
```
- Konfiguriere `.php-cs-fixer.dist.php`
Es können auch Pfade/Dateien außerhalb dieses Repositories eingetragen werden.

- Oder nutze `.php-cs-fixer.php`-Datei(en), die du z.B. in anderen Repositories ablegst.
With the ``--config`` option you can specify the path to the
``.php-cs-fixer.php`` file.


- `cd /mnt/z/git-kram/php-cs-fixer-ghsvs/`
- `composer update`

Meine Testdateien liegen in `src-test/`.

Ausführen:
- `vendor/bin/php-cs-fixer fix`

`--dry-run` zeigt nur Liste von Dateien, die ausgeführt würden und fehlerhafte Dateien, die nicht ausgeführt werden können.
- `vendor/bin/php-cs-fixer fix --dry-run`

Einzelne Datei:
- `vendor/bin/php-cs-fixer fix src-test/blubber.php`
