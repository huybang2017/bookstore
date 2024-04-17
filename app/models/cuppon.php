<?php
require_once "/xampp/htdocs/web2_Project/src/config/MysqlConfig.php";

class Coupon
{
    private $db;

    public function __construct()
    {
        $this->db = MysqlConfig::getConnection();
    }

    public function createCoupon($couponCode, $discountPercentage, $expiryDate)
    {
        if (!isset($couponCode) || !isset($discountPercentage) || !isset($expiryDate)) {
            return (object) [
                "status" => 400,
                "message" => "Missing values"
            ];
        }

        $query = "INSERT INTO Coupons (CouponCode, DiscountPercentage, ExpiryDate) VALUES (:couponCode, :discountPercentage, :expiryDate)";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':couponCode', $couponCode);
            $statement->bindParam(':discountPercentage', $discountPercentage);
            $statement->bindParam(':expiryDate', $expiryDate);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "Coupon created successfully",
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
