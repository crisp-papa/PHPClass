<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            form{
                border: 5px outset grey;
                border-radius:5px;
                width: 500px;
                height:auto;
                padding: 5px;
            }
            
            #wrapper{
                position:relative;
                width: 500px;
                margin:auto;
            }
            
        </style>
    </head>
    <body>
        <?php
            include 'dependency.php';
            
            
            $token = uniqid();
            
            //If not set, set it
            if ( !isset($_SESSION["token"]) ){
                $_SESSION["token"] = $token;
            } else {
                //If it's set and they don't equal, someone may have hijacked the session
                if (isset($_POST["token"]) && ($_SESSION["token"] != $_POST["token"])){ 
                    //So destroy it
                    session_destroy();
                    //Go back to the login page
                    header("Location:login.php");
                    exit();
                }
            }
            
            //Check if bots try to set this data from the hidden email field
            //(which will never be set by a legitimate user)
            if( !empty( $_POST["email"] ) ) {
                $_SESSION["wait"] = time() + Config::MAX_SESSION_TIME;
            }
            
            if ( isset( $_SESSION["wait"]) && ($_SESSION["wait"] > (time() - Config::MAX_SESSION_TIME ))) {
                echo "Please come back later.";
                exit();
            }
            
            $_SESSION["token"] = $token;
            
            
            $username = ( isset($_POST["username"]) ? $_POST["username"] : "" );
            $password = ( isset($_POST["password"]) ? $_POST["password"] : "" );  
            
            if (count($_POST))
            {
                if ( !empty($username) 
                        && !empty($password)
                        && Validator::loginIsValid($username, $password)
                   ){
                    $_SESSION["isLoggedIn"] = true;
                    header("location:admin.php");
                } else {
                    echo "<p>Username or password is incorrect</p>";
                }
            }
            
            if ( isset($_SESSION["isLoggedIn"]))
            {
                header("Location:admin.php");
            }
        ?>
        <div id="wrapper">
            <form name="signupform" action="login.php" method="post">
                
                Username: <input type="text" name="username" size="50"/> <br/>
                Password: <input type="password" name="password" size="50"/> <br/>
                <input type="hidden" name = "token" value = "<?php echo $token; ?>" />
                <input type="hidden" name = "email" value = "" />
                <input type="submit" value="Submit"/>
            </form>
        </div>
        
    </body>
</html>
