<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <title></title>
    </head>
    <body>
        <?php
        include 'dependency.php';
        session_start();
        
        ?>
        <div id="wrapper">
            <form name="signUpForm" action="processSignUp.php" method="post">
                <table>
                    <tr>
                        <td>Website:</td>
                        <td><input type="text" name="formWebsite" value="" size="50"/></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="text" name="formEmail" value="" size="50"/> </td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="formPassword" size="50"/></td>
                    </tr>
                </table>
                <input type="submit" value="Submit"/>
            </form>
            <div id="message">
                <?php
                    if ( !empty($errorMessage) ) {
                    echo "<p>", $errorMessage, "</p>";
                    }

                    if ( !empty($successMessage) ) {
                        //This will never display because we are moving to the next page with the header
                        echo "<p>", $successMessage, "</p>";
                        header("Location:login.php");
                    }
                ?>
            </div>
        </div>
        
    </body>
</html>
