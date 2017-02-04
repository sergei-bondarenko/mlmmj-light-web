<?php
require("init.php");

if (!isset($_SESSION["auth"]) || $_SESSION["auth"] != 1)
{
   // If not authenticated, then redirect to login page
   header("Location: login.php");
   exit();
}

$domain = $_SESSION["domain"];

// Are there any lists?
if ( count( glob("$lists_path/$domain/*") ) !== 0 )
{
    // Get all folders and tranform into array
    $lists = explode("\n", shell_exec("cd $lists_path/$domain; ls -1d */ | cut -f1 -d'/'"));
}

if ( isset($lists) )
{
    // If the last string is empty then delete it
    if ( end($lists) === "" )
    { 
        array_pop($lists); 
    }
}
else
{
    $lists = NULL;
}

$smarty->assign("lists", $lists);
$smarty->assign("domain", $domain);
$smarty->display("index.tpl");
?>
