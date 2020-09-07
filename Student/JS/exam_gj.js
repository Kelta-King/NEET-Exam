let cur_number = 1;
let timer = document.getElementById("timer");
let timerTime = document.getElementById("timer").innerHTML;

let mn = timerTime.split(":");

let min = parseInt(mn[1]);
let hr = parseInt(mn[0]);
let sec = parseInt(mn[2]);

let x = false;
let count = 0;
let y = false;
let z = false;

let question = document.getElementById('question');
let op1 = document.getElementById('op1');
let op2 = document.getElementById('op2');
let op3 = document.getElementById('op3');
let op4 = document.getElementById('op4');
let o1 = document.getElementById('o1');
let o2 = document.getElementById('o2');
let o3 = document.getElementById('o3');
let o4 = document.getElementById('o4');
let plt = document.getElementById('question_pallete');
let qno = document.getElementById('question_no');
let q = document.getElementById('q');
let loader = document.getElementById('loader');
let subText = document.getElementById('sub');
let subNo = document.getElementById('sub_no');

let clearRes = () => {
    
    uncheck();
    save_time(timer.innerHTML);
    let str = "number="+cur_number;
    let xhttp = new XMLHttpRequest();
    	xhttp.onreadystatechange = function() {
    		
    		if(this.readyState == 4 && this.status == 200){
    			
    			if(this.responseText.length > 30){
    			    
        			plt.innerHTML = this.responseText;
        			
    			}
    			
    			loader.style.display = "none";
        		q.style.display = "block";
    		}
	    }
	xhttp.open("POST", "Gujarati/clear", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
    
}

let uncheck = () => {
    
    document.getElementById("o1").checked = false;
    document.getElementById("o2").checked = false;
    document.getElementById("o3").checked = false;
    document.getElementById("o4").checked = false;
    
}

let save_time = (time) => {
    
    let str = "time="+time;
    let xhttp = new XMLHttpRequest();
    	xhttp.onreadystatechange = function() {
    		if(this.readyState == 4 && this.status == 200){
    			
    			if(this.responseText == ""){
    			    return true;
    			}
    			else{
    			    return false;
    			}
    			
    		}
	    }
	xhttp.open("POST", "Gujarati/saveTime", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
    
}

let jump = (number) => {

    w3_close();
    loader.style.display = "block";
    q.style.display = 'none';
    
    uncheck();
    
    save_time(timer.innerHTML);
    
    cur_number = number;
    
    let str = "number="+number;
    let xhttp = new XMLHttpRequest();
    	xhttp.onreadystatechange = function() {
    		
    		if(this.readyState == 4 && this.status == 200){
    			
    			if(this.responseText.length > 30){
    			    
        			let dts = this.responseText.split("#");
        			
        			question.innerHTML = dts[0];
        			op1.innerHTML = dts[1];
        			o1.value = dts[1];
        			op2.innerHTML = dts[2];
        			o2.value = dts[1];
        			op3.innerHTML = dts[3];
        			o3.value = dts[1];
        			op4.innerHTML = dts[4];
        			o4.value = dts[1];
        			qno.innerHTML = dts[5];
        			
    			}
    			
    			loader.style.display = "none";
        		q.style.display = "block";
    		}
	    }
	xhttp.open("POST", "Gujarati/guj_jump", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
    
}

let prev = () => {
    
    if(cur_number == 1 || cur_number == 46 || cur_number == 91){
        save_time(timer.innerHTML);
    }
    else{
        cur_number = cur_number-1;
        jump(parseInt(cur_number));
    }
    
}

let mark = () => {
    
    loader.style.display = "block";
    q.style.display = 'none';
    
    save_time(timer.innerHTML);
    
    let str = "number="+cur_number;
    let xhttp = new XMLHttpRequest();
    	xhttp.onreadystatechange = function() {
    		
    		if(this.readyState == 4 && this.status == 200){
    			
    			if(this.responseText.length > 30){
    			    
        			plt.innerHTML = this.responseText;
        			
    			}
    			
    			loader.style.display = "none";
        		q.style.display = "block";
    		}
	    }
	xhttp.open("POST", "Gujarati/mark", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
    
}

let next = () => {
    
    //uncheck();
    loader.style.display = "block";
    q.style.display = 'none';
    
    save_time(timer.innerHTML);
    
    let str = "number="+cur_number;
    let xhttp = new XMLHttpRequest();
    	xhttp.onreadystatechange = function() {
    		
    		if(this.readyState == 4 && this.status == 200){
    			
    			if(this.responseText == "ok"){
    			    
    			    cur_number = cur_number+1;
    			    jump(cur_number); 
    			    
    			}
    			
    			loader.style.display = "none";
        		q.style.display = "block";
    		}
	    }
	xhttp.open("POST", "Gujarati/next", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
    
}

let updatePallete = () => {
    
    save_time(timer.innerHTML);
    let xhttp = new XMLHttpRequest();
    	xhttp.onreadystatechange = function() {
    		
    		if(this.readyState == 4 && this.status == 200){
    			
    		    if(this.responseText.length > 30){
    		        
    		        plt.innerHTML = this.responseText;
    		        
    		    }
    			
    			loader.style.display = "none";
        		q.style.display = "block";
    		}
	    }
	xhttp.open("POST", "Gujarati/updatePallete", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send();
    
}

let save = () => {
    
    let value = document.getElementById('frm').op.value;
    let op_loader = document.getElementById('op-loader');
    save_time(timer.innerHTML);
    
    if(value == ""){
        
    }
    else{
        
        op_loader.style.display = "block";
        let str = "number="+cur_number+"&answer="+value;
        let xhttp = new XMLHttpRequest();
        	xhttp.onreadystatechange = function() {
        		
        		if(this.readyState == 4 && this.status == 200){
        			
        			if(this.responseText.length > 30){
        			    
            			plt.innerHTML = this.responseText;
            			
        			}
        			else{
        			    alert(this.responseText);
        			}
        			
        		}
        		
    	    }
    	xhttp.open("POST", "Gujarati/save", true);
    	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    	xhttp.send(str);
            
        op_loader.style.display = "none";
    }
    
}

let open_chem = () => {
    
    let str = "sub=Chem";
    save_time(timer.innerHTML);
    let xhttp = new XMLHttpRequest();
    	xhttp.onreadystatechange = function() {
    		
    		if(this.readyState == 4 && this.status == 200){
    			
    			cur_number = 46;
    			jump(cur_number);
    			updatePallete();
    		    
    		    if(this.responseText.length > 0 && this.responseText.length < 3){
    		        
    		        subText.innerHTML = "Chemistry";
    		        sub_no.innerHTML = this.responseText;
    		        
    		    }
    		    
    			loader.style.display = "none";
        		q.style.display = "block";
    		}
	    }
	xhttp.open("POST", "Gujarati/updateSub", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
    
}

let open_phy = () => {
    
    let str = "sub=Phy";
    save_time(timer.innerHTML);
    let xhttp = new XMLHttpRequest();
    	xhttp.onreadystatechange = function() {
    		
    		if(this.readyState == 4 && this.status == 200){
    			
    			cur_number = 1;
    			jump(cur_number);
    			updatePallete();
    		    
    		    
    		    if(this.responseText.length > 0 && this.responseText.length < 3){
    		        
    		        subText.innerHTML = "Physics";
    		        sub_no.innerHTML = this.responseText;
    		        
    		    }
    		    
    			loader.style.display = "none";
        		q.style.display = "block";
    		}
	    }
	xhttp.open("POST", "Gujarati/updateSub", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
    
}

let open_bio = () => {
    
    let str = "sub=Bio";
    save_time(timer.innerHTML);
    let xhttp = new XMLHttpRequest();
    	xhttp.onreadystatechange = function() {
    		
    		if(this.readyState == 4 && this.status == 200){
    			
    			cur_number = 91;
    			jump(cur_number);
    			updatePallete();
    		    
    		    if(this.responseText.length > 0 && this.responseText.length < 3){
    		        
    		        subText.innerHTML = "Biology";
    		        sub_no.innerHTML = this.responseText;
    		        
    		    }
    		    
    			loader.style.display = "none";
        		q.style.display = "block";
    		}
	    }
	xhttp.open("POST", "Gujarati/updateSub", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
    
}

let endTest = () => {
    
    x = true;
    z = true;
    y = true;
    save_time(timer.innerHTML);
    
    if(!confirm("Do you really want to submit the test?")){
        return false;
    }
    
    let xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function() {
        
        if(this.readyState == 4 && this.status == 200){
        			
        	if(this.responseText == ""){
        		    
        	    location.reload();
        				
        	}
        	else{
        	    alert(this.responseText);
        	}
        }
	}
	xhttp.open("POST", "Check/endExam", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send();
    
    
}

let disqualify = () => {
    
    save_time(timer.innerHTML);
    
    let xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function() {
        
        if(this.readyState == 4 && this.status == 200){
        			
        	if(this.responseText == ""){
        		    
        	    location.reload();
        				
        	}
        	else{
        	    alert(this.responseText);
        	}
        }
	}
	xhttp.open("POST", "Check/endExam", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send();

}

window.onbeforeunload = function () {
    
    if(!y){
    save_time(timer.innerHTML);
    x = true;
    return 'Are you really want to perform the action?';
    }
    else{
        y = false;
    }
    
}

//window.addEventListener('blur', stop);

function stop(){
    
    if(!z){
        save_time(timer.innerHTML);
        if(count > 1){
            alert("You are disqulified");
            
            disqualify();
            
            return;
        }
        
        if(!x){
            alert("Stay on this page or you will be disqualified");
            count++;
        }
        else{
            x = false;
        }
    }
    else{
        z = false;
    }
}

setInterval(function(){
    
    sec--;
    
    if(hr <= 0 && min <= 0 && sec <= 0){
        disqualify();
    }
    
    if(sec < 0){
        min--;
        sec = 59;
    }
    
    if(min < 0){
        hr--;
        min = 59;
    }
    
    timer.innerHTML = hr+":"+min+":"+sec;
    
},1000);
    let cur_number = 1;
let timer = document.getElementById("timer");
let timerTime = document.getElementById("timer").innerHTML;

let mn = timerTime.split(":");

let min = parseInt(mn[1]);
let hr = parseInt(mn[0]);
let sec = parseInt(mn[2]);

let x = false;
let count = 0;
let y = false;
let z = false;

let question = document.getElementById('question');
let op1 = document.getElementById('op1');
let op2 = document.getElementById('op2');
let op3 = document.getElementById('op3');
let op4 = document.getElementById('op4');
let o1 = document.getElementById('o1');
let o2 = document.getElementById('o2');
let o3 = document.getElementById('o3');
let o4 = document.getElementById('o4');
let plt = document.getElementById('question_pallete');
let qno = document.getElementById('question_no');
let q = document.getElementById('q');
let loader = document.getElementById('loader');
let subText = document.getElementById('sub');
let subNo = document.getElementById('sub_no');

let clearRes = () => {
    
    uncheck();
    save_time(timer.innerHTML);
    let str = "number="+cur_number;
    let xhttp = new XMLHttpRequest();
    	xhttp.onreadystatechange = function() {
    		
    		if(this.readyState == 4 && this.status == 200){
    			
    			if(this.responseText.length > 30){
    			    
        			plt.innerHTML = this.responseText;
        			
    			}
    			
    			loader.style.display = "none";
        		q.style.display = "block";
    		}
	    }
	xhttp.open("POST", "Gujarati/clear", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
    
}

let uncheck = () => {
    
    document.getElementById("o1").checked = false;
    document.getElementById("o2").checked = false;
    document.getElementById("o3").checked = false;
    document.getElementById("o4").checked = false;
    
}

let save_time = (time) => {
    
    let str = "time="+time;
    let xhttp = new XMLHttpRequest();
    	xhttp.onreadystatechange = function() {
    		if(this.readyState == 4 && this.status == 200){
    			
    			if(this.responseText == ""){
    			    return true;
    			}
    			else{
    			    return false;
    			}
    			
    		}
	    }
	xhttp.open("POST", "Gujarati/saveTime", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
    
}

let jump = (number) => {

    w3_close();
    loader.style.display = "block";
    q.style.display = 'none';
    
    uncheck();
    
    save_time(timer.innerHTML);
    
    cur_number = number;
    
    let str = "number="+number;
    let xhttp = new XMLHttpRequest();
    	xhttp.onreadystatechange = function() {
    		
    		if(this.readyState == 4 && this.status == 200){
    			
    			if(this.responseText.length > 30){
    			    
        			let dts = this.responseText.split("#");
        			
        			question.innerHTML = dts[0];
        			op1.innerHTML = dts[1];
        			o1.value = dts[1];
        			op2.innerHTML = dts[2];
        			o2.value = dts[1];
        			op3.innerHTML = dts[3];
        			o3.value = dts[1];
        			op4.innerHTML = dts[4];
        			o4.value = dts[1];
        			qno.innerHTML = dts[5];
        			
    			}
    			
    			loader.style.display = "none";
        		q.style.display = "block";
    		}
	    }
	xhttp.open("POST", "Gujarati/guj_jump", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
    
}

let prev = () => {
    
    if(cur_number == 1 || cur_number == 46 || cur_number == 91){
        save_time(timer.innerHTML);
    }
    else{
        cur_number = cur_number-1;
        jump(parseInt(cur_number));
    }
    
}

let mark = () => {
    
    loader.style.display = "block";
    q.style.display = 'none';
    
    save_time(timer.innerHTML);
    
    let str = "number="+cur_number;
    let xhttp = new XMLHttpRequest();
    	xhttp.onreadystatechange = function() {
    		
    		if(this.readyState == 4 && this.status == 200){
    			
    			if(this.responseText.length > 30){
    			    
        			plt.innerHTML = this.responseText;
        			
    			}
    			
    			loader.style.display = "none";
        		q.style.display = "block";
    		}
	    }
	xhttp.open("POST", "Gujarati/mark", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
    
}

let next = () => {
    
    //uncheck();
    loader.style.display = "block";
    q.style.display = 'none';
    
    save_time(timer.innerHTML);
    
    let str = "number="+cur_number;
    let xhttp = new XMLHttpRequest();
    	xhttp.onreadystatechange = function() {
    		
    		if(this.readyState == 4 && this.status == 200){
    			
    			if(this.responseText == "ok"){
    			    
    			    cur_number = cur_number+1;
    			    jump(cur_number); 
    			    
    			}
    			
    			loader.style.display = "none";
        		q.style.display = "block";
    		}
	    }
	xhttp.open("POST", "Gujarati/next", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
    
}

let updatePallete = () => {
    
    save_time(timer.innerHTML);
    let xhttp = new XMLHttpRequest();
    	xhttp.onreadystatechange = function() {
    		
    		if(this.readyState == 4 && this.status == 200){
    			
    		    if(this.responseText.length > 30){
    		        
    		        plt.innerHTML = this.responseText;
    		        
    		    }
    			
    			loader.style.display = "none";
        		q.style.display = "block";
    		}
	    }
	xhttp.open("POST", "Gujarati/updatePallete", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send();
    
}

let save = () => {
    
    let value = document.getElementById('frm').op.value;
    let op_loader = document.getElementById('op-loader');
    save_time(timer.innerHTML);
    
    if(value == ""){
        
    }
    else{
        
        op_loader.style.display = "block";
        let str = "number="+cur_number+"&answer="+value;
        let xhttp = new XMLHttpRequest();
        	xhttp.onreadystatechange = function() {
        		
        		if(this.readyState == 4 && this.status == 200){
        			
        			if(this.responseText.length > 30){
        			    
            			plt.innerHTML = this.responseText;
            			
        			}
        			else{
        			    alert(this.responseText);
        			}
        			
        		}
        		
    	    }
    	xhttp.open("POST", "Gujarati/save", true);
    	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    	xhttp.send(str);
            
        op_loader.style.display = "none";
    }
    
}

let open_chem = () => {
    
    let str = "sub=Chem";
    save_time(timer.innerHTML);
    let xhttp = new XMLHttpRequest();
    	xhttp.onreadystatechange = function() {
    		
    		if(this.readyState == 4 && this.status == 200){
    			
    			cur_number = 46;
    			jump(cur_number);
    			updatePallete();
    		    
    		    if(this.responseText.length > 0 && this.responseText.length < 3){
    		        
    		        subText.innerHTML = "Chemistry";
    		        sub_no.innerHTML = this.responseText;
    		        
    		    }
    		    
    			loader.style.display = "none";
        		q.style.display = "block";
    		}
	    }
	xhttp.open("POST", "Gujarati/updateSub", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
    
}

let open_phy = () => {
    
    let str = "sub=Phy";
    save_time(timer.innerHTML);
    let xhttp = new XMLHttpRequest();
    	xhttp.onreadystatechange = function() {
    		
    		if(this.readyState == 4 && this.status == 200){
    			
    			cur_number = 1;
    			jump(cur_number);
    			updatePallete();
    		    
    		    
    		    if(this.responseText.length > 0 && this.responseText.length < 3){
    		        
    		        subText.innerHTML = "Physics";
    		        sub_no.innerHTML = this.responseText;
    		        
    		    }
    		    
    			loader.style.display = "none";
        		q.style.display = "block";
    		}
	    }
	xhttp.open("POST", "Gujarati/updateSub", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
    
}

let open_bio = () => {
    
    let str = "sub=Bio";
    save_time(timer.innerHTML);
    let xhttp = new XMLHttpRequest();
    	xhttp.onreadystatechange = function() {
    		
    		if(this.readyState == 4 && this.status == 200){
    			
    			cur_number = 91;
    			jump(cur_number);
    			updatePallete();
    		    
    		    if(this.responseText.length > 0 && this.responseText.length < 3){
    		        
    		        subText.innerHTML = "Biology";
    		        sub_no.innerHTML = this.responseText;
    		        
    		    }
    		    
    			loader.style.display = "none";
        		q.style.display = "block";
    		}
	    }
	xhttp.open("POST", "Gujarati/updateSub", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
    
}

let endTest = () => {
    
    x = true;
    z = true;
    y = true;
    save_time(timer.innerHTML);
    
    if(!confirm("Do you really want to submit the test?")){
        return false;
    }
    
    let xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function() {
        
        if(this.readyState == 4 && this.status == 200){
        			
        	if(this.responseText == ""){
        		    
        	    location.reload();
        				
        	}
        	else{
        	    alert(this.responseText);
        	}
        }
	}
	xhttp.open("POST", "Check/endExam", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send();
    
    
}

let disqualify = () => {
    
    save_time(timer.innerHTML);
    
    let xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function() {
        
        if(this.readyState == 4 && this.status == 200){
        			
        	if(this.responseText == ""){
        		    
        	    location.reload();
        				
        	}
        	else{
        	    alert(this.responseText);
        	}
        }
	}
	xhttp.open("POST", "Check/endExam", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send();

}

window.onbeforeunload = function () {
    
    if(!y){
    save_time(timer.innerHTML);
    x = true;
    return 'Are you really want to perform the action?';
    }
    else{
        y = false;
    }
    
}

//window.addEventListener('blur', stop);

function stop(){
    
    if(!z){
        save_time(timer.innerHTML);
        if(count > 1){
            alert("You are disqulified");
            
            disqualify();
            
            return;
        }
        
        if(!x){
            alert("Stay on this page or you will be disqualified");
            count++;
        }
        else{
            x = false;
        }
    }
    else{
        z = false;
    }
}

setInterval(function(){
    
    sec--;
    
    if(hr <= 0 && min <= 0 && sec <= 0){
        disqualify();
    }
    
    if(sec < 0){
        min--;
        sec = 59;
    }
    
    if(min < 0){
        hr--;
        min = 59;
    }
    
    timer.innerHTML = hr+":"+min+":"+sec;
    
},1000);
    let cur_number = 1;
let timer = document.getElementById("timer");
let timerTime = document.getElementById("timer").innerHTML;

let mn = timerTime.split(":");

let min = parseInt(mn[1]);
let hr = parseInt(mn[0]);
let sec = parseInt(mn[2]);

let x = false;
let count = 0;
let y = false;
let z = false;

let question = document.getElementById('question');
let op1 = document.getElementById('op1');
let op2 = document.getElementById('op2');
let op3 = document.getElementById('op3');
let op4 = document.getElementById('op4');
let o1 = document.getElementById('o1');
let o2 = document.getElementById('o2');
let o3 = document.getElementById('o3');
let o4 = document.getElementById('o4');
let plt = document.getElementById('question_pallete');
let qno = document.getElementById('question_no');
let q = document.getElementById('q');
let loader = document.getElementById('loader');
let subText = document.getElementById('sub');
let subNo = document.getElementById('sub_no');

let clearRes = () => {
    
    uncheck();
    save_time(timer.innerHTML);
    let str = "number="+cur_number;
    let xhttp = new XMLHttpRequest();
    	xhttp.onreadystatechange = function() {
    		
    		if(this.readyState == 4 && this.status == 200){
    			
    			if(this.responseText.length > 30){
    			    
        			plt.innerHTML = this.responseText;
        			
    			}
    			
    			loader.style.display = "none";
        		q.style.display = "block";
    		}
	    }
	xhttp.open("POST", "Gujarati/clear", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
    
}

let uncheck = () => {
    
    document.getElementById("o1").checked = false;
    document.getElementById("o2").checked = false;
    document.getElementById("o3").checked = false;
    document.getElementById("o4").checked = false;
    
}

let save_time = (time) => {
    
    let str = "time="+time;
    let xhttp = new XMLHttpRequest();
    	xhttp.onreadystatechange = function() {
    		if(this.readyState == 4 && this.status == 200){
    			
    			if(this.responseText == ""){
    			    return true;
    			}
    			else{
    			    return false;
    			}
    			
    		}
	    }
	xhttp.open("POST", "Gujarati/saveTime", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
    
}

let jump = (number) => {

    w3_close();
    loader.style.display = "block";
    q.style.display = 'none';
    
    uncheck();
    
    save_time(timer.innerHTML);
    
    cur_number = number;
    
    let str = "number="+number;
    let xhttp = new XMLHttpRequest();
    	xhttp.onreadystatechange = function() {
    		
    		if(this.readyState == 4 && this.status == 200){
    			
    			if(this.responseText.length > 30){
    			    
        			let dts = this.responseText.split("#");
        			
        			question.innerHTML = dts[0];
        			op1.innerHTML = dts[1];
        			o1.value = dts[1];
        			op2.innerHTML = dts[2];
        			o2.value = dts[1];
        			op3.innerHTML = dts[3];
        			o3.value = dts[1];
        			op4.innerHTML = dts[4];
        			o4.value = dts[1];
        			qno.innerHTML = dts[5];
        			
    			}
    			
    			loader.style.display = "none";
        		q.style.display = "block";
    		}
	    }
	xhttp.open("POST", "Gujarati/guj_jump", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
    
}

let prev = () => {
    
    if(cur_number == 1 || cur_number == 46 || cur_number == 91){
        save_time(timer.innerHTML);
    }
    else{
        cur_number = cur_number-1;
        jump(parseInt(cur_number));
    }
    
}

let mark = () => {
    
    loader.style.display = "block";
    q.style.display = 'none';
    
    save_time(timer.innerHTML);
    
    let str = "number="+cur_number;
    let xhttp = new XMLHttpRequest();
    	xhttp.onreadystatechange = function() {
    		
    		if(this.readyState == 4 && this.status == 200){
    			
    			if(this.responseText.length > 30){
    			    
        			plt.innerHTML = this.responseText;
        			
    			}
    			
    			loader.style.display = "none";
        		q.style.display = "block";
    		}
	    }
	xhttp.open("POST", "Gujarati/mark", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
    
}

let next = () => {
    
    //uncheck();
    loader.style.display = "block";
    q.style.display = 'none';
    
    save_time(timer.innerHTML);
    
    let str = "number="+cur_number;
    let xhttp = new XMLHttpRequest();
    	xhttp.onreadystatechange = function() {
    		
    		if(this.readyState == 4 && this.status == 200){
    			
    			if(this.responseText == "ok"){
    			    
    			    cur_number = cur_number+1;
    			    jump(cur_number); 
    			    
    			}
    			
    			loader.style.display = "none";
        		q.style.display = "block";
    		}
	    }
	xhttp.open("POST", "Gujarati/next", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
    
}

let updatePallete = () => {
    
    save_time(timer.innerHTML);
    let xhttp = new XMLHttpRequest();
    	xhttp.onreadystatechange = function() {
    		
    		if(this.readyState == 4 && this.status == 200){
    			
    		    if(this.responseText.length > 30){
    		        
    		        plt.innerHTML = this.responseText;
    		        
    		    }
    			
    			loader.style.display = "none";
        		q.style.display = "block";
    		}
	    }
	xhttp.open("POST", "Gujarati/updatePallete", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send();
    
}

let save = () => {
    
    let value = document.getElementById('frm').op.value;
    let op_loader = document.getElementById('op-loader');
    save_time(timer.innerHTML);
    
    if(value == ""){
        
    }
    else{
        
        op_loader.style.display = "block";
        let str = "number="+cur_number+"&answer="+value;
        let xhttp = new XMLHttpRequest();
        	xhttp.onreadystatechange = function() {
        		
        		if(this.readyState == 4 && this.status == 200){
        			
        			if(this.responseText.length > 30){
        			    
            			plt.innerHTML = this.responseText;
            			
        			}
        			else{
        			    alert(this.responseText);
        			}
        			
        		}
        		
    	    }
    	xhttp.open("POST", "Gujarati/save", true);
    	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    	xhttp.send(str);
            
        op_loader.style.display = "none";
    }
    
}

let open_chem = () => {
    
    let str = "sub=Chem";
    save_time(timer.innerHTML);
    let xhttp = new XMLHttpRequest();
    	xhttp.onreadystatechange = function() {
    		
    		if(this.readyState == 4 && this.status == 200){
    			
    			cur_number = 46;
    			jump(cur_number);
    			updatePallete();
    		    
    		    if(this.responseText.length > 0 && this.responseText.length < 3){
    		        
    		        subText.innerHTML = "Chemistry";
    		        sub_no.innerHTML = this.responseText;
    		        
    		    }
    		    
    			loader.style.display = "none";
        		q.style.display = "block";
    		}
	    }
	xhttp.open("POST", "Gujarati/updateSub", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
    
}

let open_phy = () => {
    
    let str = "sub=Phy";
    save_time(timer.innerHTML);
    let xhttp = new XMLHttpRequest();
    	xhttp.onreadystatechange = function() {
    		
    		if(this.readyState == 4 && this.status == 200){
    			
    			cur_number = 1;
    			jump(cur_number);
    			updatePallete();
    		    
    		    
    		    if(this.responseText.length > 0 && this.responseText.length < 3){
    		        
    		        subText.innerHTML = "Physics";
    		        sub_no.innerHTML = this.responseText;
    		        
    		    }
    		    
    			loader.style.display = "none";
        		q.style.display = "block";
    		}
	    }
	xhttp.open("POST", "Gujarati/updateSub", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
    
}

let open_bio = () => {
    
    let str = "sub=Bio";
    save_time(timer.innerHTML);
    let xhttp = new XMLHttpRequest();
    	xhttp.onreadystatechange = function() {
    		
    		if(this.readyState == 4 && this.status == 200){
    			
    			cur_number = 91;
    			jump(cur_number);
    			updatePallete();
    		    
    		    if(this.responseText.length > 0 && this.responseText.length < 3){
    		        
    		        subText.innerHTML = "Biology";
    		        sub_no.innerHTML = this.responseText;
    		        
    		    }
    		    
    			loader.style.display = "none";
        		q.style.display = "block";
    		}
	    }
	xhttp.open("POST", "Gujarati/updateSub", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
    
}

let endTest = () => {
    
    x = true;
    z = true;
    y = true;
    save_time(timer.innerHTML);
    
    if(!confirm("Do you really want to submit the test?")){
        return false;
    }
    
    let xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function() {
        
        if(this.readyState == 4 && this.status == 200){
        			
        	if(this.responseText == ""){
        		    
        	    location.reload();
        				
        	}
        	else{
        	    alert(this.responseText);
        	}
        }
	}
	xhttp.open("POST", "Check/endExam", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send();
    
    
}

let disqualify = () => {
    
    save_time(timer.innerHTML);
    
    let xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function() {
        
        if(this.readyState == 4 && this.status == 200){
        			
        	if(this.responseText == ""){
        		    
        	    location.reload();
        				
        	}
        	else{
        	    alert(this.responseText);
        	}
        }
	}
	xhttp.open("POST", "Check/endExam", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send();

}

window.onbeforeunload = function () {
    
    if(!y){
    save_time(timer.innerHTML);
    x = true;
    return 'Are you really want to perform the action?';
    }
    else{
        y = false;
    }
    
}

//window.addEventListener('blur', stop);

function stop(){
    
    if(!z){
        save_time(timer.innerHTML);
        if(count > 1){
            alert("You are disqulified");
            
            disqualify();
            
            return;
        }
        
        if(!x){
            alert("Stay on this page or you will be disqualified");
            count++;
        }
        else{
            x = false;
        }
    }
    else{
        z = false;
    }
}

setInterval(function(){
    
    sec--;
    
    if(hr <= 0 && min <= 0 && sec <= 0){
        disqualify();
    }
    
    if(sec < 0){
        min--;
        sec = 59;
    }
    
    if(min < 0){
        hr--;
        min = 59;
    }
    
    timer.innerHTML = hr+":"+min+":"+sec;
    
},1000);
    
