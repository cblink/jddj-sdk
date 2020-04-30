<?php
$header = <<<EOF
This file is part of the cblink/jddj-sdk.

(c) 牟勇 <my242551325@gmail.com>

This source file is subject to the MIT license that is bundled.
EOF;

return PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setRules([
        // 遵循 PSR2 的标准
        '@PSR2' => true,
        // 头部注释内容
        'header_comment' => ['header' => $header],
        // array 数组语法：使用 [] 替代 array()
        'array_syntax' => array('syntax' => 'short'),
        // 命名空间声明后，必须留有一个空白行
        'blank_line_after_namespace' => true,
        // 在以下关键字上，增加一个空白行
        'blank_line_before_statement' => [
            'statements' => [
                'return',  'throw', 'try'
            ],
        ],
        // 在类型转换前，增加一个空格
        'cast_spaces' => ['space' => 'single'],
        // 按导入类的长度排序
        'ordered_imports' => ['sort_algorithm' => 'length'],
        // 确保在文件<?php 同行上没有代码， 并增加一个空行
        'blank_line_after_opening_tag' => true,
        // 括号中允许使用单行lambda表示法
        'braces' => ['allow_single_line_closure' => true],
        // 为空的类型中删除多余的空格。
        'compact_nullable_typehint' => true,
        // 连接符 . 默认使用一个空格隔开s
        'concat_space' => ['spacing' => 'one'],
        // declare 语句中的等于号是否需要空格
        'declare_equal_normalize' => ['space' => 'none'],
        // 确保函数的参数与其类型之间有一个空格
        'function_typehint_space' => true,
        // 使用new关键字创建的所有实例都必须带有括号
        'new_with_braces' => true,
        // 确保方法多行参数列表的每个参数都在其自己的行上
        'method_argument_space' => ['on_multiline' => 'ensure_fully_multiline'],
        // 不应该存在空的结构体
        'no_empty_statement' => true,
        // 在 use 语句中，取消前置斜杠
        'no_leading_import_slash' => true,
        // 在声明命令空间的时候，不允许有前置空格
        'no_leading_namespace_whitespace' => true,
        // 删除空行中的空格
        'no_whitespace_in_blank_line' => true,
        // 声明返回类型与 : 后面增加一个空格
        'return_type_declaration' => ['space_before' => 'none'],
        // 每个use必须单行完成
        'single_trait_insert_per_statement' => true,
        // 替换<>运算符为!=
        'standardize_not_equals' => true,
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->exclude('vendor')
            ->in(__DIR__)
    )
;