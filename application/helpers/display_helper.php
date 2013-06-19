<?php
// ------------------------------------------------------------------------
	/*************************************************************
	* Convert String
	**************************************************************/
	function conv_str($argString, $type, $code) {
		switch($type){
			case 1:
				$search		= array("\r\n", "\r", "\n", '<', '>', '"', "'");
				$replace	= array($code['br'], $code['br'], $code['br'], "&lt;", "&gt;", "&quot;", "&#039;");
//				$search		= array("\r\n", "\r", "\n", '<', '>', '"', "'");
//				$replace	= array("", "", "", "&lt;", "&gt;", "&quot;", "&#039;");
				$argString	= str_replace($search, $replace, $argString);
				break;
			case 2:
				$search		= array($code['br'], "&lt;", "&gt;");
				$replace	= array('<br />', '<', '>');
				$argString	= str_replace($search, $replace, $argString);
				break;
			case 3:
				$search		= array($code['br'], "&lt;", "&gt;", "&quot;", "&#039;");
				$replace	= array("\n", '<', '>', '"', "'" );
				$argString	= str_replace($search, $replace, $argString);
				break;
			case 4:
				$search		= array('\r\n', '\r', '\n');
				$replace	= array('<br />', '<br />', '<br />');
				$argString	= str_replace($search, $replace, $argString);
				break;
			case 5:
				$search		= array("\r\n", "\r", "\n");
				$replace	= array('', '', '');
				$argString	= str_replace($search, $replace, $argString);
				break;
		}
		//
		return $argString;
	}
?>
