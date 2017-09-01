function submit_login(){
    $.ajax({
        type: "POST",
        url: "userlogin.php",
        data: $("#login-form").serialize(),
        success: function(data) {
            var datos=JSON.parse(data);
            if($('#pop').length==0){
                $('body').prepend(datos['message']);
            }else{
                $('#pop').remove();
                $('body').prepend(datos['message']);
            }
            if(datos['status']=='success'){

                window.setTimeout(function(){

                    // Move to a new location or you can do something else
                    window.location.href = datos['url'];

                }, 2000);
            }
        }
    });
    return false;
}

function signIn(){
	if(document.getElementById('username').value==''){
		document.getElementById('username').focus();
		document.getElementById('usernameHolder').style.borderColor='#B24700';
		return false;
	}
}

function nextStep(){
	if(document.getElementById('reqUsername').value==''){
		document.getElementById('reqUsername').focus();
		document.getElementById('reqUsernameHolder').style.borderColor='#B24700';
	}else{
		$("#step1").fadeOut(130,function(){
			$("#step2").fadeIn(130);
			document.getElementById('reqPassword').focus();
		});
	}
	return false;
}

function prevStep(){
	$("#step2").fadeOut(130,function(){
		$("#step1").fadeIn(130);
	});
	return false;
}

function waitUpdate(){
	var vwait=parseInt(document.getElementById("wait").innerHTML)- 1;
	if(vwait>=0){
		document.getElementById("wait").innerHTML=vwait;
		setTimeout('waitUpdate()',1000);
	}
	else{
		$("#pop").fadeOut(500);
	}
}

function imageSlideshow(){
	var pause=false;
	$('#fader, .button').hover(function(){pause=true;},function(){pause=false;});
	$('#fader img:not(:first)').hide();
	function fadeNext(){
		$('#fader img').first().fadeOut(1150).appendTo($('#fader'));
		$('#fader img').first().fadeIn(1150);
	}
	function doRotate(){if(!pause){fadeNext();}}
	
	var rotate=setInterval(doRotate,4000);$('#fader img').first().fadeIn(700);
}
var ax=10;
var ay=10;
var randy;
var randz;
var i=0;
function newPop(x,y,id1,num){
	var sy=20+ Math.floor(Math.random()*60);
	if(num==1){
		sx=13+ Math.floor(Math.random()*40);
	}else if(num==2){
		sx=85+ Math.floor(Math.random()*50);
	}else if(num==3){
		sx=170+ Math.floor(Math.random()*60);
	}
	randy=1000+ Math.floor(Math.random()*6000);
	randz=2000+ Math.floor(Math.random()*3000);
	document.getElementById(id1).style.top=sx+"px";
	document.getElementById(id1).style.left=sy+"%";
	var id2="#"+ id1;
	var info=activity[i];
	i++;
	$(id2).html(info);
	$(id2).delay(randy).animate({opacity:1},700,function(){$(id2).delay(randz).animate({opacity:0.0},400,function(){newPop(sx,sy,id1,num);});});
	if(i>39)i=0;
}
function countdown(){
	var banner=$("#banner");
	var mask=$("#mask");
	var counter=$("#counter");
	var timeLeft=parseInt(banner.attr("data-time-left"));
	if(timeLeft<=0){
		banner.remove();mask.remove();
	}
	var days=Math.floor(timeLeft/86400);
	var hrs=Math.floor((Math.floor(timeLeft%86400))/ 3600);
	var mins=Math.floor((Math.floor(timeLeft%3600))/ 60);
	var secs=Math.floor((Math.floor(timeLeft%60))%60);
	if(days<=9)
		days='0'+ days;
	if(secs<=9)
		secs='0'+ secs;
	if(mins<=9)
		mins='0'+ mins;
	if(hrs<=9)
		hrs='0'+ hrs;$
	(counter).html(days+' <span class="unit">days</span>&nbsp;'+ hrs+' <span class="unit">hours</span> '+ mins
+'&nbsp;<span class="unit">mins</span> <span class=\'js-secs\'>'+ secs+'&nbsp;<span class="unit">secs&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span>');
	$(".js-secs").fadeTo(50,0.55,function(){$(this).delay(200).fadeTo(75,1);});
	timeLeft--;
	$(banner).attr("data-time-left",timeLeft);
}
$(function(){
	setInterval(countdown,1000);
	imageSlideshow();
	$("body").append("<div class=\"pop\" id=\"pop1\"></div>");
	$("body").append("<div class=\"pop\" id=\"pop2\"></div>");
	$("body").append("<div class=\"pop\" id=\"pop3\"></div>");
	newPop(ax,ay,'pop1',1);
	newPop(ax,ay,'pop2',2);
	newPop(ax,ay,'pop3',3);
});