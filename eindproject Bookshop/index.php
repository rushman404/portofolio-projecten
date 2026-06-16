<?php
include "classes/Database.php";
include "classes/Books.php";
include "classes/Categorie.php";
include "classes/Auteurs.php";

$category =  Categorie::getCategorie();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bookshop</title>
    <link href="./css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Changa+One:ital@0;1&family=Luxurious+Roman&display=swap" rel="stylesheet">
</head>

<body id="body">
    <header id="header" class="position-relative">
        <div class="container">
            <div class="row">
                <div class="col text-center">Bookshop</div>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row" id="overview">
            <div class="col-3">
                <form id="filterForm">
                    <input type="text" id="zoek" name="zoek" class="zoekbalk" placeholder="Zoek op titel..." onkeyup="updateOverview()"><br><br>
                    <h5 class="mb-2">Categorieën</h5>
                    <div class="categorie-lijst">
                        <?php foreach ($category as $cat): ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="categorie[]" value="<?= $cat->id ?>" id="cat<?= $cat->id ?>" onchange="updateOverview()">
                                <label class="form-check-label" for="cat<?= $cat->id ?>">
                                    <?= $cat->name ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <br>
                    <h5>Auteurs</h5>
                    <div id="auteurFilters"></div>
                </form>
            </div>
            <div class="col-8">
                <h5>Boeken overzicht</h5>
                <div id="bookOverview"></div>
            </div>
        </div>
    </div>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>