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
                    alert("Введите домен.");
                    return false;
                }

                if (password == "")
                {
                    alert("Введите пароль.");
                    return false;
                }
                if ( domain.match(/[^A-Za-z0-9\-\.]/) )
                {
                    alert("Домен может содержать только латинские буквы, цифры, точки и дефисы.");
                    return false;
                }
                if ( password.match(/[^A-Za-z0-9]/) )
                {
                    alert("Пароль может содержать только латинские буквы и цифры.");
                    return false;
                }
            }
        </script>
    </head>
    <body>
        <div id="header">Сервис рассылок</div>
        <div id="login">
            <div id="login_form">
                <form method="post" action="login.php" onsubmit="return validate_form()">
                    <div id="domain">
                        <div id="domain_left">
                            Домен:
                        </div>
                        <div id="domain_right">
                            <input type="text" name="login_domain" id="domain_input">
                        </div>
                    </div>
                    <div id="password">
                        <div id="password_left">
                            Пароль:
                        </div>
                        <div id="password_right">
                            <input type="password" name="login_pass" id="password_input">
                        </div>
                    </div>
                    <div id="enter">
                        <input type="submit" name="submit" value="Войти">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
