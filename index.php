<?php
	session_start();
	
	require("conection/connects.php");
	
	$msg="";
	if(isset($_POST['btn_log'])){
		$uname=$_POST['unametxt'];
		$pwd=$_POST['pwdtxt'];
		
		$sql=mysqli_query($db,"SELECT * FROM users_tbl
								WHERE username='$uname' AND password='$pwd' 
								
							");
						
		$cout=mysqli_num_rows($sql);
			if($cout>0){
				$row=mysqli_fetch_array($sql);
				$_SESSION['uname'] =$row['username'];
				$_SESSION['pass'] =$row['password'];
				
					if($row['type']=='admin')
						$msg="UNILAG School Admin!.....";	
					else
						header("location: everyone.php");
					
			}
			
			else
					$msg="Login Username and Password Wrong......";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>::. Kogi State Polytechnic.::</title>
<link rel="stylesheet" type="text/css" href="css/login.css" />
</head>

<body>
	<form method="post">
    	<fieldset>
        	<fieldset></fieldset>
            	<div id="login_back" style="width: 100%;">
        			<div  id="msg">
                    <h1 style="text-align: center; color: blue; margin-bottom:50px;"> KOGI STATE POLYTECHNIC ONLINE ASSIGNMENT SUBMISSION SYSTEM</h1>
        			</div>
                    
                    <div id="login_form">
                    	<label for="login">Username:</label>
                    	<input type="text" class="fields" name="unametxt" title="Enter username here"  />
                        <div class="clear"></div>
                        <label for="login">Password:</label>
                        <input type="password" class="fields" name="pwdtxt"  title="Enter Password here"  autocomplete="off"/>
                        <div class="clear"></div>
                        <input type="submit" class="button" name="btn_log" value="Log in" />	
                       
                                            
                    </div>
                    
                       <a href="indexs.php" class="button">For Student Login </a> 

        		</div>
    	</fieldset>
    </form>
	<h2 style="color:#00F;" align="center">
	<?php echo $msg; ?>
	</h2>
</body>
</html>