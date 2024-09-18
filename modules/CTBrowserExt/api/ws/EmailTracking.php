<?php
 /*+*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ***************************************************************************** */
chdir (dirname(__FILE__) . '/../../../../');
include_once 'includes/main/WebUI.php';
global $current_user,$adb,$root_directory,$log;

$email_id = $_REQUEST['email_id'];
$user_id = $_REQUEST['user_id'];
$mode = $_REQUEST['mode'];
$link = $_REQUEST['link'];

$usersSQL = $adb->pquery("SELECT * FROM vtiger_users WHERE id = ? AND deleted = 0",array($user_id));
if($adb->num_rows($usersSQL)){
	$time_zone = $adb->query_result($usersSQL,0,'time_zone');
	date_default_timezone_set($time_zone);
}

if($mode == 'Opened'){
	$datetime = date('Y-m-d H:i:s');
	$selectQuery = $adb->pquery("SELECT * FROM ctbrowser_email_tracking WHERE email_id =? AND user_id =? AND mode=?
                                         ORDER BY datetime DESC LIMIT 1", array($email_id,$user_id,$mode));								
	$selectQueryCount = $adb->num_rows($selectQuery);
	if($selectQueryCount){
		$datetime1 = $adb->query_result($selectQuery, 0, 'datetime');
		$datetime2 = date('Y-m-d H:i:s');
		$diffinSeconds = strtotime($datetime2) - strtotime($datetime1);
		if($diffinSeconds > 60){
			$insert = $adb->pquery("INSERT INTO ctbrowser_email_tracking (email_id,user_id,datetime,mode) VALUES(?,?,?,?)",array($email_id,$user_id,$datetime,$mode));
		}
	}else{
		$insert = $adb->pquery("INSERT INTO ctbrowser_email_tracking (email_id,user_id,datetime,mode) VALUES(?,?,?,?)",array($email_id,$user_id,$datetime,$mode));
	}

	$response = array('success'=>true,'message'=>'Details Saved successfully');
	echo json_encode($response);
	exit;
}

if($mode == 'Clicked'){
	$datetime = date('Y-m-d H:i:s');
	$selectQuery = $adb->pquery("SELECT * FROM ctbrowser_email_tracking WHERE email_id =? AND user_id =? AND mode=? AND link = ?
                                         ORDER BY datetime DESC LIMIT 1", array($email_id,$user_id,$mode,$link));								
	$selectQueryCount = $adb->num_rows($selectQuery);
	if($selectQueryCount){
		$datetime1 = $adb->query_result($selectQuery, 0, 'datetime');
		$datetime2 = date('Y-m-d H:i:s');
		$diffinSeconds = strtotime($datetime2) - strtotime($datetime1);
		if($diffinSeconds > 60){
			$insert = $adb->pquery("INSERT INTO ctbrowser_email_tracking (email_id,user_id,datetime,mode,link) VALUES(?,?,?,?,?)",array($email_id,$user_id,$datetime,$mode,$link));
		}
	}else{
		$insert = $adb->pquery("INSERT INTO ctbrowser_email_tracking (email_id,user_id,datetime,mode,link) VALUES(?,?,?,?,?)",array($email_id,$user_id,$datetime,$mode,$link));
	}
	header("Location:$link");
	$response = array('success'=>true,'message'=>'Details Saved successfully','link'=>$link);
	echo json_encode($response);
	exit;
}



	