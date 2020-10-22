// Globals
var body;
var textColor;
var backgroundColor;
var darkCheck;

window.onload = start;

function start() {
	document.getElementById("trigger").href = "#"; // endre senere
	document.getElementsByTagName("BODY")[0].id = "body";
	closeNav();
	sorterEtterButikk();
	sorterEtterPris();

	if (document.getElementById("search") != null) {
		document.getElementById("search").addEventListener("keyup", search);
	}

	// initialize darkmode trigger, replace trigger with your own trigger element
    document.getElementById("trigger").addEventListener("click", darkMode);

    // to change colors, replace the following colorcodes with your own
    textColor = "#9e9e9e";
    backgroundColor = "#212121";

    let lastURL = document.referrer.split("?")[1];
    darkCheck = window.location.href.split("?")[1];
	if (darkCheck === "darkmode") {
		document.getElementById("trigger").click();
	}

	else if (lastURL === "darkmode") {
		document.getElementById("trigger").click();
	}

	document.getElementsByTagName("BODY")[0].style.display = "block";

}
//sidebar functionen 
function openNav() {
	document.getElementById("mySidenav").style.left = "0";
  	//document.getElementById("black-wrapper").style.marginLeft = "250px";
	document.getElementById("black-wrapper").style.backgroundColor = "rgba(0,0,0,0.4)";
	document.getElementById("black-wrapper").style.width = "100%";
	document.getElementById("black-wrapper").style.height = "100vh";

}		

function closeNav() {
	if (document.getElementById("mySidenav") != null) {
		document.getElementById("mySidenav").style.left ="-250px";
	}
	//document.getElementById("main").style.marginLeft ="0";
	if (document.getElementById("black-wrapper") != null) {
		document.getElementById("black-wrapper").style.backgroundColor = "rgba(0,0,0,0.4)";
		document.getElementById("black-wrapper").style.width = "0";
		document.getElementById("black-wrapper").style.height = "0";
	}
}

// hent alle knapper
const knapper = document.getElementsByClassName("sorter-btn");

function sorterEtterButikk() {
	// itterer gjennom alle knapper å gi de et event som kjører på click
	for (var i = 0; i < knapper.length; i++) {
		knapper[i].addEventListener("click", sorter);
	}
}

// skjul varer
function skjulVarer() {
	let varer = document.getElementsByClassName("vare");
	for (var i = 0; i < varer.length; i++) {
		varer[i].style.display = "none";
	}
}


// vis varer relatert til valgt butikk
function visVarer(butikk) {
	let butikkVarer = document.getElementsByClassName(butikk);
	for (var i = 0; i < butikkVarer.length; i++) {
		butikkVarer[i].style.display = "block";
	}
}

// funksjon som legger på en større skygge til valgt knapp
function styleKnapp(knapp) {
	for (var i = 0; i < knapper.length; i++) {
		knapper[i].style.boxShadow = "none";
	}

	knapp.style.boxShadow = "0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)";
}

// funksjon som blir kjørt når en av sorterings knappene blir trykket
function sorter() {
	let butikk = this.src.split("bilder/")[1].split(".")[0];

	// hent ut alle varer
	skjulVarer();
	styleKnapp(this);
	visVarer(butikk);
}

//restarter heile vare siden 
function reset() {
let varer = document.getElementsByClassName("vare");
	for (var i = 0; i < varer.length; i++) {
		varer[i].style.display = "block";
	}
}


function search(e) {
	var filter = this.value.toUpperCase();
	var vare = document.getElementsByClassName("fixed-size-products");
	for (var i = 0; i < vare.length; i++) {
		//console.log(container.childNodes[i]);
		var child = vare[i];
		var søkeTreff = child.childNodes[1].childNodes[3].innerHTML;
		console.log(søkeTreff);
		if (søkeTreff.toUpperCase().indexOf(filter) >- 1) {
				child.style.display = "block";
		}

		else {
			child.style.display = "none";
		}
	}
}

var prisknapp;
function sorterEtterPris() {
	prisknapp = document.getElementsByClassName("pris-btn");
	// itterer gjennom alle knapper å gi de et event som kjører på click
	for (var i = 0; i < prisknapp.length; i++) {
		prisknapp[i].addEventListener("click", searchPrice);
	}
}

// 3 arrayer som blir fyllt opp med data
var allePriser = [];
var alleVarer = [];
var sorterteVarer = [];
function searchPrice() {

	// hovedelemente med alle varer
	var priceContainer = document.getElementById("productContainer");

	// itterer gjennom alle varer
	for (var i = 0; i < priceContainer.childNodes.length; i++) {

		// sjekker om elementet er valid og ikke en textNode
		if (priceContainer.childNodes[i].nodeName != "#text") {

			// sjeker om varen ikke er tom
			if (priceContainer.childNodes[i].childNodes[1] != undefined) {
				if (priceContainer.childNodes[i].childNodes[1].childNodes[5] != undefined) {

					// henter ut pris ved å splitte stringen på "," og parseInt for å konvertere til et tall (integer)
					// split deler stringen til en array, [0] er da delen som er FØR "," [1] er da "kr"
					var pris = parseInt(priceContainer.childNodes[i].childNodes[1].childNodes[5].innerHTML.split(",")[0]);

					// legger til pris og tilhørende element i arrayene over funksjonen
					allePriser.push(pris);
					alleVarer.push(priceContainer.childNodes[i]);
				}
			}

			// fjerner elementene fra DOM (siden)
			priceContainer.childNodes[i].remove();
		}
	}

	// sorterer arrayen fra lav til høy
	allePriser = allePriser.sort((a, b) => a - b);
	//console.log(allePriser);

	// setter lengden til sorterteVarer array til å være lengden til alleVarer
	// dette er så vi vi kan fylle inn element i riktig indexer
	sorterteVarer.length = alleVarer.length;

	// itterer gjennom alle varer
	for (var i = 0; i < alleVarer.length; i++) {

		// henter prisen for varen
		var varePris = parseInt(alleVarer[i].childNodes[1].childNodes[5].innerHTML.split(",")[0]);

		// finner indexen(plass i listen) til varens pris
		var index = allePriser.indexOf(varePris);

		// plasserer varen i tilhørende plass
		sorterteVarer[index] = alleVarer[i];
	}

	// itterer gjennom alle varer som nå er sortert
	for (var i = 0; i < sorterteVarer.length; i++) {
		// sjekker om en vare ikke er gylding (textNode, tomvare osv)
		if (sorterteVarer[i] != undefined) {

			// legger til varen til hovedelementet
			priceContainer.appendChild(sorterteVarer[i]);
		}
	}
}	

function darkMode() { //Sander Hellesø

    // init clearDarkMode
    this.removeEventListener("click", darkMode);
    this.addEventListener("click", clearDarkMode);

    // set body as dark
    body = document.getElementById("body");
    body.style.backgroundColor = backgroundColor;

    // get all elements on the page
    document.querySelectorAll("*").forEach(function(node) {

        // text elements
        let text = node.querySelectorAll("h1, h2, h3, h4, h5, h6, p, a, li, span, label, th, td");
        text.forEach(function(ele) {
            ele.style.color = textColor;
            darkElements.push(ele);
        });

        // buttons
        let buttons = node.querySelectorAll("button, input");
        buttons.forEach(function(ele) {
            ele.style.backgroundColor = textColor;
            ele.style.color = backgroundColor;
            darkElements.push(ele);
        });

        // containers
        let containers = node.querySelectorAll("header, section, main, footer, div, nav");
        containers.forEach(function(ele) {
            ele.style.backgroundColor = backgroundColor;
            darkElements.push(ele);
        });
    });

    var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?darkmode';
	window.history.pushState({ path: newurl }, '', newurl);
}

var darkElements = [];
function clearDarkMode() {

    // init darkMode
    this.removeEventListener("click", clearDarkMode);
    this.addEventListener("click", darkMode);

    // revert changed elements
    darkElements.forEach(function(ele) {
        ele.style.removeProperty("color");
        ele.style.removeProperty("background-color");
    });

    // revert body
    body.style.removeProperty("background-color");

    // reset array containing changed elements
    darkElements = [];

    var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + ' ';
	window.history.pushState({ path: newurl }, '', newurl);
}