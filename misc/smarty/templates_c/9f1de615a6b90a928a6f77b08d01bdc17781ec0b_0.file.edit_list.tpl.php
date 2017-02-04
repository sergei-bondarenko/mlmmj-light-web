<?php
/* Smarty version 3.1.31, created on 2017-01-31 10:50:53
  from "/var/www/html/misc/smarty/templates_ru/edit_list.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_589041dd3259d1_17665347',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9f1de615a6b90a928a6f77b08d01bdc17781ec0b' => 
    array (
      0 => '/var/www/html/misc/smarty/templates_ru/edit_list.tpl',
      1 => 1485849048,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_589041dd3259d1_17665347 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <?php echo '<script'; ?>
>
            // Do not use Smarty here
            function switch_moderators_form()
            {
                // Get a selected value
                var select = document.getElementById("list_type");
                var selected_value = select.options[select.selectedIndex].value;

                // If selected conference list type, then disable moderators form
                if (selected_value == "2")
                {
                    document.getElementById("moderators").disabled = true;
                    document.getElementById("moderators_header").style.color = "#777777";
                }
                else
                {
                    document.getElementById("moderators").disabled = false;
                    document.getElementById("moderators_header").style.color = "#222222";
                }
            }

            function validate_form()
            {
                var prefix = document.getElementById('prefix').value;
                var footer = document.getElementById('footer').value;
                var subscribers = document.getElementById('subscribers').value;
                var moderators = document.getElementById('moderators').value;

                // Regex for a valid e-mail
                var re_email = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                // Transform subscribers and moderators into array
                subscribers = subscribers.split("\n");
                moderators = moderators.split("\n");

                if (prefix.length > 128)
                {
                    alert("Длина префикса не должна превышать 128-ми символов.");
                    return false;
                }

                if (footer.length > 1024)
                {
                    alert("Длина подписи не должна превышать 1024-ёх символов.");
                    return false;
                }

                for(var i in subscribers)
                {   
                    if ( subscribers[i] != "" && !re_email.test(subscribers[i]) )
                    {
                        alert('Подписчик "' + subscribers[i] + '" (строка №' + (parseFloat(i)+1) + ') является невалидным адресом электронной почты.');
                        return false;
                    }
                }

                for(var i in moderators)
                {   
                    if ( moderators[i] != "" && !re_email.test(moderators[i]) )
                    {
                        alert('Модератор "' + moderators[i] + '" (строка №' + (parseFloat(i)+1) + ') является невалидным адресом электронной почты.');
                        return false;
                    }
                }
            }
            //
        <?php echo '</script'; ?>
>
    </head>
    <body onload="switch_moderators_form()">
        <div id="header">
            <div id="header_left">
                Сервис рассылок
            </div>
            <div id="header_right">
                <a href="logout.php">Выйти</a>
            </div>
        </div>
        <div id="breadcrumbs">
            <a href="index.php"><?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
</a>&nbsp;/&nbsp;<?php echo $_smarty_tpl->tpl_vars['list_name']->value;?>

        </div>
        <form method="post" action="save_list.php" id="save_list" onsubmit="return validate_form()">
            <div id="edit_page">
                <input type="hidden" name="list_name" value="<?php echo $_smarty_tpl->tpl_vars['list_name']->value;?>
">
                <div id="column_left">
                    <div id="subscribers_header">
                        Список подписчиков:&nbsp;
                        <div class="tooltip">
                            <img src="help.svg" width=15 height=15>
                            <span class="help_sub">
                                Добавляйте по одному почтовому адресу в каждой строке. Не забудьте добавить 
                                модераторов, если хотите, чтобы они также могли писать в рассылку.
                            </span>
                        </div>
                    </div>
                    <div id="subscribers_body">
                        <textarea name="subscribers" id="subscribers"><?php echo $_smarty_tpl->tpl_vars['subscribers']->value;?>
</textarea>
                    </div>
                </div>
                <div id="column_middle">
                    <div id="column_middle_inner">
                        <div id="table_div">
                            <table id="table_middle">
                                <tr>
                                    <td>
                                        <div id="list_type_header">
                                            <div class="tooltip">
                                                <img src="help.svg" width=15 height=15>
                                                <span class="help_list_type">
                                                    <b>Модерируемая рассылка:</b> подписчиков устанавливаете Вы, сообщения
                                                    от обычных участников проходят модерацию.<br><br>
                                                    <b>Новостная рассылка:</b> подписаться может кто угодно, отправив пустое письмо
                                                    на <?php echo $_smarty_tpl->tpl_vars['list_name']->value;?>
+subscribe@<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
, при этом подтверждение модератора не требуется.
                                                    Письма в рассылку могут отправлять только модераторы.<br><br>
                                                    <b>Конференция:</b> аналог канала в IRC. Подписчиков устанавливаете Вы,
                                                    сообщения может отправлять любой подписчик без модерации.
                                                </span>
                                            </div>
                                            &nbsp;Тип рассылки:
                                        </div>
                                    </td>
                                    <td>
                                        <select name="list_type" id="list_type" onChange="switch_moderators_form()">
                                            <option value="0" <?php echo $_smarty_tpl->tpl_vars['list_type_selected']->value[0];?>
>
                                                Модерируемая рассылка
                                            </option>
                                            <option value="1" <?php echo $_smarty_tpl->tpl_vars['list_type_selected']->value[1];?>
>
                                                Новостная рассылка
                                            </option>
                                            <option value="2" <?php echo $_smarty_tpl->tpl_vars['list_type_selected']->value[2];?>
>
                                                Конференция
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div id="prefix_header">
                                            <div class="tooltip">
                                                <img src="help.svg" width=15 height=15>
                                                <span class="help_prefix">
                                                    Текст, добавляемый в начало заголовка каждого сообщения рассылки.
                                                </span>
                                            </div>
                                            &nbsp;Префикс:
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" name="prefix" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['prefix']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" id="prefix">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div id="footer_header">
                                            <div class="tooltip">
                                                <img src="help.svg" width=15 height=15>
                                                <span class="help_footer">
                                                    Текст, добавляемый в конец тела каждого сообщения рассылки.
                                                </span>
                                            </div>
                                            &nbsp;Подпись:
                                        </div>
                                    </td>
                                    <td>
                                        <textarea name="footer" id="footer"><?php echo $_smarty_tpl->tpl_vars['footer']->value;?>
</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div id="notmetoo">
                                            <div id="notmetoo_header">
                                                <div class="tooltip">
                                                    <img src="help.svg" width=15 height=15>
                                                    <span class="help_notmetoo">
                                                        Отправитель будет исключён из списка рассылки для своего сообщения.
                                                        Это означает, что ему не будут приходить копии своих сообщений.
                                                    </span>
                                                </div>
                                                <input type="checkbox" id="notmetoo_checkbox" name="notmetoo" value="checked" <?php echo $_smarty_tpl->tpl_vars['notmetoo_checked']->value;?>
>
                                                Не отправлять копию своих сообщений.
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div id="save_btn">
                            <input type="submit" name="submit" value="Сохранить">
                        </div>
                    </div>
                </div>
                <div id="column_right">
                    <div id="moderators_header">
                        Список модераторов:&nbsp;
                        <div class="tooltip">
                            <img src="help.svg" width=15 height=15>
                            <span class="help_mod">
                                Для модерируемой рассылки на эти email будут отправляться письма перед их
                                опубликованием в рассылку. Для новостной рассылки только эти адреса могут
                                могут писать в рассылку. Для конференции модераторы не предумотрены.
                            </span>
                        </div>
                    </div>
                    <div id="moderators_body">
                        <textarea name="moderators" id="moderators"><?php echo $_smarty_tpl->tpl_vars['moderators']->value;?>
</textarea>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>
<?php }
}
