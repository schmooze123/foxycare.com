<?php
		include 'core/connectdb.php';
		include 'core/login.inc.php';
?>
<?php 
	 if(empty($_SESSION['id'])){
 		header('Location: index.php');
 		}
?>
<?php
  if($_SESSION['id'] != 5){
 	header('Location: index.php');
 }
?>
<?php
	error_reporting(0);
 				//session_start();
				
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
	<title>Insight</title>
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
				<style>
				h4{
				font-family:Roboto,trebuchet ms,serif !important;	
				}
				</style>
				<!-- content -->
				<div class="content" style="clear:both; border:px solid #000; width:100%;">
      
				  <h3 style="padding-top:10px;">Insight</h3>
                
             <div style="height:150px; width:230px; border:px solid #ccc; float:left; background:#F3B200; margin:5px;">
             	<?
				$sql = mysql_query("SELECT COUNT(*) FROM `users` ");
				$rowz = mysql_fetch_array($sql);
				$total = $rowz[0];
				echo '<h4 align="center" style="font-size:36px; color:#FFF; padding:15px; margin:15px;">'.$total.'</h4>';
				echo '<h4 align="center" style="font-size:32px; color:#FFF; padding:5px; margin:5px;">USERS</h4>';
				?>
                
             </div>
              <div style="height:150px; width:230px; border:px solid #ccc; float:left; background:#77B900; margin:5px;">
              <?
				$sql = mysql_query("SELECT COUNT(*) FROM `visitors` ");
				$rowz = mysql_fetch_array($sql);
				$total = $rowz[0];
				echo '<h4 align="center" style="font-size:36px; color:#FFF; padding:15px; margin:15px;">'.$total.'</h4>';
				echo '<h4 align="center" style="font-size:32px; color:#FFF; padding:5px; margin:5px;">VISITORS</h4>';
				?>
              </div>
               <div style="height:150px; width:230px; border:px solid #ccc; float:left; background:#2572EB; margin:5px;">  <?
				$sql = mysql_query("SELECT COUNT(*) FROM `posts` ");
				$rowz = mysql_fetch_array($sql);
				$total = $rowz[0];
				echo '<h4 align="center" style="font-size:36px; color:#FFF; padding:15px; margin:15px;">'.$total.'</h4>';
				echo '<h4 align="center" style="font-size:32px; color:#FFF; padding:5px; margin:5px;">BLOGS</h4>';
				?></div>
                <div style="height:150px; width:230px; border:px solid #ccc; float:left; background:#FF2E12; margin:5px;"> <?
				$sql = mysql_query("SELECT COUNT(*) FROM `question` ");
				$rowz = mysql_fetch_array($sql);
				$total = $rowz[0];
				echo '<h4 align="center" style="font-size:36px; color:#FFF; padding:15px; margin:15px;">'.$total.'</h4>';
				echo '<h4 align="center" style="font-size:32px; color:#FFF; padding:5px; margin:5px;">QUESTIONS</h4>';
				?></div>
                    
                   
<div style="height:150px; width:230px; border:px solid #ccc; float:left; margin:5px; background:#1FAEFF;"><?
				$sql = mysql_query("SELECT COUNT(*) FROM `answer` ");
				$rowz = mysql_fetch_array($sql);
				$total = $rowz[0];
				echo '<h4 align="center" style="font-size:36px; color:#FFF; padding:15px; margin:15px;">'.$total.'</h4>';
				echo '<h4 align="center" style="font-size:32px; color:#FFF; padding:5px; margin:5px;">ANSWERS</h4>';
				?></div>
              <div style="height:150px; width:230px; border:px solid #ccc; float:left; margin:5px; background:#006AC1;"><?
				$sql = mysql_query("SELECT COUNT(*) FROM `category` ");
				$rowz = mysql_fetch_array($sql);
				$total = $rowz[0];
				echo '<h4 align="center" style="font-size:36px; color:#FFF; padding:15px; margin:15px;">'.$total.'</h4>';
				echo '<h4 align="center" style="font-size:32px; color:#FFF; padding:5px; margin:5px;">CATEGORY</h4>';
				?></div>
               <div style="height:150px; width:230px; border:px solid #ccc; float:left; margin:5px; background:#7200AC;"><?
				$sql = mysql_query("SELECT COUNT(*) FROM `comment` ");
				$rowz = mysql_fetch_array($sql);
				$total = $rowz[0];
				echo '<h4 align="center" style="font-size:36px; color:#FFF; padding:15px; margin:15px;">'.$total.'</h4>';
				echo '<h4 align="center" style="font-size:32px; color:#FFF; padding:5px; margin:5px;">COMMENTS</h4>';
				?></div>
                <div style="height:150px; width:230px; border:px solid #ccc; float:left; margin:5px; background:#AD103C;"><?
				$sql = mysql_query("SELECT COUNT(*) FROM `favourite` ");
				$rowz = mysql_fetch_array($sql);
				$total = $rowz[0];
				echo '<h4 align="center" style="font-size:36px; color:#FFF; padding:15px; margin:15px;">'.$total.'</h4>';
				echo '<h4 align="center" style="font-size:32px; color:#FFF; padding:5px; margin:5px;">FAVOURITIES</h4>';
				?></div>
                    
                  
					
                    
                   
				</div>
				<!-- end of content -->
               
               
			
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
 include("load_sec_fav_post.php");

	
		}
?>