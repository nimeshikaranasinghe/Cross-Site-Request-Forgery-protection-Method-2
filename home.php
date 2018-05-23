<?php
	
	if(isset($_POST['username'],$_POST['password'])){
		$uname = $_POST['username'];
		$pwd = $_POST['password'];
		
		if($uname == 'nimeshika' && $pwd == '12345'){
			echo "<h2>";
			echo 'You have Successfully logged in!';
			echo "</h2>";			
			
			session_start();
			$_SESSION['csfr_token'] = base64_encode(openssl_random_pseudo_bytes(32));
			$session_id = session_id();
			setcookie('session_Cookie',$session_id,time()+60*60*24*365,'/');
			setcookie('csrf_Cookie',$_SESSION['csfr_token'],time()+60*60*24*365,'/');
		}	
			
		else{
			echo "<h2>";
			echo 'Invalid Credentials! Try Again!';
			echo "</h2>";
			exit();
		}		
	}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cross Site Request Forgery Protection</title>
        <link rel="stylesheet" type="text/css" href="all_styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
		<script>		    
            $(document).ready(function(){	
            	var name = "csrf_Cookie" + "=";
                var cookie_value = "";
                var decodedCookie = decodeURIComponent(document.cookie);
                var ca = decodedCookie.split(';');

                for(var i = 0; i <ca.length; i++) {
                    var c = ca[i];
                    
                    while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                       cookie_value = c.substring(name.length, c.length);
                       document.getElementById("token_to_be_added").setAttribute('value', cookie_value) ;
                    }
                }	
            });
                    
                /*var xhttp;
                xhttp = new XMLHttpRequest();
                
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("token_to_be_added").setAttribute('value', this.responseText);
                    }   
                };
        
                xhttp.open("GET", "csrf_token_generator.php", true);
                xhttp.send(); 
                       
            });		*/	
        </script>        
    </head>
   
    <body>
        <div id="parent">
        <form action="updated_post.php" method="post" id="form_login">          
            <br>  <h1>Write Something...</h1>
            <br> <br>
            
            <div class="credentials">
                    Post: <input type="text" name="postContent">
            </div>
            
            <br>
            <input type="Submit" value="Update Post">
            
            <div id="div1">
                <input type="hidden" name="csrf_token" value="" id="token_to_be_added"/>
            </div>           
        </form>
        </div>
    </body> 
</html>
