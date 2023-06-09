<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Bookmarks Registry (by BauKo.)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../views/css/styles.css">
    <link rel="icon" type="image/x-icon" href="../views/css/favicon.ico">
    <script src="https://kit.fontawesome.com/c6f17a239d.js" crossorigin="anonymous"></script>

</head>

<body>
    <h1>✨Bookmarks Registry (by BauKo.)✨</h1>
    <h2>Registre de signets d'utilisateurs</h2>
    <div class="tableau">
        <table>
            <thead>
                <th>ID</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th>IDU</th>
                <th>
                    < Actions />
                </th>
            </thead>
            <tbody>
                <?php
                foreach ($result as $info) {
                ?>
                    <tr>
                        <td><?= $info['id'] ?></td>
                        <td><?= $info['name'] ?></td>
                        <td><a class="bkm-link" target="_blank" href="<?= $info['url'] ?>"><?= $info['url'] ?></a></td>
                        <td><?= $info['id_user'] ?></td>
                        <td><a class="edit" href="/update/<?= $info['id'] ?>"><i class="fa-solid fa-pencil"></i> Modifier</a> <a class="del" href="/delete/<?= $info['id'] ?>"><i class="fa-solid fa-trash-can"></i> Supprimer</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div>
            <a class="add" href="/create"><i class="fa-solid fa-square-plus"></i> Ajouter</a>
        </div>
    </div>
</body>

</html>