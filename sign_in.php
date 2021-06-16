<?php
session_start();
if (isset($_POST['sign'])) {
   $password=$_POST['password'];
   $login=$_POST['login'];
}
// подключаемся к базе
$link = include("base.php");

$result = mysqli_query($link, "SELECT * FROM users WHERE login='$login'");
$myrow = mysqli_fetch_array($result);

    if ($myrow['password']==$password) {
        $_SESSION['login']=$myrow['login'];
        $_SESSION['id']=$myrow['id'];
        header("Location: ../baseTable.php");
    }
    else {
        header("Location: ../");
    }
?>
