<?php

class Database {

    private static $instance = null;

    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $databaseName = "ras";

    private $connection;

    private function __construct() {
        $this->connection = new mysqli($this->server, $this->username, $this->password, $this->databaseName);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connection_error);
        }
    }

    public function getConnection() {
        return $this->connection;
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

}

?>
