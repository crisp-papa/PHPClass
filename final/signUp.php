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
        ?>
        <div id="mainWrapper">
            <div id="header">
                <h1>Signup</h1>
            </div>
                
            <form  name="signUpForm" action="processSignUp.php" method="post">
                <table id="signupFormID">
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
                    <tr>
                        <td colspan=2><input type="submit" value="Submit"/></td>
                    </tr>
                </table>
            </form>
            <a href="index.php">Return to the Homepage</a>
            <div id="message">
                <?php
                    if ( !empty($errorMessage) ) {
                    echo "<p>", $errorMessage, "</p>";
                    }

                    if ( !empty($successMessage) ) {
                        header("Location:login.php");
                    }
                ?>
            </div>
        </div>
        
    </body>
</html>
