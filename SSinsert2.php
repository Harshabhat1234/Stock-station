<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "stock_station");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$symbol = mysqli_real_escape_string($link, $_REQUEST['symbol']);
$c_name= mysqli_real_escape_string($link, $_REQUEST['c_name']);
$shareprice= mysqli_real_escape_string($link, $_REQUEST['shareprice']);
$no_of_trades = mysqli_real_escape_string($link, $_REQUEST['no_of_trades']);


 
// Attempt insert query execution
$sql = "INSERT INTO trades (symbol, c_name, shareprice, no_of_trades) VALUES ('$symbol', '$c_name', '$shareprice', '$no_of_trades' )";   

if(mysqli_query($link, $sql)){
    header("Location: http://localhost:/SSinsert3.html");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

?>