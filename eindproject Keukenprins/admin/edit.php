<?php
// Klassen includen voor database, blog en sessie
include "../classes/database.php";
include "../classes/blog.php";
include "../classes/sessie.php";

// Actieve sessie ophalen
$sessie = Sessie::vindActieveSessie();

// Redirect naar index als er geen actieve sessie is
if ($sessie === null) {
    header("Location: index.php");
    exit();
}

// Blog ID ophalen uit URL
$id = $_GET["id"];

// Blog zoeken op basis van ID
$blog = Blog::findId($id);

// Redirect met foutmelding als blog niet gevonden is
if (!$blog) {
    header("location: admin.php?error=Blog niet gevonden");
    exit;
}

// Als formulier is verzonden, update bloggegevens
if (isset($_POST["blogTitle"])) {
    $blog->title = $_POST["blogTitle"];
    $blog->author = $_POST["blogAuteur"];
    $blog->content = $_POST["content"];

    // Controleer of er een nieuw bestand is geüpload
    if (!empty($_FILES["bestand"]["name"])) {
        $image = $_FILES["bestand"]["name"];
        $target = "../upload/" . basename($image);
        move_uploaded_file($_FILES["bestand"]["tmp_name"], $target);
        $blog->image = $image;
    }

    // Blog updaten in database
    $blog->update();

    // Redirect naar admin met succesbericht
    header("Location: admin.php?message=Blog bijgewerkt");
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog aanpassen</title>
    <link rel="icon" type="image/x-icon" href="../images/refresh.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/jquery-te-1.4.0.css" />
    <link href="../css/admin.css" rel="stylesheet">
</head>

<body id="body">
    <header class="text-center">
        <img src="../images/Daily-Bugle-Logo.png" alt="Logo" width="1536">
    </header>
    <div class="container">
        <div class="row">
            <div class="col">
                <form method="post" enctype="multipart/form-data">
                    <input type="text" id="blogTitle" name="blogTitle" placeholder="Titel" value="<?= $blog->title ?>" required><br><br>
                    <input type="text" id="blogAuteur" name="blogAuteur" placeholder="Auteur" value="<?= $blog->author ?>" required><br><br>
                    <input class="form-control" type="file" id="blogFoto" name="bestand"><br>
                    <label><strong>Inhoud:</strong></label><br>
                    <textarea class="jqte" id="content" name="content" required><?= $blog->content ?></textarea><br> 
                    <input id="knopSend" type="submit" value="Verzenden">
                </form>
            </div>
            <div class="col text-end">
                <h4><strong>Aanpassen</strong></h4>
            </div>
        </div>
    </div>
    <footer id="footer">
        <strong>Keeping New York Informed, One Swing at a Time.</strong>
    </footer>
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="../js/jquery-te-1.4.0.min.js" charset="utf-8"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $('.jqte').jqte();
    </script>
</body>

</html>