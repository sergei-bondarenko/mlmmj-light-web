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
                    alert("Mailing list name must not be longer than 30 characters.");
                    return false;
                }

                if ( name.match(/[^a-z0-9_]/) )
                {
                    alert("Mailing list name must contain only english letters, digits and undercores.");
                    return false;
                }
            }

            function confirm_delete()
            {
                return confirm("Are you really want to delete the mailing list?");
            }
        </script>
    </head>
    <body>
        <div id="header">
            <div id="header_left">
                Mailing lists service
            </div>
            <div id="header_right">
                <a href="logout.php">Log out</a>
            </div>
        </div>
        <div id="breadcrumbs">{$domain}</div>
        <div id="index">
            <div id="lists_header">
                <b>Mailing lists:</b>
                &nbsp;
                <div class="tooltip">
                    <img src="help.svg" width=15 height=15>
                    <span class="help_add_list">
                        You can add and delete mailing lists on this page. To edit list click on its name.
                        To post message into mailing list send mail to example@{$domain}, where "example" is the list name.
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
                    <input type="submit" name="submit" value="Add" id="add_list_button">
                </div>
            </form>
        </div>
    </body>
</html>
