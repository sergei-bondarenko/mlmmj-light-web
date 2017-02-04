<?php
require("init.php");
$list_name = isset($_POST["list_name"]) ? $_POST["list_name"] : "";

if (!isset($_SESSION["auth"]) || $_SESSION["auth"] != 1)
{
   // If not authenticated, then redirect to login page
   header("Location: login.php");
   exit();
}

if( !empty($list_name) )
{
    $list_name = strtolower($list_name);

    if ( preg_match("/[^a-z0-9_]/", $list_name) )
    {
        // List name must contain only english letters, digits and undercores
        $_SESSION["error_code"] = 5;
        header("Location: error.php");
        exit();
    }

    if ( strlen($list_name) > 30 )
    {
        // List name must not be longer than 30 characters
        $_SESSION["error_code"] = 6;
        header("Location: error.php");
        exit();
    }

    $domain = $_SESSION["domain"];
    shell_exec("cp -r misc/template_$language $lists_path/$domain/$list_name");
    file_put_contents("$lists_path/$domain/$list_name/control/listaddress", "$list_name@$domain");
    file_put_contents("$lists_path/$domain/$list_name/control/customheaders", "From: $list_name@$domain\nReply-To: $list_name@$domain\n");
    file_put_contents("$lists_path/$domain/$list_name/control/prefix", "[$list_name]");
    shell_exec("sed -i -e 's/_unsub_addr_/$list_name\+unsubscribe@$domain/g' $lists_path/$domain/$list_name/control/footer-*");
}

header("Location: index.php");
exit();
?>
