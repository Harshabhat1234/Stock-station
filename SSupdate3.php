
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
$week = mysqli_real_escape_string($link, $_REQUEST['week']);
$month = mysqli_real_escape_string($link, $_REQUEST['month']);
$month3= mysqli_real_escape_string($link, $_REQUEST['month3']);
$Year= mysqli_real_escape_string($link, $_REQUEST['Year']);
 
// Attempt insert query execution

$sql ="UPDATE trade_history SET 1_Week='$week', 1_Month='$month', 3_Month='$month3', 1_Year='$Year'  WHERE c_symbol='$symbol' ";


if(mysqli_query($link, $sql )){
    header("Location: http://localhost:/SSadminsuccess.html");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// Close connection
mysqli_close($link);

?>