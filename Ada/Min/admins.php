var canvas2=document.getElementById('myCanvas2');
		    var ctx2=canvas2.getContext('2d');
		    var img1=new Image();
		    var img2=new Image();
		    img1.src='https://a.imge.to/2019/10/07/vFM13F.png';
		    img2.src='https://c.imge.to/2019/10/07/vFMHYV.png';
		    var count=0;
		    var change=0;
		    var elem1 = document.getElementById("can1");
		    var elem2 = document.getElementById("can2");
           
		    var heading=document.getElementById("heading");
            heading.style.left=50+"px";
            heading.style.fontSize=100+"px";
            class sound
            {
                sound;
                constructor(src)
                {
                    this.sound=document.createElement('audio');
                    this.sound.src=src;
                    this.sound.setAttribute("preload","auto");
                    this.sound.setAttribute("controls","none");
                    this.sound.style.display="none";
                }
                play()
                {
                    this.sound.play();
                }
                stop()
                {
                    this.sound.pause();
                }
                decVol()
                {
                	if(this.volume>=0)
                    {
                		this.volume-=20;
                    }
                }
                incVol()
                {
                	if(this.volume<=100)
                    {
                		this.volume+=20;
                    }
                }
            }
			
            class forRandom
		    {
		        n;
		        rand()
		        {
		            this.n=Math.ceil(Math.random()*500);
                    if(this.n>=10)
                    {
                        return this.n;
                    }
                    return null;
		        }
		    }
		    var fr=new forRandom();
		    var i1={
		        x:canvas2.width,
		        y:fr.rand(),
		    }
		    var i2={
		        x:canvas2.width,
		        y:fr.rand(),
		    }
		    
		    function anime()
		    {
		        ctx2.clearRect(0,0,canvas2.width,canvas2.height);
                count++;
		        if(count>=150)
		        {
		            change++;
		            count=0;
		        
		            if(change%2==0)
		            {
		                if(i1.x+150<=0)
		                {   
		                    i1.y=fr.rand();
		                    i1.x=canvas2.width;
		                }
				
		            }
		            else if(change%2==1)
		            {
		                if(i2.x+150<=0)
		                {
		                    i2.y=fr.rand();
		                    i2.x=canvas2.width;
		                }
					}
		        }
		        if(i2.y!=null)
				{
					ctx2.drawImage(img2,i2.x,i2.y);
				}
		        
				if(i1.y!=null)
				{
					ctx2.drawImage(img1,i1.x,i1.y);
				}
		        i1.x-=8;
		        i2.x-=10;    
		    }
		    
		    function begin()
		    {
		        var s1=setInterval(anime,10);
		    }
		    
		    
		    //--------------------for canvas2----------name canvas1-------------//
			
		    var canvas1 = document.getElementById("myCanvas1");
		    var ctx1=canvas1.getContext("2d");
		    var en1=1;
		    var en2=1;
			var en3=1;
		    var flr={
		        x:0,
		        y:canvas1.height-30,
		        height:canvas1.height/15,
		        width:canvas1.width,
		    };
		    
		    class Draw
		    {
		        static floor(x,y,width,height,color)
		        {
		            ctx1.beginPath();
		            ctx1.rect(x,y,width,height);
		            ctx1.fillStyle=color;
		            ctx1.fill();
		            ctx1.closePath();
		        }
		    }
		    
		    class Man{
		        x;
		        y;
		        img;
		        
		        constructor(src)
		        {
		            this.x=0;
		            this.y=canvas1.height-390;
		            this.img=new Image();
		            this.img.src=src;
		        }
		    }
		    
		    class Walk
		    {
		        rl;
		        lwalk;
		        rwalk;
		        Anderson;
		        constructor()
		        {
		            this.rl=0;
		            this.rwalk=0;
		            this.lwalk=0;
		        }
		        leftWalk(Anderson)
		        {
		            if(jump.gj>0)
                    {
	                    Anderson.x -= 0;
	                    return;
                    }
                    
                    if(this.rwalk>0)
                    {
                        this.rwalk=0;
                        Anderson.img.src='https://a.imge.to/2019/10/02/vET8xs.png';
                    }
                    else
                    {
		                this.lwalk++;
		                this.rl=1;
		                Anderson.img.src='https://a.imge.to/2019/10/02/vETqjZ.png';
                        if(this.lwalk%2==1)
                        {
                            Anderson.x -= 20;
                            Anderson.img.src='https://a.imge.to/2019/10/02/vETqjZ.png';
                        }
                        else if(this.lwalk%2==0)
                        {
                            Anderson.x -= 20;
                            Anderson.img.src='https://c.imge.to/2019/10/02/vETF9x.png';
                        }
                    }
		        }
		        rightWalk(Anderson)
		        {
		            if(jump.gj>0)
                    {
	                    Anderson.x += 0;
	                    return;
                    }
                    
                    if(this.lwalk>0)
                    {
                        this.lwalk=0;
                        Anderson.img.src='https://c.imge.to/2019/10/02/vEIfbh.png';
                    }
                    else
                    {
		                this.rwalk++;
		                this.rl=0;
                        Anderson.img.src='https://a.imge.to/2019/10/02/vEIJ2Z.png';
                    
					    if(this.rwalk%2==1)
                        {
                            Anderson.x += 20;
                            Anderson.img.src='https://a.imge.to/2019/10/02/vEIJ2Z.png';
                        }
                        else if(this.rwalk%2==0)
                        {
                            Anderson.x += 20;
                            Anderson.img.src='https://b.imge.to/2019/10/02/vEIbUG.png';
                        }
                    }
		        }
		    }
		    
		    class Jump
		    {
		        j;//for simple jump
		        gj;// for gravity jump
		        time;
		        constructor()
		        {
		            this.j=0;
		            this.gj=0;
		            this.time=10;
		        }
		        simpleJump()
		        {
		            this.j=0;
		        }
		        gravityJump()
		        {
		            this.gj=1;
		            if(walk.rl<=0)
                    {
                        Anderson.img.src='https://b.imge.to/2019/10/03/vEN1vy.png';
                    }
                    else if(walk.rl>0)
                    {
                        Anderson.img.src='https://b.imge.to/2019/10/03/vEN5Nt.png';
                    }
		        }
		        checkJump()
		        {
		            if(this.gj>0)
                    {
                        Anderson.y-=this.time*0.5;
						if(walk.rl<=0)
						{
							Anderson.x+=5;
						}
						else if(walk.rl>0)
						{
							Anderson.x-=5;
						}
                        this.time-=0.1;
                        if((Anderson.y+200)>=canvas1.height-191)
                        {
                            this.gj=0;
                            this.time=10;
                            walk.rwalk=0;
                            walk.lwalk=0;
                            if(walk.rl==0)
                            {
                                Anderson.img.src='https://c.imge.to/2019/10/02/vEIfbh.png';
                            }
                            else if(walk.rl==1)
		                    {
		                        Anderson.img.src='https://a.imge.to/2019/10/02/vET8xs.png';
		                    }
                        }
                    }    
		        }
		    }
		    
		    class SimpleAttack
		    {
		        aR;
		        aL;
		        attR;
		        attL;
		        attimgR;
		        attimgL;
		        xR;
		        yR;
		        xL;
		        yL;
		        constructor(srcR,srcL)
		        {
		            this.aR=0;
		            this.xR=Anderson.x+150;
		            this.yR=Anderson.y+45;
		            this.attR=0;
		            this.attimgR=new Image();
		            this.attimgR.src=srcR;
		        
		            this.aL=0;
		            this.xL=Anderson.x+150;
		            this.yL=Anderson.y+45;
		            this.attL=0;
		            this.attimgL=new Image();
		            this.attimgL.src=srcL;
		        }
		        simpleAttackRight()
		        {
		            en1=0;
                    Anderson.img.src='https://b.imge.to/2019/10/02/vEI8cy.png';
                    this.xR=Anderson.x+150;
                	this.yR=Anderson.y+45;
                    walk.rwalk=0;
                    walk.lwalk=0;
                    this.aR=30;
                    this.attR=1;
		        }
		        
		        simpleAttackLeft()
		        {
		            en2=0;
                    Anderson.img.src=' https://c.imge.to/2019/10/02/vETk86.png';
                    this.xL=Anderson.x-70;
                	this.yL=Anderson.y+45;
                    walk.rwalk=0;
                    walk.lwalk=0;
                    this.aL=30;
                    this.attL=1;
		        }
		        
		        checkSimpleAttRight()
		        {
		             
		            this.aR--;
                    if(this.attR>0)
                    {
                	    if(this.xR<=canvas1.width)
                	    {
                	        this.xR+=6;
                	        ctx1.drawImage(this.attimgR,this.xR,this.yR);
                	    }
                	    else
                	    {
                	        this.attR=0;
                	        this.xR=Anderson.x-150;
                	        this.yR=Anderson.y+45;
                	        en1=1;
                	    }
                    }
                }
		        
		        checkSimpleAttLeft()
		        {
		            this.aL--;
                    if(this.attL>0)
                    {
                	    if(this.xL+100>=0)
                	    {
                	        this.xL-=6;
                	        ctx1.drawImage(this.attimgL,this.xL,this.yL);
                	    }
                	    else
                	    {
                	        this.attL=0;
                	        this.xL=Anderson.x-100;
                	        this.yL=Anderson.y+45;
                	        en2=1;
                	    }
            	    }
                }
		    }
			
			
		    class Block
		    {
		        rightLock()
		        {
		            if(Anderson.x+190>=canvas1.width)
                    {
                        Anderson.x=canvas1.width-190;
                    }
                }
		        leftLock()
		        {
		            if(Anderson.x+120<=0)
                    {
                        Anderson.x=-120;
                    }
		        }
		        bothLock()
		        {
		            if(Anderson.x+190>=canvas1.width)
                    {
                        Anderson.x=canvas1.width-190;
                    }
                    else if(Anderson.x+120<=0)
                    {
                        Anderson.x=-120;
                    }
		        }
		    }
		    
		    var Anderson=new Man('https://c.imge.to/2019/10/02/vEIfbh.png');
		    var walk = new Walk();
		    var jump=new Jump();
		    var satt= new SimpleAttack('https://a.imge.to/2019/10/07/vFM13F.png','https://a.imge.to/2019/10/07/vFM13F.png'); 
            var gatt=new SimpleAttack('https://b.imge.to/2019/10/07/vFM5zi.png','https://c.imge.to/2019/10/07/vFMHYV.png'); 
		    var gameSound= new sound('https://vocaroo.com/media_command.php?media=s00dqV4bzTKQ&command=download_mp3');
			var block= new Block();
		    
		    document.addEventListener('keydown', function(event) 
            {
                //left
                if(event.keyCode==37) 
                {
					if(jump.gj<=0)
					{
						walk.rl=1;
						//walk.rwalk=0;
						walk.leftWalk(Anderson);
					}
                }
                //right
                else if(event.keyCode==39)
                {
					if(jump.gj<=0)
					{
						walk.rl=0;
						//walk.lwalk=0;
						walk.rightWalk(Anderson);
					}
                }
                //jump
                else if(event.keyCode==32)
                {
                    jump.gravityJump();
                }
                //attack1
                else if(event.keyCode==87)
                {
                    if(en1==1 && walk.rl==0)
                    {
                        satt.simpleAttackRight();
                    }
                    else if(en2==1 && walk.rl>0)
                    {
                        satt.simpleAttackLeft();
                    }
                }
                //attack2
                else if(event.keyCode==83)
                {
                    if(en1==1 && walk.rl==0)
                    {
                        gatt.simpleAttackRight();
                    }
                    else if(en2==1 && walk.rl>0)
                    {
                        gatt.simpleAttackLeft();
                    }
                }
            });
            
		    function game()
		    {
		        ctx1.clearRect(0,0,canvas1.width,canvas1.height);
		        Draw.floor(flr.x,flr.y,flr.width,flr.height,"#000000");
		        ctx1.drawImage(Anderson.img,Anderson.x,Anderson.y);
		        jump.checkJump();
		        satt.checkSimpleAttRight();
		        satt.checkSimpleAttLeft();
		        gatt.checkSimpleAttRight();
		        gatt.checkSimpleAttLeft();
		        block.bothLock();
		        if(gatt.aR<=0 && gatt.aL<=0 && satt.aR<=0 && satt.aL<=0 && walk.rwalk<=0 && walk.lwalk<=0 && jump.gj<=0)
                {
                    satt.aR=0;
                    satt.aL=0;
                    if(walk.rl==0)
                    {
                         Anderson.img.src='https://c.imge.to/2019/10/02/vEIfbh.png';
                    }
                    else 
                    {
                         Anderson.img.src='https://a.imge.to/2019/10/02/vET8xs.png';
                    }
                }
		    }
		    
            var ret=0;
            
		    function play()
		    {
				gameSound.stop();
				document.getElementById("back1").style.display="block";
                document.getElementById("back1").style.top="0px";
		        canvas2.style.display="none";
		        document.getElementById('play').style.display="none";
		        document.getElementById('credits').style.display="none";
		        document.getElementById('quit').style.display="none";
		        document.getElementById('heading').style.display="none";
		        canvas1.style.display="block";
		        canvas1.style.width=screen.width+"px";
                canvas1.style.height=screen.height+"px";
		        
		        if (elem1.requestFullscreen) 
		        {
                    elem1.requestFullscreen();
                }
                else if (elem1.mozRequestFullScreen) 
                { 
                    /* Firefox */
                    elem1.mozRequestFullScreen();
                }
                else if (elem1.webkitRequestFullscreen) 
                { 
                    /* Chrome, Safari & Opera */
                    elem1.webkitRequestFullscreen();
                }
                else if (elem1.msRequestFullscreen) 
                {   
                    /* IE/Edge */
                    elem1.msRequestFullscreen();
                }
                ret=setInterval(game,5);
		    }
		    
		    function start()
		    {
		        gameSound.play();
		        document.getElementById("intro").style.display="none";
		        document.getElementById("start").style.display="none";
		        canvas2.style.display="block";
		        document.getElementById('play').style.display="block";
		        document.getElementById('credits').style.display="block";
		        document.getElementById('quit').style.display="block";
		        document.getElementById('heading').style.display="block";
		        canvas2.style.width=screen.width+"px";
                canvas2.style.heigth=screen.heigth+"px";
                document.getElementById("sorry").style.display="none";
                document.getElementById("back").style.display="none";
		        if (elem2.requestFullscreen) 
		        {
                    elem2.requestFullscreen();
                }
                else if (elem2.mozRequestFullScreen) 
                { 
                    /* Firefox */
                    elem2.mozRequestFullScreen();
                }
                else if (elem2.webkitRequestFullscreen) 
                { 
                    /* Chrome, Safari & Opera */
                    elem2.webkitRequestFullscreen();
                }
                else if (elem2.msRequestFullscreen) 
                {   
                    /* IE/Edge */
                    elem2.msRequestFullscreen();
                }
                begin();

		    }
            
            function back()
            {
            	document.getElementById("intro").style.display="none";
		        document.getElementById("start").style.display="none";
		        canvas2.style.display="block";
		        document.getElementById('play').style.display="block";
		        document.getElementById('credits').style.display="block";
		        document.getElementById('quit').style.display="block";
		        document.getElementById('heading').style.display="block";
		        canvas2.style.width=screen.width+"px";
                canvas2.style.heigth=screen.heigth+"px";
                document.getElementById("sorry").style.display="none";
                document.getElementById("back").style.display="none";
                canvas1.style.display="none";
		        if (elem2.requestFullscreen) 
		        {
                    elem2.requestFullscreen();
                }
                else if (elem2.mozRequestFullScreen) 
                { 
                    /* Firefox */
                    elem2.mozRequestFullScreen();
                }
                else if (elem2.webkitRequestFullscreen) 
                { 
                    /* Chrome, Safari & Opera */
                    elem2.webkitRequestFullscreen();
                }
                else if (elem2.msRequestFullscreen) 
                {   
                    /* IE/Edge */
                    elem2.msRequestFullscreen();
                }
		    }
            
            function back1()
            {
				gameSound.play();
            	canvas2.style.display="block";
		        document.getElementById('play').style.display="block";
		        document.getElementById('credits').style.display="block";
		        document.getElementById('quit').style.display="block";
		        document.getElementById('heading').style.display="block";
		        canvas2.style.width=screen.width+"px";
                canvas2.style.heigth=screen.heigth+"px";
                document.getElementById("back1").style.display="none";
                canvas1.style.display="none";
		        if (elem2.requestFullscreen) 
		        {
                    elem2.requestFullscreen();
                }
                else if (elem2.mozRequestFullScreen) 
                { 
                    /* Firefox */
                    elem2.mozRequestFullScreen();
                }
                else if (elem2.webkitRequestFullscreen) 
                { 
                    /* Chrome, Safari & Opera */
                    elem2.webkitRequestFullscreen();
                }
                else if (elem2.msRequestFullscreen) 
                {   
                    /* IE/Edge */
                    elem2.msRequestFullscreen();
                }
                
                clearInterval(ret);
		    }
            
            
		    function settings()
		    {
		        document.getElementById('play').style.display="none";
		        document.getElementById('credits').style.display="none";
		        document.getElementById('quit').style.display="none";
		        document.getElementById('heading').style.display="none";
                canvas2.style.width=screen.width+"px";
                canvas2.style.heigth=screen.heigth+"px";
                document.getElementById("sorry").style.display="block";
                document.getElementById("back").style.display="block";
		    }
