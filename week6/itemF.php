<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Item F</title>
    </head>
    <body>
        <?php
        // put your code here
        
        include 'dependency.php';
        /*
         * From all your notes and assignments from previous weeks, you should
         * be able to create an address book form that can be submited to this page
         * and with the data collected should be able to save to the database.
         * 
         * 1. Start by creating the form and making sure you can collect the data from
         * the $_POST super global.
         * 
         * 2. Validate the data so at least something is being entered correctly.
         * 
         * 3. Take the validated data and insert into the database with bindparam 
         * before executing
         */
        
        
        //print_r($_POST);
        
        if (count($_POST))
        {
            if(Validator::stringIsValid($_POST['address'])
            && Validator::stringIsValid($_POST['city'])
            && Validator::stringIsValid($_POST['state'])
            && Validator::zipIsValid($_POST['zip'])
            && Validator::stringIsValid($_POST['name'])
            )
            {
                if(Validator::saveEntry())
                {
                    echo "Entry added!";
                }
                else
                {
                    echo "Database failure.";
                }
            }
        }
        
        
        ?>
        
        <form id="address" action="#" method="post">            
            <label>Address</label> <input type="text" name="address" value="" /> <br />
            <label>City</label> <input type="text" name="city" value="" /> <br />
            <label>State</label> <input type="text" name="state" value="" /> <br />
            <label>Zip</label> <input type="text" name="zip" value="" /> <br />
            <label>Name</label> <input type="text" name="name" value="" /> <br />
            
            <input type="submit" name="add" value="Submit" />
        </form>
    </body>
</html>
