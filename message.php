<div class="interactContainers" id="private_message">
<form action="javascript:sendPM();" name="pmForm" id="pmForm" method="post">
<font size="+1">Sending Private Message to <strong><em><?php echo "$username"; ?></em></strong></font><br /><br />
Subject:
<input name="pmSubject" id="pmSubject" type="text" maxlength="64" style="width:98%;"/>
Message:
<textarea name="pmText Area" id="pmTextArea" rows="8" style="width:98%;"></textarea>
<input name="pm_sender_id" id="pm_sender_id" type="hidden" value="<?php echo $_SESSION['idx']; ?>"/>
<input name="pm_sender_name" id="pm_sender_name" type="hidden" value="<?php echo $_SESSION['firstname']; ?>"/>
<input name="pm_rec_id" id="pm_rec_id" type="hidden" value="<?php echo $id; ?>" />
<input name="pm_rec_name" id="pm_rec_name" type="hidden" value="<?php echo $username; ?>" />
<input name="pmWipit" id="pmWipit" type="hidden" value="<?php echo $thisRandNum; ?>" />
<span id="PMStatus" style="color#F00"></span>
<br/><input name="pmSubmit" type="submit" value="Submit"/> or <a href="#" onclick="return false" onmousedown="javascript:toggleInteractContainers("private_message");">Close</a>
</form>
</div>

<script>
$('#pmForm').submit(function(){$('input[type=submit]',this).attr('disabled','disabled');});
function sendPM() {
	var pmSubject=$("#pmSubject");
	var pmTextArea=$("#pmTextArea");
	var sendername=$("#pm_sender_name");
	var senderid=$("#pm_sender_id");
	var recName=$("#pm_rec_name");
	var recID=$("#pm_rec_id");
	var pm_wipit=$("pmWpit");
	var url="scripts_for_profile/private_msg_parse.php";
	if(pmSubject.val()==""){
	$("#interactionResults").html('<img src="images/round_error.png" alt="Error" width="31" height="30"/> &nbsp; Please type a subject.').show().fadeOut(6000);
	} else if (pmTextArea.val()==""){
	$("#interactionResults").html('<img src="images/round_error.png" alt="Error" width="31" height="30"/> &nbsp; Please type a subject.').show().fadeOut(6000);
	} else {

	}
}
</script>