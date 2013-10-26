<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //Required whenever you wish to start a new session
        session_start();
        
        include 'Config.php';
        
        //If session counter is not set...
        if ( !isset($_SESSION["counter"]) ){
            //Set it to zero
            $_SESSION["counter"] = 0;
        } else {
            //Increment it
            $_SESSION["counter"]++;
        }
        
        //Never store password or anyone's personal info in a session
        
        session_regenerate_id(true);
        
        echo session_id(), "<br />";
        echo $_SESSION["counter"];
        
        if( isset($_SESSION["maxlife"]) && $_SESSION["maxlife"] > (time() - Config::MAX_SESSION_TIME)){
            echo "Sorry, you timed out! You must login again.";
            session_destroy(); 
        } else {
            $_SESSION["maxlife"] = (time() + Config::MAX_SESSION_TIME);
        }
        
        
        
        
        
        /*
        echo $_SESSION["maxlife"];
        
        unset($_SESSION["maxlife"]);
        
        echo $_SESSION["maxlife"];
        //Sing this lyric to Metallica's Seek and Destroy
        session_destroy();
        */
        ?>
    </body>
</html>
