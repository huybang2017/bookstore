<?php
require_once "/opt/lampp/htdocs/web2_Project/src/config/MysqlConfig.php";

class Address
{
    private $db;

    public function __construct()
    {
        $this->db = MysqlConfig::getConnection();
    }

    public function createAddress($userID, $addressLine1, $addressLine2, $city, $state, $zipCode, $country)
    {
        if (!isset($userID) || !isset($addressLine1) || !isset($city) || !isset($state) || !isset($zipCode) || !isset($country)) {
            return (object) [
                "status" => 400,
                "message" => "Missing values"
            ];
        }

        $query = "INSERT INTO Addresses (UserID, AddressLine1, AddressLine2, City, State, ZipCode, Country) VALUES (:userID, :addressLine1, :addressLine2, :city, :state, :zipCode, :country)";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':userID', $userID);
            $statement->bindParam(':addressLine1', $addressLine1);
            $statement->bindParam(':addressLine2', $addressLine2);
            $statement->bindParam(':city', $city);
            $statement->bindParam(':state', $state);
            $statement->bindParam(':zipCode', $zipCode);
            $statement->bindParam(':country', $country);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "Address created successfully",
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
