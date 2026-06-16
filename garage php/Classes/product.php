<?php
class Product
{
    // Eigenschappen van een product
    public string $id;
    public string $name;
    public string $category;
    public string $price;
    public string $instock;

    // Voegt een nieuw product toe aan de database
    public function insert()
    {
        $conn = Database::start();

        $name = mysqli_real_escape_string($conn, $this->name);
        $category = mysqli_real_escape_string($conn, $this->category);
        $price = mysqli_real_escape_string($conn, $this->price);
        $instock = mysqli_real_escape_string($conn, $this->instock);

        $sql = "INSERT INTO products (
            product_name,
            product_category,
            product_price,
            product_instock
        ) VALUES (
            '" . $name . "',
            '" . $category . "',
            '" . $price . "',
            '" . $instock . "'
        )";

        $conn->query($sql);
        $conn->close();
    }

    // Haalt alle producten op uit de database
    public static function findAll()
    {
        $conn = Database::start();

        $query = "SELECT * FROM products";
        $result = $conn->query($query);

        $products = [];

        // Zet elke rij uit het resultaat om in een Product-object
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $product = new Product();
                $product->id = $row["product_id"];
                $product->name = $row["product_name"];
                $product->category = $row["product_category"];
                $product->price = $row["product_price"];
                $product->instock = $row["product_instock"];
                $products[] = $product;
            }
        }

        $conn->close();
        return $products;
    }

    // Vindt een product op basis van zijn ID
    public static function findId($productId)
    {
        $conn = Database::start();

        $query = "SELECT * FROM products WHERE product_id = '$productId'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $product = new Product();
            $product->id = $row["product_id"];
            $product->name = $row["product_name"];
            $product->category = $row["product_category"];
            $product->price = $row["product_price"];
            $product->instock = $row["product_instock"];
            return $product;
        }

        $conn->close();
        return null;
    }

    // Verwijdert het huidige product uit de database
    public function delete()
    {
        $conn = Database::start();

        $id = mysqli_real_escape_string($conn, $this->id);

        $query = "
            DELETE FROM
                products
            WHERE
                product_id = '" . $id . "'
        ";

        $conn->query($query);
        $conn->close();
    }

    // Werkt de gegevens van het huidige product bij in de database
    public function update()
    {
        $conn = Database::start();

        $id = mysqli_real_escape_string($conn, $this->id);
        $name = mysqli_real_escape_string($conn, $this->name);
        $category = mysqli_real_escape_string($conn, $this->category);
        $price = mysqli_real_escape_string($conn, $this->price);
        $instock = mysqli_real_escape_string($conn, $this->instock);

        $sql = "
            UPDATE 
                products
            SET
                product_name = '" . $name . "',
                product_category = '" . $category . "',
                product_price = '" . $price . "',
                product_instock = '" . $instock . "'
            WHERE
                product_id = " . $id . "
        ";

        $conn->query($sql);
        $conn->close();
    }
}
