<?php
class Author
{
    public int $id;
    public string $name;

    public static function getAuthors(string $titel = "", array $categorie = [])
    {
        $conn = database::start();

        $sql = "SELECT DISTINCT a.author_id, a.author_name
                FROM authors a
                JOIN books b ON a.author_id = b.book_author_id
                WHERE b.book_title LIKE '%$titel%'";

        if (!empty($categorie)) {
            $ids = array_map('intval', $categorie);
            $sql .= " AND book_category_id IN (" . implode(',', $ids) . ")";
        }

        $result = $conn->query($sql);
        $authors = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $author = new Author();
                $author->id = $row["author_id"];
                $author->name = $row["author_name"];
                $authors[] = $author;
            }
        }
        $conn->close();

        return $authors;
    }
}
