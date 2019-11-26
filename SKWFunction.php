<?php
function mres($value){
		$search = array("\\", "\x00", "\n", "\r", "'", '"', "\x1a");
		$replace = array("\\\\", "\\0", "\\n", "\\r", "\\'", '\\"', "\\z");
		return str_replace($search, $replace, $value);
	}
    
?>