<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $db = new PDO("mysql:host=localhost;port=3306;dbname=phplab", "root", "");
        $stmt = $db->prepare('SELECT * FROM week3');
        $stmt->execute();
        
        $results = $stmt->fetchAll();

        
        if (count($results)) 
        {
            echo "<table border='1'>";
            
            foreach($results as $row)
            {
                echo "<tr><td>";
                echo $row["fullname"];
                echo "</td> <td>";
                echo $row["email"];
                echo "</td> <td>";
                echo $row["comments"];
                echo "</td></tr>";
                
                
            }
            echo "</table>";
        }
        else 
        {
            echo "No rows returned.";
        }
        
        ?>
        
        <form name="mainform" action="processform.php" method="post">
            Full name: <input type="text" name="fullname" value="" /></br>
            Email: <input type="text" name="email" value="" /></br>
            Comments: </br><textarea cols="30" rows="10" name="comments"/></textarea></br>
            <input type="submit" value="Submit"/>
    </body>
</html>