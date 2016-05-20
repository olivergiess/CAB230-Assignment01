function validate() {
	window.alert("I am working");

	var pw1 = document.forms["Form1"]["password"].value;
	var pw2 = document.forms["Form1"]["password2"].value;

	if (pw1 != pw2) {
		window.alert("Both password should be same!");
		return false;
	}

	var email1 = document.forms["Form1"]["email"].value;
	var email2 = document.forms["Form1"]["email2"].value;
	if (email1 != email2 {
		window.alert("Both email should be same!");
		return false;
	} 

}

function testing(){
	window.alert("I AM A FUNCTION!");
}


//Fix this later, it is ugly.
(function() {
	var img = document.getElementById('image-container').firstChild;
	img.onload = function() {
	    if(img.height > img.width) {
	        img.height = '20%';
	        img.width = 'auto';
	    }
	};
}());
