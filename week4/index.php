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
    </head>
    <body>
        <?php
       
        include 'dependency.php';
        //include 'Validator.php';
        //include 'Config.php';
        /*
        $db = new PDO(Config::DB_DNS, Config::DB_USER, Config::DB_PASSWORD);
        $stmt = $db->prepare('SELECT * FROM week3');
        $stmt->execute();
        
        $result = $stmt->fetchAll();
        
        print_r($result);
        */
        //$valObj = new Validator();
        
        $testEmail = "test@emailtest.net";
        
        if (Validator::emailIsValid($testEmail) ) 
        {
            echo "Email is valid <br/>";
        } else {
            echo "Email is <strong>NOT</strong> valid. <br/>";
        }
        
        $db = new PDO(Config::DB_DNS, Config::DB_USER, Config::DB_PASSWORD);
        $stmt = $db->prepare('SELECT * FROM week3');
        $stmt->execute();
        
        $result = $stmt->fetchAll();
        
        print_r($result);
        
        echo "<h1>", $_SESSION["counter"], "</h1>";
        ?>
    </body>
</html>
