
<?php
	error_reporting(0);
 				session_start();
				include 'core/connectdb.php';
				include 'core/login.inc.php';
				include 'core/reg.inc.php';
			
			

?>
<?
if(empty($_SESSION['id'])){
	header("Location:index.php");
}

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
	<title>Favourite</title>
	<link rel="shortcut icon" type="image/x-icon" href="css/images/iconFC.png" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
	
	<script src="js/jquery-1.8.0.min.js" type="text/javascript"></script>
	<!--[if lt IE 9]>
		<script src="js/modernizr.custom.js"></script>
	<![endif]-->
	<script src="js/jquery.flexslider-min.js" type="text/javascript"></script>
	<script src="js/functions.js" type="text/javascript"></script>
  
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
						<a href="#"><span></span><? if(!empty($_SESSION['id'])){?>Subscribed<? }else{ echo 'Subscribe'; }?></a>
                        
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
$.post("favourite.php?action=get&last_msg_id="+ID,
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
				  <h3 style="padding-bottom:0px;">Favourite Posts</h3>
                     
                    <?
					$sql1 = mysql_query("SELECT * FROM `favourite` WHERE `session_id`='".$_SESSION['id']."' ORDER BY `id` DESC LIMIT 15");

		
		while($fetchs = mysql_fetch_assoc($sql1)){
			$post_id = $fetchs['post_id'];
			$sql = mysql_query("SELECT * FROM `posts` WHERE `id`='".$post_id."' ");
			$fetchu = mysql_fetch_assoc($sql);
		$id = $fetchu['id'];
		$station_id = $fetchu['station_id'];
		$uid = $fetchu['uid'];
		$headline = $fetchu['headline'];
		$category = $fetchu['category'];
		$desc = $fetchu['desc'];
		$datetime = $fetchu['datetime'];
		$words  = array_slice(explode(' ', $desc), 0, 25);
		  
$sql2 = mysql_query("SELECT * FROM `category` WHERE `id` = '".$category."'");
$fetch1 = mysql_fetch_assoc($sql2);
		


		
		$sql2 = mysql_query('SELECT `thumb_img` FROM `fullnews` WHERE  `thumb_img` != "" && `newid`="'.$id.'" ');
		$rows = mysql_fetch_assoc($sql2);
		
$output = implode(' ', $words);
			echo '<div class="entry" id="'.$fetchs['id'].'" style="clear:both; padding-bottom:0; padding-top:25px;">
						<a href="post.php?post='.$id.'"><div class="date">
						<img src="'.$rows['thumb_img'].'" height="100%" width="100%">
						</div></a>
						
						<div class="cnt">
							<a href="post.php?post='.$id.'"><h4>'.$headline.'</h4></a>
							<p>Category : <b>'.$fetch1['name'].'</b><br>
'.$output.'... </p>
							<a href="post.php?post='.$id.'" class="dot">View More</a>
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
                <?
				if(empty($_SESSION['id'])){
				?>
					<div class="widget">
						<div class="facebook-social">
							<!--<img src="css/images/facebook-img.png" alt="" />-->
                            <p align="center" style="margin-bottom:23px; margin-top:15px; color:#ff9031;  font-family:angelface; font-size:56px;">Login </p>
                             <form id="loginform" onsubmit="return false;" style="" >
                            <input  id="email1" onfocus="emptyElement('status')" class="textBox" type="text" style="text-align:center" placeholder="Email">
                            <input id="password" 
            onfocus="emptyElement('status')" class="textBox" style="text-align:center" type="password" placeholder="Password">
                            <p style="margin-left:3px;">Forgotten Password?</p>
                            <div style="height:110px; width:95%; border:px solid #ccc; margin:3px;"><input id="loginbtn" align="absmiddle" onclick="login()" type="button" style="float:right; height:30px; width:100px;">
                            </form>
                            <p id="status"></p>
                             <p style="margin-left:3px; padding-top:10px; clear:both; text-align:center; float:none;">New on FoxyCare? <b style="color:#ff9031;">Sign Up Now</b></p>
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
							
                            <p align="center" style="margin-bottom:23px; margin-top:15px; color:#ff9031;  font-family:angelface; font-size:56px;">Sign Up</p>
                            <form id="signupform"  onsubmit="return false;"  >
                             <input id="name" class="textBox" type="text" onkeypress="return onlyAlphabets(event,this);" maxlength="150"   onfocus="emptyElements('statu')" style="text-align:center" placeholder="Full Name">
                            <input id="email" onkeypress="return onlyAlphabets(event,this);"   maxlength="150"   onfocus="emptyElements('statu')" class="textBox" type="text" style="text-align:center" placeholder="Email">
                            <input id="pass"   maxlength="20"   onfocus="emptyElements('statu')" class="textBox" style="text-align:center" type="password" placeholder="Password">
                        
                            <div style="height:85px; width:95%; border:px solid #ccc; margin:3px;">
                            <input onclick="register()" id="signbtn" type="button" style="float:right; height:30px; width:100px;">
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
      <div style="min-height:400px; width:96%; margin:3px; margin-top:-20px;  background-image:url(css/images/facebook-box.png); background-position:center; background-size:120% 120%; ">
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

	</div></div>
	
</body>
</html>
   <?php
}
else
{
 include("load_sec_fav_post.php");

	
		}
?>