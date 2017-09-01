<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
	<meta name="charset" content="UTF-8">
	<link rel="icon" type="image/png" href="images/icon.png">
	<title>InfamousGangsters - Online Text-Based Multiplayer Mafia Game - MMORPG</title>
	<link rel="stylesheet" type="text/css" href="css/index.new2.css">
    <script async src="javascript/jquery.min.js"></script>
    <script async src="javascript/index.new2.min.js"></script>
</head>
<body>
<?php
	if(isset($_SESSION['error'])){
		echo '<div class="error shadow" id="pop" style="position: relative; margin-top:-70px; height: 70px;">'.$_SESSION['error'].'</div>';
	}
?>

<div class="container">
	<div class="walkthrough">
		<div class="container2">
			Infamous Gangsters is a free to play,<br> Mafia based multi-player game.
			<br>
			<div id="fader">
				<img src="home/1.png" style="display: none;"/>
				<img src="home/2.png"/>
				<img src="home/3.png"/>
				<img src="home/4.png"/>
			</div>
			Sign in, see how long you last.
		</div>
		<div class="padRight"></div>
		<!-- <div class="container2Footer txtShadow">Total Users: <b style="color: #FFC753;">6,754</b></div> -->
	</div>
	
	<div class="toughsociety"></div>
	<div class="forms">
		<div class="formsHolder">
			<div class="login">
				<div class="formTitle">
					Sign In
				</div>
				<div class="formInputs">
					<form method="post" action="./userlogin.php" id="login-form" onsubmit="submit_login(); return false;">
					
										
						<label class="formLabel txtShadow" for="username">
							Username<span class="colon">:</span>
						</label>	
						<label for="username">
							<div class="formTextboxHolder username shadow" id="usernameHolder">
								<input type="text" 								onkeypress="document.getElementById('usernameHolder').style.borderColor ='';" 
								name="usernamelog" id="username" class="formTextbox" oninput="if(this.value==''){this.style.fontWeight='normal';}else{this.style.fontWeight='bold';}" onclick="this.select()" placeholder="Enter Username..." value="<?php if(isset($_SESSION['success']))echo $_SESSION['success'] ?>">
							</div>
						</label>
						<label class="formLabel txtShadow" for="password">
							Password<span class="colon">:</span>
						</label>	
						<label for="password">
							<div class="formTextboxHolder password shadow">
								<input type="password" name="passwordlog" id="password" class="formTextbox" oninput="if(this.value==''){this.style.fontWeight='normal';}else{this.style.fontWeight='bold';}" onclick="this.select()" placeholder="Enter Password...">
							</div>
						</label>
						<span class="lostPass txtShadow" onclick="document.getElementById('lostPassPop').style.display='block'; document.getElementById('lostUsername').focus();">
							Lost Password?
						</span>
                        <button type="submit" id="submit" onclick="signIn();" class="formSubmit shadow txtShadow">
                            Sign In &raquo;
                        </button>
					</form>					
				</div>				
			</div>
<!--			<div class="register">-->
<!--				<div class="formTitle">-->
<!--					Sign Up-->
<!--				</div>-->
<!--				<div class="formInputs">-->
<!--					<form method="post" id="registerForm" action="./register.php" onsubmit="if(document.getElementById('reqPassword').value==''){return false;}";>-->
<!--						<div id="step1">-->
<!--							<label class="formLabel txtShadow" for="reqUsername">-->
<!--								Username<span class="colon">:</span>-->
<!--							</label>	-->
<!--							<label for="reqUsername">-->
<!--								<div class="formTextboxHolder username shadow" id="reqUsernameHolder">-->
<!--									<input type="text" autocomplete="off" name="reqUsername" id="reqUsername" class="formTextbox" oninput="if(this.value==''){this.style.fontWeight='normal';}else{this.style.fontWeight='bold';document.getElementById('reqUsernameHolder').style.borderColor ='';}" -->
<!--									onkeypress="if(this.value==''){this.style.fontWeight='normal';}else{this.style.fontWeight='bold';document.getElementById('reqUsernameHolder').style.borderColor ='';}" -->
<!--									onclick="this.select()" placeholder="Enter Username..."  onkeydown="if(event.keyCode == 13){nextStep();}">-->
<!--								</div>-->
<!--							</label>-->
<!--							<label class="formLabel txtShadow" for="reqEmail">-->
<!--								Email (Optional)<span class="colon">:</span>-->
<!--							</label>	-->
<!--							<label for="reqEmail">-->
<!--								<div class="formTextboxHolder email shadow">-->
<!--									<input type="text" autocomplete="off" id="reqEmail" onkeydown="if(event.keyCode == 13){nextStep();}" name="reqEmail" class="formTextbox" oninput="if(this.value==''){this.style.fontWeight='normal';}else{this.style.fontWeight='bold';}" onclick="this.select()" placeholder="Enter E-Mail...">-->
<!--								</div>-->
<!--							</label>-->
<!--							<input type="button" id="submit" onclick="nextStep();" class="formSubmit shadow txtShadow" value="Next &raquo;">					-->
<!--						</div>	-->
<!--						<div id="step2" style="display: none;">-->
<!--							<label class="formLabel txtShadow" for="reqPassword">-->
<!--								Password<span class="colon">:</span>-->
<!--							</label>	-->
<!--							<label for="reqPassword">-->
<!--								<div class="formTextboxHolder password shadow">-->
<!--									<input type="password" id="reqPassword" name="reqPassword" class="formTextbox" oninput="if(this.value==''){this.style.fontWeight='normal';}else{this.style.fontWeight='bold';}" onclick="this.select()" placeholder="Enter Password...">-->
<!--								</div>-->
<!--							</label>-->
<!--							<label class="formLabel txtShadow" for="reqPasswordRepeat">-->
<!--								Repeat Password<span class="colon">:</span>-->
<!--							</label>	-->
<!--							<label for="reqPasswordRepeat">-->
<!--								<div class="formTextboxHolder password shadow">-->
<!--									<input type="password" name="reqPasswordRepeat" id="reqPasswordRepeat" class="formTextbox" oninput="if(this.value==''){this.style.fontWeight='normal';}else{this.style.fontWeight='bold';}" onclick="this.select()" placeholder="Confirm Password...">-->
<!--								</div>-->
<!--							</label>-->
<!--							<input type="submit" id="submit" onclick="document.getElementById('registerForm').submit();" class="formSubmit shadow txtShadow" value="Register &raquo;">					-->
<!--							<input type="button" id="submit" onclick="prevStep();" class="formPrevSubmit shadow txtShadow" style="float: left;" value="Previous &laquo;">					-->
<!--						</div>-->
<!--					</form>-->
<!--				</div>					-->
<!--			</div>-->
			<div class="clear"></div>
		</div>
		<!-- <div class="more" style="overflow: hidden;"> -->
			<!-- Current Online Users: <b style="color: rgb(255, 199, 83);">24</b>  -->
			<!-- <span id="author">- &#169; 2017</span> -->
			
			<!-- <br> -->
			
			<!-- <div class="fb-like-wrapper"> -->
				<!-- <div class="fb-like" data-href="http://www.facebook.com/ToughSociety" data-layout="standard" data-action="like" data-show-faces="true" data-share="false" colorscheme="dark"> -->
				<!-- </div> -->
			<!-- </div> -->
		<!-- </div> -->
	</div>
</div>
<div class="lostPassBox heavyShadow" style="display: none; z-index: 4003; top: 210px; height: 220px;  width: 330px; margin-left: -165px;" id="lostPassPop">
	<div class="formInputs" style="margin-top: -15px; text-align: left;">
		<form method="post" action="index.php" style="height: 100%;">
				<label class="formLabel txtShadow" for="lostUsername">
					Username<span class="colon">:</span>
				</label>	
				<label for="lostUsername">
					<div class="formTextboxHolder username shadow" id="lostUsernameHolder">
						<input type="text" autocomplete="off" name="lostUsername" id="lostUsername" class="formTextbox" placeholder="Enter Username..."  oninput="if(this.value==''){this.style.fontWeight='normal';}else{this.style.fontWeight='bold';}" onclick="this.select()" >
					</div>
				</label>
				<label class="formLabel txtShadow" for="lostEmail">
					Email Address<span class="colon">:</span>
				</label>	
				<label for="lostEmail">
					<div class="formTextboxHolder email shadow">
						<input type="text" autocomplete="off" name="lostEmail" id="lostEmail" class="formTextbox" placeholder="Enter E-Mail Address..."  oninput="if(this.value==''){this.style.fontWeight='normal';}else{this.style.fontWeight='bold';}" onclick="this.select()" >
					</div>
				</label>
				<input type="submit" id="submit" class="formSubmit shadow txtShadow" value="Send Reset Instructions &raquo;">					
		</form>
	</div>
	<div class="close" onclick="document.getElementById('lostPassPop').style.display='none';">(close)</div>
</div>
</body>

<script>

var activity = [
'<span style="color: silver"  data-href="viewprofile.php?username=YouMad">YouMad</span> ranked to <span style="color: #E3E3E3;">Respected Assassin.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Partner">Partner</span> ranked to <span style="color: #E3E3E3;">Respected Assassin.</span>','<span style="color: silver"  data-href="viewprofile.php?username=AsaAkira">AsaAkira</span> ranked to <span style="color: #E3E3E3;">Mafioso.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Partner">Partner</span> reached <span style="color: #E3E3E3;">1,000 Bullets Melted.</span>','<span style="color: silver"  data-href="viewprofile.php?username=D3mons">D3mons</span> reached <span style="color: #E3E3E3;">250 GTAs.</span>','<span style="color: silver"  data-href="viewprofile.php?username=OPi">OPi</span> ranked to <span style="color: #E3E3E3;">Thug.</span>','<span style="color: silver"  data-href="viewprofile.php?username=xXDarkraiXX">xXDarkraiXX</span> ranked to <span style="color: #E3E3E3;">Mafioso.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Partner">Partner</span> ranked to <span style="color: #E3E3E3;">Assassin.</span>','<span style="color: silver"  data-href="viewprofile.php?username=YouMad">YouMad</span> ranked to <span style="color: #E3E3E3;">Assassin.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Partner">Partner</span> reached <span style="color: #E3E3E3;">500 Bullets Melted.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Partner">Partner</span> ranked to <span style="color: #E3E3E3;">Respected Mobster.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Partner">Partner</span> ranked to <span style="color: #E3E3E3;">Mobster.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Partner">Partner</span> reached <span style="color: #E3E3E3;">50 Committed Crimes.</span>','<span style="color: silver"  data-href="viewprofile.php?username=YouMad">YouMad</span> reached <span style="color: #E3E3E3;">500 Bullets Melted.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Partner">Partner</span> ranked to <span style="color: #E3E3E3;">Respected Thug.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Partner">Partner</span> ranked to <span style="color: #E3E3E3;">Thug.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Partner">Partner</span> ranked to <span style="color: #E3E3E3;">Wise Guy.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Partner">Partner</span> reached <span style="color: #E3E3E3;">25 Bullets Melted.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Partner">Partner</span> ranked to <span style="color: #E3E3E3;">Citizen.</span>','<span style="color: silver"  data-href="viewprofile.php?username=boost">boost</span> ranked to <span style="color: #E3E3E3;">Boss.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Garrison">Garrison</span> ranked to <span style="color: #E3E3E3;">Tough Don.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Volkoff">Volkoff</span> ranked to <span style="color: #E3E3E3;">Respected Mobster.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Exclusive">Exclusive</span> reached <span style="color: #E3E3E3;">5,000 Bullets Melted.</span>','<span style="color: silver"  data-href="viewprofile.php?username=CASISDEAD">CASISDEAD</span> ranked to <span style="color: #E3E3E3;">Respected Boss.</span>','<span style="color: silver"  data-href="viewprofile.php?username=YouMad">YouMad</span> ranked to <span style="color: #E3E3E3;">Respected Mobster.</span>','<span style="color: silver"  data-href="viewprofile.php?username=DraakHi">DraakHi</span> ranked to <span style="color: #E3E3E3;">Thug.</span>','<span style="color: silver"  data-href="viewprofile.php?username=paganz">paganz</span> ranked to <span style="color: #E3E3E3;">Respected Assassin.</span>','<span style="color: silver"  data-href="viewprofile.php?username=reebox">reebox</span> reached <span style="color: #E3E3E3;">50 Committed Crimes.</span>','<span style="color: silver"  data-href="viewprofile.php?username=reebox">reebox</span> ranked to <span style="color: #E3E3E3;">Mobster.</span>','<span style="color: silver"  data-href="viewprofile.php?username=reebox">reebox</span> ranked to <span style="color: #E3E3E3;">Respected Thug.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Section18">Section18</span> ranked to <span style="color: #E3E3E3;">Wise Guy.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Section18">Section18</span> ranked to <span style="color: #E3E3E3;">Citizen.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Section18">Section18</span> reached <span style="color: #E3E3E3;">25 Bullets Melted.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Forgotmygender">Forgotmygender</span> killed <span style="color: silver"  data-href="viewprofile.php?username=odl">odl</span>.','<span style="color: silver"  data-href="viewprofile.php?username=CASISDEAD">CASISDEAD</span> reached <span style="color: #E3E3E3;">1,000 Committed Crimes.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Forgotmygender">Forgotmygender</span> ranked to <span style="color: #E3E3E3;"><b style="color: #FFC753;">State Don</b>.</span>','<span style="color: silver"  data-href="viewprofile.php?username=OPi">OPi</span> ranked to <span style="color: #E3E3E3;">Wise Guy.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Hilly">Hilly</span> ranked to <span style="color: #E3E3E3;">Respected Thug.</span>','<span style="color: silver"  data-href="viewprofile.php?username=CASISDEAD">CASISDEAD</span> ranked to <span style="color: #E3E3E3;">Boss.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Graveness">Graveness</span> ranked to <span style="color: #E3E3E3;">Respected Underboss.</span>','<span style="color: silver"  data-href="viewprofile.php?username=FlyBoi">FlyBoi</span> ranked to <span style="color: #E3E3E3;">Respected Underboss.</span>','<span style="color: silver"  data-href="viewprofile.php?username=AsaAkira">AsaAkira</span> ranked to <span style="color: #E3E3E3;">Respected Assassin.</span>','<span style="color: silver"  data-href="viewprofile.php?username=AsaAkira">AsaAkira</span> reached <span style="color: #E3E3E3;">1,000 Bullets Melted.</span>','<span style="color: silver"  data-href="viewprofile.php?username=paganz">paganz</span> ranked to <span style="color: #E3E3E3;">Assassin.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Exclusive">Exclusive</span> was promoted to an <b style="color: pink;">Entertainer</b>.','<span style="color: silver"  data-href="viewprofile.php?username=YouMad">YouMad</span> reached <span style="color: #E3E3E3;">50 Committed Crimes.</span>','<span style="color: silver"  data-href="viewprofile.php?username=D3mons">D3mons</span> ranked to <span style="color: #E3E3E3;">Godfather.</span>','<span style="color: silver"  data-href="viewprofile.php?username=DraakHi">DraakHi</span> ranked to <span style="color: #E3E3E3;">Wise Guy.</span>','<span style="color: silver"  data-href="viewprofile.php?username=paganz">paganz</span> ranked to <span style="color: #E3E3E3;">Respected Mobster.</span>','<span style="color: silver"  data-href="viewprofile.php?username=YouMad">YouMad</span> ranked to <span style="color: #E3E3E3;">Mobster.</span>','<span style="color: silver"  data-href="viewprofile.php?username=YouMad">YouMad</span> ranked to <span style="color: #E3E3E3;">Respected Thug.</span>','<span style="color: silver"  data-href="viewprofile.php?username=paganz">paganz</span> ranked to <span style="color: #E3E3E3;">Mobster.</span>','<span style="color: silver"  data-href="viewprofile.php?username=paganz">paganz</span> ranked to <span style="color: #E3E3E3;">Respected Thug.</span>','<span style="color: silver"  data-href="viewprofile.php?username=paganz">paganz</span> ranked to <span style="color: #E3E3E3;">Thug.</span>','<span style="color: silver"  data-href="viewprofile.php?username=paganz">paganz</span> ranked to <span style="color: #E3E3E3;">Wise Guy.</span>','<span style="color: silver"  data-href="viewprofile.php?username=bubonicChronic">bubonicChronic</span> ranked to <span style="color: #E3E3E3;">Respected Boss.</span>','<span style="color: silver"  data-href="viewprofile.php?username=YouMad">YouMad</span> ranked to <span style="color: #E3E3E3;">Thug.</span>','<span style="color: silver"  data-href="viewprofile.php?username=YouMad">YouMad</span> ranked to <span style="color: #E3E3E3;">Wise Guy.</span>','<span style="color: silver"  data-href="viewprofile.php?username=YouMad">YouMad</span> reached <span style="color: #E3E3E3;">25 Bullets Melted.</span>','<span style="color: silver"  data-href="viewprofile.php?username=YouMad">YouMad</span> ranked to <span style="color: #E3E3E3;">Citizen.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Sykes">Sykes</span> ranked to <span style="color: #E3E3E3;">Assassin.</span>','<span style="color: silver"  data-href="viewprofile.php?username=DraakHi">DraakHi</span> ranked to <span style="color: #E3E3E3;">Citizen.</span>','<span style="color: silver"  data-href="viewprofile.php?username=OPi">OPi</span> ranked to <span style="color: #E3E3E3;">Citizen.</span>','<span style="color: silver"  data-href="viewprofile.php?username=reebox">reebox</span> ranked to <span style="color: #E3E3E3;">Thug.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Ze">Ze</span> reached <span style="color: #E3E3E3;">10,000 Committed Crimes.</span>','<span style="color: silver"  data-href="viewprofile.php?username=QueenOfDisaster">QueenOfDisaster</span> ranked to <span style="color: #E3E3E3;">Underboss.</span>','<span style="color: silver"  data-href="viewprofile.php?username=D3mons">D3mons</span> reached <span style="color: #E3E3E3;">5,000 Bullets Melted.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Volkoff">Volkoff</span> ranked to <span style="color: #E3E3E3;">Mobster.</span>','<span style="color: silver"  data-href="viewprofile.php?username=bubonicChronic">bubonicChronic</span> ranked to <span style="color: #E3E3E3;">Boss.</span>','<span style="color: silver"  data-href="viewprofile.php?username=bubonicChronic">bubonicChronic</span> reached <span style="color: #E3E3E3;">1,000 Committed Crimes.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Scary">Scary</span> ranked to <span style="color: #E3E3E3;">Respected Assassin.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Scary">Scary</span> reached <span style="color: #E3E3E3;">250 Committed Crimes.</span>','<span style="color: silver"  data-href="viewprofile.php?username=RT5">RT5</span> ranked to <span style="color: #E3E3E3;">Godfather.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Scary">Scary</span> reached <span style="color: #E3E3E3;">500 Bullets Melted.</span>','<span style="color: silver"  data-href="viewprofile.php?username=AsaAkira">AsaAkira</span> ranked to <span style="color: #E3E3E3;">Assassin.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Scary">Scary</span> ranked to <span style="color: #E3E3E3;">Assassin.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Scary">Scary</span> ranked to <span style="color: #E3E3E3;">Respected Mobster.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Scary">Scary</span> ranked to <span style="color: #E3E3E3;">Mobster.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Scary">Scary</span> reached <span style="color: #E3E3E3;">50 Committed Crimes.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Scary">Scary</span> ranked to <span style="color: #E3E3E3;">Respected Thug.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Scary">Scary</span> ranked to <span style="color: #E3E3E3;">Thug.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Scary">Scary</span> reached <span style="color: #E3E3E3;">25 Bullets Melted.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Scary">Scary</span> ranked to <span style="color: #E3E3E3;">Wise Guy.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Scary">Scary</span> ranked to <span style="color: #E3E3E3;">Citizen.</span>','<span style="color: silver"  data-href="viewprofile.php?username=D3mons">D3mons</span> ranked to <span style="color: #E3E3E3;">Respected Boss.</span>','<span style="color: silver"  data-href="viewprofile.php?username=reebox">reebox</span> ranked to <span style="color: #E3E3E3;">Wise Guy.</span>','<span style="color: silver"  data-href="viewprofile.php?username=reebox">reebox</span> reached <span style="color: #E3E3E3;">25 Bullets Melted.</span>','<span style="color: silver"  data-href="viewprofile.php?username=bubonicChronic">bubonicChronic</span> ranked to <span style="color: #E3E3E3;">Respected Underboss.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Volkoff">Volkoff</span> ranked to <span style="color: #E3E3E3;">Respected Thug.</span>','<span style="color: silver"  data-href="viewprofile.php?username=daniel123">daniel123</span> ranked to <span style="color: #E3E3E3;">Citizen.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Hilly">Hilly</span> ranked to <span style="color: #E3E3E3;">Thug.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Skrappper">Skrappper</span> ranked to <span style="color: #E3E3E3;">Respected Thug.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Brandon">Brandon</span> ranked to <span style="color: #E3E3E3;">Assassin.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Staff">Staff</span> ranked to <span style="color: #E3E3E3;">Underboss.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Despacito">Despacito</span> ranked to <span style="color: #E3E3E3;">Boss.</span>','<span style="color: silver"  data-href="viewprofile.php?username=paganz">paganz</span> ranked to <span style="color: #E3E3E3;">Citizen.</span>','<span style="color: silver"  data-href="viewprofile.php?username=Ze">Ze</span> ranked to <span style="color: #E3E3E3;">Don.</span>','<span style="color: silver"  data-href="viewprofile.php?username=AsaAkira">AsaAkira</span> ranked to <span style="color: #E3E3E3;">Respected Mobster.</span>','<span style="color: silver"  data-href="viewprofile.php?username=AsaAkira">AsaAkira</span> reached <span style="color: #E3E3E3;">50 Committed Crimes.</span>','<span style="color: silver"  data-href="viewprofile.php?username=bubonicChronic">bubonicChronic</span> ranked to <span style="color: #E3E3E3;">Underboss.</span>',null];

document.getElementById('username').focus();countdown();
</script>
</html>