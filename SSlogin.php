

<?php 

$host="localhost";
$user="root";
$password="";
$db="loginpage";

$mysqli=mysqli_connect($host,$user,$password,$db);
//if($link === false){
//die("ERROR: Could not connect. " . mysqli_connect_error());}
//mysqli_select_db($db);

if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    
    // $sql = "SELECT * FROM `admin` where username='".$uname."' AND password='".$password."' limit 1";
    $res = mysqli_query($mysqli,"select* from admin where username='$uname'and password='$password'");
$result=mysqli_fetch_array($res);
if($result)
{
echo "You are login Successfully ";
header("Location: SSadmin.html");   // create my-account.php page for redirection 
	
}
else
{
	
	header("Location: SSloginfail.html");
}
        
}
?>