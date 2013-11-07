<?php

/**
 * Description of Login
 *
 * @author Erik Lougee <eriklougee@gmail.com>
 */
class Login {
    
    public static function processLogin(){
        $_SESSION["allowGuestbookAccess"] = false;
        if ( isset($_POST["passcode"]) && $_POST["passcode"] == "test")
        {
            $_SESSION["allowGuestbookAccess"] = true;
            header("Location:guestbook.php");
        }  
    }
    
    public static function confirmAccess(){
        if (! isset($_SESSION["allowGuestbookAccess"]) 
                 || ! $_SESSION["allowGuestbookAccess"] ) {
            header("Location:login.php");
        }
            
    }
}
