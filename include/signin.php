<?php
require_once 'DB.php';
session_start();
$connect = DB::getConnection();

$login = $_POST['login'];
$password = md5($_POST['password']);

$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
$array_curDB = mysqli_query($connect, "SELECT * FROM `exchange_rates`");


if ($check_user){
    $user = mysqli_fetch_assoc($check_user);

    $_SESSION['user'] = [
        'id'=> $user['id'],
        'full_name'=>$user['full_name'],
        'email'=>$user['email'],
        'image'=>$user['image']
    ];

    header('Location: ../profile.php');
}
else
{
    $_SESSION['message'] = 'Неверный логин или пароль';
    header('Location: ../register.php');
}

