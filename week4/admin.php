<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        session_regenerate_id();
        
        if ( empty($_SESSION["isLoggedIn"] ) ){
            header("Location:login.php");
        }
        
        
        ?>
        
        <h1>You made it in!</h1>
    </body>
</html>
