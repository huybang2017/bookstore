<?php
require_once "/xampp/htdocs/web2_Project/src/config/MysqlConfig.php";

class OrderDetail
{
    private $db;

    public function __construct()
    {
        $this->db = MysqlConfig::getConnection();
    }

    public function createOrderDetail($orderID, $productID, $quantity, $unitPrice)
    {
        if (!isset($orderID) || !isset($productID) || !isset($quantity) || !isset($unitPrice)) {
            return (object) [
                "status" => 400,
                "message" => "Missing values"
            ];
        }

        $query = "INSERT INTO OrderDetails (OrderID, ProductID, Quantity, UnitPrice) VALUES (:orderID, :productID, :quantity, :unitPrice)";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':orderID', $orderID);
            $statement->bindParam(':productID', $productID);
            $statement->bindParam(':quantity', $quantity);
            $statement->bindParam(':unitPrice', $unitPrice);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "Order detail created successfully",
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

    public function readOrderDetail($orderDetailID)
    {
        $query = "SELECT * FROM OrderDetails WHERE OrderDetailID = :orderDetailID";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':orderDetailID', $orderDetailID);
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

    public function updateOrderDetail($orderDetailID, $orderID, $productID, $quantity, $unitPrice)
    {
        if (!isset($orderID) || !isset($productID) || !isset($quantity) || !isset($unitPrice)) {
            return (object) [
                "status" => 400,
                "message" => "Missing values"
            ];
        }

        $query = "UPDATE OrderDetails SET OrderID = :orderID, ProductID = :productID, Quantity = :quantity, UnitPrice = :unitPrice WHERE OrderDetailID = :orderDetailID";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':orderDetailID', $orderDetailID);
            $statement->bindParam(':orderID', $orderID);
            $statement->bindParam(':productID', $productID);
            $statement->bindParam(':quantity', $quantity);
            $statement->bindParam(':unitPrice', $unitPrice);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "Order detail updated successfully",
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

    public function deleteOrderDetail($orderDetailID)
    {
        $query = "DELETE FROM OrderDetails WHERE OrderDetailID = :orderDetailID";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':orderDetailID', $orderDetailID);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "Order detail deleted successfully",
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
