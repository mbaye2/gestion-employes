<?php
include('config.php');
$result = $conn->query("SELECT * FROM employes");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Liste des Employés - Gestion Employes</title>
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

    a {
      text-decoration: none;
      color: #007bff;
      margin: 10px;
    }

    table {
      width: 80%;
      margin: 20px auto;
      border-collapse: collapse;
      background-color: #fff;
    }

    th, td {
      padding: 10px;
      text-align: left;
      border: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
      color: #333;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tr:hover {
      background-color: #f1f1f1;
    }

    td a {
      margin-right: 10px;
      color: #28a745;
    }

    td a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <h1>Liste des Employés</h1>
  <a href="ajouter.php">Ajouter un employé</a>
  <table>
    <tr>
      <th>ID</th>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Email</th>
      <th>Poste</th>
      <th>Date d'embauche</th>
      <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
         <td><?php echo $row['id']; ?></td>
         <td><?php echo $row['nom']; ?></td>
         <td><?php echo $row['prenom']; ?></td>
         <td><?php echo $row['email']; ?></td>
         <td><?php echo $row['poste']; ?></td>
         <td><?php echo $row['date_embauche']; ?></td>
         <td>
             <a href="modifier.php?id=<?php echo $row['id']; ?>">Modifier</a>
             <a href="supprimer.php?id=<?php echo $row['id']; ?>">Supprimer</a>
         </td>
      </tr>
    <?php } ?>
  </table>
</body>
</html>

