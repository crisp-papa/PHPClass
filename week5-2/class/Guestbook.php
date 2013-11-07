<?php

/**
 * Description of Guestbook
 *
 * @author Erik Lougee <eriklougee@gmail.com>
 */
class Guestbook extends DB {
    
    public function getGuestbookData(){
        $db = $this->getDB();
        $result = array();
        
        if ( NULL != $db) {
            $stmt = $db->prepare('select name, email, comments from guestbook');
            $stmt->execute();
            
            //FETCH_ASSOC associates a key name pair
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        }
        return $result;
        
    }
            
    public function displayGuestbook(){
        $results = $this->getGuestbookData();
        //print_r($_POST);
        if ( count($results) )
        {
            //Makes the latest guestbook entry appear on the top of the list!!
            $results = array_reverse($results);
            echo "<table>";
            foreach($results as $row)
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
                echo $row["name"];
                echo "</td> <td>";
                echo $row["email"];
                echo "</td> <td>";
                echo $row["comments"];
                echo "</td></tr>";
            }
            echo "</table>";
        

            //echo "<p>Thanks for posting!</p>";
            //This was used for testing
            //print_r($results);
        } else {
            echo "<p>Sorry, no comments posted yet. Try again later!</p>";
        }
    }
    
    public function processGuestbook(){
        //Check post data 
        if (Validator::nameIsValid($_POST["Name"]) 
         && Validator::commentIsValid($_POST["Comments"])
         && Validator::emailIsValid($_POST["Email"]))
        {
            $this->saveEntry();
        }
        if (!Validator::nameIsValid($_POST["Name"]))
        {
            Echo "Please enter something for your name.";
        }
        else if (!Validator::commentIsValid($_POST["Comments"]))
        {
            Echo "Please enter something in the comments field.";
        }
        else if (!Validator::emailIsValid($_POST["Email"]))
        {
            echo "Please enter an email.";
        }
        
        
        //Put into database
        
        
    }
    
    public function saveEntry() {
    //if ( !$this->entryIsValid() ) return false; // make sure everything is valid one more time

    $db = $this->getDB();
    if ( null != $db ) {
        $stmt = $db->prepare('insert into guestbook set name = :nameValue, email = :emailValue, comments = :commentsValue');
        $stmt->bindParam(':nameValue', $_POST["Name"], PDO::PARAM_STR);
        $stmt->bindParam(':emailValue', $_POST["Email"], PDO::PARAM_STR);
        $stmt->bindParam(':commentsValue', $_POST["Comments"], PDO::PARAM_STR);
        if ( $stmt->execute() ) // if everything was excecuted corectly
        {
            return true;
        }
    }
    return false; 
}
    
}
