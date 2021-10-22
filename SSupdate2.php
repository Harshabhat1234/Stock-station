
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "stock_station");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$symbol= mysqli_real_escape_string($link, $_REQUEST['symbol']);
$shareprice = mysqli_real_escape_string($link, $_REQUEST['shareprice']);
$no_of_trades = mysqli_real_escape_string($link, $_REQUEST['no_of_trades']);
$PC= mysqli_real_escape_string($link, $_REQUEST['PC']);
$OP= mysqli_real_escape_string($link, $_REQUEST['OP']);
$HP = mysqli_real_escape_string($link, $_REQUEST['HP']);
$LP= mysqli_real_escape_string($link, $_REQUEST['LP']);
$CP= mysqli_real_escape_string($link, $_REQUEST['CP']);
$AP = mysqli_real_escape_string($link, $_REQUEST['AP']);

 
// Attempt insert query execution

$sql_1 ="UPDATE trades SET shareprice='$shareprice', no_of_trades='$no_of_trades'  WHERE symbol='$symbol' ";
$sql_2 ="UPDATE vix SET PC='$PC', OP='$OP', HP='$HP', LP='$LP', CP='$CP', AP='$AP' WHERE Symbol='$symbol' ";

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