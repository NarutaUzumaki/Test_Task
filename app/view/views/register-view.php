<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Регистрация</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body style="background-color: #31373e; color: white;">
    <div class="text-center container w-25">
        <form method="post" action="/user/createUser">
            <div style="padding-top: 2%">
                <input class="form-control" type="text" name="login" placeholder="Введите ваше имя" required>
            </div>
            <div style="padding-top: 2%">
                <input class="form-control" type="text" name="email" placeholder="Введите вашу почту" required>
            </div>
            <div style="padding-top: 2%">
                <input class="form-control" type="password" name="passwd" placeholder="Введите ваш пароль" required>
            </div>
            <div style="padding-top: 2%">
                <input class="form-control" type="password" name="passwd_repeat" placeholder="Подтвердите пароль" required>
            </div>
            <div style="padding-top: 2%">
                <button class="btn btn-success" type="submit">Регистрация</button>
                <a class="btn btn-primary" href="/user/login">Уже есть аккаунт?</a>
            </div>
        </form>
    </div>
</body>