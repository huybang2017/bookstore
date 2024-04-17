<?php
require_once "/opt/lampp/htdocs/web2_Project/src/config/MysqlConfig.php";

class Role
{
    private $db;

    public function __construct()
    {
        $this->db = MysqlConfig::getConnection();
    }

    public function createRole($roleName)
    {
        if (!isset($roleName)) {
            return (object) [
                "status" => 400,
                "message" => "Missing values"
            ];
        }

        $query = "INSERT INTO Roles (RoleName) VALUES (:roleName)";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':roleName', $roleName);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "Role created successfully",
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
