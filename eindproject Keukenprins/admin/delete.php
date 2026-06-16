<?php
// Klassen includen voor database en blog
include "../classes/database.php";
include "../classes/blog.php";

// Blog ID ophalen uit de URL
$id = $_GET["id"];

// Blog zoeken op basis van ID
$blog = Blog::findId($id);

// Als blog niet bestaat, terug naar admin met foutmelding
if ($blog == null) {
    header("Location: admin.php?error=Blog+niet+gevonden");
    exit;
}

// Blog verwijderen
$blog->delete();

// Redirect naar admin met succesbericht
header("Location: admin.php?message=Blog+verwijderd");
exit;
?>