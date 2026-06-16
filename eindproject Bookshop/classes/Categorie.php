<?php
class Categorie
{
    public int $id;
    public string $name;

    public static function getCategorie()
    {
        $conn = database::start();

        $sql = "SELECT * FROM categories";

        $result = $conn->query($sql);
        $categories = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $categorie = new Categorie();
                $categorie->id = $row["category_id"];
                $categorie->name = $row["category_name"];
                $categories[] = $categorie;
            }
        }
        $conn->close();

        return $categories;
    }
}
?>