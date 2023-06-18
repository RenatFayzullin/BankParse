<?php
require_once 'DB.php';
session_start();


$connect = DB::getConnection();

$fill_name = $_POST['full_name'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if ($password === $password_confirm) {
    $check_login = mysqli_query($connect,"SELECT * FROM `users` WHERE `login` LIKE '$login'");
    mysqli_num_rows($check_login);
    if (mysqli_num_rows($check_login)>0){
        $_SESSION['message'] = 'Пользователь с таким логином уже зарегистрирован';
        header('Location: ../register.php');
    }
    else{
        $password = md5($password);
        $path = 'uploads/' . time() . $_FILES['image']['name'];
        if (!move_uploaded_file($_FILES['image']['tmp_name'], '../' . $path)) {
            $_SESSION['message'] = 'Ошибка при загрузке изображения';
            header('Location: ../register.php');
        }

        mysqli_query($connect, "INSERT INTO `users`
        (`id`, `full_name`, `login`, `email`, `password`, `image`)
        VALUES (NULL, '$fill_name', '$login', '$email', '$password', '$path')");
        $_SESSION['message'] = 'Регистрация прошла успешно';
        header('Location: ../index.php');
    }
} else {
    $_SESSION['message'] = 'Пароли не совпадают';
    header('Location: ../register.php');
}



