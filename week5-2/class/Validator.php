<?php

        
class Validator {
    //put your code here
    
    public static function emailIsValid( $str ) {
       if ( is_string($str) && !empty($str) && preg_match("/[A-Za-z0-9_]{2,}+@[A-Za-z0-9_]{2,}+\.[A-Za-z0-9_]{2,}/",$str) != 0 ) {
           return true;
       }        
       return false; 
    }

    public static function nameIsValid( $str ) {
       if ( is_string($str) && !empty($str) ) {
           return true;
       }        
       return false; 
    }

    public static function commentIsValid( $str ) {
       if ( is_string($str) && !empty($str) ) {
           return true;
       }        
       return false; 
    }
    
    public static function loginIsValidPost()
    {
        if( array_key_exists("username", $_POST) || array_key_exists("password", $_POST) )
        {
            return false;
        }
        return Validator::loginIsValid($_POST["username"], $_POST["password"]);
    }


}

?>