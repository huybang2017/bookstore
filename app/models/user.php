<?php
require_once "/opt/lampp/htdocs/web2_Project/src/config/MysqlConfig.php";

class User
{
    private $db;

    public function __construct()
    {
        $this->db = MysqlConfig::getConnection();
    }

    public function createUser($username, $password, $email)
    {
        if (!isset($username) || !isset($password) || !isset($email)) {
            return (object) [
                "status" => 400,
                "message" => "Missing values"
            ];
        }

        $query = "INSERT INTO Users (Username, Password, Email) VALUES (:username, :password, :email)";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':username', $username);
            $statement->bindParam(':password', $password);
            $statement->bindParam(':email', $email);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "User created successfully",
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

    public function readUser($userID)
    {
        $query = "SELECT * FROM Users WHERE UserID = :userID";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':userID', $userID);
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

    public function updateUser($userID, $username, $password, $email)
    {
        if (!isset($username) || !isset($password) || !isset($email)) {
            return (object) [
                "status" => 400,
                "message" => "Missing values"
            ];
        }

        $query = "UPDATE Users SET Username = :username, Password = :password, Email = :email WHERE UserID = :userID";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':userID', $userID);
            $statement->bindParam(':username', $username);
            $statement->bindParam(':password', $password);
            $statement->bindParam(':email', $email);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "User updated successfully",
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

    public function deleteUser($userID)
    {
        $query = "DELETE FROM Users WHERE UserID = :userID";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':userID', $userID);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "User deleted successfully",
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
