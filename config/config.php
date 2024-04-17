<?php
class MysqlConfig
{
    private static $servername = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $database = "bookstore";
    private static $port = 3306; // Sử dụng cổng mặc định của MySQL

    public static function getConnection()
    {
        try {
            // Tạo connection
            $conn = new PDO(
                "mysql:host=" . self::$servername . ";
                                port=" . self::$port . ";
                                dbname=" . self::$database,
                self::$username,
                self::$password
            );

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Kết nối không thành công: " . $e->getMessage();
        }
    }
}
