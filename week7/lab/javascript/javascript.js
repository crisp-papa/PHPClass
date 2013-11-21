//Returns the value of the username. See makeAjaxCall for when it's called
function getNewData()
{
    return document.getElementById("username").value;
}

//This is a Gabe function that takes three variables. Thanks Gabe.
function makeAjaxCall() {
   //console.log(userCheck);
   ajax.send("dbCheck.php","username="+getNewData(), checkDB);
}

//This is the callback for Gabes function.
function checkDB(result)
{
   var results = JSON.parse(result);
   document.getElementById("update").innerHTML = results.username + " ";
   document.getElementById("update").innerHTML += results.message;
}
