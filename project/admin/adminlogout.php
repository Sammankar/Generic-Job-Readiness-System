<?php
session_start();
unset($_SESSION['users_id']);
session_destroy();
header("location:index.php?status=logout");
?>