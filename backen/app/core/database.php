<?php

class Database 
{
    private function db_connect()
    {
        try {
            $string = DB_TYPE . ":" . "host=" . DB_HOST .";dbname=" . DB_NAME;
            return new PDO($string, DB_USER, DB_PASS);   
                   
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    public function read(string $query, array $data=[])
    {
        $db = $this->db_connect();
        
        $stmt = $db->prepare($query);

        if(count($data)==0) {
            $stmt= $db->query($query);
            $check = 0;
            if ($stmt){
                $check = 1;
            }
        } else {
            $check = $stmt->execute($data);
        }

        if($check)
        {
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } else {
            return false;
        }

    }

    public function write($query, $data=[])
    {
        $db = $this->db_connect();
        $stmt = $db->prepare($query);

        if(count($data)==0) {
            $stmt= $db->query($query);
            $check = 0;
            if ($stmt){
                $check = 1;
            }
        } else {
            $check = $stmt->execute($data);
        }

        if($check)
        {
            return true;
        } else {
            return false;
        }
    }
}