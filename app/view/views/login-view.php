<html>
<head>
    <meta charset="utf-8">
    <title>Вход</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body style="background-color: #31373e; color: white;">
    <div class="text-center container w-25">
        <form method="post" action="/user/checkUser">
            <div style="padding-top: 2%">
                <input class="form-control" type="text" name="login" placeholder="Введиет Ваш ник или почту" required>
            </div>
            <div style="padding-top: 2%">
                <input class="form-control" type="password" name="passwd" placeholder="Введите свой пароль" required>
            </div>
            <div style="padding-top: 2%">
                <button class="btn btn-success" type="submit">Войти</button>
                <a class="btn btn-warning" href="/user/register">Регистрация</a>
            </div>
        </form>
    </div>
</body>