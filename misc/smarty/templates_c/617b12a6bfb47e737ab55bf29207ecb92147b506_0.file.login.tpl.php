<?php
/* Smarty version 3.1.31, created on 2017-01-02 07:32:17
  from "/var/www/html/smarty/templates/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5869d7d16e2888_57689057',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '617b12a6bfb47e737ab55bf29207ecb92147b506' => 
    array (
      0 => '/var/www/html/smarty/templates/login.tpl',
      1 => 1483329039,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5869d7d16e2888_57689057 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
    <head></head>
    <body>
        <center>
            <form method="post" action="login.php">
                Домен: <input type="text" name="login_domain">
                <p />
                Пароль: <input type="password" name="login_pass">
                <p />
                <input type="submit" name="submit" value="Войти">
            </form>
        </center>
    </body>
</html>
<?php }
}
