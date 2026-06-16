<?php
include "classes/Database.php";
include "classes/Auteurs.php";

$zoekTitel = $_POST["zoek"] ?? "";
$categorie = $_POST["categorie"] ?? [];
$selectedAuteurs = $_POST["auteur"] ?? [];

$auteurs = Author::getAuthors($zoekTitel, $categorie);
?>

<?php foreach ($auteurs as $aut): ?>
    <?php
    $checked = "";
    if (in_array($aut->id, $selectedAuteurs)) {
        $checked = 'checked="checked"';
    }
    ?>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="auteur[]" value="<?= $aut->id ?>" id="aut<?= $aut->id ?>" <?= $checked ?> onchange="updateOverview()">
        <label class="form-check-label" for="aut<?= $aut->id ?>"> <?= $aut->name ?> </label>
    </div>
<?php endforeach; ?>