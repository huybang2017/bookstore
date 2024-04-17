<?php
require_once "/xampp/htdocs/web2_Project/src/config/MysqlConfig.php";

class Image
{
    private $db;

    public function __construct()
    {
        $this->db = MysqlConfig::getConnection();
    }

    public function createImage($productID, $imageURL)
    {
        if (!isset($productID) || !isset($imageURL)) {
            return (object) [
                "status" => 400,
                "message" => "Missing values"
            ];
        }

        $query = "INSERT INTO Images (ProductID, ImageURL) VALUES (:productID, :imageURL)";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':productID', $productID);
            $statement->bindParam(':imageURL', $imageURL);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "Image created successfully",
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
