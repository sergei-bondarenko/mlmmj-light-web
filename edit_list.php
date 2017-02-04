<?php
require("init.php");
$list_name = isset($_GET["list_name"]) ? $_GET["list_name"] : "";
$domain = $_SESSION["domain"];

if (!isset($_SESSION["auth"]) || $_SESSION["auth"] != 1)
{
   // If not authenticated, then redirect to login page
   header("Location: login.php");
   exit();
}

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

// Get a subscribers list
$subscribers = shell_exec("/usr/bin/mlmmj-list -L $lists_path/$domain/$list_name");
// Remove trailing empty symbols
$subscribers = trim($subscribers);

// Get a list type. There are three types of lists:
// a closed moderated list (0), a newslist (1) and a conference (2)
$list_type = file_get_contents("$lists_path/$domain/$list_name/list_type.txt");
$list_type = trim($list_type);

// Select current list in select html elemant
$list_type_selected = ["", "", ""];
$list_type_selected[$list_type] = "selected";

// Get a footer
$footer = file_get_contents("$lists_path/$domain/$list_name/control/footer-text");
$footer = trim($footer);

// News list do not has moderators file
if ($list_type !== "2")
{
    // Get a moderators list
    $moderators = file_get_contents("$lists_path/$domain/$list_name/control/moderators");
    // Remove trailing empty symbols
    $moderators = trim($moderators);
}
else
{
    $moderators = NULL;
}

// Get a prefix
$prefix = file_get_contents("$lists_path/$domain/$list_name/control/prefix");
// Remove trailing empty symbols
$prefix = trim($prefix);

$notmetoo_checked = file_exists("$lists_path/$domain/$list_name/control/notmetoo") ? "checked" : "";

// Load page
$smarty->assign("subscribers", $subscribers);
$smarty->assign("list_name", $list_name);
$smarty->assign("domain", $domain);
$smarty->assign("list_type_selected", $list_type_selected);
$smarty->assign("footer", $footer);
$smarty->assign("moderators", $moderators);
$smarty->assign("prefix", $prefix);
$smarty->assign("notmetoo_checked", $notmetoo_checked);
$smarty->display("edit_list.tpl");
?>
