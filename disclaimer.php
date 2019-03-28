
<?php
	error_reporting(0);
 				//session_start();
				include 'core/connectdb.php';
				include 'core/login.inc.php';
				include 'core/reg.inc.php';
			
			

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Privacy Policies</title>
	<link rel="shortcut icon" type="image/x-icon" href="css/images/iconFC.png" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
	
	
	<!--[if lt IE 9]>
		<script src="js/modernizr.custom.js"></script>
	<![endif]-->
	
	
    <script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>

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
						<a href="contactus.php"><span></span>Contact Us</a>
                        
					</div>
					<div class="socials">
                    
							<a href="https://www.facebook.com/foxycare" target="_blank" class="facebook-ico">facebook</a>
						<a href="https://twitter.com/foxy_care" target="_blank" class="twitter-ico">twitter</a>
					</div>
					<div class="cl">&nbsp;</div>
				</div>
				<div class="cl">&nbsp;</div>
				
				<!-- navigation -->
				<nav id="navigation">
					<ul>
						<li><a href="category.php?cat=29">Fitness &amp; Gym</a></li>
						<li><a href="category.php?cat=35">Relationship</a></li>
                        <li><a href="category.php?cat=38">Health</a></li>
                        <li><a href="category.php?cat=27">Yoga</a></li>
                        <li><a href="disclaimer.php">Disclaimer</a></li>
                        <li><a href="privacy.php">Privacy Policy</a></li>
                        <li><a href="about_us.php">About</a></li>
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
                      <ul class="menu" style=" padding-bottom:15px; clear:both; float:none;">
                      <li style="color:#666">Categories</li>
                      
                       <?
$sql2 = mysql_query("SELECT * FROM `category` WHERE `id` != '' ORDER BY `id` DESC ");
while($fetch1 = mysql_fetch_assoc($sql2)){
	
	echo '<li><a href="category.php?cat='.$fetch1['id'].'" style="padding:5px;">',$fetch1['name'], '</a></li>';
	
		
	
}
?>
<li><a href="latest_questions.php" style="padding:5px;">Latest Question</a></li>
<li><a href="full_post.php" style="padding:5px;">More Posts</a></li>
</ul>
                 </div>
				<!-- content -->
                  <?
$sql22 = mysql_query("SELECT * FROM `category` WHERE `id` = '".$category."'");
$fetch22 = mysql_fetch_assoc($sql22);
	
?>
				<div class="content" style="clear:both;">
                <div id="mainBody">
                 <style>
				 	p{
						color:#333;
						font-size:14px;
					}
					h2{
						color:#000
					}
				 
				 </style>
					<h3 style="padding-bottom:5px; font-size:28px; padding-top:10px; line-height:30px;">Disclaimer</h3>
                   
                  
                  
                  
                <p>
        
                 
    FoxyCare.Com is  providing  random Health/Beauty information and Tips. FoxyCare.Com is non-commercial website. The post, articles in website is only for information purpose. The post, articles, in the website not promised  to be complete or up to date.<br>
The information is only for provide benefits . This information is not  develop by the website , its collected from many free source  like-the knowledge of author, internet, websites(free).<br>
FoxyCare.Com is not taking responsibility for any claim,damage. We(FoxyCare.Com)  just  providing  free tips for benefit purpose only and these information is not medical information.<br><br>
<h2>(Please read carefully term and condition in this disclaimer.)</h2><br>
<h2>Image usage</h2> <br>
We (FoxyCare.Com) using image and pictures are copyrighted to respective owners as well as not licensed  image and pictures. Others all image and pictures in the website taken from many free source in web(Like -google advance search ),who Giving permission to use their images.<br>
If you see(copyrighted image without permission to their owner ) please contact us, we will happilly  remove.
<br><br><h2><a href="index.php">Foxycare.com</a></h2>

                </p>   
                      
                    
                   
                 
				
      
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
						
							window.location = "signup.php?uid="+return_data;	
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
                      <style>
						.menu li {
							list-style:none;
							float:left;
							font-size:14px;
							color:#666;
							line-height:5px;
						}
						
					</style>
                    <ul class="menu" style="font-size:14px;">
                    	<li><a href="disclaimer.php" >Disclaimer</a></li>
                    	<li><a href="privacy.php">Privacy</a></li>
                        <li><a href="about_us.php">About Us</a></li>
                    	<li style="border-right:0;"><a href="contactus.php">Contact Us</a></li>
                    </ul>
                    <p style="margin-top:10px; color:#ff9031;  padding-top:5px; font-size:14px; margin-bottom:50px; padding-bottom:50px; float:none; clear:both;">&nbsp;&nbsp;&nbsp;Foxycare &copy; 2015</p>
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