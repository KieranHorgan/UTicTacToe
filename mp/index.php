<?php

include('../config.php');
$table="games";
$con = mysqli_connect($servername, $username, $password, $database);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$ids;
$p1name = "Player 1";
$p2name = "Player 2";
$player = $_GET["player"];
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

$id = $_GET["id"];
$query = "SELECT * FROM games WHERE id=".$id;
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);
	$p1name=$row["p1name"];
	$p2name=$row["p2name"];
	$turn=$row["turn"];
	$nextBigField=$row["nextBigField"];
	$squaresWon=$row["squaresWon"];
	$squaresFull=$row["squaresFull"];
	$sf0=$row["sf0"];
	$sf1=$row["sf1"];
	$sf2=$row["sf2"];
	$sf3=$row["sf3"];
	$sf4=$row["sf4"];
	$sf5=$row["sf5"];
	$sf6=$row["sf6"];
	$sf7=$row["sf7"];
	$sf8=$row["sf8"];
} else {
	print("New Row ");
	$new_row = "INSERT INTO games VALUES ($id, 'player 1', 'player 2', '1', '9', '000000000', '000000000', '000000000', '000000000', '000000000', '000000000', '000000000', '000000000', '000000000', '000000000', '000000000')";
	mysqli_query($con, $new_row);
	$refresh = True;
	print((int)$refresh);
}

mysqli_close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ultimate TicTacToe</title>
	
	<!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 	<!--Import materialize.css-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

	<link rel="stylesheet" href="../css/style.css?version=0.5">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="ofh">

	<div id="valuesTable"></div>

	<header class="z-depth-2">
		<h5 id="p1">
			<span><?php echo($p1name) ?></span>
		</h5>
		<div id="nextTurn" class="X"></div>
		<h5 id="p2">
			<span><?php echo($p2name) ?></span>
		</h5>
	</header>

	<main class="ofh">
		<div id="fieldSize" class="z-depth-2">
			<section class="aroundField" id="leftOfField"></section>
			<section class="aroundField" id="topOfField"></section>
			<section class="aroundField" id="rightOfField"></section>
			<section class="aroundField" id="bottomOfField"></section>
			<div>
				<div class="bigField container nextBF">
					<div class="bigField row r1">
						<div num=0 class="bigField col c1">

							<div class="smallField sf1">
								<div class="smallField row r1">
									<div class="smallField col c1"></div>
									<div class="smallField col c2"></div>
									<div class="smallField col c3"></div>
								</div>
								<div class="smallField row r2">
									<div class="smallField col c1"></div>
									<div class="smallField col c2"></div>
									<div class="smallField col c3"></div>
								</div>
								<div class="smallField row r3">
									<div class="smallField col c1"></div>
									<div class="smallField col c2"></div>
									<div class="smallField col c3"></div>
								</div>
							</div>

						</div>
						<div num=1 class="bigField col c2 ">

							<div class="smallField sf2">
								<div class="smallField row r1">
									<div class="smallField col c1"></div>
									<div class="smallField col c2"></div>
									<div class="smallField col c3"></div>
								</div>
								<div class="smallField row r2">
									<div class="smallField col c1"></div>
									<div class="smallField col c2"></div>
									<div class="smallField col c3"></div>
								</div>
								<div class="smallField row r3">
									<div class="smallField col c1"></div>
									<div class="smallField col c2"></div>
									<div class="smallField col c3"></div>
								</div>
							</div>
							
						</div>
						<div num=2 class="bigField col c3">

							<div class="smallField sf3">
								<div class="smallField row r1">
									<div class="smallField col c1"></div>
									<div class="smallField col c2"></div>
									<div class="smallField col c3"></div>
								</div>
								<div class="smallField row r2">
									<div class="smallField col c1"></div>
									<div class="smallField col c2"></div>
									<div class="smallField col c3"></div>
								</div>
								<div class="smallField row r3">
									<div class="smallField col c1"></div>
									<div class="smallField col c2"></div>
									<div class="smallField col c3"></div>
								</div>
							</div>
							
						</div>
					</div>

					<div class="bigField row r2">
						<div num=3 class="bigField col c1 ">

							<div class="smallField sf4">
								<div class="smallField row r1">
									<div class="smallField col c1"></div>
									<div class="smallField col c2"></div>
									<div class="smallField col c3"></div>
								</div>
								<div class="smallField row r2">
									<div class="smallField col c1"></div>
									<div class="smallField col c2"></div>
									<div class="smallField col c3"></div>
								</div>
								<div class="smallField row r3">
									<div class="smallField col c1"></div>
									<div class="smallField col c2"></div>
									<div class="smallField col c3"></div>
								</div>
							</div>
							
						</div>
						<div num=4 class="bigField col c2">

							<div class="smallField sf5">
								<div class="smallField row r1">
									<div class="smallField col c1"></div>
									<div class="smallField col c2"></div>
									<div class="smallField col c3"></div>
								</div>
								<div class="smallField row r2">
									<div class="smallField col c1"></div>
									<div class="smallField col c2"></div>
									<div class="smallField col c3"></div>
								</div>
								<div class="smallField row r3">
									<div class="smallField col c1"></div>
									<div class="smallField col c2"></div>
									<div class="smallField col c3"></div>
								</div>
							</div>
							
						</div>
						<div num=5 class="bigField col c3 ">

							<div class="smallField sf6">
								<div class="smallField row r1">
									<div class="smallField col c1"></div>
									<div class="smallField col c2"></div>
									<div class="smallField col c3"></div>
								</div>
								<div class="smallField row r2">
									<div class="smallField col c1"></div>
									<div class="smallField col c2"></div>
									<div class="smallField col c3"></div>
								</div>
								<div class="smallField row r3">
									<div class="smallField col c1"></div>
									<div class="smallField col c2"></div>
									<div class="smallField col c3"></div>
								</div>
							</div>
							
						</div>
					</div>
					
					<div class="bigField row r3">
						<div num=6 class="bigField col c1 ">

							<div class="smallField sf7">
								<div class="smallField row r1">
									<div class="smallField col c1"></div>
									<div class="smallField col c2"></div>
									<div class="smallField col c3"></div>
								</div>
								<div class="smallField row r2">
									<div class="smallField col c1"></div>
									<div class="smallField col c2"></div>
									<div class="smallField col c3"></div>
								</div>
								<div class="smallField row r3">
									<div class="smallField col c1"></div>
									<div class="smallField col c2"></div>
									<div class="smallField col c3"></div>
								</div>
							</div>
							
						</div>
						<div num=7 class="bigField col c2 ">

							<div class="smallField sf8">
								<div class="smallField row r1">
									<div class="smallField col c1"></div>
									<div class="smallField col c2"></div>
									<div class="smallField col c3"></div>
								</div>
								<div class="smallField row r2">
									<div class="smallField col c1"></div>
									<div class="smallField col c2"></div>
									<div class="smallField col c3"></div>
								</div>
								<div class="smallField row r3">
									<div class="smallField col c1"></div>
									<div class="smallField col c2"></div>
									<div class="smallField col c3"></div>
								</div>
							</div>
							
						</div>
						<div num=8 class="bigField col c3 ">

							<div class="smallField sf9">
								<div class="smallField row r1">
									<div class="smallField col c1"></div>
									<div class="smallField col c2"></div>
									<div class="smallField col c3"></div>
								</div>
								<div class="smallField row r2">
									<div class="smallField col c1"></div>
									<div class="smallField col c2"></div>
									<div class="smallField col c3"></div>
								</div>
								<div class="smallField row r3">
									<div class="smallField col c1"></div>
									<div class="smallField col c2"></div>
									<div class="smallField col c3"></div>
								</div>
							</div>
							
						</div>
					</div>

				</div>
			</div>
		</div>
	</main>

	<script src="../js/JQuery.js"></script>
	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
	<script>

String.prototype.replaceAt=function(index, character) {
    return this.substr(0, index) + character + this.substr(index+character.length);
}
var smallFields = [<?php echo("'$sf0', '$sf1', '$sf2', '$sf3', '$sf4', '$sf5', '$sf6', '$sf7', '$sf8'") ?>];

var player = <?php echo($player) ?>;

var p1name = "<?php echo($p1name) ?>";
var p2name = "<?php echo($p2name) ?>";


var id = <?php echo($id) ?>;

var getFirst = 1;
updateTable(id);

var squaresWon = <?php echo("'$squaresWon'")?>;

xoro = 1;
nextBF = 9;

var matchWon = 0;


var squaresFull = <?php echo("'$squaresFull'")?>;
function checkIfFull() {
	for(var i = 0; i < 9; i++) {
		var isFull = true;
		for(var j = 0; j < 9; j++) {
			if(smallFields[i][j] == "0") isFull = false;
		}
		if(isFull) {
//			console.log("full");
			if(squaresFull[i] == "0")
				squaresFull = squaresFull.replaceAt(i, 1);
		}
	}
}

function checkIfWon() {
	for(f = 0; f < 9; f++) {
		if(squaresWon[f] == 0) {
			//console.log("Checking")
			isWon = 0;

			if(smallFields[f][0] == 1 && smallFields[f][1] == 1 && smallFields[f][2] == 1) isWon = "1";
			if(smallFields[f][3] == 1 && smallFields[f][4] == 1 && smallFields[f][5] == 1) isWon = "1";
			if(smallFields[f][6] == 1 && smallFields[f][7] == 1 && smallFields[f][8] == 1) isWon = "1";

			if(smallFields[f][0] == 1 && smallFields[f][3] == 1 && smallFields[f][6] == 1) isWon = "1";
			if(smallFields[f][1] == 1 && smallFields[f][4] == 1 && smallFields[f][7] == 1) isWon = "1";
			if(smallFields[f][2] == 1 && smallFields[f][5] == 1 && smallFields[f][8] == 1) isWon = "1";

			if(smallFields[f][0] == 1 && smallFields[f][4] == 1 && smallFields[f][8] == 1) isWon = "1";
			if(smallFields[f][2] == 1 && smallFields[f][4] == 1 && smallFields[f][6] == 1) isWon = "1";



			if(smallFields[f][0] == 2 && smallFields[f][1] == 2 && smallFields[f][2] == 2) isWon = "2";
			if(smallFields[f][3] == 2 && smallFields[f][4] == 2 && smallFields[f][5] == 2) isWon = "2";
			if(smallFields[f][6] == 2 && smallFields[f][7] == 2 && smallFields[f][8] == 2) isWon = "2";

			if(smallFields[f][0] == 2 && smallFields[f][3] == 2 && smallFields[f][6] == 2) isWon = "2";
			if(smallFields[f][1] == 2 && smallFields[f][4] == 2 && smallFields[f][7] == 2) isWon = "2";
			if(smallFields[f][2] == 2 && smallFields[f][5] == 2 && smallFields[f][8] == 2) isWon = "2";

			if(smallFields[f][0] == 2 && smallFields[f][4] == 2 && smallFields[f][8] == 2) isWon = "2";
			if(smallFields[f][2] == 2 && smallFields[f][4] == 2 && smallFields[f][6] == 2) isWon = "2";

			//console.log("checked")

			if(isWon == 1) {
				$(".bigField.col:eq(" + f + ")").addClass("redBox");
			}
			if(isWon == 2) {
				$(".bigField.col:eq(" + f + ")").addClass("blueBox");
			}


			if(isWon>0) squaresWon = squaresWon.replaceAt(f, isWon);
		}
		if(squaresWon[f] == "1") $(".bigField.col:eq(" + f + ")").addClass("redBox");
		if(squaresWon[f] == "2") $(".bigField.col:eq(" + f + ")").addClass("blueBox");
	}

	if(matchWon == 0) {
		//console.log("Checking")
		isWon = 0;

		if(squaresWon[0] == 1 && squaresWon[1] == 1 && squaresWon[2] == 1) matchWon = "1";
		if(squaresWon[3] == 1 && squaresWon[4] == 1 && squaresWon[5] == 1) matchWon = "1";
		if(squaresWon[6] == 1 && squaresWon[7] == 1 && squaresWon[8] == 1) matchWon = "1";

		if(squaresWon[0] == 1 && squaresWon[3] == 1 && squaresWon[6] == 1) matchWon = "1";
		if(squaresWon[1] == 1 && squaresWon[4] == 1 && squaresWon[7] == 1) matchWon = "1";
		if(squaresWon[2] == 1 && squaresWon[5] == 1 && squaresWon[8] == 1) matchWon = "1";

		if(squaresWon[0] == 1 && squaresWon[4] == 1 && squaresWon[8] == 1) matchWon = "1";
		if(squaresWon[2] == 1 && squaresWon[4] == 1 && squaresWon[6] == 1) matchWon = "1";



		if(squaresWon[0] == 2 && squaresWon[1] == 2 && squaresWon[2] == 2) matchWon = "2";
		if(squaresWon[3] == 2 && squaresWon[4] == 2 && squaresWon[5] == 2) matchWon = "2";
		if(squaresWon[6] == 2 && squaresWon[7] == 2 && squaresWon[8] == 2) matchWon = "2";

		if(squaresWon[0] == 2 && squaresWon[3] == 2 && squaresWon[6] == 2) matchWon = "2";
		if(squaresWon[1] == 2 && squaresWon[4] == 2 && squaresWon[7] == 2) matchWon = "2";
		if(squaresWon[2] == 2 && squaresWon[5] == 2 && squaresWon[8] == 2) matchWon = "2";

		if(squaresWon[0] == 2 && squaresWon[4] == 2 && squaresWon[8] == 2) matchWon = "2";
		if(squaresWon[2] == 2 && squaresWon[4] == 2 && squaresWon[6] == 2) matchWon = "2";

		//console.log("checked")

		if(matchWon == 1) {
			$("header").addClass("redBox");
		}
		if(matchWon == 2) {
			$("header").addClass("blueBox");
		}
	}
	if(squaresWon[f] == "1") $(".bigField.col:eq(" + f + ")").addClass("redBox");
	if(squaresWon[f] == "2") $(".bigField.col:eq(" + f + ")").addClass("blueBox");


}
	
function pageSetup() {
	updateSquares();

	checkIfWon();
	
//	if(nextBF == 9 && ($(".bigField.container").hasClass("s"))) zoomOut();
	

	var squareSize = Math.min($("main").width(),$("main").height());
	$("#fieldSize").outerWidth(squareSize);
	$("#fieldSize").outerHeight(squareSize);

	$("#fieldSize>div>div.r1c1").css("transform", "scale(3.2) translate(" + squareSize*.3333 + "px, " + squareSize*.3333 + "px)");
	$("#fieldSize>div>div.r1c2").css("transform", "scale(3.2) translate(" + 0 + "px , " + squareSize*.3333 + "px )");
	$("#fieldSize>div>div.r1c3").css("transform", "scale(3.2) translate(" + squareSize*.3333*-1 + "px , " + squareSize*.3333 + "px )");

	$("#fieldSize>div>div.r2c1").css("transform", "scale(3.2) translate(" + squareSize*.3333 + "px , " + 0 + "px )");
	$("#fieldSize>div>div.r2c2").css("transform", "scale(3.2) translate(" + 0 + "px , " + 0 + "px )");
	$("#fieldSize>div>div.r2c3").css("transform", "scale(3.2) translate(" + squareSize*.3333*-1 + "px , " + 0 + "px )");

	$("#fieldSize>div>div.r3c1").css("transform", "scale(3.2) translate(" + squareSize*.3333 + "px , " + squareSize*.3333*-1 + "px )");
	$("#fieldSize>div>div.r3c2").css("transform", "scale(3.2) translate(" + 0 + "px , " + squareSize*.3333*-1 + "px )");
	$("#fieldSize>div>div.r3c3").css("transform", "scale(3.2) translate(" + squareSize*.3333*-1 + "px , " + squareSize*.3333*-1 + "px )");

	$("#fieldSize>div>div:not(.s)").css("transform", "");
	
	checkIfFull();
	checkIfWon();
}

function zoomOut() {
	console.log("Zoom Out");
	$(".s").removeClass().addClass("bigField container");
	console.log(nextBF);
	if(nextBF==9) $(".bigField.container").addClass("nextBF");
	pageSetup();
}


$(function() {
//	$("#fieldSize>div>div").css("transform", "scale(1) translate(0, 0)");

	smallFields = [<?php echo("'$sf0', '$sf1', '$sf2', '$sf3', '$sf4', '$sf5', '$sf6', '$sf7', '$sf8'") ?>];

	id = <?php echo($id) ?>;
	pageSetup();


	$(".bigField.r1>.c1").click(function(){if($(this).hasClass("nextBF") || $(".bigField.container").hasClass("nextBF")) {$(".bigField.container").toggleClass("s").toggleClass("r1c1");pageSetup()}})
	$(".bigField.r1>.c2").click(function(){if($(this).hasClass("nextBF") || $(".bigField.container").hasClass("nextBF")) {$(".bigField.container").toggleClass("s").toggleClass("r1c2");pageSetup()}})
	$(".bigField.r1>.c3").click(function(){if($(this).hasClass("nextBF") || $(".bigField.container").hasClass("nextBF")) {$(".bigField.container").toggleClass("s").toggleClass("r1c3");pageSetup()}})

	$(".bigField.r2>.c1").click(function(){if($(this).hasClass("nextBF") || $(".bigField.container").hasClass("nextBF")) {$(".bigField.container").toggleClass("s").toggleClass("r2c1");pageSetup()}})
	$(".bigField.r2>.c2").click(function(){if($(this).hasClass("nextBF") || $(".bigField.container").hasClass("nextBF")) {$(".bigField.container").toggleClass("s").toggleClass("r2c2");pageSetup()}})
	$(".bigField.r2>.c3").click(function(){if($(this).hasClass("nextBF") || $(".bigField.container").hasClass("nextBF")) {$(".bigField.container").toggleClass("s").toggleClass("r2c3");pageSetup()}})

	$(".bigField.r3>.c1").click(function(){if($(this).hasClass("nextBF") || $(".bigField.container").hasClass("nextBF")) {$(".bigField.container").toggleClass("s").toggleClass("r3c1");pageSetup()}})
	$(".bigField.r3>.c2").click(function(){if($(this).hasClass("nextBF") || $(".bigField.container").hasClass("nextBF")) {$(".bigField.container").toggleClass("s").toggleClass("r3c2");pageSetup()}})
	$(".bigField.r3>.c3").click(function(){if($(this).hasClass("nextBF") || $(".bigField.container").hasClass("nextBF")) {$(".bigField.container").toggleClass("s").toggleClass("r3c3");pageSetup()}})

	$(".aroundField").click(function() {
		zoomOut();
	});

	$(".smallField.col").click(function() {
		if($(this).parents('.s').length > 0) {
			if($(this).hasClass("X") || $(this).hasClass("O")) {
			} else {
				console.log(xoro);
				console.log(player);
				if(xoro != player) return;
				if(xoro == 1) xxoo = "X";
				else xxoo = "O";
				$(this).addClass(xxoo);
				$("#nextTurn").removeClass();
				$("#nextTurn").addClass(xxoo);
				if(xoro == 1) {
					xoro = 2;
				} else {
					xoro = 1;
				}
//				console.log(xoro);

				$(".nextBF").removeClass("nextBF");


				var bfsquare = parseInt($(this).closest(".bigField.col").attr("num"));
				if(xoro == 2) {
					if($(this).parent().hasClass("r1")) {

						if($(this).hasClass("c1")) {
							$(".bigField.r1>.c1").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(0, "1");
							nextBF = 0;
						} else if($(this).hasClass("c2")) {
							$(".bigField.r1>.c2").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(1, "1");
							nextBF = 1;
						} else if($(this).hasClass("c3")) {
							$(".bigField.r1>.c3").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(2, "1");
							nextBF = 2;
						}

					} else if($(this).parent().hasClass("r2")) {

						if($(this).hasClass("c1")) {
							$(".bigField.r2>.c1").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(3, "1");
							nextBF = 3;
						} else if($(this).hasClass("c2")) {
							$(".bigField.r2>.c2").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(4, "1");
							nextBF = 4;
						} else if($(this).hasClass("c3")) {
							$(".bigField.r2>.c3").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(5, "1");
							nextBF = 5;
						}

					} else if($(this).parent().hasClass("r3")) {

						if($(this).hasClass("c1")) {
							$(".bigField.r3>.c1").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(6, "1");
							nextBF = 6;
						} else if($(this).hasClass("c2")) {
							$(".bigField.r3>.c2").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(7, "1");
							nextBF = 7;
						} else if($(this).hasClass("c3")) {
							$(".bigField.r3>.c3").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(8, "1");
							nextBF = 8;
						}

					}
				} else {
					if($(this).parent().hasClass("r1")) {

						if($(this).hasClass("c1")) {
							$(".bigField.r1>.c1").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(0, "2");
							nextBF = 0;
						} else if($(this).hasClass("c2")) {
							$(".bigField.r1>.c2").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(1, "2");
							nextBF = 1;
						} else if($(this).hasClass("c3")) {
							$(".bigField.r1>.c3").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(2, "2");
							nextBF = 2;
						}

					} else if($(this).parent().hasClass("r2")) {

						if($(this).hasClass("c1")) {
							$(".bigField.r2>.c1").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(3, "2");
							nextBF = 3;
						} else if($(this).hasClass("c2")) {
							$(".bigField.r2>.c2").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(4, "2");
							nextBF = 4;
						} else if($(this).hasClass("c3")) {
							$(".bigField.r2>.c3").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(5, "2");
							nextBF = 5;
						}

					} else if($(this).parent().hasClass("r3")) {

						if($(this).hasClass("c1")) {
							$(".bigField.r3>.c1").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(6, "2");
							nextBF = 6;
						} else if($(this).hasClass("c2")) {
							$(".bigField.r3>.c2").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(7, "2");
							nextBF = 7;
						} else if($(this).hasClass("c3")) {
							$(".bigField.r3>.c3").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(8, "2");
							nextBF = 8;
						}

					}
				}
				checkIfFull();
				checkIfWon();
				if(nextBF == 9 || squaresFull[nextBF] == 1) {
					nextBF = 9;
					console.log("full");
					zoomOut();
					console.log("Animation Update");
					$(".nextBF").removeClass("nextBF");
					$(".bigField.container").addClass("nextBF");
				}
				sendToServer();
			}
		}
		pageSetup();
	})

	pageSetup();


	$(".smallField.col").css("font-size", $(".smallField.col").innerHeight() + "px");
	$("#nextTurn").css("width", $("#nextTurn").innerHeight() + "px");
	$("#nextTurn").css("left", "calc(50%-" + $("#nextTurn").innerHeight() + "px)");
	$("#nextTurn").css("font-size", $("#nextTurn").innerHeight() + "px");
	$("header h5").css("font-size", $("#nextTurn").innerHeight()/2 + "px");
});

$( window ).resize(function() {
	pageSetup();


	$(".smallField.col").css("font-size", $(".smallField.col").innerHeight() + "px");
	$("#nextTurn").css("width", $("#nextTurn").innerHeight() + "px");
	$("#nextTurn").css("font-size", $("#nextTurn").innerHeight() + "px");
	$("header h5").css("font-size", $("#nextTurn").innerHeight()/2 + "px");
});

function updateValues() {
	xoro = $("td:eq(3)").html();
	if(xoro == 1) xxoo = "X";
	else xxoo = "O";
	$(this).addClass(xxoo);
	$("#nextTurn").removeClass();
	$("#nextTurn").addClass(xxoo);
	nextBF = $("td:eq(4)").html();
	squaresWon = $("td:eq(5)").html();
	squaresFull = $("td:eq(6)").html();
	smallFields[0] = $("td:eq(7)").html();
	smallFields[1] = $("td:eq(8)").html();
	smallFields[2] = $("td:eq(9)").html();
	smallFields[3] = $("td:eq(10)").html();
	smallFields[4] = $("td:eq(11)").html();
	smallFields[5] = $("td:eq(12)").html();
	smallFields[6] = $("td:eq(13)").html();
	smallFields[7] = $("td:eq(14)").html();
	smallFields[8] = $("td:eq(15)").html();
	updateSquares();
}

function updateTable(jb) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("valuesTable").innerHTML = this.responseText;
    }
    };
    if(getFirst==1) {
	    xmlhttp.open("GET","../db/db.php?q="+jb,false);
	    getFirst=0;
	} else {
	    xmlhttp.open("GET","../db/db.php?q="+jb);
	}
    xmlhttp.send();
    updateValues();
}

function updateNextBigField() {
	$(".nextBF").removeClass("nextBF");
	if(nextBF<9) {
		$(".bigField.col:eq(" + nextBF + ")").addClass("nextBF");
	} else {
		$(".bigField.container").addClass("nextBF");
	}
	checkIfWon();
//	console.log("update nextbf")
}

function updateSquares() {
	for(var i = 0; i < 9; i++) {
		for(var j = 0; j < 9; j++) {
			if(smallFields[i][j] == "1") {
				if($(".smallField.col:eq(" + ((9*i)+j) + ")").hasClass("X") == false) {
					$(".smallField.col:eq(" + ((9*i)+j) + ")").addClass("X");
				}
			} else 	if(smallFields[i][j] == "2") {
				if($(".smallField.col:eq(" + ((9*i)+j) + ")").hasClass("O") == false) {
					$(".smallField.col:eq(" + ((9*i)+j) + ")").addClass("O");
				}
			}
		}
	}
	updateNextBigField();
}

function sendToServer() {
    xmlhttp = new XMLHttpRequest();
    var url = "../db/update.php?id=" + id + "&p1name=" + p1name + "&p2name=" + p2name + "&turn=" + xoro + "&nextBigField=" + nextBF + "&squaresWon=" + squaresWon + "&squaresFull=" + squaresFull + "&sf0=" + smallFields[0] + "&sf1=" + smallFields[1] + "&sf2=" + smallFields[2] + "&sf3=" + smallFields[3] + "&sf4=" + smallFields[4] + "&sf5=" + smallFields[5] + "&sf6=" + smallFields[6] + "&sf7=" + smallFields[7] + "&sf8=" + smallFields[8];
    // console.log(url);
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
    updateTable(id);
}

window.setInterval(function() {
	updateTable(id);
}, 2000);
	</script>
	<div id="throwaway" class="r1c1 r1c2 r1c3 r2c1 r2c2 r2c3 r3c1 r3c2 r3c3"></div>
</body>
</html>

<?php
if($refresh == True) {
	echo("<script>location.reload()</script>");
}
?>