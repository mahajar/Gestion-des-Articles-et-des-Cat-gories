<?php
require_once 'config.php';

// Récupérer les catégories
$stmt = $pdo->query('SELECT * FROM categories');
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Catégories</title>
</head>
<body>
    <h1>Liste des Catégories</h1>
    <a href="add_category.php">Ajouter une Catégorie</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
        </tr>
        <?php foreach ($categories as $category): ?>
        <tr>
            <td><?= htmlspecialchars($category['id']) ?></td>
            <td><?= htmlspecialchars($category['name']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <a href="index.php">Retour à la liste des articles</a>
</body>
</html>
