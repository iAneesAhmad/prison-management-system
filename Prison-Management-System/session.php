<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['uname'] = $_POST['uname'];
    $_SESSION['pass'] = $_POST['pass'];

    header("Location: main.php"); 
    exit();
}
?>