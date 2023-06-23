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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пополнение криптовалюты</title>
    <link rel="shortcut icon" type="image/x-icon" href="lk/img/favicon.ico">
<link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
<link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
<link rel="stylesheet" href="css/nalika-icon.css">
<!-- style CSS
        ============================================ -->
<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../scss/style.scss">
    
</head>

<body>
    <?php include('../tpl/sidebar.php'); ?>
    <iframe src="vvod.php" frameborder="0"  style="width: 1572px;height: 676px;margin-left: 15%;margin-top: 5%;}"></iframe>

</body>

</html>