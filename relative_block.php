
	<div class="relativeBlock">
		<div class="rightTopBox curve3px <?php $notify = $statustesttwo['notify'];
		if ($notify != '0') echo 'alert'; ?>" id="toggleNot"><span
					id="notificationsNo"><?php if ($notify != 0) {
					echo '<b id="notificationText" style="color: #FFC753;">' . $notify . '</b>';
				} else {
					echo '<span style="color: #cccccc;">No';
				} ?> Notification<?php if ($notify == 0) {?></span><?}?></span></div>
		<div class="notificationCentre curve3px" id="notificationDiv">
			<div class="preventscroll" id="notificationDivContent"
				 style="text-align: center; max-height: 300px; overflow-y: auto;">
				<?php
				$notif = $statustesttwo['notification'];

				$aapattern[1] = "a_open";
				$aapattern[2] = "a_closed";
				$aapattern[3] = "a_slash";
				$aapattern[4] = "_here_";
				$aapattern[5] = "tehee";
				$aapattern[6] = ":wub:";

				$aareplace[1] = "<a href=viewprofile.php?username=";
				$aareplace[2] = "><b><font color=yellow>";
				$aareplace[3] = "</font></b></a>";
				$aareplace[4] = "<a href=points.php?notification=1#bodygaurds><font color=silver><b>here</a></font></b>";
				$aareplace[5] = "No recent notifications!";
				$aareplace[6] = '<img src=/layout/smiles/wub.gif>';

				$notifs = str_replace($aapattern, $aareplace, $notif);

				if ($notify != '0') {
					$satenin = 1;
					?>
					<p><font color="white" size="1" face="verdana">
							<? if (!$notifs) {
							} else {
								echo "$notifs";
							} ?></font></p>
				<? } else {
					echo '<p><font color="white" size="1" face="verdana">You have no notifications at this time.</font></p>';
				}
				?>
			</div>
			<div id="clearNotifications"
				 style="border-top: 1px solid #353535; text-align: center; background-color: #404040; opacity: 0.9;">
				<a href="#" onclick="clearNotifications(); return false; <?php $notify = 0; ?>"
				   style="display: inline-block; width: 100%; padding-left: 3px; padding-top: 5px; padding-bottom: 5px; font-size: 10px; color: #888888 !important;">Clear</a>
			</div>
		</div>
		<a tabindex="-2" href="logout.php?id=<? echo $sessionid; ?>" class="rightTopBoxSide curve3px">Sign
			Out</a>
	</div>
	<script>
		$(document).ready(function() {
			//alert("!");
			$("#toggleNot").on("click", function() {
				$(this).removeClass('alert');
				$('notificationText').html("No");
				if ($('#notificationDiv').is(":hidden")) {
					$('#notificationDiv').fadeIn(100, function() {
						document.getElementById('notificationDivContent').scrollTop = 0;
					});
				}
				else {
					$('#notificationDiv').fadeOut(100);
				}
				$('.updateCasino').fadeOut(100);
				//document.getElementById('toggleNot').classList.remove('alert');
				/*document.getElementById('notificationText').innerHTML='No';
				document.getElementById('notificationText').style.color='white';
				if ((document.getElementById('notificationDiv').style.display) == '' || (document.getElementById('notificationDiv').style.display) == 'none') {
					$('#notificationDiv').fadeIn(100, function () {
						document.getElementById('notificationDivContent').scrollTop = 0;
					});
				} else {
					$('#notificationDiv').fadeOut(100);
				}
				//$('.updateCasino').fadeOut(100);*/
			});
		});
	</script>