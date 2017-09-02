﻿<?php
//TheFreeElectron 2015, http://www.instructables.com/member/TheFreeElectron/
//This page is requested by the JavaScript, it updates the pin's status and then print it
//Getting and using values
if (isset ( $_GET["pic"] )) {
	$pic = strip_tags ($_GET["pic"]);
	
	//test if value is a number
	if ( (is_numeric($pic)) && ($pic <= 16) && ($pic >= 0) ) {
		$pin_array = array(0,2,3,6,7,8,9,15,16,21,24,28,30,31,0,0);
		//set the gpio's mode to output		
		system("gpio mode ".$pin_array[$pic]." out");
		//reading pin's status
		exec ("gpio read ".$pin_array[$pic], $status, $return );
		//set the gpio to high/low
		if ($status[0] == "0" ) { $status[0] = "1"; }
		else if ($status[0] == "1" ) { $status[0] = "0"; }
		system("gpio write ".$pin_array[$pic]." ".$status[0] );
		//reading pin's status
		exec ("gpio read ".$pin_array[$pic], $status, $return );
		//print it to the client on the response
		echo($status[0]);
	}
	else { echo ("fail"); }
} //print fail if cannot use values
else { echo ("fail"); }
?>
