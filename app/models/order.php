<?php
require_once "/opt/lampp/htdocs/web2_Project/src/config/MysqlConfig.php";

class Order
{
    private $db;

    public function __construct()
    {
        $this->db = MysqlConfig::getConnection();
    }

    public function createOrder($userID, $orderDate, $totalPrice)
    {
        if (!isset($userID) || !isset($orderDate) || !isset($totalPrice)) {
            return (object) [
                "status" => 400,
                "message" => "Missing values"
            ];
        }

        $query = "INSERT INTO Orders (UserID, OrderDate, TotalPrice) VALUES (:userID, :orderDate, :totalPrice)";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':userID', $userID);
            $statement->bindParam(':orderDate', $orderDate);
            $statement->bindParam(':totalPrice', $totalPrice);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "Order created successfully",
            ];
        } catch (\Throwable $th) {
            return (object) [
                "status" => 400,
                "message" => "Error: " . $th->getMessage()
            ];
        } finally {
            if ($this->db) {
                $this->db = null;
            }
        }
    }

    public function readOrder($orderID)
    {
        $query = "SELECT * FROM Orders WHERE OrderID = :orderID";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':orderID', $orderID);
            $statement->execute();

            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            return (object) [
                "status" => 400,
                "message" => "Error: " . $th->getMessage()
            ];
        } finally {
            if ($this->db) {
                $this->db = null;
            }
        }
    }

    public function updateOrder($orderID, $userID, $orderDate, $totalPrice)
    {
        if (!isset($userID) || !isset($orderDate) || !isset($totalPrice)) {
            return (object) [
                "status" => 400,
                "message" => "Missing values"
            ];
        }

        $query = "UPDATE Orders SET UserID = :userID, OrderDate = :orderDate, TotalPrice = :totalPrice WHERE OrderID = :orderID";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':orderID', $orderID);
            $statement->bindParam(':userID', $userID);
            $statement->bindParam(':orderDate', $orderDate);
            $statement->bindParam(':totalPrice', $totalPrice);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "Order updated successfully",
            ];
        } catch (\Throwable $th) {
            return (object) [
                "status" => 400,
                "message" => "Error: " . $th->getMessage()
            ];
        } finally {
            if ($this->db) {
                $this->db = null;
            }
        }
    }

    public function deleteOrder($orderID)
    {
        $query = "DELETE FROM Orders WHERE OrderID = :orderID";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':orderID', $orderID);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "Order deleted successfully",
            ];
        } catch (\Throwable $th) {
            return (object) [
                "status" => 400,
                "message" => "Error: " . $th->getMessage()
            ];
        } finally {
            if ($this->db) {
                $this->db = null;
            }
        }
    }
}
