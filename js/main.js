String.prototype.replaceAt=function(index, character) {
    return this.substr(0, index) + character + this.substr(index+character.length);
}

var smallFields = ["000000000", "000000000", "000000000", "000000000", "000000000", "000000000", "000000000", "000000000", "000000000"];

squaresWon = "000000000"

xoro = 'X';

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
				$(".bigField.col:eq(" + f + ")").addClass("red");
			}
			if(isWon == 2) {
				$(".bigField.col:eq(" + f + ")").addClass("blue");
			}

			squaresWon = squaresWon.replaceAt(f, isWon);
		}
	}
}

function pageSetup() {

	var squareSize = Math.min($("main").width(),$("main").height());
	$("main>div").outerWidth(squareSize);
	$("main>div").outerHeight(squareSize);

	$("main>div>div.r1c1").css("transform", "scale(3.2) translate(" + squareSize*.3333 + "px, " + squareSize*.3333 + "px)");
	$("main>div>div.r1c2").css("transform", "scale(3.2) translate(" + 0 + "px , " + squareSize*.3333 + "px )");
	$("main>div>div.r1c3").css("transform", "scale(3.2) translate(" + squareSize*.3333*-1 + "px , " + squareSize*.3333 + "px )");

	$("main>div>div.r2c1").css("transform", "scale(3.2) translate(" + squareSize*.3333 + "px , " + 0 + "px )");
	$("main>div>div.r2c2").css("transform", "scale(3.2) translate(" + 0 + "px , " + 0 + "px )");
	$("main>div>div.r2c3").css("transform", "scale(3.2) translate(" + squareSize*.3333*-1 + "px , " + 0 + "px )");

	$("main>div>div.r3c1").css("transform", "scale(3.2) translate(" + squareSize*.3333 + "px , " + squareSize*.3333*-1 + "px )");
	$("main>div>div.r3c2").css("transform", "scale(3.2) translate(" + 0 + "px , " + squareSize*.3333*-1 + "px )");
	$("main>div>div.r3c3").css("transform", "scale(3.2) translate(" + squareSize*.3333*-1 + "px , " + squareSize*.3333*-1 + "px )");

	$("main>div>div:not(.s)").css("transform", "");

	checkIfWon();
}


$(function() {
//	$("main>div>div").css("transform", "scale(1) translate(0, 0)");
	pageSetup();


	$(".bigField.r1>.c1").click(function(){if($(this).hasClass("nextBF")) {$(".bigField.container").toggleClass("s").toggleClass("r1c1");pageSetup()}})
	$(".bigField.r1>.c2").click(function(){if($(this).hasClass("nextBF")) {$(".bigField.container").toggleClass("s").toggleClass("r1c2");pageSetup()}})
	$(".bigField.r1>.c3").click(function(){if($(this).hasClass("nextBF")) {$(".bigField.container").toggleClass("s").toggleClass("r1c3");pageSetup()}})

	$(".bigField.r2>.c1").click(function(){if($(this).hasClass("nextBF")) {$(".bigField.container").toggleClass("s").toggleClass("r2c1");pageSetup()}})
	$(".bigField.r2>.c2").click(function(){if($(this).hasClass("nextBF")) {$(".bigField.container").toggleClass("s").toggleClass("r2c2");pageSetup()}})
	$(".bigField.r2>.c3").click(function(){if($(this).hasClass("nextBF")) {$(".bigField.container").toggleClass("s").toggleClass("r2c3");pageSetup()}})

	$(".bigField.r3>.c1").click(function(){if($(this).hasClass("nextBF")) {$(".bigField.container").toggleClass("s").toggleClass("r3c1");pageSetup()}})
	$(".bigField.r3>.c2").click(function(){if($(this).hasClass("nextBF")) {$(".bigField.container").toggleClass("s").toggleClass("r3c2");pageSetup()}})
	$(".bigField.r3>.c3").click(function(){if($(this).hasClass("nextBF")) {$(".bigField.container").toggleClass("s").toggleClass("r3c3");pageSetup()}})


	$(".smallField.col").click(function() {
		if($(this).parents('.s').length > 0) {
			if($(this).hasClass("X") || $(this).hasClass("O")) {
			} else {
				$(this).closest(".bigField.container").removeClass().addClass("bigField container");
				pageSetup();

				$(this).addClass(xoro);
				if(xoro === "X") {
					xoro = 'O';
				} else {
					xoro = 'X';
				}
				console.log(xoro);

				$(".nextBF").removeClass("nextBF");

				var bfsquare = parseInt($(this).closest(".bigField.col").attr("num"));
				if(xoro == 'O') {
					if($(this).parent().hasClass("r1")) {

						if($(this).hasClass("c1")) {
							$(".bigField.r1>.c1").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(0, "1");
						} else if($(this).hasClass("c2")) {
							$(".bigField.r1>.c2").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(1, "1");
						} else if($(this).hasClass("c3")) {
							$(".bigField.r1>.c3").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(2, "1");
						}

					} else if($(this).parent().hasClass("r2")) {

						if($(this).hasClass("c1")) {
							$(".bigField.r2>.c1").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(3, "1");
						} else if($(this).hasClass("c2")) {
							$(".bigField.r2>.c2").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(4, "1");
						} else if($(this).hasClass("c3")) {
							$(".bigField.r2>.c3").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(5, "1");
						}

					} else if($(this).parent().hasClass("r3")) {

						if($(this).hasClass("c1")) {
							$(".bigField.r3>.c1").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(6, "1");
						} else if($(this).hasClass("c2")) {
							$(".bigField.r3>.c2").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(7, "1");
						} else if($(this).hasClass("c3")) {
							$(".bigField.r3>.c3").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(8, "1");
						}

					}
				} else {
					if($(this).parent().hasClass("r1")) {

						if($(this).hasClass("c1")) {
							$(".bigField.r1>.c1").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(0, "2");
						} else if($(this).hasClass("c2")) {
							$(".bigField.r1>.c2").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(1, "2");
						} else if($(this).hasClass("c3")) {
							$(".bigField.r1>.c3").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(2, "2");
						}

					} else if($(this).parent().hasClass("r2")) {

						if($(this).hasClass("c1")) {
							$(".bigField.r2>.c1").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(3, "2");
						} else if($(this).hasClass("c2")) {
							$(".bigField.r2>.c2").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(4, "2");
						} else if($(this).hasClass("c3")) {
							$(".bigField.r2>.c3").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(5, "2");
						}

					} else if($(this).parent().hasClass("r3")) {

						if($(this).hasClass("c1")) {
							$(".bigField.r3>.c1").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(6, "2");
						} else if($(this).hasClass("c2")) {
							$(".bigField.r3>.c2").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(7, "2");
						} else if($(this).hasClass("c3")) {
							$(".bigField.r3>.c3").addClass("nextBF");
							smallFields[bfsquare] = smallFields[bfsquare].replaceAt(8, "2");
						}

					}
				}
			}
		}
		pageSetup();
	})

	pageSetup();

	$(".smallField.col").css("font-size", $(".smallField.col").innerHeight() + "px")

});

$( window ).resize(function() {
	pageSetup();

	$(".smallField.col").css("font-size", $(".smallField.col").innerHeight() + "px")
});