<?php

//Defines the Validator class
class Validator {
    
    //This is the constructor for the Validator class.
    //We will probably do something like this.$fullname in the future
    //So whenever it makes a new object the code within the constructor will be
    //added to the object we invoke
    public function _construct()
    {
          
    }
    
    //Validates the fullname field
    function isFullNameValid($fullname)
    {
        if (is_string($fullname) && !empty($fullname))
        {
            return true;
        } 
            return false;
    } 
    
    //Validates the email field
    function isEmailValid($email)
    {
        if (is_string($email) && !empty($email))
        {
            return true;
        } 
            return false;  
    }
    
    //Validates the comments field
    function isCommentsValid($comments)
    {
        if (is_string($comments) && !empty($comments))
        {
            return true;
        } 
            return false;  
    } 
    
    
}