<?php
include "classes/Database.php";
include "classes/Books.php";
include "classes/Auteurs.php";

$zoekTitel = $_POST['zoek'] ?? '';
$selectedCategorie = $_POST['categorie'] ?? [];
$auteurs = $_POST['auteur'] ?? [];

$books = Books::getBooks($zoekTitel, $selectedCategorie, $auteurs);
$auteurs = Author::getAuthors();
$auteursMap = [];
foreach ($auteurs as $aut) {
    $auteursMap[$aut->id] = $aut->name;
}

?>
<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php foreach ($books as $book) : ?>
        <div class="col">
            <div class="card h-100">
                <img src="afbeeldingen/<?= $book->image ?>" class="card-img-top" alt="<?= htmlspecialchars($book->titel) ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($book->titel) ?></h5>
                    <p class="card-text">
                        Auteur ID: <?= htmlspecialchars($auteursMap[$book->author] ?? "Onbekend") ?><br>
                        Pagina: <?= $book->page ?><br>
                        Prijs: €<?= number_format($book->price, 2) ?>
                    </p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>