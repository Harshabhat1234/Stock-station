
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "stock_station");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$stock_number = mysqli_real_escape_string($link, $_REQUEST['stock_number']);
$name= mysqli_real_escape_string($link, $_REQUEST['name']);
$established = mysqli_real_escape_string($link, $_REQUEST['established']);
$origin = mysqli_real_escape_string($link, $_REQUEST['origin']);
$sector = mysqli_real_escape_string($link, $_REQUEST['sector']);

 
// Attempt insert query execution
$sql = "INSERT INTO company (stock_number, name, established, origin, sector) VALUES ('$stock_number', '$name', '$established', '$origin', '$sector' )";

if(mysqli_query($link, $sql)){
    header("Location: http://localhost:/SSinsert2.html");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

?>