<?php
/* Smarty version 3.1.31, created on 2017-01-02 06:50:44
  from "/var/www/html/smarty/templates/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5869ce142bdbc4_61874071',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '569f7c9bad1e95dec6a51c7c51b98d4db367f54c' => 
    array (
      0 => '/var/www/html/smarty/templates/index.tpl',
      1 => 1483329013,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5869ce142bdbc4_61874071 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
    <head></head>
    <body>
    <center>
         <h1>Список рассылок:</h1>
         <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lists']->value, 'list');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['list']->value) {
?>
         <a href="edit_list.php?list_name=<?php echo $_smarty_tpl->tpl_vars['list']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['list']->value;?>
</a> [<a href="del_list.php?list_name=<?php echo $_smarty_tpl->tpl_vars['list']->value;?>
">Удалить</a>]<br>
         <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

         <br>
         <form method="post" action="add_list.php">
             Имя рассылки: <input type="text" name="list_name"> <input type="submit" name="submit" value="Добавить">
         </form>
    </center>
    </body>
</html>
<?php }
}
