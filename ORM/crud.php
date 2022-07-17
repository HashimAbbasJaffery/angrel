<?php

require '../config/connection.php';

class crud extends Connection{
    private $conn;
    private $table;
    function __construct($table) {
        $this->table = $table;
    }
    public function insert($col, $row) {
        if(count($col) != count($row)) {
            throw new Exception("Size of column and row should be equal");
            return;
        }
        try {    
            $conn = $this->conn;
            $conn = $this->connect();
            $sql = "INSERT INTO ". $this->table . "(" . str_replace(" ", ", ", implode(" ", $col)) . ") VALUES (" . "'". str_replace(" ", "', '", implode(" ", $row)) . "'" . ")";         
         
            $conn->exec($sql);
            echo "Record inserted successfully!";
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
    private function where($conditions, $query) {
        for($i = 0; $i < count($conditions); $i++) {
            $column = $conditions[$i][0];
            $operator = $conditions[$i][1];
            $record = is_numeric($conditions[$i][2]) ? $conditions[$i][2] : "'" . $conditions[$i][2] . "'";
            $query .= (($i == 0)? " WHERE ": " AND ") . $column . " " . $operator . " " . $record;
        }
        return $query;
    }
    private function whereOr($conditions, $query) {
        for($i = 0; $i < count($conditions); $i++) {
            $column = $conditions[$i][0];
            $operator = $conditions[$i][1];
            $record = is_numeric($conditions[$i][2]) ? $conditions[$i][2] : "'" . $conditions[$i][2] . "'";
            $query .= (($i == 0)? " WHERE ": " OR ") . $column . " " . $operator . " " . $record;
        }
        return $query;
    }
    public function delete($conditions, $type) {
        $sql = "DELETE FROM " . $this->table;
        if($type == "WHERE") 
            $sql = $this->where($conditions, $sql);
        else if($type = "WHERE")
            $sql = $this->whereOr($conditions, $sql);
        
        try {
            $conn = $this->conn;
            $conn = $this->connect();
            $conn->exec($sql);
            echo "Deleted!";
        } catch(Exception $e) {
            echo $e->getMessage();
        }
        return $sql;
    }
    public function update($columns, $type, $conditions) {
        $sql = "UPDATE " . $this->table . " SET ";
        $i = 0;
        foreach($columns as $column => $value) {
            if(($i + 1) != count($columns)) {
                $sql .= $column . "=" . ((is_numeric($value)) ? $value : "'" . $value . "'") . ", ";
                str_replace(",", "", $sql);
            } else {
                $sql .= $column . "=" . ((is_numeric($value)) ? $value : "'" . $value . "'");
                str_replace(",", "", $sql);
            }
            $i++;
        }
        if($type == "WHERE") 
            $sql = $this->where($conditions, $sql);
        else if($type = "WHERE_OR")
            $sql = $this->whereOr($conditions, $sql);
        try {
            $conn = $this->conn;
            $conn = $this->connect();
            $conn->exec($sql);
            echo "Deleted!";
        } catch(Exception $e) {
            echo $e->getMessage();
        }
        
        echo $sql;
    }
    public function get($type = NULL, $conditions = NULL, $columns = NULL) {
        error_reporting(0);
        $sql = "SELECT " . ((is_null($columns)) ? "*" : implode(", ", $columns)) . " FROM " . $this->table;
        if($type == "WHERE") 
            $sql = $this->where($conditions, $sql);
        else if($type = "WHERE_OR")
            $sql = $this->whereOr($conditions, $sql);

        try {
            $conn = $this->conn;
            $conn = $this->connect();
            $row = $conn->prepare($sql);
            $row->execute();
            $results = $row->setFetchMode(PDO::FETCH_ASSOC);
            return $row;
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
}
?>