<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script>
            function validate_form()
            {
                var domain = document.getElementById('domain_input').value;
                var password = document.getElementById('password_input').value;

                if (domain == "")
                {
                    alert("Enter domain.");
                    return false;
                }

                if (password == "")
                {
                    alert("Enter password.");
                    return false;
                }
                if ( domain.match(/[^A-Za-z0-9\-\.]/) )
                {
                    alert("Domain can contain only english letters, dots, hyphens and digits.");
                    return false;
                }
                if ( password.match(/[^A-Za-z0-9]/) )
                {
                    alert("Password can contain only english letters and digits.");
                    return false;
                }
            }
        </script>
    </head>
    <body>
        <div id="header">Mailing lists service</div>
        <div id="login">
            <div id="login_form">
                <form method="post" action="login.php" onsubmit="return validate_form()">
                    <div id="domain">
                        <div id="domain_left">
                            Domain:
                        </div>
                        <div id="domain_right">
                            <input type="text" name="login_domain" id="domain_input">
                        </div>
                    </div>
                    <div id="password">
                        <div id="password_left">
                            Password:
                        </div>
                        <div id="password_right">
                            <input type="password" name="login_pass" id="password_input">
                        </div>
                    </div>
                    <div id="enter">
                        <input type="submit" name="submit" value="Enter">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
