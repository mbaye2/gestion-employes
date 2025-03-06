<?php
include('config.php');

if (!isset($_GET['id'])) {
  die("ID non spécifié");
}
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $poste = $_POST['poste'];
  $date_embauche = $_POST['date_embauche'];

  $sql = "UPDATE employes SET nom='$nom', prenom='$prenom', email='$email', poste='$poste', date_embauche='$date_embauche' WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit;
  } else {
    echo "Erreur: " . $conn->error;
  }
}

$sql = "SELECT * FROM employes WHERE id=$id";
$result = $conn->query($sql);
$employe = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Modifier l'Employé</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    h1 {
      text-align: center;
      color: #333;
    }

    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      width: 300px;
      margin: 20px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      color: #333;
    }

    input[type="text"], input[type="email"], input[type="date"] {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ddd;
      border-radius: 4px;
    }

    input[type="submit"] {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
    }

    a {
      text-decoration: none;
      color: #007bff;
      text-align: center;
      display: block;
      margin-top: 10px;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <h1>Modifier l'Employé</h1>
  <form method="post" action="">
    <label for="nom">Nom:</label>
    <input type="text" id="nom" name="nom" value="<?php echo $employe['nom']; ?>" required>

    <label for="prenom">Prénom:</label>
    <input type="text" id="prenom" name="prenom" value="<?php echo $employe['prenom']; ?>" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $employe['email']; ?>" required>

    <label for="poste">Poste:</label>
    <input type="text" id="poste" name="poste" value="<?php echo $employe['poste']; ?>" required>

    <label for="date_embauche">Date d'embauche:</label>
    <input type="date" id="date_embauche" name="date_embauche" value="<?php echo $employe['date_embauche']; ?>" required>

    <input type="submit" value="Modifier">
  </form>

  <a href="index.php">Retour</a>
</body>
</html>
