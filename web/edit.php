<?php
require_once('connect.php');

if (isset($_POST)) {
    if (
        isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['nom']) && !empty($_POST['nom'])
        && isset($_POST['adresse']) && !empty($_POST['adresse'])
        && isset($_POST['idu']) && !empty($_POST['idu'])
    ) {
        $id = strip_tags($_GET['id']);
        $nom = strip_tags($_POST['nom']);
        $adresse = strip_tags($_POST['adresse']);
        $idu = strip_tags($_POST['idu']);

        $sql = "UPDATE `regist_bookmark` SET `name`=:name, `url`=:url, `id_user`=:id_user WHERE `id`=:id;";

        $query = $db->con->prepare($sql);

        $query->bindValue(':name', $nom, PDO::PARAM_STR);
        $query->bindValue(':url', $adresse, PDO::PARAM_STR);
        $query->bindValue(':id_user', $idu, PDO::PARAM_INT);
        $query->bindValue(':id', $id, PDO::PARAM_INT);

        $query->execute();

        header('Location: index.php');
    }
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM `regist_bookmark` WHERE `id`=:id;";

    $query = $db->con->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    $result = $query->fetch();
}

require_once('close.php');
?>
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
    <h2>Quelles informations souhaitez-vous modifier</h2>
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
    <a class="back-btn" href="index.php">
        << Retour</a>
</body>

</html>