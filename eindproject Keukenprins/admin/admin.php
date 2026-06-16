<?php
// Klassen includen voor blog, database en sessie beheer
include "../classes/blog.php";
include "../classes/database.php";
include "../classes/sessie.php";

// Actieve sessie ophalen
$sessie = Sessie::vindActieveSessie();

// Redirect naar index als er geen actieve sessie is
if ($sessie === null) {
    header("Location: index.php");
    exit();
}

// Alle blogs ophalen uit de database
$blogs = Blog::findAll();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog beheer</title>
    <link rel="icon" type="image/x-icon" href="../images/gear.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="../css/admin.css" rel="stylesheet">
</head>

<body id="body">
    <header class="text-center">
        <img src="../images/Daily-Bugle-Logo.png" alt="Logo" width="1536">
    </header>
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Admin mode</h3>
            </div>
            <div class="col">
                <?php if (isset($_GET["message"])): ?>
                    <?= htmlspecialchars($_GET["message"]) ?>
                <?php endif; ?>

                <?php if (isset($_GET["error"])): ?>
                    <?= htmlspecialchars($_GET["error"]) ?>
                <?php endif; ?>
            </div>
            <div class="col text-end">
                <a href="insert.php" class="btn btn-dark" id="knop">Toevoegen</a>
            </div>
        </div>
        <div class="row" style="margin-top: 30px;">
            <table>
                <tbody>
                    <?php foreach ($blogs as $blog) { ?>
                        <tr>
                            <td><strong><?= $blog->title; ?></strong><br>
                                <?= $blog->maakKorter(40); ?>
                            </td>
                            <td style="padding-right: -40px;">
                                <a style="margin-bottom: 20px;" href="edit.php?id=<?= $blog->id; ?>" class="btn btn-dark" id="knop">Aanpassen</a>
                                <a href="delete.php?id=<?= $blog->id; ?>" class="btn btn-dark" id="knop" onclick="return confirm('Weet je zeker dat je deze blog wilt verwijderen?')"> Verwijderen</a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="height: 30px;"></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <footer id="footer">
        <strong>Keeping New York Informed, One Swing at a Time.</strong>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>