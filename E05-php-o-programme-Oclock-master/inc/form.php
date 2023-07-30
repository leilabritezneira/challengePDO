<?php
require 'classes/db.php';
require 'classes/coreModel.php';
require 'classes/course.php';

// on vérifie que le formulaire de création de cours soit bien soumis
if (isset($_POST['createCourse'])) {
    // pour les types textes on utilise FILTER_SANITIZE_SPECIAL_CHARS pour nettoyer la chaine
    // pour les types number FILTER_VALIDATE_INT et FILTER_VALIDATE_FLOAT
    $title = filter_input(INPUT_POST, 'title') ?? '';
    $image = filter_input(INPUT_POST, 'image') ?? '';
    $shortDescription = filter_input(INPUT_POST, 'shortDescription') ?? '';
    $description = filter_input(INPUT_POST, 'description') ?? '';
    $programContent = filter_input(INPUT_POST, 'programContent');
    $numberOfHours = filter_input(INPUT_POST, 'numberOfHours', FILTER_VALIDATE_INT) ?? '';
    $tarif = filter_input(INPUT_POST, 'tarif', FILTER_VALIDATE_INT) ?? '';
    $classDate = filter_input(INPUT_POST, 'classDate') ?? '';
    $professor = filter_input(INPUT_POST, 'professor') ?? '';
    $modality = filter_input(INPUT_POST, 'modality') ?? '';
    $requiredLevel = filter_input(INPUT_POST, 'requiredLevel') ?? '';

    // si une des variables contient `false` (la validation a échouée) ou `null` (la variable n'est pas définie)
    // on s'arrête là
    if (
        !$title ||
        !$image ||
        !$shortDescription ||
        !$description ||
        !$programContent ||
        !$numberOfHours ||
        !$tarif ||
        !$classDate ||
        !$professor ||
        !$modality ||
        !$requiredLevel
    ) {
        echo 'Les données transmises ne sont pas correctes. Veuillez remplir tous les champs.';
        exit;
    }

    $error = false;

    // on teste les valeurs soumises
    if (strlen($title) > 100) {
        $error = 'Le titre doit faire moins de 100 caractères';
    }

    if (strlen($image) > 50) {
        $error = 'Le chemin de l`image doit faire moins de 50 caractères';
    }

    if (strlen($shortDescription) > 255) {
        $error = 'La description courte doit faire moins de 255 caractères';
    }

    if (strlen($classDate) > 100) {
        $error = 'La date doit faire moins de 100 caractères';
    }

    if (strlen($classDate) > 100) {
        $error = 'Le nom du professeur doit faire moins de 100 caractères';
    }

    if (strlen($modality) > 30) {
        $error = 'La modalité doit faire moins de 30 caractères';
    }

    if (strlen($requiredLevel) > 20) {
        $error = 'Le niveau requis faire moins de 20 caractères';
    }

    if ($error) {
        echo $error;
        exit;
    }

    // on met chaque ligne du textarea dans un tableau
    $programContent = preg_split('/\r\n|[\r\n]/', $programContent);

    // on crée un nouvel objet `Course`, auquel on ajoute les données des champs remplis.
    $newCourse = new Course(0); // l'id est obligatoire ; on en renseigne un… il ne sera pas utiliser ici…

    $newCourse->setTitle($title);
    $newCourse->setImage($image);
    $newCourse->setShortDescription($shortDescription);
    $newCourse->setDescription($description);
    $newCourse->setProgramContent($programContent);
    $newCourse->setNumberOfHours($numberOfHours);
    $newCourse->setPrice($tarif);
    $newCourse->setClassDate($classDate);
    $newCourse->setProfessor($professor);
    $newCourse->setModality($modality);
    $newCourse->setRequiredLevel($requiredLevel);

    // on utilise la méthode `save` de la classe `Course` pour sauvegarder notre cours
    $saved = $newCourse->save();

    // si la sauvegarde s'est bien passée on affiche un message de confirmation
    if ($saved) {
        echo 'Cours : "' . $newCourse->getTitle() . '" sauvegardé en base de données.';
    } else {
        // sinon on indique qu'il y a eu un problème
        echo 'Il y a eu une erreur lors de la sauvegarde en base de données.';
    }
}