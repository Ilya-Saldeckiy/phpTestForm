<?php
$link = include("base.php");

if ($link->connect_error){
    die("Ошибка" . $link->connect_error);
}

$data = "SELECT * FROM users";
if ($result = $link->query($data)){
    $rowCount = $result->num_rows;
    echo "<p class='row__count'>Общее количесвтво логинов: $rowCount</p>";
    echo "<table class='base__table'><tr><th>Id</th><th>Логин</th><th>Пароль</th><th>Действия</th></tr>";
    foreach ($result as $row){
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["login"] . "</td>";
        echo "<td>" . $row["password"] . "</td>";
//                echo "<td>" . "<button class='btn table__clean--btn' name='deleteItem'>Удалить</button>" . "</td>";
        echo "<td>" ."<a href='deleteUser.php?id=$row[id]'><button class='btn table__clean--btn'>Удалить</button>></a>" . "<a href='update.php?id=$row[id]'><button class='btn table__clean--btn'>Изменить</button>></a>" . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    $result->free();
} else {
    echo "Ошибка" . $link->connect_error;
}
$link->close();
?>