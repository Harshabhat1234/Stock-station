
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
$origin = mysqli_real_escape_string($link, $_REQUEST['origin']);
$sector = mysqli_real_escape_string($link, $_REQUEST['sector']);
$Deliverable_qty= mysqli_real_escape_string($link, $_REQUEST['Deliverable_qty']);
$Turnover= mysqli_real_escape_string($link, $_REQUEST['Turnover']);
$Market_Capital = mysqli_real_escape_string($link, $_REQUEST['Market_Capital']);

 
// Attempt insert query execution

$sql_1 ="UPDATE company SET origin='$origin', sector='$sector'  WHERE name='$name' ";
$sql_2 ="UPDATE more_info SET Deliverable_qty='$Deliverable_qty', Turnover='$Turnover', Market_Capital='$Market_Capital' WHERE cName='$name' ";

if(mysqli_query($link, $sql_1 )){
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
if(mysqli_query($link, $sql_2 )){
    header("Location: http://localhost:/SSadminsuccess.html");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

?>