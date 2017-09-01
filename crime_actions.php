<?php
	include 'included2.php';
	if (isset($_POST['invite_id'])) {
		$invite_id = $_POST['invite_id'];
		if ($_POST['action'] == 'accept') {
			mysql_query("UPDATE ocinvites SET status = 'Ready' WHERE id ='$invite_id'");
			echo 'ok';
			exit();
		}
		if ($_POST['action'] == 'decline') {
			mysql_query("DELETE FROM ocinvites WHERE id ='$invite_id'");
			echo 'ok';
			exit();
		}
	}
	if (isset($_POST['like_post_id'])) {
		$like_post_id = $_POST['like_post_id'];
		if ($_POST['who_liked'] != '') {
			$who_liked = $_POST['who_liked'] . ',' . $_POST['who_likes'];
		}
		else {
			$who_liked = $_POST['who_likes'];
		}
		mysql_query("UPDATE ocforum SET `likes`=`likes`+'1', `liked`='$who_liked' WHERE id ='$like_post_id'");
		echo 'ok';
		exit();
	}
	if (isset($_POST['del_post_id'])) {
		$del_post_id = $_POST['del_post_id'];
		mysql_query("DELETE FROM ocforum WHERE id ='$del_post_id'");
		echo 'ok';
		exit();
	}
?>