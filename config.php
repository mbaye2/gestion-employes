<?php
$host = 'localhost';
$db   = 'gestion_employes_db';
$user = 'gestion_user';
$pass = 'password123';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Erreur de connexion: " . $conn->connect_error);
}
?>
