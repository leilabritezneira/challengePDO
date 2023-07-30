<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O'programme</title>
    <!-- Insertion du fichier CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php require 'inc/menu.tpl.php' ?>

    <div class="container mb-5">
        <div class="row">
            <div class="col">
                <h1>Créer un cours</h1>
            </div>
        </div>

        <div class="row">
            <div class="col">
            <form action="inc/form.php" method="post">
                    <div class="mb-3">
                        <label for="title" class="form-label">Titre</label>
                        <input type="text" class="form-control" name="title" id="title">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="text" class="form-control" name="image" id="image">
                    </div>
                    <div class="mb-3">
                        <label for="shortDescription" class="form-label">Description courte</label>
                        <input type="text" class="form-control" name="shortDescription" id="shortDescription">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="7"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="programContent" class="form-label">Le programme</label>
                        <textarea class="form-control" name="programContent" id="programContent" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="numberOfHours" class="form-label">Nombre d'heures</label>
                        <input type="number" class="form-control" name="numberOfHours" id="numberOfHours">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Tarif</label>
                        <input type="text" class="form-control" name="tarif" id="price">
                    </div>
                    <div class="mb-3">
                        <label for="classDate" class="form-label">Dates</label>
                        <input type="text" class="form-control" name="classDate" id="classDate">
                    </div>
                    <div class="mb-3">
                        <label for="professor" class="form-label">Professeur</label>
                        <select class="form-select" name="professor" id="professor">
                            <option selected>Choisir un professeur</option>
                            <option value="Nicolas R.">Nicolas R.</option>
                            <option value="Pierre C.">Pierre C.</option>
                            <option value="Alexandre B.">Alexandre B.</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="modality" class="form-label">Modalité</label>
                        <select class="form-select" name="modality" id="modality">
                            <option selected>Choisir la modalité</option>
                            <option value="À distance">A distance</option>
                            <option value="Présentiel">Présentiel</option>
                            <option value="A distance et présentiel">A distance et présentiel</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="requiredLevel" class="form-label">Niveau requis</label>
                        <select class="form-select" name="requiredLevel" id="requiredLevel">
                            <option selected>Choisir le niveau requis</option>
                            <option value="Débutant">Débutant</option>
                            <option value="Intermédiaire">Intermédiaire</option>
                            <option value="Avancé">Avancé</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" name="createCourse">Créer</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Insertion du fichier JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>