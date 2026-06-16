<?php
// Klassen includen voor database, sessie en blog functionaliteit
include "classes/database.php";
include "classes/sessie.php";
include "classes/blog.php";

// Ophalen van de blog ID uit de URL
$id = $_GET["id"];

// Blog ophalen aan de hand van de ID
$blog = Blog::findId($id);

// Redirect naar home pagina als blog niet gevonden is
if (!$blog) {
    header("location: index.php?error=Blog niet gevonden");
    exit;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog</title>
    <link rel="icon" type="image/x-icon" href="./images/blogging.png">
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
            <div class="col"><h3><strong><?= $blog->title; ?></strong></h3></div>
        </div>
        <div class="row">
            <div class="col-9">
                <p><?= $blog->content; ?></p>
            </div>
            <div class="col">
                <img src="upload/<?= $blog->image;?>" class="img-fluid" style="margin-top:20px; max-height: 400px; object-fit: cover;">
            </div>
        </div>
        <div class="row">
            <div class="col text-end"><p><strong><?= $blog->author; ?></strong></p></div>
        </div>
    </div>
    <footer id="footer">
        <strong>Keeping New York Informed, One Swing at a Time.</strong>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>