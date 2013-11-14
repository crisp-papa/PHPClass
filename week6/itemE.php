<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Item E</title>
        <!-- Included my nice styled table -->
        <link rel="stylesheet" type="text/css" href="css/css.css">
    </head>
    <body>
        <?php
         /*
        * Please follow the instructions below.
        * 
          * It is very important to know how to connect to a database and
          * how to retrive data.  PDO in PHP makes it easier to connect
          * and access data.
          * 
          * below is code that will access an address book.  With the results
          * echo out the data in a table, list, etc.  the results are returned in
          * a multidimentional array, so the first set is a regular array and the 
          * inner array is a key=>value pair.
          * 
          * the for each loop is ideal.
          * 
        * 
        */

        
        $db = new PDO("mysql:host=localhost;port=3306;dbname=phplab","root","");

        $statement = $db->prepare('select * from addressbook');
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        
        //print_r($_POST);
        if ( count($result) )
        {
            //Makes the latest guestbook entry appear on the top of the list!!
            //$result = array_reverse($result);
            echo "<table>";
            echo "<tr><td class='center'>Address</td><td class='center'>"
            . "City</td><td class='center'>State</td><td class='center'>"
                    . "Zip</td><td class='center'>Name</td>";
            foreach($result as $row)
            {
                //I didn't like how this looked
                /*
                echo "<dl><dd>Name and Email</dd><dt>";
                echo "<strong>" , $row["name"], "</strong> ", $row["email"];
                echo "</dt><br/><dd>Comments</dd><dt>";
                echo $row["comments"];
                echo "</dt></dt>";
                 * 
                 */
                
                echo "<tr><td>";
                echo $row["address"];
                echo "</td> <td>";
                echo $row["city"];
                echo "</td> <td>";
                echo $row["state"];
                echo "</td> <td>";
                echo $row["zip"];
                echo "</td> <td>";
                echo $row["name"];
                echo "</td></tr>";
            }
            echo "</table>";
        

            //echo "<p>Thanks for posting!</p>";
            //This was used for testing
            //print_r($results);
        } else {
            echo "<p>Sorry, nothing inside the database.</p>";
        }
    

        
        // put your code here
        ?>
    </body>
</html>
