<?php
/* Smarty version 3.1.31, created on 2017-01-31 22:38:45
  from "/var/www/html/misc/smarty/templates_en/edit_list.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5890e7c59eb3e0_65385644',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6a01fa4a4840b59937570aeacc80d159739f4ab1' => 
    array (
      0 => '/var/www/html/misc/smarty/templates_en/edit_list.tpl',
      1 => 1485891494,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5890e7c59eb3e0_65385644 (Smarty_Internal_Template $_smarty_tpl) {
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
                    alert("A prefix length can not be longer than 128 characters.");
                    return false;
                }

                if (footer.length > 1024)
                {
                    alert("A footer length can not be longer than 1024 characters.");
                    return false;
                }

                for(var i in subscribers)
                {   
                    if ( subscribers[i] != "" && !re_email.test(subscribers[i]) )
                    {
                        alert('Subscriber "' + subscribers[i] + '" (line #' + (parseFloat(i)+1) + ') have incorrect email.');
                        return false;
                    }
                }

                for(var i in moderators)
                {   
                    if ( moderators[i] != "" && !re_email.test(moderators[i]) )
                    {
                        alert('Moderator "' + moderators[i] + '" (line #' + (parseFloat(i)+1) + ') have incorrect email.');
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
                Mailing lists service
            </div>
            <div id="header_right">
                <a href="logout.php">Log out</a>
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
                        Subscribers:&nbsp;
                        <div class="tooltip">
                            <img src="help.svg" width=15 height=15>
                            <span class="help_sub">
                                Please, provide one email per line. Do not forget add moderators if you
                                want them able to post into mailing list.
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
                                                    <b>Moderated list:</b> you assign subscribers and moderators. Messages will be
                                                    moderated before publishing.<br><br>
                                                    <b>News list:</b> everybody can subscribe without moderator confirmation by sending
                                                    an empty email to <?php echo $_smarty_tpl->tpl_vars['list_name']->value;?>
+subscribe@<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
. Messages into mailing list can
                                                    post only moderators.<br><br>
                                                    <b>Conference:</b> IRC channel analogue. You assign subscribers, every subscriber
                                                    can send messages without moderation.
                                                </span>
                                            </div>
                                            &nbsp;List type:
                                        </div>
                                    </td>
                                    <td>
                                        <select name="list_type" id="list_type" onChange="switch_moderators_form()">
                                            <option value="0" <?php echo $_smarty_tpl->tpl_vars['list_type_selected']->value[0];?>
>
                                                Moderated list
                                            </option>
                                            <option value="1" <?php echo $_smarty_tpl->tpl_vars['list_type_selected']->value[1];?>
>
                                                News list
                                            </option>
                                            <option value="2" <?php echo $_smarty_tpl->tpl_vars['list_type_selected']->value[2];?>
>
                                                Conference
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
                                                    Prefix added to the subject field of each message.
                                                </span>
                                            </div>
                                            &nbsp;Prefix:
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
                                                    Footer added to the body of each message.
                                                </span>
                                            </div>
                                            &nbsp;Footer:
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
                                                        Sender of a post will be excluded from the distribution list for
                                                        that post so people don't receive copies of their own posts.
                                                    </span>
                                                </div>
                                                <input type="checkbox" id="notmetoo_checkbox" name="notmetoo" value="checked" <?php echo $_smarty_tpl->tpl_vars['notmetoo_checked']->value;?>
>
                                                Do not send mails to yourself.
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
                        Moderators:&nbsp;
                        <div class="tooltip">
                            <img src="help.svg" width=15 height=15>
                            <span class="help_mod">
                                In case of moderated list messages before publishing will be send to these
                                emails. In case of news list only these emails can post to mailing list.
                                In case of conference there are no moderators.
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
