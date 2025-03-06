<?php
// Informations de connexion à la base de données
$servername = "localhost";
$username = "gestion_user";
$password = "password123";
$dbname = "gestion_employes_db";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $poste = $_POST["poste"];
    $date_embauche = $_POST["date_embauche"];

    try {
        // Connexion à la base de données
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparer et exécuter la requête d'insertion
        $stmt = $conn->prepare("INSERT INTO employes (nom, prenom, email, poste,date_embauche) VALUES (:nom, :prenom, :email, :poste, :date_embauche)");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':poste', $poste);
        $stmt->bindParam(':date_embauche', $date_embauche);
        $stmt->execute();

        // Rediriger vers la page de liste des employés
        header("Location: index.php");
        exit();
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    $conn = null;
}
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un employé</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .form-label {
            color: #333;
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Ajouter un employé</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom">
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="poste" class="form-label">Poste</label>
                <input type="text" class="form-control" id="poste" name="poste">
            </div>
            <div class="mb-3">
                <label for="date_embauche" class="form-label">Date d'embauche</label>
                <input type="date" class="form-control" id="date_embauche" name="date_embauche">
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</body>
</html>


