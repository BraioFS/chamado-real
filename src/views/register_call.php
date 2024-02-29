<?php
session_start();
require_once('C:/xampp/htdocs/chamado-real/validator_access.php');

$title = str_replace('#', '-', $_POST['title']);
$category = str_replace('#', '-', $_POST['category']);
$description = str_replace('#', '-', $_POST['description']);

$texto = $_SESSION['id'] . '#' . $title . '#' . $category . '#' . $description . PHP_EOL;

$arquivo = fopen('C:\xampp\htdocs\chamado-real\arquivo.txt', 'a');
fwrite($file, $text);
fclose($file);

header('Location: open_call.php');
?>