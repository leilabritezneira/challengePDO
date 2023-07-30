<?php

require_once "interfaces/model.php";

//Une classe abstraite est une classe qu'on ne peut pas instancier
//Dans ce cas, on fait le choix de définir CoreModel comme étant
//abstraite car elle ne représente pas vraiment de concept réel :
//c'est juste une organisation de notre code
//Il n'y a pas de raison d'instancier la classe CoreModel directement

//J'ai implémenté l'interface "Model" : j'ai donc signé un contrat
//avec cette interface.
//La classe qui étendra CoreModel DEVRA (OBLIGATOIRE !!!)
//implémenter la méthode "save" à sa version
//Ceci garantit que la méthode est bien accessible
abstract class CoreModel implements Model
{
    //protected donnera le droit à la classe dans laquelle on se trouve
    //OU toute autre classe qui hérite de cette classe à modifier ces
    //valeurs
    protected $id;
    protected $createdAt;
    protected $updatedAt;

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of createdAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @return  self
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get the value of updatedAt
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of updatedAt
     *
     * @return  self
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
