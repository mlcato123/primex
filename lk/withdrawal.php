<?php
// Начинаем работу сессий. Это необходимо для хранения данных пользователя на сервере
session_start();
include('../bd.php');

$user = $_SESSION['id'] ?? null;


if (isset($_SESSION['id']) == false) {
    header('Location: ../reg.php');
}

$user = selectOne('users', ['id' => $user], $conn);

?>

<link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
<link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
<link rel="stylesheet" href="css/nalika-icon.css">
<!-- style CSS
        ============================================ -->
<link rel="stylesheet" href="style.css">


<?php include('../tpl/sidebar.php') ?>

<title>Вывод</title>

<iframe src="vav.php" frameborder="0"  style="width: 500px; height: 58%; margin-left: 40%; margin-top: 10%;"></iframe>
