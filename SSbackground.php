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
<th>Stock Number</th>
<th>Name</th>
<th>Symbol</th>
<th>Sector</th>
<th>Origin</th>
<th>Market Capital </th>
<th>Turn Over </th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['stock_number'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['symbol'] . "</td>";
  echo "<td>" . $row['sector']. "</td>";
  echo "<td>" . $row['origin'] . "</td>";
  echo "<td>" . $row['Market_Capital'] . "</td>";
  echo "<td>" . $row['Turnover'] . "</td>";
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