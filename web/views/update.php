<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit - Bookmarks Registry (by BauKo.)</title>
    <link rel="icon" type="image/x-icon" href="css/favicon.ico">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <h1>✏️Modifier un bookmark✏️</h1>
    <h2>Quelles informations souhaitez-vous modifier ?</h2>
    <div class="formulaire">
        <form method="post">
            <label class="frm-content" for="nom">Nom</label>
            <input class="frm-content input-form" type="text" name="nom" id="name" value="<?= $result['name'] ?>"><br>
            <label class="frm-content" for="prix">Adresse</label>
            <input class="frm-content input-form" type="text" name="adresse" id="url" value="<?= $result['url'] ?>"><br>
            <label class="frm-content" for="id_user">IDU</label>
            <input class="frm-content input-form" type="number" name="idu" id="id_user" value="<?= $result['id_user'] ?>" min="1" max="6"><br>
            <button class="frm-content btn-form">Enregistrer</button>
            <input type="hidden" name="id" value="<?= $result['id'] ?>">
        </form>
    </div>
    <a class="back-btn" href="../web/index.php">
        << Retour</a>
</body>

</html>