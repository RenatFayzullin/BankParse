<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Профиль</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/css.css">
</head>
<body>
<header class="header">
    <div class="container">
        <div class="header__inner">
            <div class="header__logo">RenatoBanKO</div>

            <nav class="nav">
                <a class="nav__link active" href="#">Валюты</a>
                <a class="nav__link" href="#">Сервис</a>
                <a class="nav__link" href="#">Личный кабинет</a>
                <a class="nav__link" href="#">О себе</a>
                <a class="nav__link" href="include/logout.php">Выход</a>
            </nav>
        </div>
    </div>
</header>

<form class = "fio">
    <img src="<?= $_SESSION['user']['image'] ?>" width="200" alt="">
    <h2 class="fio_text"> <?= $_SESSION['user']['full_name'] ?></h2>
    <a  class="fio_text" href="#"><?= $_SESSION['user']['email'] ?></a>
    <a  class="fio_text" href="include/logout.php" class="logout">Выход</a>
</form>

<div class="wrapper">
    <header>Currency Converter</header>
    <form action="include/conventer.php" method="post">
        <div class="amount">
            <p>Enter Amount</p>
            <input name="value" type="text" value="1">
        </div>
        <div class="drop-list">
            <div class="from">
                <p>From</p>
                <div class="select-box">
                    <img src="https://flagcdn.com/48x36/us.png" alt="flag">
                    <select name="curFrom"> <!-- Options tag are inserted from JavaScript --> </select>
                </div>
            </div>
            <div class="icon"><i class="fas fa-exchange-alt"></i></div>
            <div class="to">
                <p>To</p>
                <div class="select-box">
                    <img src="https://flagcdn.com/48x36/np.png" alt="flag">
                    <select name="curTo"> <!-- Options tag are inserted from JavaScript --> </select>
                </div>
            </div>
        </div>
        <div class="exchange-rate">
            <?php
            if (isset($_SESSION['result'])) {
                echo  $_SESSION['result'];
            }
            else echo 'Getting exchange rate...'
            ?>
        </div>
        <button>Get Exchange Rate</button>
    </form>
</div>

<script src="js/country-list.js"></script>
<script src="js/script.js"></script>


</body>
</html>