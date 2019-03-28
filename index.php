
<?php
	error_reporting(0);
 				session_start();
				
				
				include 'core/connectdb.php';
				include 'core/login.inc.php';
				include 'core/reg.inc.php';
			
		

?>
<?
$sql1 = mysql_query("SELECT * FROM `users` WHERE `id`='".$_SESSION['id']."'");
$fetch = mysql_fetch_assoc($sql1);
?>
<?
$sql2 = mysql_query("SELECT * FROM `background` ORDER BY `id` DESC");
$fetch_bg = mysql_fetch_assoc($sql2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Welcome to FoxyCare.Com | Newest and Updated Online Guide for Your Health and Beauty</title>
    <meta property="og:title" content="Welcome to FoxyCare.Com | Newest and Updated Online Guide for Your Health and Beauty" /> 
  <meta property="og:image" content="<? echo $fetch_bg['img']?>" /> 
  <meta property="og:description" content="If you are looking for great beauty, fashion related trick Each Day.
Foxycare sends you tips or tricks of high-end beauty related tips according to your need." /> 

<meta name="keywords" content="If you are looking for great beauty, fashion related trick Each Day. Foxycare sends you tips or tricks of high-end beauty related tips according to your need." />

	<link rel="shortcut icon" type="image/x-icon" href="css/images/iconFC.png" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
	
	<script src="js/jquery-1.8.0.min.js" type="text/javascript"></script>
	<!--[if lt IE 9]>
		<script src="js/modernizr.custom.js"></script>
	<![endif]-->
	<script src="js/jquery.flexslider-min.js" type="text/javascript"></script>
	<script src="js/functions.js" type="text/javascript"></script>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-65050715-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<script>

function countVisitor(){
	
		
			
			$.post("visitor.inc.php",{request: "countVisitor"  }, function(data){
				
			});
}
window.onload = countVisitor();
</script>
<body>

	<!-- wrapper -->
	<div id="wrapper">
		<!-- header -->
		<div class="header" style="background-image:url(<? echo $fetch_bg['img']?>); background-size:100% auto;">
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

				<!-- navigation                 -->
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
				<!-- slider-holder -->
				<div class="slider-holder">
					<span class="left"></span>
					<span class="right"></span>
					<!-- flexslider -->
					<div class="big-slider">
						<ul class="slides">
                        <?
						$sql3 = mysql_query("SELECT * FROM `posts` WHERE `slider`='1' ");
						while($rowz = mysql_fetch_assoc($sql3)){
							$head =  $rowz['headline'];	
							$cate = $rowz['category'];
							$descs = $rowz['desc'];
							
							$words  = array_slice(explode(' ', $descs), 0, 35);
		  
$sql2 = mysql_query("SELECT * FROM `category` WHERE `id` = '".$cate."'");
$fetch1 = mysql_fetch_assoc($sql2);
		
		
		$sql2 = mysql_query('SELECT `thumb_img` FROM `fullnews` WHERE  `thumb_img` != "" && `newid`="'.$rowz['id'].'" ');
		$rows = mysql_fetch_assoc($sql2);
		
$output = implode(' ', $words);

							echo '<li>
								<img src="'.$rows['thumb_img'].'"  alt="'.$head.'" class="alignleft"/>
								<div class="slide-cnt">
									<h2 style="margin-top:-20px; font-size:34px;">'.$head.'</h2>
									<p>Category : <b>'.$fetch1['name'].'</b><br>
'.$output.'</p>
									<a href="post.php?post='.$rowz['id'].'" class="red-btn">Read More!</a>
								</div>
							</li>';
						}
						
						?>
							
							
						</ul>
					</div>
					<!-- end of flexslider -->
				</div>
				<!-- end of slider -->
			</div>
			<!-- end of shell -->
		</div>
		<!-- end of header -->
		<!-- main -->
        
		<div class="main">
        
			<div class="shell">
				  <div style="min-height:20px; float:left; width:100%; margin-bottom:15px; border:px solid #000; clear:both; ">
                 	
                    <style>
					.menu li {
						font-family:Roboto,trebuchet ms,serif !important;
						font-size:16px; float:left; list-style:none;  line-height:5px; color:#ff9031; border-right:1px solid #ccc;  text-align:center; padding:5px; padding-left:10px; padding-right:10px; margin-top:10px;}
						.menu li a{border:0;}
					
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


                    <script>
					function category(x){
						window.location = 	"category.php?cat="+x;
					}
					
					</script>
                   
                 </div>
				<!-- content -->
				<div class="content" style="clear:both;">
              
					<a href="full_post.php"><h3 style="padding-bottom:0px;">What’s New</h3></a>
                     
                    <?
$sql = mysql_query("SELECT * FROM `posts` ORDER BY `id` DESC LIMIT 15");
		
		while($fetchu = mysql_fetch_assoc($sql)){
		$id = $fetchu['id'];
		$station_id = $fetchu['station_id'];
		$uid = $fetchu['uid'];
		$headline = $fetchu['headline'];
		$link = $fetchu['links'];
		$category = $fetchu['category'];
		$desc = $fetchu['desc'];
		$datetime = $fetchu['datetime'];
		$words  = array_slice(explode(' ', $desc), 0, 25);
		  
$sql2 = mysql_query("SELECT * FROM `category` WHERE `id` = '".$category."'");
$fetch1 = mysql_fetch_assoc($sql2);
		
  
		 $sql0 = mysql_query("SELECT COUNT(*) FROM `visitors` WHERE `post_id`='".$id."' ");
		 $fetch11 = mysql_fetch_array($sql0);
		 $count = $fetch11[0];
		
          $sql9 = mysql_query("SELECT COUNT(*) FROM `comment` WHERE `pid`='".$id."' ");
		 $fetch19 = mysql_fetch_array($sql9);
		 $count_com = $fetch19[0];
		
		if(!empty($link)){
			$new = urlencode($link);
		}else{
			$new = urlencode($headline);
		}
		$sql2 = mysql_query('SELECT `thumb_img` FROM `fullnews` WHERE  `thumb_img` != "" && `newid`="'.$id.'" ');
		$rows = mysql_fetch_assoc($sql2);
		
$output = implode(' ', $words);
			echo '<div class="entry" style="clear:both;  padding-bottom:0; padding-top:25px;">
						<a href="post.php?post='.$id.'&t='.$new.'"><div class="date">
						<img src="'.$rows['thumb_img'].'" height="100%" width="100%">
						</div></a>
						
						<div class="cnt">
							<a href="post.php?post='.$id.'&t='.$new.'"><h4>'.$headline.'</h4></a>
							<p>Category : <b>'.$fetch1['name'].'</b><br>'.$output.'... </p>
							<p>Views: '.$count.' | Comments: '.$count_com.'</p>
						</div>
					</div>';
		}
	
?>

                   
				</div>
               
				<!-- end of content -->
                <style>
				.textBox{
					height:30px; width:94%; margin:3px;	
				}
				</style>
           
				<!-- sidebar -->
				<aside class="sidebar">
               
               
        
              <button style="height:45px; width:120px; float:left; margin-bottom:20px; font-family:Roboto,trebuchet ms,serif !important; font-size:14px; background-image:url(css/images/red-btn.png); background-size:100% 105%; border:0; background-color:transparent; color:#FFF;"><a href="eng_post.php" style="color:#FFF;">In English</a></button>
                
                <button style="height:45px; width:120px; float:left; margin-bottom:20px; margin-left:5px; font-family:Roboto,trebuchet ms,serif !important; font-size:14px; background-image:url(css/images/red-btn.png); background-size:100% 105%; border:0; background-color:transparent; color:#FFF;"><a href="hindi_post.php" style="color:#FFF;"> हिंदी में  </a></button>
                
             
                <div style="height:60px;"></div>
                <?
				if(empty($_SESSION['id'])){
				?>
					<div class="widget">
						<div class="facebook-social">
							<!--<img src="css/images/facebook-img.png" alt="" />-->
                          <!--  <p align="center" style="margin-bottom:23px; margin-top:15px; color:#ff9031;  font-family:angelface; font-size:56px;">Login </p>-->
                             <form id="loginform" onsubmit="return false;" style="" >
                            <input  id="email1" onfocus="emptyElement('status')" class="textBox" type="text" style="text-align:center; height:40px; border:1px solid #ccc;" placeholder="Email">
                            <input id="password" 
            onfocus="emptyElement('status')" class="textBox" style="text-align:center; border:1px solid #ccc; height:40px;" type="password" placeholder="Password">
                           <a href="forgotten_password.php"> <p style="margin-left:3px;">Forgotten Password?</p></a>
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
                     
  
          <?
				if(empty($_SESSION['id'])){
				?>
                
                    <div class="widget" style="margin-top:-40px;">
						<div class="facebook-social">
							
                           <!-- <p align="center" style="margin-bottom:23px; margin-top:15px; color:#ff9031;  font-family:angelface; font-size:56px;">Sign Up</p>-->
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
						
						?>`
    
                 <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
                <div class="fb-like" data-href="https://www.facebook.com/foxycare" data-width="300" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
                <div style="height:20px;"></div>
                 <div style="min-height:100px; width:96%; margin:3px; margin-top:0px;  background-image:url(css/images/facebook-box.png); background-position:center; background-size:120% 120%; ">
                
                <p style="margin:5px; padding:5px; color:#666; font-size:14px;">Hey,<br>
Are you active on Whatsapp?<br>
Subscribe us Now<br>
Send HI to +919144959696<br></p>
                 </div>
                 
                 <div style="height:20px;">
                 
                 </div>

                 <div style="height:20px;">
                 
                 </div>
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
                    <p style="margin-top:10px; color:#ff9031;  padding-top:5px; font-size:14px; margin-bottom:50px; padding-bottom:50px; float:none; clear:both;">&nbsp;&nbsp;&nbsp;Foxycare.com &copy; 2015</p>
				</aside>
				<!-- end of sidebar -->
				<div class="cl">&nbsp;</div>
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- foxycare -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-3320136606834949"
     data-ad-slot="4034650119"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
			</div>
            
         
		</div>
		<!-- end of main -->
		
	</div>
	<!-- end of wrapper -->
	
</body>
</html>