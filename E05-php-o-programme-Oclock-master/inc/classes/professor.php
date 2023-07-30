<?php

class Professor extends CoreModel
{
    private $firstName;
    private $lastName;

    public function __construct($id, $firstName, $lastName, $createdAt, $updatedAt)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getProfName()
    {
        return $this->firstName . ' ' . substr($this->lastName, 0, 1) . '.';
    }

    public function save()
    {
        //Ici, on sauvegardera les modifications en BDD
    }
}
