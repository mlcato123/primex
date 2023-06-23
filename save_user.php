<?php
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
//задаем адрес кошелька пользователя
$address = "bc1qjxpe7hvk2m0j57xqg8cd7da7pduacdk87mtwg7";


// Если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
if (empty($login) || empty($password)) {
    exit("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}

// Обрабатываем логин, чтобы теги и скрипты не работали
$login = htmlspecialchars(stripslashes(trim($login)));

// Хэшируем пароль
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Проверка на существование пользователя с таким же логином
$result = mysqli_query($conn, "SELECT id FROM users WHERE login='$login'");
$user = mysqli_fetch_array($result);
if (!empty($user['id'])) {
    exit("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
}
// Если такого пользователя нет, то сохраняем данные
if (!$result = mysqli_query($conn, "INSERT INTO users (login,password,address) VALUES('$login','$hashed_password','$address')")) {
    echo ('не получилось');
} else {
    $user_id = mysqli_insert_id($conn); // получаем идентификатор нового пользователя
    $user = selectOne('users', ['id' => $user_id], $conn);

    $_SESSION['login'] = $user['login'];
    $_SESSION['id'] = $user['id'];

    header('Location: lk/index.php');
}
// Закрываем соединение с базой данных
mysqli_close($conn);
?>