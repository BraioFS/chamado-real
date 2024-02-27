<?php
session_start();

require_once '../chamado-real/src/controllers/';
$loginController = new LoginController();
$loginController->authenticate($_POST['email'], $_POST['password']);
?>