function validateForm() {
	// console.log("afisare mesaj");
	err = false;
	document.getElementById("msg").innerHTML = "";
	
	x = document.getElementById("nume"); 
	if (x.value == "" || !(x.value.match("[a-zA-Z-]*[a-zA-Z]*") == nume.value)) {
		err = true;
		x.style.border = "2px solid red";
		document.getElementById("msg").innerHTML += "Numele trebuie sa contina doar litere! <br>";
	} else {
		x.style.border = "1px solid black";
	}
	
	u = document.getElementById("prenume"); 
	if (u.value == "" || !(u.value.match("[a-zA-Z ]*[a-zA-Z]*") == prenume.value)) {
		err = true;
		u.style.border = "2px solid red";
		document.getElementById("msg").innerHTML += "Prenumele trebuie sa contina doar litere! <br>";
	} else {
		u.style.border = "1px solid black";
	}
	
	y = document.getElementById("dataN");
	
	z = Math.floor(((new Date()).getTime() - (new Date(y.value)).getTime()) / (1000 * 3600 * 24 * 365));
	
	if ((z < 0) || !y.value) {
		err = true;
		y.style.border = "2px solid red";
		document.getElementById("msg").innerHTML += "Data nasterii este invalida! <br>";
	} else {
		y.style.border = "1px solid black";
	}
	
	if (z != document.getElementById("varsta").value) {
		err = true;
		document.getElementById("varsta").style.border = "2px solid red";
		document.getElementById("msg").innerHTML += "Varsta si data nasterii nu corespund! <br>";
	} else {
		document.getElementById("varsta").style.border = "1px solid black";
	}
	
	t = document.getElementById("email");
	if (t.value.match("[a-zA-z0-9.]*@[a-zA-z0-9]*.[a-zA-z0-9.]*")  == null || t.value == "") {
		err = true;
		t.style.border = "2px solid red";
		document.getElementById("msg").innerHTML += "E-mail invalid!<br>";
	} else {
		t.style.border = "1px solid black";
	}
	
	if(err == true) {
		document.getElementById("msg").style.color = "red";
	} else {
		document.getElementById("msg").style.color = "black";
		document.getElementById("msg").innerHTML = "Toate campurile au fost completate corect!";
	}
	
	return err;
}