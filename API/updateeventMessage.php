<?php
require('../Config.php');
require('db.class.php');
$type = $_POST['type'];
if (isset($type) && $type=='delete') {
	$id = $_POST['id'];
	try {	
        $sql = "delete from system_message where id=".$id;
		$db->query($sql);
		echo "{\"status\":1,\"message\":\"Thành công rồi, hãy refresh lại trình duyệt\"}";
    } catch (Exception $e) {
        echo "{\"status\":0,\"message\":\"" . $e->getMessage() . "\"}";
    }
} else if (isset($type) && $type=='add') {
	$title = $_POST['title'];
	$content = $_POST['content'];
	$dateBegin = $_POST['dateBegin']." 00:00:00";
	$dateEnd = $_POST['dateEnd']." 23:59:59";
	$gsm = $_POST['gsm'];
	$cp14 = $_POST['cp14'];
	$cp16 = $_POST['cp16'];
	$vmgs = $_POST['vmgs'];
	$os_type = $_POST['os_type'];
	try {	
		$notcp = "";
		if($vms == 1)
			$notcp .= "vms,";
		if($cp14 == 1)
			$notcp .= "cp14,";
		if($cp16 == 1)
			$notcp .= "cp16,";
		if($vmgs == 1)
			$notcp .= "vmgs,";
		if($gsm == 1)
			$notcp .= "gsm,";
		if(strlen($notcp)>0)
			$notcp = substr($notcp, 0, -1);
	    
	    $sql =  "insert system_message(status,content, date_begin, date_end, not_cp, os_type) values(1,'".mysql_escape_string($title."@@@".$content)."','".$dateBegin."','".$dateEnd."','".$notcp."', '".$os_type."')";
		$db->query($sql);
		echo "{\"status\":1,\"message\":\"Thành công rồi, hãy refresh lại trình duyệt\"}";
    } catch (Exception $e) {
        echo "{\"status\":0,\"message\":\"" . $e->getMessage() . "\"}";
    }	
}
    
?>
