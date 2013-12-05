<?php

include 'dependency.php';

$db = new PDO(Config::DB_DNS, Config::DB_USER, Config::DB_PASSWORD);

//? means if variable is set to true, it returns the first value (username), 
//otherwise it returns the second value ("")
$website = ( isset($_POST["formWebsite"]) ? $_POST["formWebsite"] : "" );
$email = ( isset($_POST["formEmail"]) ? $_POST["formEmail"] : "" );
$password = ( isset($_POST["formPassword"]) ? $_POST["formPassword"] : "" );


if( Validator::usernameIsValid($website)
 && Validator::emailIsValid($email)
 && Validator::passwordIsValid($password))
    {
        try
        {
            $stmt = $db->prepare('INSERT INTO USERS SET username = :formWebsite, email = :formEmail, password = :formPassword');
            //, active = :active
            //$active = 1;
            $password = sha1($password);
            $stmt->bindParam(':formWebsite', $website, PDO::PARAM_STR);
            $stmt->bindParam(':formEmail', $email, PDO::PARAM_STR);
            $stmt->bindParam(':formPassword', $password, PDO::PARAM_STR);
            //$stmt->bindParam(':active', $active, PDO::PARAM_INT);
            //Executes all of the above code within the try
            if ( $stmt->execute()){
                $successMessage =  "<h3>Info submitted</h3>";
            } else {
                $errorMessage = "<h3>Info <strong>NOT</strong> submitted</h3>";
                print_r($_POST);
            }
        } catch (PDOException $e) {
            //If there is a PDO exception, print Database error
            echo "Database Error";
        }
        
    } 
    

include 'signup.php';

