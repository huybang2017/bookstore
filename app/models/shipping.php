<?php
require_once "/xampp/htdocs/web2_Project/src/config/MysqlConfig.php";

class Shipping
{
    private $db;

    public function __construct()
    {
        $this->db = MysqlConfig::getConnection();
    }

    public function createShipping($orderID, $shippingMethod, $trackingNumber, $shippingDate, $estimatedDeliveryDate)
    {
        if (!isset($orderID) || !isset($shippingMethod) || !isset($trackingNumber) || !isset($shippingDate) || !isset($estimatedDeliveryDate)) {
            return (object) [
                "status" => 400,
                "message" => "Missing values"
            ];
        }

        $query = "INSERT INTO Shipping (OrderID, ShippingMethod, TrackingNumber, ShippingDate, EstimatedDeliveryDate) VALUES (:orderID, :shippingMethod, :trackingNumber, :shippingDate, :estimatedDeliveryDate)";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':orderID', $orderID);
            $statement->bindParam(':shippingMethod', $shippingMethod);
            $statement->bindParam(':trackingNumber', $trackingNumber);
            $statement->bindParam(':shippingDate', $shippingDate);
            $statement->bindParam(':estimatedDeliveryDate', $estimatedDeliveryDate);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "Shipping created successfully",
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

    // Add read, update, delete methods here
}
