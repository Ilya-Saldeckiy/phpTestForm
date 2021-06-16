<?php
include "includes/header.php";
include  "includes/headerMenu.php";
?>
<div class='update__container'>
    <?php

    $link = include("base.php");

    if ($link->connect_error){
        die("Ошибка" . $link->connect_error);
    }

    // если запрос GET
    if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"]))
    {
        $userid = $link->real_escape_string($_GET["id"]);
        $sql = "SELECT * FROM Users WHERE id = '$userid'";
        if($result = $link->query($sql)){
            if($result->num_rows > 0){
                foreach($result as $row){
                    $user = $row["id"];
                    $userlogin = $row["login"];
                    $userpass = $row["password"];
                }
                echo "<h3 class='update__caption'>Изменение пользователя</h3>
                        <form method='post'>
                            <input type='hidden' name='id' value='$user' />
                            <p>Логин:
                            <input type='text' name='login' value='$userlogin' /></p>
                            <p>Пароль:
                            <input type='text' name='password' value='$userpass' /></p>
                            <input type='submit' value='Сохранить'>
                        </form>";
            }
            else{
                echo "<div>Пользователь не найден</div>";
            }
            $result->free();
        } else{
            echo "Ошибка: " . $link->error;
        }
    }
    elseif (isset($_POST["id"]) && isset($_POST["login"]) && isset($_POST["password"])) {

        $userid = $link->real_escape_string($_POST["id"]);
        $userlogin = $link->real_escape_string($_POST["login"]);
        $userpass = $link->real_escape_string($_POST["password"]);
        $sql = "UPDATE users SET login = '$userlogin', password = '$userpass' WHERE id = '$userid'";
        if($result = $link->query($sql)){
            echo "успех";
        } else{
            echo "Ошибка: " . $link->error;
        }
    }
    else{
        echo "Некорректные данные";
    }
    $link->close();

    ?>
</div>
<?php
include "includes/footer.php";
?>
