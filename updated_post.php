<?php

require_once 'validate_token.php';


$val = $_POST["csrf_token"];


if(isset($_POST['postContent'])){
	if(token::checkToken($val,$_COOKIE['csrf_Cookie'])){
		echo "<h2>";
		echo "Hello there! ".$_POST['postContent'];	
		echo "</h2>";	
	}
	
	else{
		echo "<h2>";
		echo "Wrong".$_COOKIE['csrf_Cookie'];
		echo "</h2>";
	}
}

?>