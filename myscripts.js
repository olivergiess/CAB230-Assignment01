function checkPassword() {
	var pw1 = document.forms["Form1"]["password"].value;
	var pw2 = document.forms["Form1"]["password2"].value;
	if (pw1 != pw2) {
		window.alert("Both password should be same!");
	}
}

function checkEmail() {
	var email1 = document.forms["Form1"]["email"].value;
	var email2 = document.forms["Form1"]["email2"].value;
	if (email1 != email2 {
		window.alert("Both email should be same!");
	}
}
