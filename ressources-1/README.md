# 1.1

## Création des tables de mon MCD

### Table "Utilisateur"
> CREATE TABLE userdata (
    id INT NOT NULL PRIMARY KEY,
    email varchar(255),
    login varchar(255),
    password varchar(255)
);

### Table "Bookmark"
> CREATE TABLE regist_bookmark (
    id INT NOT NULL PRIMARY KEY,
    author varchar(255),
    name varchar(255),
    url varchar(255)
);

### Table "Catégorie"
> CREATE TABLE category (
    id INT NOT NULL PRIMARY KEY,
    name varchar(255)
);


## Création des tables de relations intermédiares

### Table "Catégories de Bookmarks"
> CREATE TABLE bookmark_category (
    id_bookmark INT,
    id_category INT,
    FOREIGN KEY (id_bookmark) REFERENCES regist_bookmark(id),
    FOREIGN KEY (id_category) REFERENCES category(id)
);

### Table "Catégories de l'Utilisateur"
> CREATE TABLE user_category (
    name varchar(255),
    id_user INT,
    id_category INT,
    FOREIGN KEY (id_user) REFERENCES userdata(id),
    FOREIGN KEY (id_category) REFERENCES category(id)
);

## J'ai oublié de mettre des AUTO_INCREMENT dans mes id（＞人＜；）!
### *Cassure des relations FOREIGN KEY dans chaque table intermédiaires via la requète ALTER TABLE*
*Exemple avec la table intermédiaire "Catégorie de Bookmark :*
> ALTER TABLE bookmark_category  
    ADD id_bookmark INT,
    ADD FOREIGN KEY (id_bookmark) REFERENCES regist_bookmark(id),
    ADD FOREIGN KEY (id_category) REFERENCES category(id)
;

### Ajout AUTO_INCREMENT dans la table "Utilisateur"
> ALTER TABLE userdata 
    CHANGE id id INT NOT NULL AUTO_INCREMENT
;

### Ajout AUTO_INCREMENT dans la table "Bookmark"
> ALTER TABLE regist_bookmark 
    CHANGE id id INT NOT NULL AUTO_INCREMENT
;

### Ajout AUTO_INCREMENT dans la table "Catégorie"
> ALTER TABLE category 
    CHANGE id id INT NOT NULL AUTO_INCREMENT
;

## Création de la relation directe entre la table "Utilisateur" et la table "Bookmark"
> ALTER TABLE regist_bookmark
    ADD id_user INT,
    ADD FOREIGN KEY (id_user) REFERENCES userdata(id)
;

# 1.2

## Création de valeurs dans la table "Utilisateur"

> INSERT INTO `userdata`(`email`, `login`, `password`) VALUES ('timrodriguez@mail.fr','tIm0','phpzagza101');

> INSERT INTO `userdata`(`email`, `login`, `password`) VALUES ('jijicobanet@hotmail.com','Jico','123Karma');

> INSERT INTO `userdata`(`email`, `login`, `password`) VALUES ('patrickvincent@email.org','Patrick Vincent','Clara61');

> INSERT INTO `userdata`(`email`, `login`, `password`) VALUES ('erneste@midnight.fable','Ernie','MyTobiCat_');

> INSERT INTO `userdata`(`email`, `login`, `password`) VALUES ('rickopobaro@gmail.com','Ricky','50.PickleD-');

> INSERT INTO `userdata`(`email`, `login`, `password`) VALUES ('arnaudmogard@mail.fr','Amogus','sussyImpostor69');

## Création de valeurs dans la table "Bookmark"
*Référence :*
> INSERT INTO `regist_bookmark`(`name`, `url`, `id_user`) VALUES ('_','_','_');

*-*

> INSERT INTO `regist_bookmark`(`name`, `url`, `id_user`) VALUES ('Pense bête CSS3','https://cloud.oktopod.io/index.php/s/fS2eH7aciYntjsH?dir=undefined&openfile=3934','2');

> INSERT INTO `regist_bookmark`(`name`, `url`, `id_user`) VALUES ('Flexbox Froggy','https://flexboxfroggy.com/#fr','6');

> INSERT INTO `regist_bookmark`(`name`, `url`, `id_user`) VALUES ('ressources mdn','https://developer.mozilla.org/fr/','4');

> INSERT INTO `regist_bookmark`(`name`, `url`, `id_user`) VALUES ('ressources w3school','https://www.w3schools.com/','4');

> INSERT INTO `regist_bookmark`(`name`, `url`, `id_user`) VALUES ('GitHub','https://github.com/','5');

> INSERT INTO `regist_bookmark`(`name`, `url`, `id_user`) VALUES ('Beepbox','https://beepbox.co','3');

> INSERT INTO `regist_bookmark`(`name`, `url`, `id_user`) VALUES ('Hexa Converter','https://www.calkoo.com/fr/convertisseur-hexadecimal','1');

> INSERT INTO `regist_bookmark`(`name`, `url`, `id_user`) VALUES ('Flexfrog','https://flexboxfroggy.com/#fr','1');

> INSERT INTO `regist_bookmark`(`name`, `url`, `id_user`) VALUES ('text cool','https://lingojam.com/FancyTextGenerator','4');

> INSERT INTO `regist_bookmark`(`name`, `url`, `id_user`) VALUES ('Php Delusions','https://phpdelusions.net/','2');

> INSERT INTO `regist_bookmark`(`name`, `url`, `id_user`) VALUES ('YGGT (temporaire)','https://ww3.yggtorrent.si/','1');

> INSERT INTO `regist_bookmark`(`name`, `url`, `id_user`) VALUES ('MediBang!','https://medibang.com/','6');

## Création de valeurs dans la table "Catérogie"
*Référence :*
> INSERT INTO `category`(`name`) VALUES ('_');

*-*

> INSERT INTO `category`(`name`) VALUES ('Formation Web');

> INSERT INTO `category`(`name`) VALUES ('Trivia');

## Association des valeurs de la table "Catégorie de Bookmark"
*Supression d'erreur précédente*
> DELETE FROM bookmark_category WHERE `bookmark_category`.`id_rbookmark` = 1

*-*

*Référence :*
> INSERT INTO `bookmark_category`(`id_rbookmark`, `id_category`) VALUES ('_','_');

*-*

> INSERT INTO `bookmark_category`(`id_rbookmark`, `id_category`) VALUES ('1','1');

> INSERT INTO `bookmark_category`(`id_rbookmark`, `id_category`) VALUES ('2','1');

> INSERT INTO `bookmark_category`(`id_rbookmark`, `id_category`) VALUES ('3','1');

> INSERT INTO `bookmark_category`(`id_rbookmark`, `id_category`) VALUES ('4','1');

> INSERT INTO `bookmark_category`(`id_rbookmark`, `id_category`) VALUES ('5','1');

> INSERT INTO `bookmark_category`(`id_rbookmark`, `id_category`) VALUES ('6','2');

> INSERT INTO `bookmark_category`(`id_rbookmark`, `id_category`) VALUES ('7','2');

> INSERT INTO `bookmark_category`(`id_rbookmark`, `id_category`) VALUES ('8','1');

> INSERT INTO `bookmark_category`(`id_rbookmark`, `id_category`) VALUES ('9','2');

> INSERT INTO `bookmark_category`(`id_rbookmark`, `id_category`) VALUES ('10','1');

> INSERT INTO `bookmark_category`(`id_rbookmark`, `id_category`) VALUES ('11','2');

> INSERT INTO `bookmark_category`(`id_rbookmark`, `id_category`) VALUES ('12','2');

# 1.3

## Requètes SQL de récupération d'informations

### Récupération de tous les bookmarks

> SELECT regist_bookmark.name FROM regist_bookmark

### Récupération de seulement 10 bookmarks

> SELECT regist_bookmark.name FROM regist_bookmark LIMIT 10

### Récupération des bookmarks d'une catégorie

> SELECT regist_bookmark.name, category.name FROM bookmark_category
INNER JOIN regist_bookmark ON regist_bookmark.id = id_rbookmark
INNER JOIN category ON category.id = id_category
WHERE category.name IN ('Formation Web')

### Récupération des bookmarks qui contiennent un mot précis dans le nom

> SELECT regist_bookmark.name, category.name FROM bookmark_category
INNER JOIN regist_bookmark ON regist_bookmark.id = id_rbookmark
INNER JOIN category ON category.id = id_category
WHERE category.name LIKE '%web%'

### Récupération des bookmarks venant d’un certain site

> SELECT regist_bookmark.name, category.name FROM bookmark_category
INNER JOIN regist_bookmark ON regist_bookmark.id = id_rbookmark
INNER JOIN category ON category.id = id_category
WHERE regist_bookmark.url IN ('https://flexboxfroggy.com/#fr')
