<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ultimate TicTacToe</title>
	
	<!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 	<!--Import materialize.css-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

	<link rel="stylesheet" href="css/style.css?version=0.4.7">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<div id="loadingScreen" class="hideLoadingScreen">
	<div>
		<h4>Creating Your Game...
		<small class="text-muted">Please wait</small></h4>
	</div>
</div>

<nav class="nav teal lighten-1">
	<div class="nav-wrapper container">
		<a href="#" class="brand-logo center">Ultimate Tic-Tc-Toe</a>
		<ul id="nav-mobile" class="right hide">
			<li><a href="#">How To Play</a></li>
			<li><a href="#">About</a></li>
		</ul>
	</div>
</nav>

<div class="spacer"></div>

<div class="container">
	<h4 class="mb-1">Create a new game</h4>

	<div class="row">
		<form>
			<div class="row">
				<div class="input-field col l5 m4 s12">
					<input id="p1name" type="text" class="validate">
					<label for="p1name">Player 1's Name</label>
				</div>
				<div class="input-field col l5 m4 s12">
					<input id="p2name" type="text" class="validate">
					<label for="p2name">Player 2's Name</label>
				</div>

				<button class="ofh input-field col l2 m4 s6 btn waves-effect waves-light" type="submit" name="action" onclick="newGame()">Create
					<i class="material-icons right">send</i>
				</button>
			</div>
		</form>
	</div>
</div>

<div class="divider"></div>

<div class="container">
	<h4 class="mb-1">
		Or join an existing game<br>
		<small class="text-muted">Click your name to join</small>
	</h4>
	<div id="gamesTable">
		<table class="bordered">
			<thead>
				<tr>
					<th>Game ID</th>
					<th>Player 1</th>
					<th>Player 2</th>
					<th>Spectate</th>
				</tr>
			</thead>
			<tbody id="gamesTableBody">
			</tbody>
		</table>
	</div>
</div>

<div class="divider"></div>

<div class="container">
	<h5>Support the developer</h5>
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="JCEEPJFGYNBNL">
		<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
		<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
	</form>
</div>

<div class="spacer"></div>

<script src="js/JQuery.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
<script>
var id = Math.floor(Math.random() * 1000);

function newGame() {
	$(".hideLoadingScreen").removeClass();
    xmlhttp = new XMLHttpRequest();
    var url = "../mp?id=" + id + "&player=3";
    xmlhttp.open("GET", url, false);
    xmlhttp.send();
	p1name=$("#p1name").val();
	p1name=p1name.replace(/[^a-z0-9 _-]/gi,'');
	p2name=$("#p2name").val();
	p2name=p2name.replace(/[^a-z0-9 _-]/gi,'');
    xmlhttp2 = new XMLHttpRequest();
    var url = "../db/update.php?id=" + id + "&p1name=" + p1name + "&p2name=" + p2name + "&turn=" + "1" + "&nextBigField=" + "9" + "&squaresWon=" + "000000000" + "&squaresFull=" + "000000000" + "&sf0=" + "000000000" + "&sf1=" + "000000000" + "&sf2=" + "000000000" + "&sf3=" + "000000000" + "&sf4=" + "000000000" + "&sf5=" + "000000000" + "&sf6=" + "000000000" + "&sf7=" + "000000000" + "&sf8=" + "000000000";
	xmlhttp2.open("GET", url, false);
    xmlhttp2.send();

    location.reload();
}

function updateTable() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	        document.getElementById("gamesTableBody").innerHTML = this.responseText;
	    }
    };
    xmlhttp.open("GET","db/games.php");
    xmlhttp.send();
}

updateTable();

$(function() {
	$(".button-collapse").sideNav();
});


window.setInterval(function() {
	updateTable();
	console.log("Update");
}, 1500);

	</script>
</body>
</html>