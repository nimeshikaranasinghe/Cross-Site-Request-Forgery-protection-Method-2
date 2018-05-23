<?php

class token {
   
	public static function checkToken($token,$cookie_csrf){
		
		echo "<script>alert('Done!');</script>";
		
		if($cookie_csrf == $token){
			return true;				
		}		
	}
}

?>