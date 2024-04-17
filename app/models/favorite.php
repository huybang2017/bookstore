<?php
require_once "/opt/lampp/htdocs/web2_Project/src/config/MysqlConfig.php";

class Favorite
{
    private $db;

    public function __construct()
    {
        $this->db = MysqlConfig::getConnection();
    }

    public function createFavorite($userID, $productID)
    {
        if (!isset($userID) || !isset($productID)) {
            return (object) [
                "status" => 400,
                "message" => "Missing values"
            ];
        }

        $query = "INSERT INTO Favorites (UserID, ProductID) VALUES (:userID, :productID)";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':userID', $userID);
            $statement->bindParam(':productID', $productID);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "Favorite created successfully",
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
