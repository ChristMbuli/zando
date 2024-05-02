<form method="post" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="nom article" required><br>
    <input type="number" name="price" placeholder="prix article" required><br>
    <textarea name="description" cols="30" rows="10"></textarea><br>
    <select name="category">
        <?php if (!empty($categories)):
            foreach ($categories as $category): ?>
                <option value="<?= htmlspecialchars($category['id']); ?>">
                    <?= htmlspecialchars($category['title']); ?>
                </option>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucune catégorie disponible.</p>
        <?php endif; ?>

    </select><br>
    <input type="file" name="image" placeholder="image article"><br>
    <button type="submit" name="add">Ajouter</button>

</form>