<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/* Input Cleansing/Sterilization */
function protect($string)
{
	$string = (htmlentities($string, ENT_QUOTES));
	return $string;
}
?>