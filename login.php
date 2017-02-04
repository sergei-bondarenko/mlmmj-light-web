<?php
require("init.php");
$login_domain = isset($_POST["login_domain"]) ? $_POST["login_domain"] : "";
$login_pass = isset($_POST["login_pass"]) ? $_POST["login_pass"] : "";

// Convert to lower case
$login_domain = strtolower($login_domain);

if( !empty($login_domain) && !empty($login_pass) )
{
    if ( preg_match("/[^a-z0-9\-\.]/", $login_domain) )
    {
        // Domain must contain only english letters, digits, hyphens and dots
        $_SESSION["error_code"] = 1;
        header("Location: error.php");
        exit();
    }

    if ( preg_match("/[^A-Za-z0-9]/", $login_pass) )
    {
        // Password must contain only english letters and digits
        $_SESSION["error_code"] = 2;
        header("Location: error.php");
        exit();
    }

    // Sha256 sum of entered password
    $login_hash = hash("sha256", $login_pass);

    $hashes = file_get_contents("$lists_path/passwords.txt");
    preg_match("/^$login_domain:(.*).*/m", $hashes, $hash);

    // Is there such domain?
    if ( count($hash) == 0 )
    {
        preg_match("/^list\.$login_domain:(.*).*/m", $hashes, $hash);
        // Maybe user omitted "list." prefix?
        if ( count($hash) == 0 )
        {
            // No luck. Incorrect domain
            $_SESSION["error_code"] = 4;
            header("Location: error.php");
            exit();
        }
        else
        {
            // Yes, he omitted "list."
            $login_domain = "list.$login_domain";
        }
    }

    // Compare hashes
    if($login_hash == $hash[1])
    {
         // Authentication successful - Set session
         $_SESSION["auth"] = 1;
         $_SESSION["domain"] = $login_domain;
         header("Location: index.php");
         exit();
    }
    else
    {
        // Incorrect password
        $_SESSION["error_code"] = 3;
        header("Location: error.php");
        exit();
    }
}
else
{
    // If no submission, display login form
    $smarty->display("login.tpl");
}
?>
