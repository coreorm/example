<?php
/**
 * Examples
 * CoreORM\Framework
 *
 */
use CoreORM\Utility\Config;
// show errors
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
require_once __DIR__ . '/../vendor/autoload.php';
// include config
$config = require_once __DIR__ . '/config.php';
Config::set($config);
debug(Config::get('debug'));