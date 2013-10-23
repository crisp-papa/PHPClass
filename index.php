<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $_GET["title"]; ?></title>
    </head>
    <body>
        <?php
        //Two global variables that are created by PHP interpreter
        //$_POST;
        //$_GET;
        
        //Populate through a form field
        //$_POST = array();
        
        //Will populate through a url
        //$_GET = array();
        //$_GET["page"] = "index";
        //echo $_GET["title"] = "whatever";
        //echo $_GET["p"] = "hey hows it goin dudes";
        $p = "Default paragraph";
        $title = "default title";
        $page = "Index";
        
        echo count($_GET);
        if ( count($_GET) )
        {
            if( array_key_exists("p", $_GET) )
            {
                $p = $_GET["p"];
            }
        }
        
        //$key => value
        echo "<h1>", $page, "</h1>";
        
        if ( strlen($p) > 0)
        {
            echo "<p>", $p, "</p>"; 
        }
        echo "<p>", $p, "</p>";
        
        //Send it this: 
        //http://localhost/PHPClass/index.php?page=The%20kewlest&title=this%20thing&p=doitdoitdoit
        ?>
    </body>
</html>
