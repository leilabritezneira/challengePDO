<?php require 'inc/data.php'; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O'Programme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php require 'inc/menu.tpl.php' ?>

    <div class="container">
        <div class="row">

            <?php foreach ($courses as $course) : ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="card h-100">
                        <img src="<?= $course->getImage() ?>" class="card-img-top" alt="<?= $course->getShortDescription() ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $course->getTitle() ?></h5>
                            <p class="card-text"><?= $course->getShortDescription() ?></p>
                        </div>
                        <div class="card-footer">
                            <a href="cours.php?id=<?= $course->getId() ?>" class="btn btn-primary">En savoir plus</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>

    <!-- On met toujours les scripts Javascript juste avant la fin du body -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>