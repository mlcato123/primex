<?php
session_start();
include('bd.php');
include('price.php');

$user_id = $_SESSION['id'] ?? null;

if ($user_id === null) {
  header('Location: reg.php');
  exit();
}

$user = selectOne('users', ['id' => $user_id], $conn);

$balance = $user['balance'];
$btc_balance = $user['btc_balance'];
$id = $user['id'];

if (isset($_POST['sell'])) {
  $sumSell = (float)$_POST['sumSell'];
  
  // Check if sumSell exceeds BTC balance
  if ($sumSell > $btc_balance) {
    echo "Error: You cannot sell more BTC than your balance.";
    exit();
  }
  
  if ($sumSell > 0) {
    $sum = $bitcoin_rate_formatted * $sumSell;
    $btc_balance -= $sumSell;
    $balance += $sum;
    mysqli_query($conn, "UPDATE `users` SET `balance` = $balance, `btc_balance` = $btc_balance WHERE id='$id'");
  }
  header('Location: dashboard.php'); 
  exit();
} else {
  echo 'Error: Invalid request.';
}
?>
