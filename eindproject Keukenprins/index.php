<?php
// Klassen includen voor database, blog en sessie
include "classes/database.php";
include "classes/sessie.php";
include "classes/blog.php";

// Alle blogs ophalen uit de database
$blogs = Blog::findAll();

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daily Bugle</title>
    <link rel="icon" type="image/x-icon" href="./images/insect.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body id="body">
    <header class="text-center">
        <img src="images/Daily-Bugle-Logo.png" alt="Logo" width="1536">
    </header>
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col" style="margin-bottom: 30px; font-family: Arial, sans-serif; line-height: 1; color: #222;">
                <p><strong>Welkom bij de Daily Bugle</strong> – dé ultieme plek voor alles rondom <strong>Spider-Man</strong>!</p>
                <p>Hier vind je het meest actuele nieuws, spannende verhalen en diepgaande blogs over de web-slingeraar van New York.</p>
                <p>Of je nu op zoek bent naar de laatste avonturen, analyses van zijn vijanden, of verborgen details uit de wereld van Spider-Man, je bent hier aan het juiste adres.</p>
                <p>Duik in <strong>exclusieve content</strong> die je nergens anders vindt en blijf altijd op de hoogte van alles wat met Spider-Man te maken heeft.</p>
                <p>Sluit je aan bij onze community van fans en ontdek de <strong>waarheid achter de maskers</strong>!</p>
            </div>
        </div>
        <?php foreach ($blogs as $blog): ?>
            <div class="row">
                <div class="col-9" id="blokTekst">
                    <h3><strong><?= $blog->title; ?></strong></h3>
                    <p><?= $blog->maakKorter(30); ?></p>
                </div>
                <a href="detail.php?id=<?= $blog->id; ?>" class="btn btn-dark" id="knopLeesMeer">Lees meer</a>
            </div>
        <?php endforeach; ?>
    </div>
    <footer id="footer">
        <strong>Keeping New York Informed, One Swing at a Time.</strong>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>