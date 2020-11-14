<?php

require_once("vendor/autoload.php");
require_once("vendor/_classes/crud/Crud.php");
require_once("vendor/_classes/crud/GlobalClass.php");
require_once("vendor/_classes/crud/Page.php");

use Rain\Tpl;
use WPL\Crud;

$config = array(
    'tpl_dir' => 'view/',
    'cache_dir' => 'cache/'
);

Tpl::configure($config);

$app = new \Slim\Slim();
$app-> config('debug', true);

require_once("admin.php");

$app->run();
 
function verifyLogin()
{
	if(!isset($_COOKIE['LOGIN'])){
		header("Location: /admin/login");
		exit;
	}
}

?>