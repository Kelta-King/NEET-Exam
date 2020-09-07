// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}

// Change style of navbar on scroll
window.onscroll = function() {myFunction()};
function myFunction() {
    var navbar = document.getElementById("myNavbar");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        navbar.className = "w3-bar" + " w3-card" + " w3-animate-top" + " w3-white";
    } else {
        navbar.className = navbar.className.replace(" w3-card w3-animate-top w3-white", "");
    }
}

// Used to toggle the menu on small screens when clicking on the menu button
function toggleFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}


class Check{
		
	check(Name){
			
		if(Name == ""){
			throw "Name is empty";
		}
		
		if(Name.includes("$") || Name.includes("&") || Name.includes("=") || Name.includes("*") || Name.includes("`")){
			return true;
		}
		
	}
	
	checkMobile(txtPhone){
	    
        var phoneno = /^\+?([6-9]{1})\)?[-. ]?([0-9]{5})[-. ]?([0-9]{4})$/;
        var mobileno = /^((\\+91-?)|0)?[6-9]{1}?[0-9]{9}$/;
        if ((txtPhone.match(phoneno)) || (txtPhone.match(mobileno))) {
            return true;
        }
        else {
            return false;
        }

	}
	
	emailCheck(email, cont_msg) {
		
		if(email == ""){
			throw "Name is empty";
		}
		
		if(cont_msg == ""){
			throw "data is empty";
		}
		
		let s1 = email.split("@");
		let s3 = email.split(" ");
		if(s3.length > 1)
		{
			alert("Please add a proper mail-Id");
			cont_msg.innerHTML = "Please add a proper mail-Id";
			return false;
		}
		if(s1.length == 2)
		{
			var s2 = s1[1].split(".");
			if(s2.length == 2 || s2.length == 3)
			{
				if(s1[0].length < 6 || s2[0].length < 4 || s2[1].length > 4 || s2[1].length < 2)
				{
					alert('Please add a proper mail-Id');
					cont_msg.innerHTML = "Please add a proper mail-Id";
					return false;
				}
				
				return true;
				
			}
			else
			{
				alert("Please add a proper mail-Id");
				cont_msg.innerHTML = "Please add a proper mail-Id";
				return false;
			}
		}
		else
		{
			alert("Please add a proper mail-Id");
			cont_msg.innerHTML = "Please add a proper mail-Id";
			return false;
		}
			
	}
}


let register = () => {
		
		let formS = document.getElementById('register');
		let error = document.getElementById('error');
		
		error.innerHTML = "<span style='color:blue'>REGISTRATION IS CLOSED NOW. EXAMS WILL START FROM TOMMOROW</span>";
		return false;
		
		let check_data = new Check();
		let name = formS.name.value;
		let email = formS.email.value;
		let cont = formS.contno.value;
		let gender = formS.gender.value;
	
		if(name == "" || email == "" || cont == "" || gender == ""){
			alert("Please enter every details");
			error.innerHTML = "Please enter every details";
			return false;
		}
		
		if(name.length <= 4) {
			alert("Please enter your full name");
			error.innerHTML = "Please enter your full name";
			return false;
		}
		
		if(!check_data.checkMobile(cont)){
				
			alert("Please enter valid mobile number")
			error.innerHTML = "Please enter valid mobile number";
			return false;
			
		}
	
		try{
			if(!check_data.emailCheck(email, error)){
				
				return false;
				
			}
			
			if(check_data.check(email)){
				alert("Please enter valid email");
				error.innerHTML = "Please enter valid email";
				return false;
			}
			
			if(check_data.check(name)){
				alert("Please enter valid name");
				error.innerHTML = "Please enter valid name";
				return false;
			}
			
			if(check_data.check(cont)){
				alert("Please enter valid password");
				error.innerHTML = "Please enter valid password";
				return false;
			}
			
		}
		catch(err){
			alert("There is a problem: "+err);
			err.innerHTML = "There is a problem: "+err;
			return;
		}
		
		let str = "name="+name+"&email="+email+"&contno="+cont+"&gender="+gender;
    	let xhttp = new XMLHttpRequest();
    	let loader = document.getElementById('loader');
    		xhttp.onreadystatechange = function() {
    			loader.style.display = "block";
    			if(this.readyState == 4 && this.status == 200){
    				error.innerHTML = this.responseText;
    				loader.style.display = "none";
    				if(this.responseText == ""){
    				    
    				    formS.action = "registerStudent";
    					formS.method = "post";
    					formS.submit();
    					
    				}
    			}
		    }
		xhttp.open("POST", "Check/register", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send(str);
	
	}
	