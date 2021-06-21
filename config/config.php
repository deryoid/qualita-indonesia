<?php 
	function base_url($url = null){
		$base_url = "http://localhost/qualita-indonesia";
		if ($url != null) {
			return $base_url."/".$url;
		}else{
			return $base_url;
		}
	}
	session_start();
	date_default_timezone_set('Asia/Makassar');
 ?>