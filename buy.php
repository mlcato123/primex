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

if (isset($_POST['buy'])) {
  $sumBuy = (float)$_POST['sumBuy'];
  
  // Check if sumBuy exceeds BTC balance
  if ($sumBuy > $balance) {
    echo "Error: You cannot buy more than your BTC balance.";
    exit();
  }
  
  if ($sumBuy > 0) {
    $sum = $sumBuy / $bitcoin_rate_formatted;
    $balance -= $sumBuy;
    $btc_balance += $sum;
    mysqli_query($conn, "UPDATE `users` SET `balance` = $balance, `btc_balance` = $btc_balance WHERE id='$id'");
  }
  header('Location: dashboard.php');
  exit();
} else {
  echo 'Error: Invalid request.';
}
?>
