<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script>
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

            function confirm_delete()
            {
                return confirm("Вы действительно хотите удалить список рассылки?");
            }
        </script>
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
        <div id="breadcrumbs">{$domain}</div>
        <div id="index">
            <div id="lists_header">
                <b>Все листы рассылок:</b>
                &nbsp;
                <div class="tooltip">
                    <img src="help.svg" width=15 height=15>
                    <span class="help_add_list">
                        Добавляйте и удаляйте списки рассылки с помощью данной формы. Вы можете редактировать список, кликнув по его названию.
                        Письмо в рассылку отправляется на адрес example@{$domain}, где example – имя рассылки.
                    </span>
                </div>
            </div>
            <table id="lists">
                {foreach $lists as $list}
                    <tr>
                        <td>
                            &bull;
                        </td>
                        <td>
                            <a href="edit_list.php?list_name={$list}">{$list}</a>
                        </td>
                        <td>
                            <a href="del_list.php?list_name={$list}" onclick="return confirm_delete()"><img src="delete.svg" width=15></a>
                        </td>
                    </tr>
                {/foreach}
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
