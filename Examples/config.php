<?php
/**
 * Example config
 */
return array(
    'database' => array(
        'default' => 'example',
        'example' => array(
            'dbname' => 'coreorm_examples',
            'adaptor' => \CoreORM\Adaptor\Pdo::ADAPTOR_MYSQL,
            'user' => 'coreorm',
            'pass' => 'example'
        )
    ),
    'debug' => true,
);