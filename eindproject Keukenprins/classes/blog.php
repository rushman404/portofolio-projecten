<?php
class Blog
{
    //eigenschappen
    public string $id;
    public string $title;
    public string $image;
    public string $content;
    public string $author;

    // Blog toevoegen aan database
    public function insert()
    {
        $conn = Database::start();

        // Gegevens ontsmetten tegen SQL-injectie
        $title = mysqli_real_escape_string($conn, $this->title);
        $image = mysqli_real_escape_string($conn, $this->image);
        $content = mysqli_real_escape_string($conn, $this->content);
        $author = mysqli_real_escape_string($conn, $this->author);

        // Insert query maken
        $sql = "INSERT INTO blogs (
            blog_title,
            blog_image,
            blog_content,
            blog_author
        ) VALUES (
            '" . $title . "',
            '" . $image . "',
            '" . $content . "',
            '" . $author . "'
        )";

        // Query uitvoeren
        $conn->query($sql);

        // Verbinding sluiten
        $conn->close();
    }

    // Alle blogs ophalen uit database
    public static function findAll()
    {
        $conn = Database::start();

        $query = "SELECT * FROM blogs";
        $result = $conn->query($query);

        $blogs = [];

        // Als er resultaten zijn, maak voor elke rij een Blog-object aan
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $blog = new Blog();
                $blog->id = $row["blog_id"];
                $blog->title = $row["blog_title"];
                $blog->image = $row["blog_image"];
                $blog->content = $row["blog_content"];
                $blog->author = $row["blog_author"];
                $blogs[] = $blog;
            }
        }

        $conn->close();

        return $blogs;
    }

    // Blog ophalen op basis van ID
    public static function findId($blogId)
    {
        $conn = Database::start();

        $query = "SELECT * FROM blogs WHERE blog_id = '$blogId'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $blog = new Blog();
            $blog->id = $row["blog_id"];
            $blog->title = $row["blog_title"];
            $blog->image = $row["blog_image"];
            $blog->content = $row["blog_content"];
            $blog->author = $row["blog_author"];
            return $blog;
        }

        $conn->close();
        return null;
    }

    // Blogcontent inkorten tot maximaal $maxWords woorden
    public function maakKorter($maxWords = 100)
    {
        $words = explode(' ', strip_tags($this->content));
        if (count($words) > $maxWords) {
            $words = array_slice($words, 0, $maxWords);
            return implode(' ', $words) . '...';
        }
        return strip_tags($this->content);
    }

    // Blog verwijderen uit database
    public function delete()
    {
        $conn = Database::start();

        $id = mysqli_real_escape_string($conn, $this->id);

        $query = "
            DELETE FROM
                blogs
            WHERE
                blog_id = '" . $id . "'
        ";

        $conn->query($query);

        $conn->close();
    }

    // Bloggegevens bijwerken in database
    public function update()
    {
        $conn = Database::start();

        $id = mysqli_real_escape_string($conn, $this->id);
        $title = mysqli_real_escape_string($conn, $this->title);
        $image = mysqli_real_escape_string($conn, $this->image);
        $content = mysqli_real_escape_string($conn, $this->content);
        $author = mysqli_real_escape_string($conn, $this->author);

        $sql = "
            UPDATE 
                blogs
            SET
                blog_title = '" . $title . "',
                blog_image = '" . $image . "',
                blog_content = '" . $content . "',
                blog_author = '" . $author . "'
            WHERE
                blog_id = " . $id . "
        ";

        $conn->query($sql);

        $conn->close();
    }
}