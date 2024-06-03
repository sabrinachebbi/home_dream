<?php
session_start();
require "PDO.php";
if (!empty($_SESSION['isLoggedIn'])) {
    $annonce_id = $_GET['id'];
    $sql = "SELECT * FROM listings WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $annonce_id);
    $stmt->execute();
    $annonce = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!empty($annonce)){
        $sql = "DELETE FROM listings WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $annonce_id);
        $stmt->execute();
    }
    header('Location: /index.php');
    exit();
}
?>
