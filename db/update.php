<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$id = $_GET["id"];
$p1name =  $_GET["p1name"];
$p2name =  $_GET["p2name"];
$turn =    $_GET["turn"];
$nextBigField =    $_GET["nextBigField"];
$squaresWon =  $_GET["squaresWon"];
$squaresFull = $_GET["squaresFull"];
$sf0 = $_GET["sf0"];
$sf1 = $_GET["sf1"];
$sf2 = $_GET["sf2"];
$sf3 = $_GET["sf3"];
$sf4 = $_GET["sf4"];
$sf5 = $_GET["sf5"];
$sf6 = $_GET["sf6"];
$sf7 = $_GET["sf7"];
$sf8 = $_GET["sf8"];

include('../config.php');
$table="games";

$con = mysqli_connect($servername, $username, $password, $database);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$sql ="UPDATE `games` SET `p1name`='$p1name',`p2name`='$p2name',`turn`=$turn,`nextBigField`='$nextBigField',`squaresWon`='$squaresWon',`squaresFull`='$squaresFull',`sf0`='$sf0',`sf1`='$sf1',`sf2`='$sf2',`sf3`='$sf3',`sf4`='$sf4',`sf5`='$sf5',`sf6`='$sf6',`sf7`='$sf7',`sf8`='$sf8' WHERE id=$id";
echo($sql);

if ($con->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $con->error;
}

mysqli_close($con);
?>
</body>
</html>