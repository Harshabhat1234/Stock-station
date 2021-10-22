
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "stock_station");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$name= mysqli_real_escape_string($link, $_REQUEST['name']);
 
// Attempt insert query execution

$sql ="DELETE FROM company  WHERE name='$name' ";


if(mysqli_query($link, $sql )){
   
    header("Location: http://localhost:/SSadmindelete.html");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// Close connection
mysqli_close($link);

?>