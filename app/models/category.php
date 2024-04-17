<?php
require_once "/opt/lampp/htdocs/web2_Project/src/config/MysqlConfig.php";

class Category
{
    private $db;

    public function __construct()
    {
        $this->db = MysqlConfig::getConnection();
    }

    public function createCategory($categoryName)
    {
        if (!isset($categoryName)) {
            return (object) [
                "status" => 400,
                "message" => "Missing values"
            ];
        }

        $query = "INSERT INTO Categories (CategoryName) VALUES (:categoryName)";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':categoryName', $categoryName);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "Category created successfully",
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

    public function readCategory($categoryID)
    {
        $query = "SELECT * FROM Categories WHERE CategoryID = :categoryID";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':categoryID', $categoryID);
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

    public function updateCategory($categoryID, $categoryName)
    {
        if (!isset($categoryName)) {
            return (object) [
                "status" => 400,
                "message" => "Missing values"
            ];
        }

        $query = "UPDATE Categories SET CategoryName = :categoryName WHERE CategoryID = :categoryID";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':categoryID', $categoryID);
            $statement->bindParam(':categoryName', $categoryName);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "Category updated successfully",
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

    public function deleteCategory($categoryID)
    {
        $query = "DELETE FROM Categories WHERE CategoryID = :categoryID";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':categoryID', $categoryID);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "Category deleted successfully",
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
