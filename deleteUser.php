<?php
$link = include("base.php");

if (!isset($_GET['id'])) {
    echo 'Такого ID не существует';
    exit;
}
if ($link->connect_error) {
    die('Ошибка подключения(' . $link->connect_error . ') ' . $link->connect_error);
}
$sql = "DELETE FROM users WHERE id = ?";
if (!$result = $link->prepare($sql)) {
    die('Запрос не выполнен (' . $link->errno . ') ' . $link->error);
}

if (!$result->bind_param('i', $_GET['id'])) {
    die('Binding parameters failed: (' . $result->errno . ') ' . $result->error);
}
if (!$result->execute()) {
    die('Execute failed: (' . $result->error . ') ' . $result->error);
}
if ($result->affected_rows > 0) {
//    echo "Пользователь удалён";
    header("Location: ../baseTable.php");
} else {
    echo "Ошибка удаления"; }
$result->close();
$link->close();

?>