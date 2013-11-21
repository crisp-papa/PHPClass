<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <!--Javascript include-->
        <script type="text/javascript" src="javascript/ajax.js"></script>
        <script type="text/javascript" src="javascript/json.js"></script>
        <script type="text/javascript" src="javascript/javascript.js"></script>
        
        <!--Main form-->
        <form method>
        Enter username: <input id="username" type="text" name="username" value=""/>
        <input type="button" value="Submit" onclick="makeAjaxCall();"/>
        <!--This will update with relevant information-->
        <div id="update">
            
        </div>
        </form>
    </body>
</html>
