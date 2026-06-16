<?php
class Books
{
    public int $id;
    public string $titel;
    public int $page;
    public string $image;
    public int $categorie;
    public int $author;
    public int $year;
    public string $taal;
    public float $price;

    public static function getBooks(string $titel, array $categorie = [], array $auteurs = [])
    {
        $conn = database::start();

        $titel = mysqli_real_escape_string($conn, $titel);

        $sql = "SELECT * FROM books WHERE book_title LIKE '%$titel%'";

        //zoeken op categorie
        if (!empty($categorie)) {
            $ids = array_map('intval', $categorie);
            $sql .= " AND book_category_id IN (" . implode(',', $ids) . ")";
        }

        //zoeken op auteur
        if (!empty($auteurs)) {
            $authorIds = array_map('intval', $auteurs);
            $sql .= " AND book_author_id IN (" . implode(',', $authorIds) . ")";
        }

        $result = $conn->query($sql);
        $books = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $book = new Books();
                $book->id = $row["book_id"];
                $book->titel = $row["book_title"];
                $book->page = $row["book_pages"];
                $book->image = $row["book_image"];
                $book->categorie = $row["book_category_id"];
                $book->author = $row["book_author_id"];
                $book->year = $row["book_publication_year"];
                $book->taal = $row["book_language"];
                $book->price = $row["book_price"];

                $books[] = $book;
            }
        }

        $conn->close();
        return $books;
    }
}
