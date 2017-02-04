<?php
// Loading config
$config = file_get_contents("misc/config.txt");
preg_match("/lists_path[\s]*=[\s]*(.*)/", $config, $lists_path);
$lists_path = $lists_path[1];
preg_match("/web_path[\s]*=[\s]*(.*)/", $config, $web_path);
$web_path = $web_path[1];
preg_match("/web_url[\s]*=[\s]*(.*)/", $config, $web_url);
$web_url = $web_url[1];
preg_match("/language[\s]*=[\s]*(.*)/", $config, $language);
$language = $language[1];

// Initializing Smarty
require("misc/smarty_libs/Smarty.class.php");
$smarty = new Smarty();

$smarty->setTemplateDir("misc/smarty/templates_$language");
$smarty->setCompileDir("misc/smarty/templates_c");
$smarty->setCacheDir("misc/smarty/cache");
$smarty->setConfigDir("misc/smarty/configs");

session_start();
?>
