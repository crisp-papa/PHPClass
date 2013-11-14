<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Item D</title>
    </head>
    <body>
        <?php
        
        session_start();
        
        if ( !isset($_SESSION['auth']) || $_SESSION['auth'] != true ){
        
            header("Location:itemC.php");
        }
        
       /*
        * Please follow the instructions below.
        * 
        * you might not know that you can have two different forms on the
        *  page but only one can be processed
        * 
        * 1. Now having some experince with $_POST run the function print_r($_POST)
        * and submit each form.
        * 
        * 2.  Create some logic that will display the data based on which form was
        * submited.  A trick is to assign the submit button with a name and check to
        * see if that name exist in the $_POST array with array_key_exists('key', $_POST)
        * Make sure the name is uqniue.
        * 
        */
       
        // put your code here
        //I put the code in between the forms so it looks a bit nicer
        
        
        
        ?>
        
        <h1>Signup</h1>
        <form action="#" method="post">            
            <label>Name</label> <input type="text" name="name" value="" /> <br />
            <label>Email</label> <input type="text" name="email" value="" /> <br />
            <label>Password</label> <input type="password" name="password" value="" /> <br />
           
            <input type="submit" name="signup" value="Submit" />
        </form>
        
        <?php
        if (array_key_exists('signup', $_POST))
        {
            echo "You've signed up.<br/>";
            
            print_r($_POST);
        }
        ?>
        
         <h1>Login</h1>
        <form action="#" method="post">            
            <label>Email</label> <input type="text" name="email" value="" /> <br />
            <label>Password</label> <input type="password" name="password" value="" /> <br />
           
            <input type="submit" name="login" value="Submit" />
        </form>
         
         <?php
        if (array_key_exists('login', $_POST))
        {
            echo "You've logged in.<br/>";
            
            print_r($_POST);
        }
        ?>
         
        
        
    </body>
</html>