<?php


class saasDB{
    
    protected $db = null;

    public function getDB() {        
        try 
        {
            $this->db = new PDO(Config::DB_DNS, Config::DB_USER, Config::DB_PASSWORD);
        } 
        catch (Exception $ex) 
        {
            $this->closeDB(); //sets db to null in case we get an exception
        }
        return $this->db;
    }
    
    //sets db to null
     public function closeDB() {        
        $this->db = null;        
    }
}
