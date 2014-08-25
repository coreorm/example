<?php
/**
 * Example config
 */
return array(
    'default_database' => 'example',
    'database' => array(
        'example' => array(
            'dbname' => 'coreorm_examples',
            'adaptor' => \CoreORM\Adaptor\Pdo::ADAPTOR_MYSQL,
            'user' => 'coreorm',
            'pass' => 'example',
            'host' => '127.0.0.1'
        )
    ),
    'debug' => true,
    'apps' => array(
        '/todo' => array(
            'file' =>  'Todo.php',
            'desc' => '<p>A simple to-do list backed by CoreORM. It demonstrates the ' .
                      'basic usage of CRUD operation on objects instead of raw sql queries.</p>',
            'name' => 'To-do List'
        ),
    ),
);