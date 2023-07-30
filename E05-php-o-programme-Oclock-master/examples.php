<?php

require 'inc/classes/db.php';

//On instancie la classe DB
$db = new DB();

//On récupère la connexion à la DB
$pdoConnection = $db->getPDO();

//On effectue les requêtes de récupération de données (SELECT)
//Avec query puis fetchAll
//fetchAll récupèrera tous les résultats
//On définit le mode du fetch, on récupèrera dans notre cas
//un tableau d'objets grâce à PDO::FETCH_OBJ
$courses = $pdoConnection->query("SELECT title FROM courses")
    ->fetchAll(PDO::FETCH_OBJ);

foreach ($courses as $course) {
    print_r($course->title . PHP_EOL);
}

//fetch ne renverra qu'une seule valeur, on l'utilise dans le cas d'un "find"
//c'est à dire quand on ne veut qu'un seul résultat, souvent un WHERE id = ...
$SEOcourse = $pdoConnection->query("SELECT * FROM courses WHERE id = 3")
    ->fetch(PDO::FETCH_OBJ);

print_r($SEOcourse->title . PHP_EOL);

//Pour le SQL autre que le SELECT, on utilise "exec"
$pdoConnection->exec("
    INSERT INTO `courses`
        (
            `title`,
            `image`,
            `shortDescription`,
            `description`,
            `programContent`,
            `numberOfHours`,
            `price`,
            `classDate`,
            `professor`,
            `modality`,
            `requiredLevel`
        )
    VALUES
        (
            'Nouveau cours',
            'cours-nouveau.jpg',
            'Adapté aux débutants',
            'La description',
            '[\"Les variables\",\"Les conditions\",\"Les boucles\",\"Les tableaux\",\"Les classes\",\"Interaction avec une base de donn\\u00e9es\"]', 70, 790, '14/03/2022 au 18/03/2022',
            'Nicolas R.',
            'A distance',
            'Débutant'
        );
    ");
