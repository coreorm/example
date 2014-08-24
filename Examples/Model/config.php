<?php
/**
 * this is the model generator
 * config file
 *
 */
$dir = __DIR__;
return [
    'database' => array(
        'dbname' => 'coreorm_examples',
        'adaptor' => \CoreORM\Adaptor\Pdo::ADAPTOR_MYSQL,
        'user' => 'coreorm',
        'pass' => 'example',
        'host' => '127.0.0.1'
    ),
    'path' => $dir,
    'namespace' => 'Example\\Model',
    'model' => [
        // to-do list
        'todo' => array(
        ),
    ]
];