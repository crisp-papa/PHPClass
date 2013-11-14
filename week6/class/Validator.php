<?php

        
class Validator {
    public static function stringIsValid( $str ) {
       if ( is_string($str) && !empty($str) ) {
           return true;
       }        
       return false; 
    }
    
    public static function zipIsValid( $str ) {
        if (is_numeric($str) && strlen($str) === 5)
        {
            return true;
        }
        return false;
    }
    
    public static function stateIsValid( $str )
    {
        if (is_string($str))
        {
            return true;
        }
        return false;
    }
    
    public static function saveEntry() {
        $db = new PDO(Config::DB_DNS, Config::DB_USER, Config::DB_PASSWORD);
        
        if ( null != $db ) {
            $stmt = $db->prepare('insert into addressbook '
                    . 'set address = :addressValue, '
                    . 'city = :cityValue, '
                    . 'state = :stateValue, '
                    . 'zip = :zipValue, '
                    . 'name = :nameValue');
            
            $stmt->bindParam(':addressValue', $_POST['address'], PDO::PARAM_STR);
            $stmt->bindParam(':cityValue', $_POST['city'], PDO::PARAM_STR);
            $stmt->bindParam(':stateValue', $_POST['state'], PDO::PARAM_STR);
            $stmt->bindParam(':zipValue', $_POST['zip'], PDO::PARAM_STR);
            $stmt->bindParam(':nameValue', $_POST['name'], PDO::PARAM_STR);
            if ( $stmt->execute() )
            {
                return true;
            }
        }
        return false; 
    } 
}

