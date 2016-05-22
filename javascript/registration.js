function validate() {
	var email1 = document.forms["registration-form"]["email"].value;
	var email2 = document.forms["registration-form"]["confirmEmail"].value;
	var pw1 = document.forms["registration-form"]["pwd"].value;
	var pw2 = document.forms["registration-form"]["confirmPwd"].value;

	var output = "";

	if(email1 != email2){
			output += "The emails provided must match.\n";
	}
	if (pw1 != pw2){
			 output += "The passwords provided must match.";
	}

	if(output != ""){
		window.alert(output);
		return false;
	} else {
		return true;
	}
}
