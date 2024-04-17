<?php
require_once "/opt/lampp/htdocs/web2_Project/src/config/MysqlConfig.php";

class Payment
{
    private $db;

    public function __construct()
    {
        $this->db = MysqlConfig::getConnection();
    }

    public function createPayment($orderID, $paymentMethod, $paymentDate, $amount)
    {
        if (!isset($orderID) || !isset($paymentMethod) || !isset($paymentDate) || !isset($amount)) {
            return (object) [
                "status" => 400,
                "message" => "Missing values"
            ];
        }

        $query = "INSERT INTO Payments (OrderID, PaymentMethod, PaymentDate, Amount) VALUES (:orderID, :paymentMethod, :paymentDate, :amount)";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':orderID', $orderID);
            $statement->bindParam(':paymentMethod', $paymentMethod);
            $statement->bindParam(':paymentDate', $paymentDate);
            $statement->bindParam(':amount', $amount);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "Payment created successfully",
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
