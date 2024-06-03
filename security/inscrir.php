<?php
require "../ad/PDO.php";

if(isset($_POST['email']) && isset($_POST['password'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("INSERT INTO users (email, passwd) VALUES (:email, :password)");
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo 'Vous avez créé un compte avec succès';
        header("Location: ../../../index.php");
        exit;
    } else {
        header("Location: inscrire.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création d'un compte</title>
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
            background-color: #b89270;
        }
        .container {
            max-width: 600px;
            background-color: #fff;
            padding: 100px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            font-size:20px;
        }
        .form-group input {
            width: 500px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .boutton{
                display :flex;
                justify-content: center;
                margin-top: 50px;
            }
        .btn {
            display: inline-block;
            background-color: black;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight:bolder;
            font-size:15px;
   
        }
          
        .btn:hover {
            background-color: #0056b3;
        }
        h2{
            text-align:center;
            font-size:30px;
        }
   
    </style>
</head>
<body>
    <div class="container">
        <h2>Création d'un compte</h2>
        <form method="post">
            <div class="form-group">
                <label for="email">E-mail :</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="boutton">
                <button type="submit" class="btn">Inscrire</button>
            </div>
        </form>
    </div>
</body>
</html>
