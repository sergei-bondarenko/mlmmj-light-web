<?php
/* Smarty version 3.1.31, created on 2017-01-25 20:58:10
  from "/var/www/html/smarty/templates_ru/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5888e7322dafc3_21846058',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6820e2ed7eda3869d8307c28df0b8fa212af00dd' => 
    array (
      0 => '/var/www/html/smarty/templates_ru/index.tpl',
      1 => 1485367020,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5888e7322dafc3_21846058 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <?php echo '<script'; ?>
>
            function validate_form()
            {
                var name = document.getElementById('add_list_input').value;
                var name = name.toLowerCase();

                if (name == "")
                {
                    return false;
                }

                if (name.length > 30)
                {
                    alert("Название списка рассылки должно содержать не более 30-ти символов.");
                    return false;
                }

                if ( name.match(/[^a-z0-9_]/) )
                {
                    alert("Название списка рассылки может содержать только латинские буквы, цифры и символы нижнего подчёркивания.");
                    return false;
                }
            }
        <?php echo '</script'; ?>
>
    </head>
    <body>
        <div id="header">
            <div id="header_left">
                Сервис рассылок
            </div>
            <div id="header_right">
                <a href="logout.php">Выйти</a>
            </div>
        </div>
        <div id="breadcrumbs"><?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
</div>
        <div id="index">
            <div id="lists_header">
                <b>Все листы рассылок:</b>
                &nbsp;
                <div class="tooltip">
                    <img src="help.svg" width=15 height=15>
                    <span class="help_add_list">
                        Добавить новый лист рассылки можно введя его имя в поле ввода и нажав кнопку "Добавить".
                        Название может содержать до 30-ти латинских букв, цифр и символов нижнего подчёркивания.
                        Удаление листа рассылки производится с помощью пиктограммы в виде мусорной корзины.
                        Вы можете редактировать лист, кликнув по его названию.
                    </span>
                </div>
            </div>
            <table id="lists">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lists']->value, 'list');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['list']->value) {
?>
                    <tr>
                        <td>
                            &bull;
                        </td>
                        <td>
                            <a href="edit_list.php?list_name=<?php echo $_smarty_tpl->tpl_vars['list']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['list']->value;?>
</a>
                        </td>
                        <td>
                            <a href="del_list.php?list_name=<?php echo $_smarty_tpl->tpl_vars['list']->value;?>
"><img src="delete.svg" width=15></a>
                        </td>
                    </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

            </table>
            <form method="post" action="add_list.php" onsubmit="return validate_form()">
                <div id="add_list">
                    <input type="text" name="list_name" id="add_list_input">
                    &nbsp;
                    <input type="submit" name="submit" value="Добавить" id="add_list_button">
                </div>
            </form>
        </div>
    </body>
</html>
<?php }
}
