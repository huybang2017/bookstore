<?php
require_once "/opt/lampp/htdocs/bookstore/config/config.php";

class Product
{
    private $db;

    public function __construct()
    {
        $this->db = MysqlConfig::getConnection();
    }

    public function createProduct($productName, $description, $price, $stockQuantity)
    {
        if (!isset($productName) || !isset($price) || !isset($stockQuantity)) {
            return (object) [
                "status" => 400,
                "message" => "Missing values"
            ];
        }

        $query = "INSERT INTO Products (ProductName, Description, Price, StockQuantity) VALUES (:productName, :description, :price, :stockQuantity)";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':productName', $productName);
            $statement->bindParam(':description', $description);
            $statement->bindParam(':price', $price);
            $statement->bindParam(':stockQuantity', $stockQuantity);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "Product created successfully",
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

    public function getAllProduct()
    {
        $query = "SELECT * FROM Products";

        try {
            $statement = $this->db->prepare($query);
            $statement->execute();

            $products = $statement->fetchAll(PDO::FETCH_ASSOC);

            if ($products) {
                return ((object) [
                    "status" => 200,
                    "message" => "Success",
                    "data" => $products
                ]);
            } else {
                return ((object) [
                    "status" => 404,
                    "message" => "No products found",
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


    public function getProductQuantity()
    {
        $query = "SELECT * FROM Products WHERE StockQuantity > 0";

        try {
            $statement = $this->db->prepare($query);
            $statement->execute();

            $products = $statement->fetchAll(PDO::FETCH_ASSOC);

            if ($products) {
                return ((object) [
                    "status" => 200,
                    "message" => "Success",
                    "data" => $products
                ]);
            } else {
                return ((object) [
                    "status" => 404,
                    "message" => "No products with quantity greater than 0 found",
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



    public function getProductById($productID)
    {
        $query = "SELECT 
            Products.ProductID, 
            Products.ProductName, 
            Products.Description, 
            Products.Price, 
            Products.StockQuantity, 
            Products.AuthorID, 
            Authors.AuthorName, 
            Categories.CategoryID,
            Categories.CategoryName
        FROM 
            Products
        JOIN 
            Authors ON Products.AuthorID = Authors.AuthorID
        JOIN 
            Categories ON Products.CategoryID = Categories.CategoryID
        WHERE 
            Products.ProductID = :productID;";


        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':productID', $productID);
            $statement->execute();

            $product = $statement->fetch(PDO::FETCH_ASSOC);
            if ($product) {
                return ((object) [
                    "status" => 200,
                    "message" => "Thành công",
                    "data" => $product
                ]);
            } else {
                return ((object) [
                    "status" => 404,
                    "message" => "Không tìm thấy sản phẩm",
                ]);
            }
        } catch (\Throwable $th) {
            return (object) [
                "status" => 400,
                "message" => "Error: " . $th->getMessage()
            ];
        } finally {
            // Đóng kết nối với cơ sở dữ liệu
            if ($this->db) {
                $this->db = null;
            }
        }
    }


    public function updateProduct($productID, $productName, $description, $price, $stockQuantity)
    {
        if (!isset($productName) || !isset($price) || !isset($stockQuantity)) {
            return (object) [
                "status" => 400,
                "message" => "Missing values"
            ];
        }

        $query = "UPDATE Products SET ProductName = :productName, Description = :description, Price = :price, StockQuantity = :stockQuantity WHERE ProductID = :productID";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':productID', $productID);
            $statement->bindParam(':productName', $productName);
            $statement->bindParam(':description', $description);
            $statement->bindParam(':price', $price);
            $statement->bindParam(':stockQuantity', $stockQuantity);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "Product updated successfully",
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

    public function deleteProduct($productID)
    {
        $query = "DELETE FROM Products WHERE ProductID = :productID";

        try {
            $statement = $this->db->prepare($query);
            $statement->bindParam(':productID', $productID);
            $statement->execute();

            return (object) [
                "status" => 200,
                "message" => "Product deleted successfully",
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
