<?php
function checkAccess($requiredRole) {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== $requiredRole) {
        header("Location: login.php");
        exit;
    }
}
?>
