<?php
require("init.php");
unset($_SESSION["domain"]);
unset($_SESSION["auth"]);
unset($_SESSION["error_code"]);
header("Location: index.php");
exit();
?>
