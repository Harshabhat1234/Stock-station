<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "stock_station");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$Symbol = mysqli_real_escape_string($link, $_REQUEST['Symbol']);
$pc= mysqli_real_escape_string($link, $_REQUEST['pc']);
$op= mysqli_real_escape_string($link, $_REQUEST['op']);
$hp = mysqli_real_escape_string($link, $_REQUEST['hp']);
$lp = mysqli_real_escape_string($link, $_REQUEST['lp']);
$cp = mysqli_real_escape_string($link, $_REQUEST['cp']);
$ap = mysqli_real_escape_string($link, $_REQUEST['ap']);


 
// Attempt insert query execution
$sql = "INSERT INTO vix (Symbol, PC, OP, HP, LP, CP, AP) VALUES ('$Symbol', '$pc', '$op', '$hp', '$lp', '$cp', '$ap')";   

if(mysqli_query($link, $sql)){
    header("Location: http://localhost:/SSadminsuccessinsert.html");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

?>