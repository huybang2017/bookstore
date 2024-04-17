<?php
require_once "/opt/lampp/htdocs/bookstore/config/config.php";

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

    public function getImageByProductID($productID)
    {
        $query = "SELECT * FROM Images WHERE ProductID = :productID";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':productID', $productID);
            $statement->execute();

            $image = $statement->fetch(PDO::FETCH_ASSOC);
            if ($image) {
                return ((object) [
                    "status" => 200,
                    "message" => "Success",
                    "data" => $image
                ]);
            } else {
                return ((object) [
                    "status" => 404,
                    "message" => "Image not found",
                ]);
            }
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

    public function updateImage($imageID, $imageURL)
    {
        if (!isset($imageID) || !isset($imageURL)) {
            return (object) [
                "status" => 400,
                "message" => "Missing values"
            ];
        }

        $query = "UPDATE Images SET ImageURL = :imageURL WHERE ImageID = :imageID";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':imageID', $imageID);
            $statement->bindParam(':imageURL', $imageURL);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "Image updated successfully",
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

    public function getAllImages()
    {
        $query = "SELECT * FROM Images";

        try {
            $statement = $this->db->prepare($query);
            $statement->execute();

            return $statement->fetchAll(PDO::FETCH_ASSOC);
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

    public function deleteImage($imageID)
    {
        if (!isset($imageID)) {
            return (object) [
                "status" => 400,
                "message" => "Missing image ID"
            ];
        }

        $query = "DELETE FROM Images WHERE ImageID = :imageID";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':imageID', $imageID);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "Image deleted successfully",
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
