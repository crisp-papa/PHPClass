<?php

include 'dependency.php';

$db = new PDO(Config::DB_DNS, Config::DB_USER, Config::DB_PASSWORD);

//? means if variable is set to true, it returns the first value (username), 
//otherwise it returns the second value ("")
$username = ( isset($_POST["username"]) ? $_POST["username"] : "" );
$email = ( isset($_POST["email"]) ? $_POST["email"] : "" );
$password = ( isset($_POST["password"]) ? $_POST["password"] : "" );
        
if( Validator::usernameIsValid($username)
        && Validator::emailIsValid($email)
        && Validator::passwordIsValid($password))
    {
        try
        {
            $stmt = $db->prepare('INSERT INTO SIGNUP SET username = :usernameValue, '
                . 'email = :emailValue, password = :passwordValue');
            
            $password = sha1($password);
            
            $stmt->bindParam(':usernameValue', $username, PDO::PARAM_STR);
            $stmt->bindParam(':emailValue', $email, PDO::PARAM_STR);
            $stmt->bindParam(':passwordValue', $password, PDO::PARAM_STR);
            
            //Executes all of the above code within the try
            if ( $stmt->execute()){
                $successMessage =  "<h3>Info submitted</h3>";
            } else {
                $errorMessage = "<h3>Info <strong>NOT</strong> submitted</h3>";
            }
        } catch (PDOException $e) {
            //If there is a PDO exception, print Database error
            echo "Database Error";
        }
        
    } 
    

include 'signup.php';

?>