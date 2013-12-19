<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>This could be your website!</title>
        <link rel="stylesheet" type="text/css" href="css/main.css"/>
    </head>
    <body>
        <?php
            include 'dependency.php';
            
            $email = (isset($_POST["email"]) ? $_POST["email"] : "");
            $password = (isset($_POST["password"]) ? $_POST["password"] : "");
            
            //echo $_SESSION['email'];
            //echo $_SESSION['userid'];
            
            //If anything in the count, validate the data from the post
            //then if it is valid, send them to the admin page
            if (count($_POST))
            {
                if ( Validator::loginIsValid($email, $password) )
                {
                    echo "correct input should display here";
                    $_SESSION["isLoggedin"] = true;
                    $_SESSION['email'] = $email;
                    $dbdata = new DBData();
                    $_SESSION['userid'] = $dbdata->getUserID();
                    header("Location:admin.php");
                }
                else
                {
                   echo "Login failed.";
                   $errors = "Incorrect input. Please try your credentials again." ;
                }
            }
            
            //Checks to see if the user is already logged in and tries to go to the admin page.
            //Boots you over to the admin page. 
            if( isset($_SESSION["isLoggedin"]) && $_SESSION["isLoggedin"] == true )
            {
                header("Location:admin.php");
            }
            
        ?>
        <div id="mainWrapper">
    
            <div id="header">

            <h1>Login</h1>

            </div>
            <form id="loginFormID" action="login.php" method="POST">
                <table>
                    <tr>
                        <td>Email:</td>
                        <td><input type="text" name="email"/></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password"/></td>
                    </tr>
                    <tr>
                        <td colspan=2><input type="submit" value="Submit"/></td>
                    </tr>
                </table>
            </form>
            <a href="index.php">Return to the Homepage</a>
            <a href="signup.php">Sign up here</a>
        </div>
    </body>
</html>
