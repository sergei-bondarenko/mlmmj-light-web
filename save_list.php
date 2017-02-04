<?php

function trim_array($arr)
{
    // Trim each array element
    $clean = array();
    foreach($arr as $elem)
    {
        $elem = trim($elem);
        if ( !empty($elem) )
        {
            $clean[] = $elem;
        }
    }
    return $clean;
} 

require("init.php");
$list_name = isset( $_POST["list_name"] ) ? $_POST["list_name"] : NULL;
$new_list_type = isset( $_POST["list_type"] ) ? $_POST["list_type"] : NULL;
$prefix = isset ( $_POST["prefix"] ) ? $_POST["prefix"] : NULL;
$footer = isset( $_POST["footer"] ) ? $_POST["footer"] : NULL;
$new_subscribers = isset ( $_POST["subscribers"] ) ? $_POST["subscribers"] : NULL;
$moderators = isset ( $_POST["moderators"] ) ? $_POST["moderators"] : NULL;
$notmetoo = isset ( $_POST["notmetoo"] ) ? $_POST["notmetoo"] : NULL;

if ( !isset($_SESSION["auth"]) || $_SESSION["auth"] != 1 )
{
   // If not authenticated, then redirect to login page
   header("Location: login.php");
   exit();
}

$domain = $_SESSION["domain"];

// We do not print any error in the next four cases, because a legitimate
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

// Test list type
if ($new_list_type !== "0" && $new_list_type !== "1" && $new_list_type !== "2")
{
    header("Location: error.php");
    exit();
}

if ( strlen($prefix) > 128 )
{
    // Prefix must not be longer than 128 characters
    $_SESSION["error_code"] = 7;
    header("Location: error.php");
    exit();
}

if ( strlen($footer) > 1024 )
{           
    // Footer must not be longer than 1024 characters
    $_SESSION["error_code"] = 8;
    header("Location: error.php");
    exit();
}

if ($new_subscribers != NULL)
{
    // Subscribe new subscribers and unsubscribe who is not present in the new list of subscribers
    $new_subscribers = explode("\n", $new_subscribers);
    $new_subscribers = trim_array($new_subscribers);

    $old_subscribers = shell_exec("/usr/bin/mlmmj-list -L $lists_path/$domain/$list_name");
    $old_subscribers = explode("\n", $old_subscribers);
    $old_subscribers = trim_array($old_subscribers);

    foreach ($new_subscribers as $new_subscriber)
    {
        if ( !in_array($new_subscriber, $old_subscribers) )
        {
            if ( !filter_var($new_subscriber, FILTER_VALIDATE_EMAIL) )
            {
                // Incorrect email
                $_SESSION["error_code"] = 9;
                header("Location: error.php");
                exit();
            }
            shell_exec("/usr/bin/mlmmj-sub -L $lists_path/$domain/$list_name -a $new_subscriber -fq");
        }
    }

    foreach ($old_subscribers as $old_subscriber)
    {
        if ( !in_array($old_subscriber, $new_subscribers) )
        {
            shell_exec("/usr/bin/mlmmj-unsub -L $lists_path/$domain/$list_name -a $old_subscriber -sq");
        }
    }
}

$old_list_type = file_get_contents("$lists_path/$domain/$list_name/list_type.txt");

// If list type changed
if ($new_list_type !== $old_list_type)
{
    // Delete all files except three in control dir
    shell_exec("cd $lists_path/$domain/$list_name/control/; \
                ls | grep -E -v '(footer-html|footer-text|listaddress|owner|delheaders|addtohdr|customheaders)' | xargs rm");
    // Create necessary files
    switch ($new_list_type)
    {
        case 0:  // Moderated list
            shell_exec("cd $lists_path/$domain/$list_name/control/; \
                        touch closedlistsub moderated subonlypost notifymod noarchive noget nosubonlydenymails \
                              nodigestsub nolistsubsemail ifmodsendonlymodmoderate");
            break;
        case 1:  // News list
            shell_exec("cd $lists_path/$domain/$list_name/control/; \
                        touch moderated modonlypost noarchive nosubonlydenymails nodigestsub nomodonlydenymails \
                              nolistsubsemail subonlypost ifmodsendonlymodmoderate");
            break;
        case 2:  // Conference list
            shell_exec("cd $lists_path/$domain/$list_name/control/; \
                        touch closedlistsub subonlypost noarchive noget nosubonlydenymails nodigestsub \
                              nolistsubsemail");
            break;
    }
    file_put_contents("$lists_path/$domain/$list_name/list_type.txt", "$new_list_type");
}

if ($footer !== NULL)
{
    // Delete all \r symbols
    $footer = str_replace("\r", "", $footer);

    file_put_contents("$lists_path/$domain/$list_name/control/footer-text", "$footer\n");

    // Insert <br>
    $footer = str_replace("\n", "<br>\n", $footer);
    file_put_contents("$lists_path/$domain/$list_name/control/footer-html", "$footer\n");
}

if ($moderators !== NULL)
{
    $moderators_array = explode("\n", $moderators);
    $moderators_array = trim_array($moderators_array);

    // Check moderators emails
    foreach ($moderators_array as $moderator)
    {
        if ( !filter_var($moderator, FILTER_VALIDATE_EMAIL) )
        {
            // Incorrect email
            $_SESSION["error_code"] = 10;
            header("Location: error.php");
            exit();
        }
    }

    // If this not a conference list type, then write moderators
    if ($new_list_type !== "2")
    {
        file_put_contents("$lists_path/$domain/$list_name/control/moderators", "$moderators");
    }

    // If this is a news list type, create access file (only mods can post)
    if ($new_list_type == "1")
    {
        // Delete all \r symbols
        $moderators = str_replace("\r", "", $moderators);
        // Escape dots
        $moderators = str_replace(".", "\.", $moderators);
        // Add first allow
        $moderators = "allow ^From:.*" . $moderators;
        // Add all other allows
        $moderators = str_replace("\n", "\nallow ^From:.*", $moderators);
        // Add discard as last string
        $moderators = $moderators . "\ndiscard";
        // Add .* to each allow
        $moderators = str_replace("\n", ".*\n", $moderators);
        // Write result
        file_put_contents("$lists_path/$domain/$list_name/control/access", "$moderators");
    }
}

if ($prefix !== NULL)
{
    file_put_contents("$lists_path/$domain/$list_name/control/prefix", "$prefix");
}

if ($notmetoo === "checked")
{
    shell_exec("touch $lists_path/$domain/$list_name/control/notmetoo");
}
else
{
    if ( file_exists("$lists_path/$domain/$list_name/control/notmetoo") )
    {
        shell_exec("rm $lists_path/$domain/$list_name/control/notmetoo");
    }
}

header("Location: edit_list.php?list_name=$list_name");
exit();
?>
