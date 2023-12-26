<?php

class Database {
    private $host = "localhost"; // Change this to your database host
    private $username = "root"; // Change this to your database username
    private $password = ""; // Change this to your database password
    private $database = "donor"; // Change this to your database name
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>
