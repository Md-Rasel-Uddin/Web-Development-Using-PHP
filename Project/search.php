<?php
    mysql_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());     
    mysql_select_db("project_shipping") or die(mysql_error());    
?>
 
<!DOCTYPE>
<html>
<head>
    <title>Search results</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<?php
    $query = $_GET['query'];    
     
    $min_length = 3;   
     
    if(strlen($query) >= $min_length){ 
        $query = htmlspecialchars($query);       
         
        $query = mysql_real_escape_string($query);   
         
        $raw_results = mysql_query("SELECT * FROM post
            WHERE (`content` LIKE '%".$query."%') ") or die(mysql_error());      
         
        if(mysql_num_rows($raw_results) > 0){ 
            while($results = mysql_fetch_array($raw_results)){ 
                echo "<p><h3>".$results['content']."</h3>".$results['content']."</p>";               
            }             
        }
        else{ 
            echo "No results";
        }         
    }
    else{ 
        echo "Minimum length is ".$min_length;
    }
?>

</body>
</html>