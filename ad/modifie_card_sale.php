<?php
require "PDO.php";
$error = false;

$annonce_id = $_GET['id'];

$sql = "SELECT * FROM listings WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $annonce_id);
$stmt->execute();
$annonce = $stmt->fetch(PDO::FETCH_ASSOC);

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
    $type = $_POST['type_'];
    $location = $_POST['location'];
    $details = $_POST['details'];
    $details1 = $_POST['details1'];
    $details2 = $_POST['details2'];
    $description = $_POST['description'];

    $sql = "UPDATE listings 
    SET image = :image, title = :title, price = :price, favorie = :favorie, location = :location, 
    details = :details, details1 = :details1, details2 = :details2, descriptions = :description, transaction_type = :transaction_type
    WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':image', $dest);
    $stmt->bindValue(':title', $title);
    $stmt->bindValue(':price', $price);
    $stmt->bindValue(':transaction_type', $type);
    $stmt->bindValue(':location', $location);
    $stmt->bindValue(':details', $details);
    $stmt->bindValue(':details1', $details1);
    $stmt->bindValue(':details2', $details2);
    $stmt->bindValue(':description', $description);
    $stmt->bindValue(':id', $annonce_id);
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
  <form method="post" enctype="multipart/form-data">
  <div class="form-group">
      <label for="title">Title:</label><br>
      <input type="text" id="title" name="title" placeholder="Entrez votre choix" value="<?php echo $annonce['title']; ?>">
      </div>
  <div class="form-group">
      <label for="type">Your choice:</label><br>
      <select id="choix" name="type_">
      <option value="<?php echo $annonce['transaction_type']; ?>" ></option>
      <option value="<?php echo $annonce['transaction_type']; ?>" >Rent</option>
  <option value="option2" >Sale</option>
  </select>
  </div>
    <div class="form-group">
      <label for="adresse">Address:</label><br>
      <input type="text" id="adresse" name="location" placeholder="Entrez votre choix" value="<?php echo $annonce['location']; ?>">
      </div>
    <div class="form-group">
      <label for="chambres">Number of Guests:</label><br>
      <input type="number" id="chambres" name="details" placeholder="Entrez votre choix" value="<?php echo $annonce['details']; ?>">
    </div>
    <div class="form-group">
      <label for="chambres">Number of Bedrooms:</label><br>
      <input type="number" id="chambres" name="details1" placeholder="Entrez votre choix"value="<?php echo $annonce['details1']; ?>">
    </div>
    <div class="form-group">
      <label for="surface">Living Area:</label><br>
      <input type="number" id="surface" name="surface" placeholder="Entrez votre choix" value="<?php echo $annonce['details2']; ?>">
    </div>
    <div class="form-group">
      <label for="prix">Price (in euros):</label><br>
      <input type="number" id="prix" name="price" placeholder="Entrez votre choix" value="<?php echo $annonce['price']; ?>">
    </div>
    <div class="form-group">
      <label for="description">Description:</label><br>
      <textarea id="description" name="description" rows="5"<?php echo $annonce['descriptions']; ?>></textarea>
    </div>
    <div class="form-group">
    <label for="photo" id="photo_label"><img src="../images/1141335.png" alt="">(jpg,jpeg,png,gif):</label><br>
    <input type="file" id="photo_form" name="image" value="<?php echo $annonce['image']; ?>">
  </div>
    <button  type="submit" class="envoyer">Save Changes</button>

  </form>



</body>
        
</html>




