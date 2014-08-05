<!DOCTYPE html>
<html>
    <head>
        <title>AJAX </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>Click this button
        <input type="button" value="Show" onclick="show_details()"><br/>
        <a href="country.php" onclick="grabFile(this.href); return false;">
                Information from country.php file
        </a><br/>
        <select id="select">
            
        </select><br/>
        </div>
        
  <script>
    function show_details()
    {
    alert("Hello FTFL");
    
    }
 
/*
<!-- Creating a new instance on AJAX
var xhr = new XMLHttpRequest();
-->
<!-- Object Detection
 if (window.XMLHttpRequest) 
    {
     var xhr = new XMLHttpRequest();
    }
 --> 
<!-- for Internet Explorer browser
    if (window.ActiveXObject) 
    {
     var xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
-->  
    function getHTTPObject() 
     {
      var xhr = false;
        if (window.XMLHttpRequest) 
            {
             xhr = new XMLHttpRequest();
            } 
        else if (window.ActiveXObject)
            {
             xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
      return xhr;
    }
    
    var request = getHTTPObject();
        if (request) 
            {
            // do some Ajax
            }
*/
 
         function getHTTPObject() 
         {
            var xhr = false;
            if (window.XMLHttpRequest) 
            {
                xhr = new XMLHttpRequest();
            } 
            else if (window.ActiveXObject)
              {
                try {
                     xhr = new ActiveXObject("Msxml2.XMLHTTP");
                    } 
                catch(e) 
                 {
                    try 
                        {
                        xhr = new ActiveXObject("Microsoft.XMLHTTP");
                        } 
                    catch(e) 
                        {
                        xhr = false;
                        }
                 }
              }
            return xhr;
        }
        
     function grabFile(file) 
      {
        var request = getHTTPObject();
        if (request) 
        {
            request.onreadystatechange = function() 
                {
                 displayResponse(request); 
                };
             request.open("GET", file, true);
             request.send(null);
        }
     }
    
    //displayResponse function
    function displayResponse(request)
    {
        if (request.readyState == 4) 
            {
            if (request.status == 200 || request.status == 304) 
                {
                //alert(request.responseText);
                var options="";
                var country = JSON.parse(request.responseText);
                //console.log(typeof country);
                for(var i = 0; i<=country.countries.length; i++)
                    {
                    options+="<option value= '"+country.countries[i].country.country_id+
                            "'>"+country.countries[i].country.country_name+"</option>";
                    //document.writeln(country.countries[i].country.country_name);
                    document.getElementById('select').innerHTML=options;
                    }
                }
            }
    }
    
  </script> 
 </body>
</html>