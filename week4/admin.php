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
        print_r($_GET);
        if ( empty($_SESSION["isLoggedIn"] ) ){
            header("Location:login.php");
        }
        
        if ( isset( $_GET["logout"]) && $_GET["logout"] == 1)
        {
            session_destroy();
            header("Location:login.php");
        }
        ?>
        
        <h1>You made it in!</h1>
        <a href="admin.php?logout=1">Logout</a>
        
    </body>
</html>
