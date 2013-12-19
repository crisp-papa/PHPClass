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
class Validator{
    public static function emailIsValid($str){ 
        if (is_string($str) && !empty($str) && preg_match("/[A-Za-z0-9_]{2,}+@[A-Za-z0-9_]{2,}+\.[A-Za-z0-9_]{2,}/",$str) != 0 )
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
    
    public static function loginIsValid($email, $password){
        
        $password = sha1($password);
        
        $db = new PDO(Config::DB_DNS, Config::DB_USER, Config::DB_PASSWORD);
        
        $stmt = $db->prepare('SELECT * FROM users WHERE email = :emailValue AND password = :passwordValue limit 1');
        $stmt->bindParam(":emailValue", $email, PDO::PARAM_STR);
        $stmt->bindParam(":passwordValue", $password, PDO::PARAM_STR);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (count($result) && is_array($result)){
            return true;
        }
        return false;
    }

    public static function isString($str)
    {
        if ( is_string($str) && !empty($str))
        {
            return true;
        }
        return false;
    }

    public static function isPhone($int)
    {
        if ( is_numeric($int) && !empty($int) && strlen($int) === 10)
        {
            return true;
        }
        return false;
    }
}

