


<?php
require "PDO.php";
$error = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $filename = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if (in_array(strtolower($ext), $allowed)) {
    
            $dest = '/upload/' . uniqid() . '.' . $ext;
            if (move_uploaded_file($file_tmp, __DIR__ . "/.." . $dest)) {
                echo "Le fichier a été téléchargé avec succès.";
            } else {
                echo "Erreur lors du téléchargement du fichier.";
            }
        } else {
            echo "Extension de fichier non autorisée.";
        }
    } else {
        echo "Une erreur est survenue lors du téléchargement du fichier.";
    }

    if (!$error) {
        $title = $_POST['title'];
        $price = $_POST['price'];
        $favorie = $_POST['favorie'];
        $location = $_POST['location'];
        $details = $_POST['details'];
        $details1 = $_POST['details1'];
        $details2 = $_POST['details2'];
        $description = $_POST['description'];
        $id_user = $_POST['id_user'];
        $type = $_POST['type_'];

        $sql = "INSERT INTO listings(image, title, price, favorie, location, details, details1, details2, descriptions,transaction_type, id_user) 
                VALUES (:image, :title, :price, :favorie, :location, :details, :details1, :details2, :description, :transaction_type,:id_user)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':image', $dest);
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':price', $price);
        $stmt->bindValue(':favorie', 0);
        $stmt->bindValue(':location', $location);
        $stmt->bindValue(':details', $details);
        $stmt->bindValue(':details1', $details1);
        $stmt->bindValue(':details2', $details2);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':transaction_type',  $type);
        $stmt->bindValue(':id_user',$_SESSION['isConnected']);
        $stmt->execute();
        header('Location: /index.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire Détails du bien immobilier</title>
  <link rel="stylesheet" href="/style.css">
</head>
<body>
  <h2 class="titre_immobilier">Publish a New Listing:</h2>
  <form method="post" enctype="multipart/form-data">
  <div class="form-group">
  <form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Title:</label><br>
    <input type="text" id="title" name="title" placeholder="Enter your choice" 
    >
  </div>
  <div class="form-group">
    <label for="type">Your choice:</label><br>
    <select id="choix" name="type_">
      <option value="option1"></option>
      <option value="rent">Rent</option>
      <option value="sale">Sale</option>
    </select>
  </div>
  <div class="form-group">
    <label for="adresse">Address:</label><br>
    <input type="text" id="adresse" name="location" placeholder="Enter your choice" required>
  </div>
  <div class="form-group">
    <label for="guests">Number of Guests:</label><br>
    <input  id="guests" name="details" placeholder="Enter your choice" required>
  </div>
  <div class="form-group">
    <label for="bedrooms">Number of Bedrooms:</label><br>
    <input  id="bedrooms" name="details1" placeholder="Enter your choice" required>
  </div>
  <div class="form-group">
    <label for="bathrooms">Number of Bathrooms:</label><br>
    <input  id="bathrooms" name="details2" placeholder="Enter your choice" required>
  </div>
  <div class="form-group">
    <label for="area">Living Area:</label><br>
    <input id="area" name="surface" placeholder="Enter your choice" required>
  </div>
  <div class="form-group">
    <label for="price"> Price (in euros):</label><br>
    <input id="price" name="price" placeholder="Enter your choice" required>
  </div>
  <div class="form-group">
    <label for="description"> Description:</label><br>
    <textarea id="description" name="description" rows="5" required></textarea>
  </div>
  <div class="form-group">
    <label for="photo" id="photo_label"><img src="../images/1141335.png" alt="">(jpg, jpeg, png, gif):</label><br>
    <input type="file" id="photo_form" name="image" required>
  </div>
  <button type="submit" class="envoyer">Send</button>
</form>
