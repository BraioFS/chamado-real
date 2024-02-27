<?php
session_start();
if (isset($_SESSION["usuario"]) && $is_objetc($_SESSION['usuario'])) {
    $user = $_SESSION["usuario"];
    $_SESSION["profile_id"] = $user->profile_id;
} else {
    $_SESSION["profile_id"] = null;
}

if (!isset($_SESSION['autentication']) || $_SESSION['autentication'] != 'SIM') {
    header('lLocation: index.php?login=erro');
    exit;
}


?>