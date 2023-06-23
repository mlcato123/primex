<?php
session_start();
if($_SESSION['id'] == true){
    unset($_SESSION['id']);
    header('Location: reg.php');
}
?>