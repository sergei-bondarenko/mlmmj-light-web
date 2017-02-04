<?php
require("init.php");
$list_name = isset($_GET["list_name"]) ? $_GET["list_name"] : "";
$domain = $_SESSION["domain"];

// We do not print any error in the next three cases, because a legitimate
// user will never produce such results, even with disables javascript
if ( preg_match("/[^a-z0-9_]/", $list_name) )
{
    header("Location: error.php");
    exit();
}

if ( strlen($list_name) > 30 )
{
    header("Location: error.php");
    exit();
}

// Test list existence
if( !is_dir("$lists_path/$domain/$list_name") )
{
    header("Location: error.php");
    exit();
}

if (!isset($_SESSION["auth"]) || $_SESSION["auth"] != 1)
{
   // If not authenticated, then redirect to login page
   header("Location: login.php");
   exit();
}

if(!empty($list_name))
{
    shell_exec("rm -rf $lists_path/$domain/$list_name");
    header("Location: index.php");
    exit();
}
?>
