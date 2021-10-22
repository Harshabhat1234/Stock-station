<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "stock_station");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$c_symbol = mysqli_real_escape_string($link, $_REQUEST['c_symbol']);
$Week= mysqli_real_escape_string($link, $_REQUEST['Week']);
$Month= mysqli_real_escape_string($link, $_REQUEST['Month']);
$Month3 = mysqli_real_escape_string($link, $_REQUEST['Month']);
$Year = mysqli_real_escape_string($link, $_REQUEST['Year']);


 
// Attempt insert query execution
$sql = "INSERT INTO trade_history (c_symbol, 1_Week, 1_Month, 3_Month, 1_Year) VALUES ('$c_symbol', '$Week', '$Month', '$Month3', '$Year' )";   

if(mysqli_query($link, $sql)){
    header("Location: http://localhost:/SSinsert5.html");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

?>