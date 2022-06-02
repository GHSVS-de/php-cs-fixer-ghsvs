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
	// psr-1
	# PHP code MUST use only UTF-8 without BOM (remove BOM).
	'encoding'                              => true,
	// psr-2
	# The keyword elseif should be used instead of else if.
	'elseif'                                => true,
	'single_blank_line_at_eof'              => true,
	'no_spaces_after_function_name'         => true,
	'blank_line_after_namespace'            => true,
	'line_ending'                           => true,
	# The PHP constants true, false, and null MUST be written using the correct casing.
	'constant_case'                         => ['case' => 'lower'],
	# Zeugs wie foreach, if etc. in Kleinschrift.
	'lowercase_keywords'                    => true,
	'method_argument_space'                 => true,
	'single_import_per_statement'           => true,
	'no_spaces_inside_parenthesis'          => true,
	'single_line_after_imports'             => true,
	'no_trailing_whitespace'                => true,
	// symfony
	'no_whitespace_before_comma_in_array'   => true,
	'whitespace_after_comma_in_array'       => true,
	'no_empty_statement'                    => true,
	'simplified_null_return'                => true,
	'no_extra_blank_lines'                  => true,
	'function_typehint_space'               => true,
	'include'                               => true,
	'no_alias_functions'                    => true,
	'no_trailing_comma_in_list_call'        => true,
	'trailing_comma_in_multiline'           => ['elements' => ['arrays']],
	'no_blank_lines_after_class_opening'    => true,
	'phpdoc_trim'                           => true,
	'blank_line_before_statement'           => ['statements' => ['return', 'try', 'if', 'foreach', 'switch']],
	'no_trailing_comma_in_singleline_array' => true,
	'single_blank_line_before_namespace'    => true,
	'cast_spaces'                           => true,
	# Lösche ungenutze use-Zeilen.
	'no_unused_imports'                     => true,
	# Sortiere use-Zeilen.
	'ordered_imports' => ['sort_algorithm' => 'alpha'],
	'no_whitespace_in_blank_line'           => true,
	# Nach dem ! ein Leerzeichen.
	//'not_operator_with_successor_space' => true,
	### GHSVS:
	# z.B. __dir__ nach __DIR__. https://www.php.net/manual/de/language.constants.magic.php
	'magic_constant_casing'           => true,
	# Spacing to apply around concatenation operator.
	'concat_space' => ['spacing' => 'one'],
	/**
		* PHP 7+ zend_try_compile_special_func compiles certain PHP Functions to opcode which is faster
		* @see https://github.com/php/php-src/blob/9dc947522186766db4a7e2d603703a2250797577/Zend/zend_compile.c#L4192
		*/
	'native_function_invocation' => [
		'include' => ['@compiler_optimized'],
		'scope' => 'namespaced',
		'strict' => true
	],
	'no_mixed_echo_print' => ['use' => 'echo'],
	'array_syntax' => ['syntax' => 'short'],
	'normalize_index_brace' => true,
	'trim_array_spaces' => true,
	'full_opening_tag' => true,
	'linebreak_after_opening_tag' => true,
	'no_closing_tag' => true,
	'braces' => [
		'position_after_functions_and_oop_constructs' => 'next',
		'position_after_control_structures' => 'next',
	],
	'class_attributes_separation' => ['elements' => [
		'const' => 'one',
		'method' => 'one',
		'property' => 'one',
		'trait_import' => 'none',
		'case' => 'none'
	]],
	'no_leading_namespace_whitespace' => true,
];
