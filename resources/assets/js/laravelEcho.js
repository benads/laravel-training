import Echo from "laravel-echo";
window.io = require("socket.io-client");

let e = new Echo({
	broadcaster: "socket.io",
	host: window.location.hostname + ":6001", // docker : window.location.hostname + ":6002"
});

console.log(window.Laravel.user);

e.private("the." + window.Laravel.user).listen("PrivateEvent", (e) => {
	console.log("PrivateEvent");
	console.log(e);
});

if (window.location.pathname === "/") {
	e.channel("test-channel").listen("UserSignedUp", (e) => {
		console.log(e);
		let item = document.createElement("p");
		item.innerHTML = e.username;
		document.querySelector("body").appendChild(item);
	});
}

e.channel("test-channel").listen("UserSignedUp", (e) => {
	console.log(e);
	let item = document.createElement("p");
	item.innerHTML = e.username;
	document.querySelector("body").appendChild(item);
});

if (window.location.pathname === "/groups") {
	// S'abonner a une chaine privée
	e.private("group.1").listen("GroupWizzEvent", (e) => {
		console.log("GroupWizzEvent", e);
	});
}
