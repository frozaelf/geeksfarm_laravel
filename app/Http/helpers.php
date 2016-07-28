<?php
	function createdirYmd($path="")
	{
			if(!file_exists($path."/".date("Y"))) {
				mkdir($path."/".date("Y"), 0777,true);
				chmod($path."/".date("Y"), 0777);
			}
			if(!file_exists($path."/".date("Y")."/".date("m"))) {
				mkdir($path."/".date("Y")."/".date("m"), 0777,true);
				chmod($path."/".date("Y")."/".date("m"), 0777);
			}
			if(!file_exists($path."/".date("Y")."/".date("m")."/".date("d"))) {
				mkdir($path."/".date("Y")."/".date("m")."/".date("d"), 0777,TRUE);
				chmod($path."/".date("Y")."/".date("m")."/".date("d"), 0777);
			}
	}
?>