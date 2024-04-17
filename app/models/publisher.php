<?php
require_once "/opt/lampp/htdocs/web2_Project/src/config/MysqlConfig.php";

class Publisher
{
    private $db;

    public function __construct()
    {
        $this->db = MysqlConfig::getConnection();
    }

    public function createPublisher($publisherName)
    {
        if (!isset($publisherName)) {
            return (object) [
                "status" => 400,
                "message" => "Missing values"
            ];
        }

        $query = "INSERT INTO Publishers (PublisherName) VALUES (:publisherName)";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':publisherName', $publisherName);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "Publisher created successfully",
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

    public function readPublisher($publisherID)
    {
        $query = "SELECT * FROM Publishers WHERE PublisherID = :publisherID";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':publisherID', $publisherID);
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

    public function updatePublisher($publisherID, $publisherName)
    {
        if (!isset($publisherName)) {
            return (object) [
                "status" => 400,
                "message" => "Missing values"
            ];
        }

        $query = "UPDATE Publishers SET PublisherName = :publisherName WHERE PublisherID = :publisherID";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':publisherID', $publisherID);
            $statement->bindParam(':publisherName', $publisherName);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "Publisher updated successfully",
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

    public function deletePublisher($publisherID)
    {
        $query = "DELETE FROM Publishers WHERE PublisherID = :publisherID";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':publisherID', $publisherID);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "Publisher deleted successfully",
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
