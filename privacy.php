
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
					<h3 style="padding-bottom:5px; font-size:28px; padding-top:10px; line-height:30px;">Privacy Policies</h3>
                   
                  
                  
                  
                
        
                 
        <p>  This privacy policy has been compiled to better serve those who are concerned with how their 'Personally identifiable information' (PII) is being used online. Please read our privacy policy carefully to get a clear understanding of how we collect, use, protect or otherwise handle your Personally Identifiable Information in accordance with our website.
</p>
<br>
<h2>
What personal information do we collect from the people that visit our blog, website?
</h2>
<br>
<p>
When ordering or registering on our site, as appropriate, you may be asked to enter your name, email or other details to help you with your experience.
</p>
<br>
<h2>
When do we collect information?
</h2>
<br>
<p>
We collect information from you when you register on our site or enter information on our site.
</p>
<br>
<h2>
How do we use your information? 
</h2><br>
<p>
We may use the information we collect from you when you register, make a purchase, sign up for our newsletter, respond to a survey or marketing communication, surf the website, or use certain other site features in the following ways:
     <br>&nbsp;&nbsp; • &nbsp;To personalize user's experience and to allow us to deliver the type of content and product offerings in which you are most interested.
      <br>&nbsp;&nbsp; • &nbsp;To improve our website in order to better serve you.
      <br>&nbsp;&nbsp; • &nbsp;To allow us to better service you in responding to your customer service requests.
</p>
<br><h2>How do we protect visitor information?
</h2><br>

<p>We do not use vulnerability scanning and/or scanning to PCI standards.
<br>
We use regular Malware Scanning.
<br>We do not use an SSL certificate
    <br>&nbsp;&nbsp;  •&nbsp; We only provide articles and information, we never ask for personal or private information like  credit card numbers.</p>
<br>
<h2>Do we use 'cookies'?</h2>
<br>
<p>We do use cookies for tracking purposes</p> 
<p>
You can choose to turn off all cookies. You do this through your browser (like Internet Explorer) settings. Each browser is a little different, so look at your browser's Help menu to learn the correct way to modify your cookies.
</p><P>
If you disable cookies off, some features will be disabled that make your site experience more efficient and some of our services will not function properly.</P>
<br>


<h2>Third Party Disclosure</h2>
<br>
<p>
We do not sell, trade, or otherwise transfer to outside parties your personally identifiable information unless we provide you with advance notice. This does not include website hosting partners and other parties who assist us in operating our website, conducting our business,  so long as those parties agree to keep this information confidential. We may also release your information when we believe release is appropriate to comply with the law.
</p><br>
<h2>According to CalOPPA we agree to the following:</h2>
<p>
<br>Users can visit our site anonymously
<br>Once this privacy policy is created, we will add a link to it on our home page, or as a minimum on the first significant page after entering our website.
<br>Our Privacy Policy link includes the word 'Privacy', and can be easily be found on the page specified above.
<br>
Users will be notified of any privacy policy changes:
    <br>&nbsp;&nbsp; • &nbsp;On our Privacy Policy Page
Users are able to change their personal information:
      <br>&nbsp;&nbsp; • &nbsp; By logging in to their account

<br></p><br>
<h2>Does our site allow third party behavioral tracking?</h2>
<br>It's also important to note that we do not allow third party behavioral tracking
<br><br>
<h2>COPPA (Children Online Privacy Protection Act)</h2>
<p>
<br>When it comes to the collection of personal information from children under 13, the Children's Online Privacy Protection Act (COPPA) puts parents in control. The Federal Trade Commission, the nation's consumer protection agency, enforces the COPPA Rule, which spells out what operators of websites and online services must do to protect children's privacy and safety online.
We do not specifically market to children under 13.
</p>
<br>
<h2>CAN SPAM Act</h2>
<p>
<br>The CAN-SPAM Act is a law that sets the rules for commercial email, establishes requirements for commercial messages, gives recipients the right to have emails stopped from being sent to them, and spells out tough penalties for violations.
<b>We collect your email address in order to:
</b>
<b>
To be in accordance with CANSPAM we agree to the following:
</b>
<br><b>If at any time you would like to unsubscribe from receiving future emails, you can email us at</b>
and we will promptly remove you from <b>ALL</b> correspondence.
</p>

<br><h2>Contact Us</h2>

<p>If there are any questions regarding this privacy policy you may contact us using the information below.
<br><a href="index.php">Foxycare.com</a>
<br>Foxycare00@gmail.com
<br>
Last Edited on 2015-09-04
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