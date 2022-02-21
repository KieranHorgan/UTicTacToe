<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
include('../config.php');
$table="games";
$con = mysqli_connect($servername, $username, $password, $database);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
$p1name = "Player 1";
$p2name = "Player 2";

$sql="SELECT * FROM $table";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<th scope=\"row\">" . $row['id'] . "</td>";
    echo "<td onclick=\"window.location.href='mp?id=" . $row['id'] . "&player=1'\">" . $row['p1name'] . "<span class='Xspan'> (X)</span></td>";
    echo "<td onclick=\"window.location.href='mp?id=" . $row['id'] . "&player=2'\">" . $row['p2name'] . "<span class='Ospan'> (O)</span></td>";
    echo "<td onclick=\"window.location.href='mp?id=" . $row['id'] . "&player=3'\"><i>(spectate)</i></td>";
    echo "</tr>";
}
mysqli_close($con);
?>
</body>
</html>