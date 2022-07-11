<?php
/*
Von mir ausgelagerte Rules, damit ich sie nicht immer wieder neu schreiben muss.

SIEHE AUCH php-cs-fixer-ghsvs\vendor\friendsofphp\php-cs-fixer\src\RuleSet\Sets\PSR12Set.php
DAS ERBT php-cs-fixer-ghsvs\vendor\friendsofphp\php-cs-fixer\src\RuleSet\Sets\PSR2Set.php
EVENTUELL KANNST DU DAS uNTEN aUCH vereinfachen durch ein

'@PSR12' => true,

Ich bin nicht ganz sicher, aber nachdem bei Joomla das Umstellen auf PSR12 dazu geführt hat, dass 1 Tab durch 4 Spaces ersetzt wird, mag ich das wohl so plump nicht!!!!
SIEHE DAZU aber auch das $config->setIndent("\t") in den .php-cs-fixer.php, was das hoffentlich dann overruled.

 */
echo 'Ich lade Rules aus ' . __FILE__ . PHP_EOL . PHP_EOL;

return
[
	'@PSR12' => true,
];
