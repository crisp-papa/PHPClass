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
        <?php $color = array("red", "orange", "yellow", "green", "blue", "violet");?>
    </head>
    <body style="background-color:
        <?php 
        echo $color[getRandom()];?>;">
        <?php
        
        $phrases = array("Don't shake me Lucifer", 
                    "Night of the Vampire", 
                    "I Walked with a Zombie", 
                    "It's a Cold Night for Alligators", 
                    "Creature With the Atom Brain",
                    "Two Headed Dog");
        echo "Roky Erickson Song of the Moment:<br/>";
        echo $phrases[getRandom()], "<br/>";
        // put code for week 1 here

	//A.
	$firstname = 'Erik';
	$lastname = 'Lougee';
	
	$fullname = $firstname . $lastname;
	
	echo $fullname . "<br/>";
	
	//B.
	
	$arr = array("first"=>"one", "second"=>"two", "third"=>"three", "fourth"=>"four", "fifth"=>"five");

	$arraymulti = array(
				array("apple", "orange", "banana"),
				array("red", "orange", "yellow"),
				array("best", "better", "good")
				);
	
	$array = array(
				"1" => "PHP code tester Sandbox Online",  
				"foo" => "bar", 5 , 5 => 89009, 
				"case" => "Random Stuff",
				"PHP Version" => phpversion()
				);
				  
				  
	//C. explode
	//Whoa! I was surprised you can dynamically change the type like this. Php is cool!
	//Explode just breaks up a string (with whatever argument you give it) and returns it as an array
	$sentence = "Let's turn this into an array.";
	
	$sentence = explode(" ", $sentence);

	print_r($sentence);
	
	//C. sha1
	$greeting = "What's up dude?";
	if (sha1($greeting) == "ee10c2bee1c5e38a6844501daf625d3af91fd043")
	{
		echo "Hangin' man, hangin'.";
	}
	
	//C. htmlentities
	$htmlhelp = "<pre>How can I display this?</pre><strong>PHP will tell me.</strong><h5>Apparently only on sandbox.com</h5>";

	echo htmlentities($htmlhelp);
	
	//C. md5
	//Works the same exact way as sha1 but MD5 returns a different result?
	$greeting = "What's up dude?";
	if (md5($greeting) == "2e0789dcd2fd8aff5350c4910099689a")
	{
		echo "Hangin' man, hangin'.";
	}
	
	//C. strip_tags
	//This is the concise version. 
	//echo strip_tags($htmlHelp);
	/*
	You can also do something like:
	$removeHTML = strip_tags($htmlHelp);
	echo $removeHTML;
	*/
	
	//C. trim
	//Removes white space from the beginning and end of the string, or whatever you want can be removed
	$whiteSpaceRules = "                                                                                                         How's this for white space?                                                                                                                    ";
	echo trim($whiteSpaceRules);
	
	/*
	This removes How's from the string:
	$whiteSpaceRules = "How's this for white space?";

	$removeVowels = trim($whiteSpaceRules, "How's");

	echo $removeVowels;
	*/
	
	//C. ucwords
	//Uppercases the first letter in each word in the string
	$lowerCaseWords = "let's make all the words in this sentence uppercase.";
	echo ucwords($lowerCaseWords);
	
	//C. strlen
	//Returns the length of the string
	//How long is $lowerCaseWords?
	echo strlen($lowerCaseWords);
	
	//C. str_shuffle
	//Randomizes the string
	echo str_shuffle($lowerCaseWords);
	
	//C. ord
	//Returns ascii value of a character (if you do a string, it only returns the first value)
	//What is the ascii value of @?
	echo ord("@");
	
	//D. array_count_values
	//Counts the values of an array
	$someJunk = array(
				"There's", "a", "a", "a", "bunch", "of", "junk", "junk");
	print_r( array_count_values($someJunk));
	
	//D. array_flip
	//Flips the key and the value for the array and returns it
	//This example helped me understand:
	$arraymulti = array("best", "better", "good");
				
	$newArray = array_flip($arraymulti);

	print_r($arraymulti);
	print_r($newArray);
	
	//D. array_key_exists
	$isThisTrue = array_key_exists("best", $newArray);

	//If returns 1, yes it's true
	print_r($isThisTrue);
	
	//D. array_map
	//Allows you to have a callback function that will execute and change the array you pass to it.
	//Let's see if we can do this...
	$randomizeValues = array(
		"Maybe",
		"this",
		"will",
		"make",
		"an",
		"anagram!");
	//Looks like you can use built in functions, neat
	print_r(array_map("str_shuffle", $randomizeValues));
	
	//D. array_rand
	//Gets one or more random values from an array and return the keys (or indices)
	print_r(array_rand($randomizeValues, 2));
	
	//You can also throw those numbers into an array so you can use them
	$newArray = array_rand($randomizeValues, 2);
	
	//D. array_push
	//Adds values to the end of an array. Kinda neat, arrays are dynamic!
	array_push($randomizeValues, "But", "probably", "not.");
	
	//I wonder if you can pass it an array...concatenation of arrays?
	$addMoreValues = array(
		"add",
		"some",
		"stuff",
		"dude");
	
	//Not what I expected, but still cool. You can make multidimensional arrays this way.
	//To get the values we'd have to use a for loop to iterate through it and add the key values
	//array_push($randomizeValues, $addMoreValues[]);

	//D. in_array
	//Checks if a value is within an array
	if (in_array("dude", $addMoreValues))
		echo "dude is in the array";
	
	//D. shuffle
	//Randomizes the array around -> returns a boolean value.
	shuffle($addMoreValues);
	print_r($addMoreValues);
	
	//Since it prints a 1 if you succeed in shuffling, this doesn't work the way I thought it would (until I read it returned a bool value)
	print_r(shuffle($addMoreValues));
	
	//D. count/sizeof
	//sizeof is an alias of count, so I'm just going to do a count example.
	//It counts all of the values of an array, or elements within an object and returns as a string
	echo count($addMoreValues);
	
	//D. sort
	//Sort has a bunch of different options for sorting, like numerically or by string, or just how they are as types, etc. Kinda cool. Good sort function.
	//Alphabetical sort
	sort($addMoreValues);
	
	$bunchOfNumbers = array(
		"1", 
		"2",
		"5",
		"4",
		"3");
		
	//Numeric sort	
	sort($bunchOfNumbers, SORT_NUMERIC);
	
	//D. is_array
	//Checks whether or not it's an array. Apparently also there is is_bool, is_float, etc.
	if (is_array($bunchOfNumbers))
		echo "Yep, it's an array alright.";


	//E. 
        function token() {	
            return sha1( uniqid(mt_rand(), true) );
        }

        
        
        
        date_default_timezone_set('America/New_York');
        
        echo "<br/><br/><br/>";
	$rows = 100; // define number of rows
	$cols = 1;// define number of columns

	echo "<table border='1'>"; 
	 
	for($tr=1;$tr<=$rows;$tr++){ 
	    if (($tr % 2) == 0)
		{
	    	echo "<tr bgcolor=#E6E6E6>";
		}
		else 
		{
			echo "<tr bgcolor=#FFFFFF>";
		}
	        for($td=1;$td<=$cols;$td++){
		$today = date("F j, Y, g:i:s:ms a");
	        echo "<td>Row #", $tr, " ", $today, "<br/>Unique ID: ", token(), "</td>"; 
	        } 
	    echo "</tr>"; 
	} 
	 
	echo "</table>";
        
        
        //F.
        
        function getRandom()
        {
           return rand(0, 5); 
        }
        
        
        
        ?>
    </body>
</html>
