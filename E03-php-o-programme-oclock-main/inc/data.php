<?php

require 'classes/db.php';
require 'interfaces/model.php';
require 'classes/coreModel.php';
require 'classes/course.php';

//Après toutes ces aventures, $courses est égal
//à un tableau d'instances d'objet Course
$courses = Course::findAll();
