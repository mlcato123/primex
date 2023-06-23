<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prime";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function selectOne($table, $where, $conn)
{
    $sql = "SELECT * FROM $table WHERE ";
    $conditions = [];
    foreach ($where as $key => $value) {
        $conditions[] = "$key='$value'";
    }
    $sql .= implode(' AND ', $conditions);
    $result = mysqli_query($conn, $sql);
    if (!$result || mysqli_num_rows($result) === 0) {
        echo "Ошибка выполнения запроса: " . mysqli_error($conn);
        return null;
    }
    return mysqli_fetch_assoc($result);
}


?>