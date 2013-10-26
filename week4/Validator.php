<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Validator
 *
 * @author 001294495
 */
class Validator {
    
    public static function emailIsValid($str){
        if (is_string($str) && !empty($str))
        {
            return true;
        } 
        return false;  
    }
    
    public static function usernameIsValid($str){
        if (is_string($str) && !empty($str))
        {
            return true;
        } 
        return false;  
    }
    
    public static function passwordIsValid($str){
        if (is_string($str) && !empty($str))
        {
            return true;
        } 
        return false;  
    }
    
    public static function loginIsValid($username, $password){
        
        $password = sha1($password);
        
        $db = new PDO(Config::DB_DNS, Config::DB_USER, Config::DB_PASSWORD);
        
        $stmt = $db->prepare('SELECT * FROM SIGNUP WHERE username = :usernameValue limit 1');
        $stmt->bindParam(":usernameValue", $username, PDO::PARAM_STR);
        $stmt->execute();
        
        $result = $stmt->fetchAll();
        
        if (count($result)){
            if ($result[0]["password"] == $password)
                return true;
        }
        return false;
        
        
    }
}

