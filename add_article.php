<?php
require_once 'config.php';

// Récupérer les catégories pour le formulaire
$stmt = $pdo->query('SELECT * FROM categories');
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category_id = $_POST['category_id'] ?: null;

    $stmt = $pdo->prepare('INSERT INTO articles (title, content, category_id) VALUES (?, ?, ?)');
    $stmt->execute([$title, $content, $category_id]);

    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Article</title>
</head>
<body>
    <h1>Ajouter un Article</h1>
    <form method="post">
        <label>Titre :</label>
        <input type="text" name="title" required>
        <br>
        <label>Contenu :</label>
        <textarea name="content" required></textarea>
        <br>
        <label>Catégorie :</label>
        <select name="category_id">
            <option value="">Aucune</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id'] ?>"><?= htmlspecialchars($category['name']) ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <button type="submit">Ajouter</button>
    </form>
    <a href="index.php">Retour à la liste</a>
</body>
</html>
