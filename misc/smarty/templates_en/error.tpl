<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div id="header">Mailing lists service</div>
        <div id="error">
            {if $error_code == 1}
                Domain can contain only english letters, dots, hyphens and digits.
            {elseif $error_code == 2}
                Password can contain only english letters and digits.
            {elseif $error_code == 3}
                Incorrect password.
            {elseif $error_code == 4}
                There is no such domain.
            {elseif $error_code == 5}
                Mailing list name can contain only english letters, digits and undercores.
            {elseif $error_code == 6}
                The length of a list name can not exceed 30 characters.
            {elseif $error_code == 7}
                The length of a prefix can not exceed 128 characters.
            {elseif $error_code == 8}
                The length of a footer can not exceed 1024 characters.
            {elseif $error_code == 9}
                There is an incorrect email in the subscribers list.
            {elseif $error_code == 10}
                There is an incorrect email in the moderators list.
            {else}
                Unknown error.
            {/if}
        </div>
    </body>
</html>
