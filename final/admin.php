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
            //Gets userid from the session
            $userID = $_SESSION['userid'];
            $dbdata = new DBData;
            //If there's anything in the post...
            if(count($_POST))
            {
                //Validate and save if validated
                $errors = $dbdata->validateAll();
                if ($dbdata->validateAll())
                {
                    $dbdata->saveAll($userID);
                }
                else
                {
                    echo "Data not validated. Please try again.";
                }
            }

            
            $currentUser = $dbdata->getDBDataFrom($userID);

            if ( isset($_GET["logout"]) && $_GET["logout"] == 1)
            {
                session_destroy();
                header("Location:login.php");
            }

            $currentWebsite = $dbdata->getWebsite($userID);
        ?>
        
            <form method="post">
                Title: <input type="text" name="title" value="<?php echo $currentUser['title'];?>"/><br />            
                Theme: 
                <select name="theme">
                    <?php //Cool function Gabe, Steve showed me this!
                        $themeArray = array ( 'theme1' => 'Theme 1', 'theme2' => 'Theme 2', 'theme3' => 'Theme 3');
                        foreach ($themeArray as $key => $value)
                        {
                            echo '<option value="', $key, '"';
                            if ( $currentUser['theme'] == $key)
                            {
                                echo 'selected = "selected"';
                            }
                            echo '>', $value, '</option>';

                        }
                    ?>
                </select> <br/>
                Address: <input type="text" name="address" value="<?php echo $currentUser['address'];?>"/><br />
                Phone: <input type="tel" name="phone" value="<?php echo $currentUser['phone'];?>"/><br />
                Email: <input type="text" name="email" value="<?php echo $currentUser['email'];?>"/><br />
                About:<br /> <textarea cols="40" rows="10" name="about" ><?php echo $currentUser['about'];?></textarea><br />
                <input type="submit" value="Submit"/>
            </form>
        
        <a href="admin.php?logout=1">Logout</a>
        <a href="demo.php?website=<?php echo $currentWebsite; ?>">View Demo</a>
        
        
        
            
    </body>
</html>
