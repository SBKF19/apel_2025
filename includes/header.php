<?php session_start();
include_once 'includes/database.php';
$currentlink = $_SERVER['REQUEST_URI'];
// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION['utilisateur']) && (!str_contains($currentlink, 'connexion.php'))) {
    header('Location: connexion.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Apel 2025</title>
</head>

<body>