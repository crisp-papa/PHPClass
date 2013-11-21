<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//session_start();
$foundMatch = false;
$message = "init";
$username = filter_input(INPUT_POST, "username");

if (is_string($username) && !empty($username) ) 
{
    $db = new PDO("mysql:host=localhost;port=3306;dbname=phplab","root","");

    $statement = $db->prepare('select * from login where username = :username');
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    
    if (is_array($result) && count($result) ) 
    {
        $foundMatch = true;
        $message = "is taken.";        
    } else {
        $foundMatch = false;
        $message = "is available.";
    }
}

$results = array(
    'match' => $foundMatch,
    'message' => $message,
    'username' => $username
);

echo json_encode($results);

//print_r($result);
/*
foreach($result as $value)
{
    if ($value["username"] === $username)
    {
        $foundMatch = true;
        $message = "Looks good to me";
    }
    
    if ($foundMatch == true)
    {
        $results = array(
            'message' => $message,
            'valid' => $foundMatch
        );
        echo json_encode($results);
    }
}


if ($foundMatch == true)
{
    echo "Match found.";
}

*/