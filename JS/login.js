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


let login = () => {
		
		let formS = document.getElementById('register');
		
		let check_data = new Check();
		let error = document.getElementById('error');
		let rollno = formS.rollno.value;
		let pass = formS.pass.value;
	
		if(rollno == "" || pass == ""){
			error.innerHTML = "Please enter every details";
			return false;
		}
		
		try{
		
			if(check_data.check(rollno)){
				alert("Please enter valid roll no");
				error.innerHTML = "Please enter valid roll no";
				return false;
			}
			
			if(check_data.check(pass)){
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
		
		let str = "rollno="+rollno+"&pass="+pass;
    	let xhttp = new XMLHttpRequest();
    	let loader = document.getElementById('loader');
    		xhttp.onreadystatechange = function() {
    			loader.style.display = "block";
    			if(this.readyState == 4 && this.status == 200){
    				error.innerHTML = this.responseText;
    				loader.style.display = "none";
    				if(this.responseText == ""){
    				    
    				    formS.action = "loginStudent";
    					formS.method = "post";
    					formS.submit();
    					
    				}
    			}
		    }
		xhttp.open("POST", "Check/login", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send(str);
	
	}
	
	
let see = () => {
    
    
    let eye = document.getElementById("eye");
    let box = document.getElementById("pass");
    
    if(eye.className == "fa fa-eye"){
        
        eye.className = "fa fa-eye-slash";
        eye.title = "hide";
        box.type = "text";
        
    }
    else{
        
        eye.className = "fa fa-eye";
        eye.title = "watch";
        box.type = "password";
        
    }
    
    
}	
