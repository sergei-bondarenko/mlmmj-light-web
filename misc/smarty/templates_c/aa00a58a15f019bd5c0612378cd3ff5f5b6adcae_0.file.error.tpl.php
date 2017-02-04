<?php
/* Smarty version 3.1.31, created on 2017-01-29 14:10:40
  from "/var/www/html/misc/smarty/templates_ru/error.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_588dcdb0c8d950_81798250',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa00a58a15f019bd5c0612378cd3ff5f5b6adcae' => 
    array (
      0 => '/var/www/html/misc/smarty/templates_ru/error.tpl',
      1 => 1485688232,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_588dcdb0c8d950_81798250 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div id="header">Сервис рассылок</div>
        <div id="error">
            <?php if ($_smarty_tpl->tpl_vars['error_code']->value == 1) {?>
                Домен может содержать только латинские буквы, точки, дефисы и цифры.
            <?php } elseif ($_smarty_tpl->tpl_vars['error_code']->value == 2) {?>
                Пароль может содержать только латинские буквы и цифры.
            <?php } elseif ($_smarty_tpl->tpl_vars['error_code']->value == 3) {?>
                Неверный пароль.
            <?php } elseif ($_smarty_tpl->tpl_vars['error_code']->value == 4) {?>
                Такой домен не зарегистрирован.
            <?php } elseif ($_smarty_tpl->tpl_vars['error_code']->value == 5) {?>
                Название рассылки может содержать только латинские буквы, цифры и символы нижнего подчёркивания.
            <?php } elseif ($_smarty_tpl->tpl_vars['error_code']->value == 6) {?>
                Длина названия рассылки не может превышать 30-ти символов.
            <?php } elseif ($_smarty_tpl->tpl_vars['error_code']->value == 7) {?>
                Длина префикса не может превышать 128-ти символов.
            <?php } elseif ($_smarty_tpl->tpl_vars['error_code']->value == 8) {?>
                Длина подписи не может превышать 1024-ти символов.
            <?php } elseif ($_smarty_tpl->tpl_vars['error_code']->value == 9) {?>
                Среди подписчиков есть некорректный e-mail.
            <?php } elseif ($_smarty_tpl->tpl_vars['error_code']->value == 10) {?>
                Среди модераторов есть некорректный e-mail.
            <?php } else { ?>
                Неизвестная ошибка.
            <?php }?>
        </div>
    </body>
</html>
<?php }
}
