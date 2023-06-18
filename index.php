<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
<body>
    <form action="include/signin.php" method="post">
        <label>Логин</label>
        <input type = "text" name = 'login'  placeholder = "Введите свой логин">
        <label>Пароль</label>
        <input type = "password" name = 'password' placeholder = "Введите пароль">
        <button type="submit">  Войти </button>
        <p>
            Создайте новый аккаунт - <a href="/bankApp/register.php">Регистрация</a>
        </p>
        <?php
        if (isset($_SESSION['message'])) {
            echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
        }
        unset($_SESSION['message']);
        ?>
    </form>





</body>
</html>
