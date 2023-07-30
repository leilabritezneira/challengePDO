<?php

//Classe qui représente la connexion à la base de données
class DB
{
    //La valeur stockée sur la classe (et pas l'instance ! grâce à static)
    //qui représente la connexion à la DB via PDO
    static private $pdoDBConnexion;

    //PDO est une des librairies PHP qui permet de se connecter
    //sur toute base de données présente sur notre machine (ou externe)
    static public function getPDO()
    {
        //Si self::$pdoDBConnexion a une valeur
        //alors on la renvoie directement.

        //self représente la classe elle-même
        if (self::$pdoDBConnexion) {
            //:: représente l'accès à une propriété ou méthode statique
            return self::$pdoDBConnexion;
        }

        //Si self::$pdoDBConnexion n'a pas de valeur

        //On crée une variable qui sera réutilisée pour établir la connexion PDO
        //Qui pointe vers une base de données mysql
        //Le nom de la base de données est oprogramme
        //L'hôte est le localhost
        //Et le charset UTF8
        //Ces informations de configuration sont requises pour se connecter à la DB !
        $dataSourceName = 'mysql:dbname=oprogramme;host=localhost;charset=UTF8';
        $user = 'explorateur';
        $password = 'Ereul9Aeng';

        //On indique à notre code d'essayer d'établir la connexion avec PDO
        //Si ça passe, on reste dans le try qui se termine
        //En cas d'erreur, on passera dans le bloc "catch"
        try {
            //Le tableau passé en 4ème argument est un tableau de configuration
            //Dans ce cas, on l'utilise pour définir le mode d'erreur de PDO
            //Quand on aura une erreur dans nos requêtes, PHP affichera un warning

            //On stocke sur la classe elle-même la référence
            //à la connexion DB via PDO
            self::$pdoDBConnexion = new PDO(
                $dataSourceName,
                $user,
                $password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
                    //Pour le dev, ERRMODE_WARNING nous permet d'afficher
                    //les erreurs sous forme de warning
                    //En production, on mettrait plutôt ERRMODE_SILENT
                    //pour éviter d'afficher l'erreur directement au user
                ]
            );
            //Le type de l'exception nous permet "d'attraper" une erreur
            //en particulier. Dans notre cas, on "attrape"
            //Dans le code qui échoue, PDO a fait un "throw new PDOException(message)"
        } catch (PDOException $exception) {
            echo "Connexion échouée : {$exception->getMessage()}" . PHP_EOL;
            exit();
        }

        return self::$pdoDBConnexion;
    }
}
