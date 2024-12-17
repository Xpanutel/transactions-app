<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/project/webroot/users.css">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Регистрация</h1>
        <form action="" method="POST" class='reg-form'>
            <input type="text" placeholder="Введите логин" name="login" required>
            <input type="text" placeholder="Введите имя" name="name" required>
            <input type="text" placeholder="Введите фамилию" name="surname" required>
            <input type="password" placeholder="Введите пароль" name="userpass" required>
            <input type="email" placeholder="Введите почту" name="useremail" required>
            <button type="submit">Отправить</button>
        </form>
    </div>
</body>
</html>