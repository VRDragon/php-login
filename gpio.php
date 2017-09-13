<?php
if (isset ( $_GET["pic"] )) {
	$pic = strip_tags ($_GET["pic"]);
	
	//test if value is a number
	if ( (is_numeric($pic)) && ($pic <= 16) && ($pic >= 0) ) {
		$pin_array = array(14,11,10,6,5,4,1,15,8,9,7,0,2,3,12,13);
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
