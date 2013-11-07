<!DOCTYPE html>
<?php include 'dependency.php'; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Guestbook</title>
        <link rel="stylesheet" type="text/css" href="css/css.css">
    </head>
    <body>
        <div id="form">
            <h3>Old school Guestbook</h3>
            
        <form action="#" method="post">
            Name : <input type="text" name="Name" value=""/> <br/>
            Email: <input type="text" name="Email" value=""/> <br/>
            Comments: <br/><textarea name="Comments" rows="10" cols="100" value="" /></textarea><br/>
            <input type="submit" value="Submit" /> <br/><br/>
        </form>
        </div>
        
        <?php
            Login::confirmAccess();
            

            $gb = new Guestbook();
            if (count($_POST))
            {
                $gb->processGuestbook();
            }
            $gb->displayGuestbook();
        ?>
        
        
    </body>
</html>
