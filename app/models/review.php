<?php
require_once "/opt/lampp/htdocs/bookstore/config/config.php";

class Review
{
    private $db;

    public function __construct()
    {
        $this->db = MysqlConfig::getConnection();
    }

    public function createReview($userID, $productID, $rating, $comment, $reviewDate)
    {
        if (!isset($userID) || !isset($productID) || !isset($rating) || !isset($comment) || !isset($reviewDate)) {
            return (object) [
                "status" => 400,
                "message" => "Missing values"
            ];
        }

        $query = "INSERT INTO Reviews (UserID, ProductID, Rating, Comment, ReviewDate) VALUES (:userID, :productID, :rating, :comment, :reviewDate)";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':userID', $userID);
            $statement->bindParam(':productID', $productID);
            $statement->bindParam(':rating', $rating);
            $statement->bindParam(':comment', $comment);
            $statement->bindParam(':reviewDate', $reviewDate);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "Review created successfully",
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

    public function getReviewByID($reviewID)
    {
        $query = "SELECT * FROM Reviews WHERE ReviewID = :reviewID";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':reviewID', $reviewID);
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

    public function updateReview($reviewID, $userID, $productID, $rating, $comment, $reviewDate)
    {
        if (!isset($userID) || !isset($productID) || !isset($rating) || !isset($comment) || !isset($reviewDate)) {
            return (object) [
                "status" => 400,
                "message" => "Missing values"
            ];
        }

        $query = "UPDATE Reviews SET UserID = :userID, ProductID = :productID, Rating = :rating, Comment = :comment, ReviewDate = :reviewDate WHERE ReviewID = :reviewID";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':reviewID', $reviewID);
            $statement->bindParam(':userID', $userID);
            $statement->bindParam(':productID', $productID);
            $statement->bindParam(':rating', $rating);
            $statement->bindParam(':comment', $comment);
            $statement->bindParam(':reviewDate', $reviewDate);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "Review updated successfully",
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

    public function deleteReview($reviewID)
    {
        $query = "DELETE FROM Reviews WHERE ReviewID = :reviewID";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':reviewID', $reviewID);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "Review deleted successfully",
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
