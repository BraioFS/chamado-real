<?php
session_start();

if (isset($_POST['registration'], $_POST['password'])) {
    require_once './src/controllers/LoginController.php';

    $loginController = new LoginController();
    $loginController->authenticate($_POST['registration'], $_POST['password']);
} else {
    $_SESSION['authentication'] = 'NO';
    header('Location: index.php?login=erro');
    exit;
}
?>
