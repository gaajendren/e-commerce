<?php
session_start();

header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

if (isset($_SESSION['id'])) {
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    unset($_SESSION['role']);
}
session_unset();
session_destroy();

header("Location: login.php");
exit();
?>
