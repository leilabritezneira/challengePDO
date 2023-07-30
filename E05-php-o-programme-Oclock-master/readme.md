# Challenge PDO

L'objectif du jour sera d'enregistrer dans la base données un cours par l'intermédiaire de notre formulaire.

On va procéder par étape :

- récupérer les données du formulaire
- créer la requête SQL d'insertion dans la base de données
- envoyer la requête à la base de données
- confirmer l'enregistrement

##Création de la base de données et import des données

Dans l'invite de commande MySQL
`CREATE DATABASE oprogramme CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;`

Dans le terminal
`mysql -u explorateur -pEreul9Aeng oprogramme < doc/courses.sql`

## Récupérer les données du formulaire

Tu vas devoir modifier le formulaire HTML qui est dans le fichier `creer-cours.php`. Pour qu'il puisse transférer des infos à PHP, il doit respecter certains points :

- le tag `<form>` doit intégrer une destination (le fichier PHP qui fera le traitement) ; cela se fait avec l'attribut `action`, par exemple : `<form action='form.php'>`
- le tag `<form>` doit intégrer la méthode de transfert des infos à notre fichier PHP qui fera le traitement en utilisant l'attribut `method` et nous utiliserons la valeur `post` : `<form method='post'>`
- ce qui donne comme tag `<form action='form.php' method='post'>`

Plus d'information sur : [MDN](https://developer.mozilla.org/fr/docs/Web/HTML/Element/Form)

OK mais ce n'est pas suffisant, il faut également donner un petit nom à tous nos champs. Pour cela, tu dois ajouter un attribut `name` sur chaque champs. Attention, il ne faut pas confondre avec l'attribut `id` qui peut servir au `css` et `javascript` dans le navigateur mais pas pour l'envoi de données à un script de traitement PHP.

Tu peux maintenant créer un fichier PHP `form.php`. Tu vas essayer de récupérer les données du formulaire.

Rappelle-toi, on a récupéré des paramètres dans l'URL à l'aide du tableau `$_GET` que PHP génère automatiquement. Et bien comme notre formulaire utilise la méthode `POST`, nos allons trouver nos données dans un tableau `$_POST` que PHP nous met à disposition. Tu peux stocker chaque champs dans une variable.

Tu trouveras des infos sur la [doc PHP](https://www.php.net/manual/fr/reserved.variables.post.php)

## Créer la requête SQL d'insertion dans la base de données

Maintenant que nous avons récupéré les données du formulaire, il est tant de créer notre requête SQL d'insertion dans la table `courses` [Un petit tour sur la doc SQL](https://sql.sh/cours/insert-into).  
Tu peux stocker cette requête dans une variable `$sql`, on va l'envoyer dans la base de données à la prochaine étape.

**Note :** pour les menus déroulants avec des valeurs, tu peux envoyer directement le texte (on ne s'occupe pas des jointures, mais si tu es motivé :cake: il faudra modifier la structure de la base données).

Tu peux tester la requête en l'exécutant manuellement dans phpMyAdmin.

## Envoyer la requête à la base de données

On a une belle requête mais ça serait beaucoup plus sympa que ce soit PHP qui transmette notre requête à la base de données. Tu vas pouvoir utiliser PDO, [regarde bien cette doc](https://www.php.net/manual/fr/pdo.exec.php)

## Confirmer l'enregistrement

Après enregistrement des informations dans la base de données ça serait dommage d'afficher une page blanche à notre utilisateur. Peux-tu lui afficher un joli message de confirmation d'enregistrement.

## En Bonus

Tu peux sécuriser les données reçues :

- longueur des champs
- nombre minimum de caractères
- regarde la fonction [`filter_input`](https://www.php.net/manual/fr/function.filter-input) qui permet de filtrer les valeurs reçues du formulaire