<?php
/* Smarty version 3.1.31, created on 2017-01-24 20:04:52
  from "/var/www/html/smarty/templates_ru/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58878934506f48_92126530',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ccdf76791105fd7c77f366b69d3a18e59c5c2b67' => 
    array (
      0 => '/var/www/html/smarty/templates_ru/login.tpl',
      1 => 1485277488,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58878934506f48_92126530 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <?php echo '<script'; ?>
>
            function validate_form()
            {
                var domain = document.getElementById('domain_input').value;
                var password = document.getElementById('password_input').value;

                if (domain == "")
                {
                    alert("Введите домен.");
                    return false;
                }

                if (password == "")
                {
                    alert("Введите пароль.");
                    return false;
                }
            }
        <?php echo '</script'; ?>
>
    </head>
    <body>
        <div id="header">Сервис рассылок</div>
        <div id="login">
            <div id="login_form">
                <form method="post" action="login.php" onsubmit="return validate_form()">
                    <div id="domain">
                        <div id="domain_left">
                            Домен:
                        </div>
                        <div id="domain_right">
                            <input type="text" name="login_domain" id="domain_input">
                        </div>
                    </div>
                    <div id="password">
                        <div id="password_left">
                            Пароль:
                        </div>
                        <div id="password_right">
                            <input type="password" name="login_pass" id="password_input">
                        </div>
                    </div>
                    <div id="enter">
                        <input type="submit" name="submit" value="Войти">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
<?php }
}
