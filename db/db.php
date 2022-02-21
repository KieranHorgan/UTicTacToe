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
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);
include('../config.php');
$table="games";

$ids;
$p1name = "Player 1";
$p2name = "Player 2";
$turn = "1";
$nextBigField = "9";
$squaresWon = "000000000";
$sf0 = "000000000";
$sf1 = "000000000";
$sf2 = "000000000";
$sf3 = "000000000";
$sf4 = "000000000";
$sf5 = "000000000";
$sf6 = "000000000";
$sf7 = "000000000";
$sf8 = "000000000";
$refresh = False;

$con = mysqli_connect($servername, $username, $password, $database);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$sql="SELECT * FROM $table WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>id</th>
<th>p1name</th>
<th>p2name</th>
<th>turn</th>
<th>nextBigField</th>
<th>squaresWon</th>
<th>squaresFull</th>
<th>sf0</th>
<th>sf1</th>
<th>sf2</th>
<th>sf3</th>
<th>sf4</th>
<th>sf5</th>
<th>sf6</th>
<th>sf7</th>
<th>sf8</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['p1name'] . "</td>";
    echo "<td>" . $row['p2name'] . "</td>";
    echo "<td>" . $row['turn'] . "</td>";
    echo "<td>" . $row['nextBigField'] . "</td>";
    echo "<td>" . $row['squaresWon'] . "</td>";
    echo "<td>" . $row['squaresFull'] . "</td>";
    echo "<td>" . $row['sf0'] . "</td>";
    echo "<td>" . $row['sf1'] . "</td>";
    echo "<td>" . $row['sf2'] . "</td>";
    echo "<td>" . $row['sf3'] . "</td>";
    echo "<td>" . $row['sf4'] . "</td>";
    echo "<td>" . $row['sf5'] . "</td>";
    echo "<td>" . $row['sf6'] . "</td>";
    echo "<td>" . $row['sf7'] . "</td>";
    echo "<td>" . $row['sf8'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>