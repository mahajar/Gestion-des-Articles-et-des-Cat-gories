<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];

    $stmt = $pdo->prepare('INSERT INTO categories (name) VALUES (?)');
    $stmt->execute([$name]);

    header('Location: categories.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Catégorie</title>
</head>
<body>
    <h1>Ajouter une Catégorie</h1>
    <form method="post">
        <label>Nom :</label>
        <input type="text" name="name" required>
        <br>
        <button type="submit">Ajouter</button>
    </form>
    <a href="categories.php">Retour à la liste des catégories</a>
</body>
</html>
