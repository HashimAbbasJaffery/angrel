<?php


class Connection {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";

    public function connect() {
        $servername = $this->servername;
        $username = $this->username;
        $password = $this->password;
        try {    
            $conn = new PDO("mysql:host=$servername;dbname=university", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>