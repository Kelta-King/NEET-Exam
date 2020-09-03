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

let update = (id) => {
	    
    let email = document.getElementById('email').value;
    let check_data = new Check();
    let error = document.getElementById('error');
        
    if(email == ""){
        alert("Please enter your email");
        error.innerHTML = "Please enter your email";
        return false;
    }
	    
    if(check_data.check(email)){
        return false;
	}
	    
    if(!check_data.emailCheck(email, error)){
        return false;
    }
	    
    let str = "Email="+email+"&Id="+id;
    let xhttp = new XMLHttpRequest();
    let loader = document.getElementById('loader');
    xhttp.onreadystatechange = function() {
    	loader.style.display = "block";
    	if(this.readyState == 4 && this.status == 200){
    		error.innerHTML = this.responseText;
    		loader.style.display = "none";
    		if(this.responseText == ""){
    		    
    		    alert("Email updated and verification mail sent");
    		    document.getElementById('email').value = "";
    		    error.innerHTML = "<span style='color:green'></span>";
    		    
     		}
    	}
    }
    xhttp.open("POST", "Parts/updateEmail", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(str);
	    
}
