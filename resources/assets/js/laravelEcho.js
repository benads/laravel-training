import Echo from "laravel-echo";
window.io = require("socket.io-client");

let e = new Echo({
	broadcaster: "socket.io",
	host: window.location.hostname + ":6001" // docker : window.location.hostname + ":6002"
});

console.log("shot");

console.log(window.location.hostname);
if (window.location.pathname === "/") {
	e.channel("test-channel").listen("UserSignedUp", e => {
		console.log(e);
		let item = document.createElement("p");
		item.innerHTML = e.username;
		document.querySelector("body").appendChild(item);
	});
	// Exemple pour declencher l'event
	document.querySelector("#notify").addEventListener("click", function(e) {
		e.preventDefault();
		fetch("/");
	});
}
console.log("now its working");
e.channel("test-channel").listen("UserSignedUp", e => {
	console.log(e);
	let item = document.createElement("p");
	item.innerHTML = e.username;
	document.querySelector("body").appendChild(item);
});
// Exemple pour declencher l'event
document.querySelector("#notify").addEventListener("click", function(e) {
	e.preventDefault();
	fetch("/");
});

if (window.location.pathname === "/groups") {
	// S'abonner a une chaine privée
	e.private("group.1").listen("GroupWizzEvent", e => {
		console.log("GroupWizzEvent", e);
	});
}
