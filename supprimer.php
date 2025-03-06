<?php
include('config.php');

if (!isset($_GET['id'])) {
  die("ID non spécifié");
}
$id = $_GET['id'];

$sql = "DELETE FROM employes WHERE id=$id";
if ($conn->query($sql) === TRUE) {
  header("Location: index.php");
  exit;
} else {
  echo "Erreur: " . $conn->error;
}
?>
