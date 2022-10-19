<?php

use PhpCsFixer\Finder;

$rules = [
    '@PSR1' => true,
    '@PSR2' => true,
    '@PSR12' => true,
//    '@PhpCsFixer' => true,
    'blank_line_after_opening_tag' => true,
//    'declare_strict_types' => true,
    'no_unused_imports' => true, // remove when @PhpCsFixer rule will be enabled
    'ordered_imports' => [
        'sort_algorithm' => 'length',
    ],

    'escape_implicit_backslashes' => true,
    'integer_literal_case' => true,
    'native_function_type_declaration_casing' => true,
    'no_useless_else' => true,
    'php_unit_method_casing' => true,
    'switch_continue_to_break' => true,
    'no_blank_lines_after_class_opening' => true,
    'single_line_after_imports' => true,
    'explicit_indirect_variable' => true,
    'single_quote' => [
        'strings_containing_single_quote_chars' => false,
    ],

    // currently disabled rules from @PhpCsFixer
    // @PhpCsFixer is still not enabled
    'ordered_class_elements' => false,
    'class_attributes_separation' => false,
    'yoda_style' => false,
    'multiline_whitespace_before_semicolons' => false,
    'concat_space' => false,
    'protected_to_private' => false,
    'trailing_comma_in_multiline' => true,
    'blank_line_before_statement' => true,
    'operator_linebreak' => false,

    'no_superfluous_phpdoc_tags' => false,
    'phpdoc_annotation_without_dot' => false,
    'phpdoc_add_missing_param_annotation' => false,
    'phpdoc_summary' => false,
    'phpdoc_types' => false,
    'phpdoc_order' => false,
    'phpdoc_order_by_value' => false,
    'phpdoc_separation' => false,
    'phpdoc_tag_type' => false,
    'single_line_comment_spacing' => true,
];

$domains_path = getcwd() . '/..';

$finder = Finder::create()
    ->in([
            $domains_path. "/User/",
            $domains_path. "/UseCases/",
            $domains_path. "/Auth/",
    ])
    ->name('*.php')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

$config = new PhpCsFixer\Config();
$config
    ->setRules($rules)
    ->setRiskyAllowed(true)
    ->setUsingCache(true)
    ->setCacheFile('.php-cs-fixer.cache')
    ->setFinder($finder)
;

return $config;
