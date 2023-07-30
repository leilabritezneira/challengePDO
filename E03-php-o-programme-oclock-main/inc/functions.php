<?php

function getCourseOrRedirect($id)
{
    // recherche du cours en fonction de son id
    $course = Course::findById($id);

    if ($course) {
        return $course;
    }

    // si le cours n'existe pas, on redirige vers la page d'erreur 404
    // envoi d'un header dans la réponse HTTP pour rediriger vers la page 404.php
    header('Location: 404.php');
    exit();
}
