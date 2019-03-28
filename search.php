
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
<?php
error_reporting(0);
$last_msg_id=$_GET['last_msg_id'];
$action=$_GET['action'];

if($action != "get")
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title><? echo $_GET['search']; ?></title>
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
</head>
<body>
	<!-- wrapper -->
    <div class="wrapper" style="height:100%; width:100%; border:1px solid #ccc; position:fixed; overflow:auto;">
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
				<!-- slider-holder -->
				
				<!-- end of slider -->
			</div>
			<!-- end of shell -->
		</div>
		<!-- end of header -->
		<!-- main -->
        
		<div class="main" >
        
			<div class="shell" >
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
	echo '<li><a href="category.php?cat='.$fetch1['id'].'" style="padding:5px;">',$fetch1['name'], ' </a> </li>';
	
		
	
}
?>
<a href="latest_questions.php" style="padding:5px;"><li>Latest Question</li></a>
                               <a href="full_post.php" style="padding:5px;"> <li>More Posts</li></a>
</ul>
                 </div>
				<!-- content -->
			  <div class="content" style="clear:both;">
      <script>
		$(document).ready( 
function()
{
function last_msg_funtion() 
{ 
var ID=$(".entry:last").attr("id");

$('div#loading').show();
//$.post($('div#next_message_location').html() + "?p=" + ID,
$.post("full_post.php?action=get&last_msg_id="+ID,
function( data )
{
if (data != "") 
{
$(".entry:last").after(data); 

window.bSuppressScroll = false;
}

$('div#last_msg_loader').empty();
$('div#loading').hide();
} );
}; 

jQuery(
  function($)
  {
    $('.wrapper').bind('scroll', function()
                              {
                                if($(this).scrollTop() + $(this).innerHeight()>=$(this)[0].scrollHeight)
                                {
									
                                  last_msg_funtion();
                                }
                              })
  }
);
}); 

</script>        
				<h3 style="padding-bottom:0px;">What’s New</h3>
                     
                  <?
					$get = $_GET['search'];
$sql = mysql_query("SELECT * FROM `posts` WHERE `headline` LIKE '%$get%' || `desc` LIKE '%$get%'");
		
		while($fetchu = mysql_fetch_assoc($sql)){
		$id = $fetchu['id'];
		
		$uid = $fetchu['uid'];
		$headline = $fetchu['headline'];
		
		$category = $fetchu['category'];
		$desc = $fetchu['desc'];
		$datetime = $fetchu['datetime'];
		$words  = array_slice(explode(' ', $desc), 0, 25);
		  
$sql2 = mysql_query("SELECT * FROM `category` WHERE `id` = '".$category."'");
$fetch1 = mysql_fetch_assoc($sql2);
		$link = $fetchu['links'];
	if(!empty($link)){
			$new = urlencode($link);
		}else{
			$new = urlencode($headline);
		}

		
		$sql2 = mysql_query('SELECT `thumb_img` FROM `fullnews` WHERE  `thumb_img` != "" && `newid`="'.$id.'" ');
		$rows = mysql_fetch_assoc($sql2);
		
$output = implode(' ', $words);
			echo '<div class="entry" id="'.$id.'" style="clear:both; padding-bottom:0; padding-top:25px;">
						<a href="post.php?post='.$id.'&t='.$new.'"><div class="date">
						<img src="'.$rows['thumb_img'].'" height="100%" width="100%">
						</div></a>
						
						<div class="cnt">
							<a href="post.php?post='.$id.'&t='.$new.'"><h4>'.$headline.'</h4></a>
							<p>Category : <b>'.$fetch1['name'].'</b><br>
'.$output.'... </p>
							<a href="post.php?post='.$id.'&t='.$new.'" class="dot">View More</a>
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
                 <div style="height:20px;"></div>
                        
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

	</div></div>
	<!-- end of wrapper -->
	
</body>
</html>
   <?php
}
else
{
 include("load_sec_full_post.php");

	
		}
?>