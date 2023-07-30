<?php

require 'inc/classes/db.php';

$dbConnection = DB::getPDO();

$courses = $dbConnection->query("SELECT * FROM courses")
    ->fetchAll(PDO::FETCH_OBJ);

$connexion = DB::getPDO();
