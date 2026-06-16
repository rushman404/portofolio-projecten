<?php
class Order
{
    // Bestellingsgegevens
    public string $id;
    public string $klantId;
    public string $date;
    public string $paid;

    // Haalt alle bestellingen op en retourneert een lijst van Order-objecten.
    public static function haalBestellingOp()
    {
        $conn = Database::start();

        $query = "SELECT * FROM orders";
        $result = $conn->query($query);

        $orders = [];

        // Zet elke rij om in een Order-object.
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $order = new Order();
                $order->id = $row["order_id"];
                $order->klantId = $row["order_customer_id"];
                $order->date = $row["order_date"];
                $order->paid = $row["order_paid"];
                $orders[] = $order;
            }
        }

        $conn->close();
        return $orders;
    }

    // Zoekt een bestelling op basis van ID en retourneert het bijbehorende Order-object.
    public static function findBestellingId($orderId)
    {
        $conn = Database::start();

        $query = "SELECT * FROM orders WHERE order_id = '$orderId'";
        $result = $conn->query($query);

        // Zet de gevonden rij om in een Order-object.
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $order = new Order();
            $order->id = $row["order_id"];
            $order->klantId = $row["order_customer_id"];
            $order->date = $row["order_date"];
            $order->paid = $row["order_paid"];
            return $order;
        }

        $conn->close();
        return null;
    }
}