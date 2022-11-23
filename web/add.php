<?php
require_once('connect.php');

if (isset($_POST)) {
    if (
        isset($_POST['nom']) && !empty($_POST['nom'])
        && isset($_POST['adresse']) && !empty($_POST['adresse'])
        && isset($_POST['idu']) && !empty($_POST['idu'])
    ) {
        $nom = strip_tags($_POST['nom']);
        $adresse = strip_tags($_POST['adresse']);
        $idu = strip_tags($_POST['idu']);

        $sql = "INSERT INTO `regist_bookmark` (`name`, `url`, `id_user`) VALUES (:name, :url, :id_user);";

        $query = $db->prepare($sql);

        $query->bindValue(':name', $nom, PDO::PARAM_STR);
        $query->bindValue(':url', $adresse, PDO::PARAM_STR);
        $query->bindValue(':id_user', $idu, PDO::PARAM_INT);

        $query->execute();
        $_SESSION['message'] = "Bookmark ajouté avec succès !";
        header('Location: index.php');
    }
}

require_once('close.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add - Bookmarks Registry (by BauKo.)</title>
    <!-- <link rel="stylesheet" href="css/styles.css"> -->
    <link rel="icon" type="image/x-icon" href="css/favicon.ico">

</head>

<body>
    <h1>📜Ajouter un signet au registre📜</h1>
    <h2>Renseignez les informations du nouveau signet</h2>
    <div class="formulaire">
        <form method="post">
            <label class="frm-content" for="nom">Nom</label>
            <input class="frm-content input-form" type="text" name="nom" id="name"><br>
            <label class="frm-content" for="url">Adresse</label>
            <input class="frm-content input-form" type="text" name="adresse" id="url"><br>
            <label class="frm-content" for="id_utilisateur">IDU</label>
            <input class="frm-content input-form" type="number" name="idu" id="id_user" min="1" max="6"><br>
            <button class="frm-content btn-form">Enregistrer</button>
        </form>
    </div>
    <a class="back-btn" href="index.php">
        << Retour</a>
</body>

</html>