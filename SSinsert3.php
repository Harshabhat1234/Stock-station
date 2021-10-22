<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "stock_station");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$cName = mysqli_real_escape_string($link, $_REQUEST['cName']);
$Deliverable_qty= mysqli_real_escape_string($link, $_REQUEST['Deliverable_qty']);
$Turnover= mysqli_real_escape_string($link, $_REQUEST['Turnover']);
$Market_Capital = mysqli_real_escape_string($link, $_REQUEST['Market_Capital']);


 
// Attempt insert query execution
$sql = "INSERT INTO more_info (cName, Deliverable_qty, Turnover, Market_Capital) VALUES ('$cName', '$Deliverable_qty', '$Turnover', '$Market_Capital' )";   

if(mysqli_query($link, $sql)){
    header("Location: http://localhost:/SSinsert4.html");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

?>