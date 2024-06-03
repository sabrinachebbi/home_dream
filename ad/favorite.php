<?php
session_start();
require_once __DIR__ . "/PDO.php";

if (!empty($_SESSION['isLoggedIn'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM listings WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $listing = $stmt->fetch(PDO::FETCH_ASSOC);
    var_dump($listing);


    $sql = "UPDATE listings set favorie= :favorie WHERE id =:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':favorie', $listing['favorie'] === 1 ? 0 : 1);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    header('Location: /index.php');
    exit();
}
