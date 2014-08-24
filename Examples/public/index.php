<?php
/**
 * this is the public facing sample site single entry
 */
use Slim\Slim;
use CoreORM\Utility\Config;
require_once __DIR__ . '/../header.php';
define('__TMPPATH___', __DIR__ . '/../templates/');
define('__APPATH___', __DIR__ . '/../App/');

// now we decide whether to include or not... NOTE, all posts are ajax, so let's just use post to decide
$hdr = $ftr = null;
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // header
    ob_start();
    require_once __TMPPATH___ . '/header.php';
    $hdr = ob_get_clean();
    // footer
    ob_start();
    require_once __TMPPATH___ . '/footer.php';
    $ftr = ob_get_clean();
}
// include body
$uri = $_SERVER['REQUEST_URI'];
$uri = parse_url($uri, PHP_URL_PATH);
$app = Config::get('apps.' . $uri);
$dbConf = Config::get('database');
foreach ($dbConf as $k => $v) {
    setDbConfig($k, $v);
}
// main page
ob_start();
if (!empty($app)) {
    require_once __APPATH___ . $app;
} else {
    require_once __TMPPATH___ . 'index.php';
}
$body = ob_get_clean();
// now compose
echo $hdr . $body . $ftr;