<?php

//Toute classe qui implémente cette interface signe un contrat :
//elle devra implémenter les méthodes demandées

interface Model
{
    public function save();


    //findAll récupère tous les modèles d'une ressource donnée
    public static function findAll();
    public static function findById($id);
}
