<?php
session_start();

if (isset($_SESSION["user"]) && is_object($_SESSION['user'])) {
    $user = $_SESSION["user"];
    $_SESSION["profile_id"] = $user->profile_id;
} else {
    $_SESSION["profile_id"] = null;
}

if (!isset($_SESSION['authentication']) || $_SESSION['authentication'] != 'YES') {
    header('Location: index.php?login=erro');
    exit;
}
?>