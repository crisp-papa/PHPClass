<!DOCTYPE html>
<?php include 'dependency.php'; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <?php
        
            Login::processLogin(); 
            
        ?>
        
        <form action="#" method="post">
            Passcode: <input type="password" name="passcode" value="" />
            <br />
            
            <input type="submit" value="Submit" />
        </form>
    </body>
</html>
