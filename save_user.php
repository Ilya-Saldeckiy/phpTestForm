<?php
if (isset($_POST['register'])) {
    $password = $_POST['password'];
    $login = $_POST['login'];

// подключаемся к базе
    $link = include("base.php");

    $result = mysqli_query($link, "SELECT id FROM `users` WHERE login='$login'");
    if ($result->num_rows) {
        header("Location: ../?error=Пользователь уже есть");
    } else {

    $result2 = mysqli_query($link, "INSERT INTO users (login,password) VALUES('$login','$password')");
// Проверяем, есть ли ошибки
    if ($result2) {
        header("Location: ../?error=Пользователь зарегестрирован");
    } else {
        header("Location: ../?error=Ошибка");
    }
}
}
