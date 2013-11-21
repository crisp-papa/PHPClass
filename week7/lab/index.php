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
        <script type="text/javascript" src="javascript/ajax.js"></script>
        <script type="text/javascript" src="javascript/json.js"></script>
        <?php
        $postValue = $_POST;
        print_r($postValue);
        ?>
        
        <form method>
        Enter username: <input id="username" type="text" name="username" value=""/>
        <input type="button" value="Submit" onclick="makeAjaxCall();"/>
        <div id="update">
            
        </div>
        </form>
        
        
        
        <script type="text/javascript">
        
        function getNewData()
        {
            return document.getElementById("username").value;
        }
        
        
        function makeAjaxCall() {
           //console.log(userCheck);
           ajax.send("dbCheck.php","username="+getNewData(), checkDB);
       }
       
       function checkDB(result)
       {
           var results = JSON.parse(result);
           document.getElementById("update").innerHTML = results.username + " ";
           document.getElementById("update").innerHTML += results.message;
       }
             
       </script>
    </body>
</html>
