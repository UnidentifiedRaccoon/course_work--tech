<?php
setcookie('authToken', '', time() - 3600, "/");
header("Location: ../pages/main.php");
?>