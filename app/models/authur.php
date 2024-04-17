<?php
require_once "/opt/lampp/htdocs/web2_Project/src/config/MysqlConfig.php";

class Author
{
    private $db;

    public function __construct()
    {
        $this->db = MysqlConfig::getConnection();
    }

    public function createAuthor($authorName)
    {
        if (!isset($authorName)) {
            return (object) [
                "status" => 400,
                "message" => "Missing values"
            ];
        }

        $query = "INSERT INTO Authors (AuthorName) VALUES (:authorName)";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':authorName', $authorName);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "Author created successfully",
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
