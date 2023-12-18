<?php 
class crudOOP {
    private static $instance;
    private $connection;

    private function __construct() {
        $servername = '127.0.0.1';
        $username = 'root';
        $password = '';
        $dbname = 'task_db';

        $this->connection = new mysqli($servername, $username, $password, $dbname);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }else {
            echo "success";
        }

        $this->connection->set_charset('utf8mb4');
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}

