<?php

// Начинаем работу сессий. Это необходимо для хранения данных пользователя на сервере
session_start();

// Подключаемся к базе данных
include("bd.php");


// Проверяем, были ли переданы данные из формы
if (isset($_POST['login'])) {
    $login = $_POST['login'];
    if ($login == '') {
        unset($login);
    }
}
if (isset($_POST['password'])) {
    $password = $_POST['password'];
    if ($password == '') {
        unset($password);
    }
}

// Если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
if (empty($login) || empty($password)) {
    exit("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}

// Обрабатываем логин и пароль, чтобы теги и скрипты не работали и удаляем лишние пробелы
$login = trim(htmlspecialchars(stripslashes($login)));
$password = trim(htmlspecialchars(stripslashes($password)));


// Ищем пользователя с таким же login в базе данных
$result = mysqli_query($conn, "SELECT * FROM users WHERE login='$login'");
$user = mysqli_fetch_array($result);

// Если пользователя с таким login не существует, то выводим ошибку и останавливаем скрипт
if (empty($user['password'])) {
    exit("Извините, введенный вами логин неверный.");
} else {
    // Проверяем, соответствуют ли введенный пароль и пароль из базы данных
    if (password_verify($password, $user['password'])) {
        // Если пароли совпадают, то сохраняем данные пользователя в сессии и перенаправляем его на главную страницу сайта
        $user = selectOne('users', ['id' => $user['id']], $conn);
        if (!$user) {
            exit("Извините, произошла ошибка при попытке получения данных пользователя.");
        }

        $_SESSION['login'] = $user['login'];
        $_SESSION['id'] = $user['id'];

        header('Location: lk/index.php');
        exit();
    } else {
        // Если пароли не совпадают, то выводим ошибку и останавливаем скрипт
        exit("Извините, введенный вами пароль неверный.");
    }
}

// Закрываем соединение с базой данных
mysqli_close($conn);
?>