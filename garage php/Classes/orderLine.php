<?php
class Orderline
{
    // Gegevens van een orderregel
    public string $id;
    public string $orderId;
    public string $productId;
    public string $quantity;

    // Zoekt alle orderregels bij een bepaalde bestelling en geeft een lijst van Orderline-objecten terug.
    public static function findOrderId($orderId)
    {
        $conn = Database::start();

        $query = "SELECT * FROM order_lines WHERE order_line_order_id = '$orderId'";
        $result = $conn->query($query);

        $orderlines = [];

        // Zet elke rij om in een Orderline-object.
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $orderline = new Orderline();
                $orderline->id = $row["order_line_id"];
                $orderline->orderId = $row["order_line_order_id"];
                $orderline->productId = $row["order_line_product_id"];
                $orderline->quantity = $row["order_line_quantity"];
                $orderlines[] = $orderline;
            }
        }

        $conn->close();
        return $orderlines;
    }
}