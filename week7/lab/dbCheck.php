<?php

//Variable declaration
$foundMatch = false;
$message = "init";
//Gets username from the post
$username = filter_input(INPUT_POST, "username");

//If username is a string and it's not empty...
if (is_string($username) && !empty($username) ) 
{
    //Create new pdo from our database
    $db = new PDO("mysql:host=localhost;port=3306;dbname=phplab","root","");

    //Query to get username and set it to result
    $statement = $db->prepare('select * from login where username = :username');
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    
    //Foundmatch is to determine if a match has been found
    //Message is what is displayed in the innerhtml of the div inside the form
    if (is_array($result) && count($result) ) 
    {
        $foundMatch = true;
        $message = "is taken.";        
    } else {
        $foundMatch = false;
        $message = "is available.";
    }
}

//Information we can send to javascript as a JSON object
$results = array(
    'match' => $foundMatch,
    'message' => $message,
    'username' => $username
);

//Turning our array into a JSON object
echo json_encode($results);
