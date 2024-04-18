<?php
require_once "/opt/lampp/htdocs/bookstore/config/config.php";

class User
{
    private $db;

    public function __construct()
    {
        $this->db = MysqlConfig::getConnection();
    }

    // Tạo người dùng mới
    public function createProduct($username, $password, $email)
    {
        if (!isset($username) || !isset($password) || !isset($email)) {
            return (object) [
                "status" => 400,
                "message" => "Missing values"
            ];
        }

        $query = "INSERT INTO Users (Username, Password, Email, RoleID) VALUES (:username, :password, :email, 2)";

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

    // Lấy tất cả người dùng
    public function getAllProducts()
    {
        $query = "SELECT * FROM Users";

        try {
            $statement = $this->db->prepare($query);
            $statement->execute();
            $users = $statement->fetchAll(PDO::FETCH_ASSOC);
            return (object) [
                "status" => 200,
                "data" => $users
            ];
        } catch (\Throwable $th) {
            return (object) [
                "status" => 400,
                "message" => "Error: " . $th->getMessage()
            ];
        }
    }

    // Lấy người dùng theo ID
    public function getProductByID($userID)
    {
        $query = "SELECT * FROM Users WHERE UserID = :userID";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':userID', $userID);
            $statement->execute();
            $user = $statement->fetch(PDO::FETCH_ASSOC);
            return (object) [
                "status" => 200,
                "data" => $user
            ];
        } catch (\Throwable $th) {
            return (object) [
                "status" => 400,
                "message" => "Error: " . $th->getMessage()
            ];
        }
    }

    // Method to get user by email
    public function getUserByEmail($email)
    {
        $query = "SELECT * FROM Users WHERE Email = :email";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':email', $email);
            $statement->execute();
            $user = $statement->fetch(PDO::FETCH_ASSOC);
            return (object) [
                "status" => 200,
                "data" => $user
            ];
        } catch (\Throwable $th) {
            return (object) [
                "status" => 400,
                "message" => "Error: " . $th->getMessage()
            ];
        }
    }

    // Method to get user by username
    public function getUserByUsername($username)
    {
        $query = "SELECT * FROM Users WHERE Username = :username";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':username', $username);
            $statement->execute();
            $user = $statement->fetch(PDO::FETCH_ASSOC);
            return (object) [
                "status" => 200,
                "data" => $user
            ];
        } catch (\Throwable $th) {
            return (object) [
                "status" => 400,
                "message" => "Error: " . $th->getMessage()
            ];
        }
    }

    // Lấy người dùng theo RoleID
    public function getProductsByRoleID($roleID)
    {
        $query = "SELECT * FROM Users WHERE RoleID = :roleID";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':roleID', $roleID);
            $statement->execute();
            $users = $statement->fetchAll(PDO::FETCH_ASSOC);
            return (object) [
                "status" => 200,
                "data" => $users
            ];
        } catch (\Throwable $th) {
            return (object) [
                "status" => 400,
                "message" => "Error: " . $th->getMessage()
            ];
        }
    }

    // Cập nhật thông tin người dùng
    public function updateProduct($userID, $username, $password, $email)
    {
        $query = "UPDATE Users SET Username = :username, Password = :password, Email = :email WHERE UserID = :userID";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':username', $username);
            $statement->bindParam(':password', $password);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':userID', $userID);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "User updated successfully"
            ];
        } catch (\Throwable $th) {
            return (object) [
                "status" => 400,
                "message" => "Error: " . $th->getMessage()
            ];
        }
    }

    // Cập nhật RoleID của người dùng
    public function updateRoleID($userID, $roleID)
    {
        $query = "UPDATE Users SET RoleID = :roleID WHERE UserID = :userID";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':roleID', $roleID);
            $statement->bindParam(':userID', $userID);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "RoleID updated successfully"
            ];
        } catch (\Throwable $th) {
            return (object) [
                "status" => 400,
                "message" => "Error: " . $th->getMessage()
            ];
        }
    }

    // Xóa người dùng
    public function deleteProduct($userID)
    {
        $query = "DELETE FROM Users WHERE UserID = :userID";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':userID', $userID);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "User deleted successfully"
            ];
        } catch (\Throwable $th) {
            return (object) [
                "status" => 400,
                "message" => "Error: " . $th->getMessage()
            ];
        }
    }
}
