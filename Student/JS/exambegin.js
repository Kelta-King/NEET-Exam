let startexam = (id) => {
    
    let lang = document.getElementById('lang').lang.value;
    let dist = document.getElementById('dist').value;
    let error = document.getElementById('error');
    
    if(lang == "" || dist == ""){
        error.innerHTML = "Please enter distrtict and preferred language";
        //alert("Please enter distrtict and preferred language");
        return false;
    }
    
    if(!confirm("If you click confirm then test will start. Are you sure you want to start test again?")){
        return false;
    }
    
    
    let str = "id="+id+"&lang="+lang+"&dist="+dist;
    	let xhttp = new XMLHttpRequest();
    	let loader = document.getElementById('loader');
    		xhttp.onreadystatechange = function() {
    			loader.style.display = "block";
    			if(this.readyState == 4 && this.status == 200){
    				error.innerHTML = this.responseText;
    				loader.style.display = "none";
    				
    				if(this.responseText.length == 0){
    				    
    				    var myWindow = window.open("exam", "myWindow", "width=1500,height=850");
    					
    				}
    			}
		    }
		xhttp.open("POST", "Check/startexam", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send(str);
    
}
