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
        if ( !empty($errorMessage) ) {
            echo "<p>", $errorMessage, "</p>";
        }
        
        if ( !empty($successMessage) ) {
            echo "<p>", $successMessage, "</p>";
        }
        ?>
        <div id="wrapper">
            <form name="signupform" action="signupprocess.php" method="post">
                
                Username: <input type="text" name="username" value="" size="50"/> <br/>
                Email: <input type="text" name="email" value="" size="50"/> <br/>
                Password: <input type="password" name="password" size="50"/> <br/>
                
                <input type="submit" value="Submit"/>
            </form>
        </div>
        
        

        
    </body>
</html>
