<?php

    //This is an include statement much like in other languages. 
    //Allows the use of the validator.php file
    include 'validator.php';
    
    //Creating a new object of type Validator
    $valObj = new Validator(); 

    $fullname = "";
    $email = "";
    $comments = "";
    
    //If there is anything in the $_POST array...
    if(count($_POST))
    {
        //Checks to see if fullname key exists in the global $_POST
        if(array_key_exists("fullname", $_POST))
        {
            //If so, adds that to the fullname variable
            $fullname = $_POST["fullname"];
        }

        //Checks to see if email key exists in the global $_POST
        if(array_key_exists("email", $_POST))
        {
            //If so, adds that to the email variable
            $email = $_POST["email"];
        }

        //Checks to see if comments key exists in the global $_POST
        if(array_key_exists("comments", $_POST))
        {
            //If so, adds that to the comments variable
            $comments = $_POST["comments"];
        }
    }

    //Good naming convention, isFullNameValid is better than validFullName
    //isFullNameValid is more of a question, which describes the function better
    if($valObj->isFullNameValid($fullname))
    {
        echo"<p>Full Name is good</p>";
    }
    else
    {
        echo"<p>Full Name is not valid</p>";
    }


    if($valObj->isFullNameValid($fullname) && !empty($email) && !empty($comments))
    {
        //This essentially sends mysql code for PHP to parse
        //Sets host, port, database name, and gives root access
        $db = new PDO("mysql:host=localhost;port=3306;dbname=phplab","root","");

        //Try catch statement used to add values into the database
        try
        {
            $stmt = $db->prepare('insert into week3 set fullname = :fullnameValue, '
                    . 'email = :emailValue, comments = :commentsValue');
            
            
            $stmt->bindParam(':fullnameValue', $fullname, PDO::PARAM_STR);
            $stmt->bindParam(':emailValue', $email, PDO::PARAM_STR);
            $stmt->bindParam(':commentsValue', $comments, PDO::PARAM_STR);
            
            //Executes all of the above code within the try
            $stmt->execute();

            echo "<h3>Info Submited</h3><p><a href='index.php'>Back to form</a></p>";
        }
        catch (PDOException $e) 
        {
            //If there is a PDO exception, print Database error
            echo "Database Error";
        }
    } 
    else 
    {
         echo "<h3>Info NOT Submited</h3><p><a href='index.php'>Back to form</a></p>";  
    }
?>