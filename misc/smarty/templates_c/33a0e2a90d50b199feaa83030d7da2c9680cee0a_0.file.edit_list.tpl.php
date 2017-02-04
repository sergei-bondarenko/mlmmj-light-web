<?php
/* Smarty version 3.1.31, created on 2017-01-09 20:24:19
  from "/var/www/html/smarty/templates/edit_list.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5873c743903c86_86143891',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '33a0e2a90d50b199feaa83030d7da2c9680cee0a' => 
    array (
      0 => '/var/www/html/smarty/templates/edit_list.tpl',
      1 => 1483982647,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5873c743903c86_86143891 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
    <head></head>
    <body>
    <center>
         <form method="post" action="save_list.php">
             <input type="hidden" name="list_name" value="<?php echo $_smarty_tpl->tpl_vars['list_name']->value;?>
">
             Список подписчиков:
             <p />
             <textarea rows="20" cols="30" name="new_subscribers"><?php echo $_smarty_tpl->tpl_vars['subscribers']->value;?>
</textarea>
             <p />
<!--             Владелец рассылки: <input type="text" name="list_owner" value="<?php echo $_smarty_tpl->tpl_vars['list_owner']->value;?>
">
             <p /> -->
             Тип рассылки:
             <select name="list_type">
                 <option value="0" <?php echo $_smarty_tpl->tpl_vars['list_type_selected']->value[0];?>
>Закрытая модерируемая рассылка</option>
                 <option value="1" <?php echo $_smarty_tpl->tpl_vars['list_type_selected']->value[1];?>
>Новостная рассылка</option>
                 <option value="2" <?php echo $_smarty_tpl->tpl_vars['list_type_selected']->value[2];?>
>Конференция</option>
             </select>
             <p />
             Подпись:
             <p />
             <textarea rows="5" cols="30" name="footer"><?php echo $_smarty_tpl->tpl_vars['footer']->value;?>
</textarea>
             <p />
             Список модераторов:
             <p />
             <textarea rows="20" cols="30" name="moderators"><?php echo $_smarty_tpl->tpl_vars['moderators']->value;?>
</textarea>
             <p />
             Префикс:
             <input type="text" name="prefix" value="<?php echo $_smarty_tpl->tpl_vars['prefix']->value;?>
">
             <p />
             <input type="submit" name="submit" value="Сохранить">
         </form>
    </center>
    </body>
</html>
<?php }
}
