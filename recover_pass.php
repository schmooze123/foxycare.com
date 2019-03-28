
<?php
	error_reporting(0);
 				//session_start();
				include 'core/connectdb.php';
				include 'core/login.inc.php';
				include 'core/reg.inc.php';
			
			

?>
<?
$sql = mysql_query("SELECT * FROM `posts` WHERE `id`='".$_GET['post']."'");
		
		$fetchu = mysql_fetch_assoc($sql);
		$id = $fetchu['id'];
		$station_id = $fetchu['station_id'];
		$uid = $fetchu['uid'];
		$headline = $fetchu['headline'];
		$category = $fetchu['category'];
		$desc = $fetchu['desc'];
		$datetime = $fetchu['datetime'];

	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Password Recovery | Foxycare</title>
	<link rel="shortcut icon" type="image/x-icon" href="css/images/iconFC.png" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
	
	
	<!--[if lt IE 9]>
		<script src="js/modernizr.custom.js"></script>
	<![endif]-->
	
	
    <script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>


</head>
<body>
<?
$sql2 = mysql_query("SELECT * FROM `background` ORDER BY `id` DESC");
$fetch_bg = mysql_fetch_assoc($sql2);
?>
	<!-- wrapper -->
	<div id="wrapper">
		<!-- header -->
		<div class="header" style="height:128px; background-image:url(<? echo $fetch_bg['img']?>)">
			<!-- shell -->
			<div class="shell">
				<h1 id="logo"><a href="index.php">FoxyCare</a></h1>
				
				<!-- header-right -->
				<div class="header-right">
					<div class="subscribe">
						<a href="#"><span></span><? if(!empty($_SESSION['id'])){?>Subscribed<? }else{ echo 'Subscribe'; }?></a>
                        
					</div>
					<div class="socials">
                    
							<a href="https://www.facebook.com/foxycare" target="_blank" class="facebook-ico">facebook</a>
						<a href="https://twitter.com/foxy_care" target="_blank" class="twitter-ico">twitter</a>
					</div>
					<div class="cl">&nbsp;</div>
				</div>
				<div class="cl">&nbsp;</div>
				<!-- end of 
-money
-motivation -->
				<!-- navigation -->
				<nav id="navigation">
					<ul>
						<li><a href="category.php?cat=31">Skin</a></li>
                        <li><a href="category.php?cat=30">Face</a></li>
                        <li><a href="category.php?cat=29">Fitness &amp; Gym</a></li>
						
						
						<li><a href="category.php?cat=28">Sport</a></li>
						<li><a href="category.php?cat=27">Yoga</a></li>
						<li><a href="category.php?cat=26">Fashion</a></li>
                      
                        <li><a href="about_us.php">About us</a></li>
						<li><a href="contactus.php">Contact Us</a></li>
					</ul>
				</nav>
				<!-- end of navigation -->
				
			</div>
			<!-- end of shell -->
		</div>
		<!-- end of header -->
		<!-- main -->
		<div class="main">
			<div class="shell">
				 <div style="min-height:20px; width:100%; margin-bottom:15px; border:px solid #000;">
                 	
                    <style>
					.menu li {
						font-family:Roboto,trebuchet ms,serif !important;
						font-size:16px; float:left; list-style:none;  line-height:10px; border-right:1px solid #ccc; text-align:center; padding:5px; padding-left:10px; padding-right:10px; margin-top:10px;}
					
					</style>
                      <ul class="menu" style=" padding-bottom:15px;">
                      <li>Categories</li>
                     
                       <?
$sql2 = mysql_query("SELECT * FROM `category` ORDER BY `id` DESC");
while($fetch1 = mysql_fetch_assoc($sql2)){
	echo '<a href="category.php?cat='.$fetch1['id'].'" style="padding:5px;"><li>',$fetch1['name'], '</li> </a> ';
	
		
	
}
?>
<a href="latest_questions.php" style="padding:5px;"><li>Latest Question</li></a>
                               <a href="full_post.php" style="padding:5px;"> <li>More Posts</li></a>
</ul>
                 </div>
				<!-- content -->
				<div class="content" style="clear:both;">
                <div id="mainBody">
                
                   
                    <script>
  function recover(){
	var recover = $('#recover_email').val();
	window.location = "forgotten_password.php?email="+recover;  
  }
  </script>
           <div id="rightbar">
        <? if(!empty($_GET['user'])){
	
				include 'core/connectdb.php';
	//$sql1 = mysql_query("SELECT * FROM `users` WHERE `id`='".$_GET['user']."'");
	$sql1 = mysql_query("SELECT * FROM `forgotten_pass` WHERE `uid`='".$_GET['user']."' ORDER BY `id` DESC");
	$rows = mysql_fetch_assoc($sql1);
	 $p_uid = $rows['uid'];
	 $passcode = $rows['passcode'];
	 if($p_uid == $_GET['user'] & $passcode == $_GET['recover'] ){
		 
	 
	
				?>
                  <table id="passContainer" cellpadding="5" cellspacing="5" style="margin-top:20px; width:90%;  " align="center">
    
    	<tr style="">
        <td><input  id="recoverpass" onfocus="emptyElement('status')"  placeholder="Enter password" type="password"  style="height:35px;  border:1px solid #ccc;  font-family:Roboto,trebuchet ms,serif !important; font-size:15px; width:80%; background:#FFF;"/></td>
          
    	</tr>
       <tr style="">
        <td><input  id="recovereenterpass" onfocus="emptyElement('status')"  placeholder="Re-enter password" type="password"  style="height:35px;  border:1px solid #ccc;  font-family:Roboto,trebuchet ms,serif !important; font-size:15px; width:80%; background:#FFF;"/></td>
          
    	</tr>
       
            <tr>
            <td align="center">
              <div id="status" style="margin-bottom:5px; color:#F00; font-family:rosemary; font-size:14px; "></div>
              <input id="loginbtn" align="absmiddle" onclick="submitcode(<? echo $_GET['user']?>)" style="height:45px; width:150px;  float:right; font-family:Roboto,trebuchet ms,serif !important; font-size:14px; background-image:url(css/images/red-btn.png); background-size:100% 105%; border:0; background-color:transparent; color:#FFF; margin-right:20%;  "   type="button"  value="Submit" /></td>
        </tr>
       
         </table>
         <table cellpadding="5" cellspacing="5" style="width:90%; " align="center">
         	<tr>
            	<td id="recover_status" style="font-family:Roboto,trebuchet ms,serif !important; font-size:16px; "></td>
            </tr>
         </table>
                <?
				}else{
					header("Location: index.php");
				}	
			}
			?>
              <script>
		   function submitcode(id){
			   var recoverpass = $('#recoverpass').val();
			    var repass = $('#recovereenterpass').val();
			 $.post("recover_passwrd.php", {id: id, recoverpass: recoverpass, repass: repass }, function(data){
				if(data == 1){
					$('#passContainer').html("");
					$('#recover_status').html("Password Change Sucessfully!");
				}else{
					$('#recover_status').html("Unsucessfull");
				}
			 });
		   }
		   </script>
                   </div>
               </div>
          
             <script type="text/javascript">
	function emptyElements(x){
		document.getElementById('statu').innerHTML = "";	
	}
		function submitForm(){
			var x = new XMLHttpRequest();
			var url = "fullnews_parser.php";	
			var newsid = <? echo $_GET['post']; ?>;
			var ldesc = document.getElementById('longdesc').value;
			var embed = document.getElementById('embed').value;
			var title = document.getElementById('title').value;
			if( newsid == 0 || ldesc == "" & embed == "" & title == "" ){
			
				document.getElementById('statu').innerHTML = "Fill out all of the data form.";
				return false;	
				
			}else{
				document.getElementById('submitbtn').disabled = true;
				document.getElementById('statu').innerHTML = 'Please wait...';
				
				var vars = "newsid="+newsid+"&ldesc="+ldesc+"&embed="+embed+"&title="+title;
				
				x.open("POST", url, true);
				x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				x.onreadystatechange = function() {
					if(x.readyState == 4 && x.status == 200){
						var return_data = x.responseText;
						if(x.responseText == "error_msg"){
							document.getElementById('statu').innerHTML = "Something Missing.";	
							document.getElementById('submitbtn').disabled = false;
						}else {
								
							$('#mainBody').append(return_data);
							
							document.getElementById('statu').innerHTML = '';
							$('#longdesc').val("");
							$('#embed').val("");
							$('#title').val("");
							document.getElementById('submitbtn').disabled = false;
						}
					}
				}
				x.send(vars);
			}
		}
		</script>





           
				</div>
                
                
                
				<!-- end of content -->
                <style>
				.textBox{
					height:30px; width:94%; margin:3px;	
				}
				</style>
                 <script type="text/javascript">
	function emptyElement(x){
		document.getElementById('status').innerHTML = "";	
	}
		function login(){ 
			var x = new XMLHttpRequest();
			var e = document.getElementById('email1').value;
			var p = document.getElementById('password').value;
			var url = "core/login.inc.php";	
			if(e == "" || p == ""){
				document.getElementById('status').innerHTML = "Some Data Missing! Please Check..."
			}else{
				document.getElementById('loginbtn').disabled = true;
				document.getElementById('status').innerHTML = '<img src="images/ajax-loader.gif" />';
				
				var vars = "emailid="+e+"&password="+p;
				x.open("POST", url, true);
				x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				x.onreadystatechange = function() {
					if(x.readyState == 4 && x.status == 200){
						var return_data = x.responseText;
						if(x.responseText == "login_failed"){
							document.getElementById('status').innerHTML = "Please Check Your Email Id or Password";	
							document.getElementById('loginbtn').disabled = false;	
						}else {
							window.location = "post.php?post=<? echo $_GET['post'];?>";	
						}
					}
				}
				x.send(vars);
			}
		}
	
	</script>
				<!-- sidebar -->
				<aside class="sidebar">
                <?
				if(empty($_SESSION['id'])){
				?>
					<div class="widget">
						<div class="facebook-social">
						   <form id="loginform" onsubmit="return false;" style="" >
                            <input  id="email1" onfocus="emptyElement('status')" class="textBox" type="text" style="text-align:center; height:40px; border:1px solid #ccc;" placeholder="Email">
                            <input id="password" 
            onfocus="emptyElement('status')" class="textBox" style="text-align:center; border:1px solid #ccc; height:40px;" type="password" placeholder="Password">
                            <p style="margin-left:3px;">Forgotten Password?</p>
                            <div style="height:170px; width:95%; border:px solid #ccc; margin:3px;"><input id="loginbtn" align="absmiddle" onclick="login()" type="button" style="float:right; font-family:Roboto,trebuchet ms,serif !important; font-size:14px; background-image:url(css/images/red-btn.png); background-size:100% 105%; border:0; background-color:transparent; color:#FFF; height:50px; width:120px;" value="Log In">
                            </form>
                            <p id="status"></p>
                             <p style="margin-left:3px; font-family:Roboto,trebuchet ms,serif !important; padding-top:20px; font-size:16px; clear:both; text-align:center; float:none;">New on FoxyCare? <b style="color:#ff9031;">Sign Up Now</b></p>
                            </div>
                            
						</div>
					</div>
                    <?
				}
					?>
                     
 <script type="text/javascript">
	function emptyElements(x){
		document.getElementById('statu').innerHTML = "";	
	}

		function register(){
			var x = new XMLHttpRequest();
			var urls = "core/reg.inc.php";	
			var fstnm = document.getElementById('name').value;
			var lstnm = document.getElementById('last').value;
			var email = document.getElementById('email').value;
			var pass = document.getElementById('pass').value;
			
			
			
			
			if(fstnm == "" || email == "" || pass == ""  ){
			
				document.getElementById('statu').innerHTML = "Fill out all of the data form.";
				return false;	
				
			}else{
				document.getElementById('signbtn').disabled = true;
				document.getElementById('statu').innerHTML = '<img src="css/images/ajax-loader.gif" />';
				
				var regvars = "fstnm="+fstnm+"&lstnm="+lstnm+"&email="+email+"&pass="+pass;
				
				x.open("POST", urls, true);
				x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				x.onreadystatechange = function() {
					if(x.readyState == 4 && x.status == 200){
						var return_data = x.responseText;
						if(x.responseText == "email_taken"){
							document.getElementById('statu').innerHTML = "This Email id is already taken.";	
							document.getElementById('signbtn').disabled = false;
						}else if(x.responseText == "more_strong_pass"){
							document.getElementById('statu').innerHTML = "Need More Strong Password";	
							document.getElementById('signbtn').disabled = false;
						}else if(x.responseText == "valid_email"){
							document.getElementById('statu').innerHTML = "Please Enter Valid Email Id";	
							document.getElementById('signbtn').disabled = false;
						}else if(x.responseText == "enter_pass"){
							document.getElementById('statu').innerHTML = "Please enter Password.";	
							document.getElementById('signbtn').disabled = false;
						}else if(x.responseText == "enter_fstnm"){
							document.getElementById('statu').innerHTML = "Please enter firstname";	
							document.getElementById('signbtn').disabled = false;
						}else if(x.responseText == "enter_lstnm"){
							document.getElementById('statu').innerHTML ="Please enter Lastname";	
							document.getElementById('signbtn').disabled = false;
						}else {
						
							window.location = "index.php";	
						}
					}
				}
				x.send(regvars); 
			} 
		}
		</script>
          <?
				if(empty($_SESSION['id'])){
				?>
                
                    <div class="widget" style="margin-top:-40px;">
						<div class="facebook-social">
							 <form id="signupform"  onsubmit="return false;"  >
                             <input id="name" class="textBox" type="text" onkeypress="return onlyAlphabets(event,this);" maxlength="150"   onfocus="emptyElements('statu')" style="text-align:center; height:38px; border:1px solid #ccc;" placeholder="First Name">
                             <input id="last" class="textBox" type="text" onkeypress="return onlyAlphabets(event,this);" maxlength="150"   onfocus="emptyElements('statu')" style="text-align:center; height:38px; border:1px solid #ccc;" placeholder="Last Name">
                            <input id="email" onkeypress="return onlyAlphabets(event,this);"   maxlength="150"   onfocus="emptyElements('statu')" class="textBox" type="text" style="text-align:center; height:38px; border:1px solid #ccc;" placeholder="Email">
                           
                            <input id="pass"   maxlength="20"   onfocus="emptyElements('statu')" class="textBox" style="text-align:center; height:38px; border:1px solid #ccc;" type="password" placeholder="Password">
                        
                            <div style="height:85px; width:95%; border:px solid #ccc; margin:3px;">
                            <input value="Sign Up" onclick="register()" id="signbtn" type="button" style="float:right; background-image:url(css/images/red-btn.png); background-size:100% 103%; border:0; background-color:transparent; color:#FFF; height:44px; width:120px;">
                            <p id="statu"></p>
                            </form>
                            </div>
                            
						</div>
                        
               
					</div>
                             <?
				}
						?>
                        <?
						if(!empty($_SESSION['id'])){
						?>
                        <div class="widget">
						<div class="facebook-social">
						<?
$sql1 = mysql_query("SELECT * FROM `users` WHERE `id`='".$_SESSION['id']."'");
$fetch = mysql_fetch_assoc($sql1);
?>
                           <p align="" style="margin-bottom:0px; margin-top:5px; color:#ff9031;  font-family:angelface; font-size:36px;">Welcome, </p>
                             <p align="left" style="margin-bottom:10px; line-height:40px; color:#ff9031;  font-family:angelface; font-size:36px;"><? echo $fetch['name'] ?> <? echo $fetch['lastnm'] ?> </p>
                            <style>
							.list li{
								list-style:inside;
								font-family:'museo', arial, helvetica, serif;
								font-size:16px;
								margin:5px;
								color:#c73331;
							}
							</style>
                            <div style="height:180px; width:95%; border:px solid #ccc; margin:3px;">
                           <ul class="list">
                         <? if($_SESSION['id'] == 5){?>
                         <a href="admin_panel.php">  <li>Admin Panel</li></a><? } ?>
                           		<a href="favourite.php"><li>Favourite Posts</li></a>
                                <a href="questions.php"><li>My Questions</li></a>
                                <a href="latest_questions.php"><li>Latest Question</li></a>
                               <a href="full_post.php"> <li>More Posts</li></a>
                                <a href="logout.php"><li>Logout</li></a>
                                
                           </ul>
                             
                            </div>
                            
						</div>
					</div>
                        <?
						}
						
						?>
                      <div style="min-height:400px; width:96%; margin:3px; margin-top:0px;  background-image:url(css/images/facebook-box.png); background-position:center; background-size:120% 120%; ">
                     <p align="center" style=" padding-top:30px; color:#ff9031;   font-family:angelface; padding-bottom:5px; font-size:56px;">Latest Question </p>
                      <?
					$sql1 = mysql_query("SELECT * FROM `follow_ques`  ORDER BY `id` DESC LIMIT 10 ");

		
		while($fetchs = mysql_fetch_assoc($sql1)){
			 $post_id = $fetchs['ques_id'];
			$sql = mysql_query("SELECT * FROM `question` WHERE `id`='".$post_id."' ");
			$fetchu = mysql_fetch_assoc($sql);
		$id = $fetchu['id'];
		
		$uid = $fetchu['uid'];
		$question = $fetchu['question'];
		$category = $fetchu['cat'];
		
		$datetime = $fetchu['datetime'];
		
		  
$sql2 = mysql_query("SELECT COUNT(*) FROM `answer` WHERE `ques_id` = '".$post_id."'");
$fetch1 = mysql_fetch_array($sql2);
		$total = $fetch1[0];


		
		$sql2 = mysql_query('SELECT `thumb_img` FROM `fullnews` WHERE  `thumb_img` != "" && `newid`="'.$id.'" ');
		$rows = mysql_fetch_assoc($sql2);
		

			echo '<div class="entrys" id="'.$fetchs['id'].'" style="padding:15px; font-family:Roboto,trebuchet ms,serif !important; font-size:14px; padding-bottom:5px;">
						
						
						<div class="cnt">
							<a href="answers.php?ans='.$id.'"><h4>Q. '.$question.'</h4></a>
							<p><b>No of Answers: '.$total.'</b><br></p>
							<a href="answers.php?ans='.$id.'"><p>Answer it</p></a>
						</div>
					</div>';
					
		
			
					
					
				
		}
	
?>
                    </div>
				</aside>
				<!-- end of sidebar -->
				<div class="cl">&nbsp;</div>
			</div>
		</div>
		<!-- end of main -->
		<div id="footer-push"></div>
	</div>
	<!-- end of wrapper -->
	
</body>
</html>