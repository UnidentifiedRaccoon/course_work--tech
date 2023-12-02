<?php
setcookie('isLoggedIn', '', time() - 3600, "/");
header("Location: ../pages/main.php");
?>