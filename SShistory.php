<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;

}

table, td, th {
  border: 1px solid black;
  padding: 5px;
  font-size: 30px;
  top: 60%;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = $_GET['q'];

$con = mysqli_connect('localhost','root','','stock_station');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

//mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM company c, more_info m, trades t, trade_history th,vix v WHERE name = '".$q."' and c.name = m.cName and m.cName = t.c_name and t.symbol = th.c_symbol and th.c_symbol = v.Symbol";

$result = mysqli_query($con,$sql);


echo "<table>
<tr>
<th>Name</th>
<th>Current Share Price</th>
<th>Share price 1 week ago (13/06/2021)</th>
<th>Share price 1 Month ago (20/05/2021)</th>
<th>Share price 3 Months ago (20/03/2021)</th>
<th>Share price 1 Year ago (20/06/2020) </th>

</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['shareprice'] . "</td>";
  echo "<td>" . $row['1_Week'] . "</td>";
  echo "<td>" . $row['1_Month'] . "</td>";
  echo "<td>" . $row['3_Month']. "</td>";
  echo "<td>" . $row['1_Year'] . "</td>";
  echo "</tr>";
}
echo "</table>";

//echo json_encode(mysqli_fetch_array($result));
//$row = $result->fetch_array(MYSQLI_ASSOC);
//echo json_encode($row);
mysqli_close($con);
?>

</body>
</html>