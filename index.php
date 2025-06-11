<?php
require_once 'config.php';

// Récupérer les articles et leurs catégories
$query = 'SELECT articles.id, articles.title, articles.content, categories.name AS category_name 
          FROM articles 
          LEFT JOIN categories ON articles.category_id = categories.id';
$stmt = $pdo->query($query);
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Articles</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>Liste des Articles</h1>
    <a href="add_article.php">Ajouter un Article</a> | <a href="categories.php">Gérer les Catégories</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Contenu</th>
            <th>Catégorie</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($articles as $article): ?>
        <tr>
            <td><?= htmlspecialchars($article['id']) ?></td>
            <td><?= htmlspecialchars($article['title']) ?></td>
            <td><?= htmlspecialchars($article['content']) ?></td>
            <td><?= htmlspecialchars($article['category_name'] ?? 'Aucune') ?></td>
            <td>
                <a href="edit_article.php?id=<?= $article['id'] ?>">Modifier</a>
                <a href="delete_article.php?id=<?= $article['id'] ?>" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
