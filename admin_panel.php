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


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>FoxyCare Admin</title>
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
				<!-- end of 
-money
-motivation -->
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
        <script type="text/javascript">
	function emptyElements(x){
		document.getElementById('statu').innerHTML = "";	
	}
		function submitForms(){
			var x = new XMLHttpRequest();
			var url = "create_newsheadline_parser.php";	
			var name = document.getElementById('name').value;
			var links = document.getElementById('link').value;
			var category = document.getElementById('category').value;
			var ldesc = document.getElementById('longdesc').value;
			
			
			if(name == ""){
			
				document.getElementById('statu').innerHTML = "Fill out all of the data form.";
				return false;	
				
			}else{
				document.getElementById('submitbtn').disabled = true;
				document.getElementById('statu').innerHTML = 'Please wait...';
				
				var vars = "name="+name+"&links="+links+"&category="+category+"&ldesc="+ldesc;
				
				x.open("POST", url, true);
				x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				x.onreadystatechange = function() {
					if(x.readyState == 4 && x.status == 200){
						var return_data = x.responseText;
						if(x.responseText == "error_msg"){
							document.getElementById('statu').innerHTML = "Something Missing.";	
							document.getElementById('submitbtn').disabled = false;
						}else {
							window.location = "post.php?post="+return_data;	
						}
					}
				}
				x.send(vars);
			}
		}
		</script>
        
<script type="text/javascript" src="js/jquery.form.js"></script>
 <script>
$(document).ready(function() { 
 $('#fileInputBox2').live('change', function()			{ 
//elements
var progressbox 		= $('#progressbox2'); //progress bar wrapper
var progressbar 		= $('#progressbar2'); //progress bar element
var statustxt 			= $('#statustxt2'); //status text element
var submitbutton 		= $("#SubmitButton"); //submit button
var myform 				= $("#UploadForm2"); //upload form

var completed 			= '0%'; //initial progressbar value
var FileInputsHolder 	= $('#AddFileInputBox'); //Element where additional file inputs are 

$(myform).ajaxForm({
	beforeSend: function() { //brfore sending form
		submitbutton.attr('disabled', ''); // disable upload button
		statustxt.empty();
		progressbox.show(); //show progressbar
		progressbar.width(completed); //initial value 0% of progressbar
		statustxt.html(completed); //set status text
		statustxt.css('color','#FFF'); //initial color of status text
		
	},
	uploadProgress: function(event, position, total, percentComplete) { //on progress
		progressbar.width(percentComplete + '%') //update progressbar percent complete
		statustxt.html(percentComplete + '%'); //update status text
		if(percentComplete>50)
			{
				statustxt.css('color','#000'); //change status text to white after 50%
			}else{
				statustxt.css('color','#FFF');
			}
			
		},
	complete: function(response) { // on complete
		//profile.html(response.responseText); //update element with received data
		$('#img3').html(response.responseText);
		myform.resetForm();  // reset form
		submitbutton.removeAttr('disabled'); //enable submit button
		progressbox.hide(); // hide progressbar
		
	}
	
}).submit();
 });
}); 
</script>  
<style>
#progressbox2 {

	padding: 1px;
	margin:1px;
	position:relative;
	border-radius: ;
	display:none;
	text-align:left;
	margin-top:5px;
}
#progressbar2 {
	height:20px;
	border-radius:;
	background-color: #ef4a4a;
	width:1%;
}

</style>
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
					<h3>Admin Panel</h3>
                    
                    <div class="entry" style="margin-bottom:10px;">
						
						
						<div class="cnt">
							<h3 style="padding-bottom:0; padding-top:10px; ">Change Background Image</h3>
                            <form action="uploadImage3.php" method="post" enctype="multipart/form-data" name="UploadForm" id="UploadForm2" style="margin-top:3px; "> 
             <input type="hidden" value="<? echo $_GET['newsid']; ?>" id="stationid" name="stationid" />
          
            	<input id="fileInputBox2" style="  cursor:pointer; " type="file"  name="file[]"/>
               
                  
       <div class="sep_s"></div>
    <div id="progressbox2" ><img src="css/images/ajax-loader.gif"></div>
    
                </form>	
						</div>
					</div>
                    
                    
                 
					<div class="entry" style="margin-bottom:10px;">
						
						
						<div class="cnt">
							<h3 style="padding-bottom:0; padding-top:25px; ">Create New Post</h3>	
						</div>
                       
           
            <table align="center" width="90%" style="color:#333; font-family:Roboto,trebuchet ms,serif !important; font-size:16px;">
            	  <tr >
                                    			<td> Headline: </td>
                                    			<td><input type="text" onfocus="emptyElements('statu')" id="name" placeholder="Name" style="height: 35px; width:99%; margin-top:10px; border:1px solid #ff9031; font-family:Roboto,trebuchet ms,serif !important; font-size:16px;" /></td>
                                    </tr>
                                     <tr >
                                    			<td> Create Link: </td>
                                    			<td><input type="text" onfocus="emptyElements('statu')" id="link"  style="height: 35px; width:99%;  border:1px solid #ff9031; font-family:Roboto,trebuchet ms,serif !important; font-size:16px;" /></td>
                                    </tr>
                                     <tr>
                                    			<td>Category: </td>
                                    			<td><select id="category" style="height:35px; border:1px solid #ff9031; font-family:Roboto,trebuchet ms,serif !important; font-size:16px;">
                                                  <?
$sql2 = mysql_query("SELECT * FROM `category` ORDER BY `id` DESC");
while($fetch1 = mysql_fetch_assoc($sql2)){
	echo '<option value="'.$fetch1['id'].'">'.$fetch1['name'], ' </option> ';	
}
?>
                                                	
                                                </select></td>
                                    </tr>
                                      <tr>
                                    			<td>Description: </td>
                                    			<td><textarea class="resixeBox" onfocus="emptyElements('statu')"  type="text" id="longdesc" placeholder="Write long description." style="min-height: 70px; margin-top:px;  border:1px solid #ff9031;  width:100%; font-family:Roboto,trebuchet ms,serif !important; font-size:16px;" ></textarea></td>
                                    </tr>
                                   
                                    
                          
                                      <tr>
                                    			<td> </td>
                                    			<td><input type="button" id="submitbtn"  value="Create"  onclick="submitForms()" style="height:35px; width:120px; float:right; color:#FFF; background:#ff9031; border:1px solid #ff9031; font-family:Roboto,trebuchet ms,serif !important; font-size:16px;" /></td>
                                    </tr>
               
              
                
            </table>
            <p id="statu"></p>
					</div>
                    
                    
                    <div class="entry" style="margin-bottom:10px;">
						
						
						<div class="cnt">
							<h3 style="padding-bottom:0; padding-top:25px;">Create New Question</h3>	
						</div>
                         <table align="center" width="90%" style="color:#333; font-family:Roboto,trebuchet ms,serif !important; font-size:16px;">
            	 
                                   
                                    
                                      <tr>
                                    			<td>Question: </td>
                                    			<td><textarea class="resixeBox" onfocus="emptyElements('statu')"  type="text" id="question" placeholder="Write long description." style="min-height: 70px; margin-top:px;  border:1px solid #ff9031;  width:100%; font-family:Roboto,trebuchet ms,serif !important; font-size:16px;" ></textarea></td>
                                    </tr>
                                   
                                    
                          
                                      <tr>
                                    			<td> </td>
                                    			<td><input type="button"  value="Create"  onclick="submitQuest()" style="height:35px; width:120px; float:right; color:#FFF; background:#ff9031; border:1px solid #ff9031; font-family:Roboto,trebuchet ms,serif !important; font-size:16px;" /></td>
                                    </tr>
               
              <script>
			  function	submitQuest(){
				  var cat = 0;
				  var quest = document.getElementById('question').value;
				  
				  if(quest != ""){
						 $.post("create_question_parser.php", {cat: cat, quest: quest}, function(data){
							 $('#messg').html(data);
							 $('#question').val('');
						 }); 
				  }
				  
					  
			  }
			  
			  </script>
                
            </table>
            <p id="messg"></p>
					</div>
                    
                    	<div class="entry" style="margin-bottom:10px;">
						
						
						<div class="cnt">
							<h3 style="padding-bottom:0; padding-top:15px; ">Create Category</h3>	
                          	
						</div>
                        <script type="text/javascript">
							function createCategory(){
								var cname = document.getElementById('cname').value;
								$.post("create_cat.inc.php",{cname:cname}, function(data){
									$('#cname').val('');
									$('#categ').prepend(data);
								});
									
							}
						</script>
                         <script type="text/javascript">
							function deleteCat(x){
								
								$.post("delete_cat.php",{x:x}, function(data){
									$('#'+x).hide('fast');
								});
									
							}
						</script>
                    
                           <table align="center" width="75%" style="color:#333;">
            	  <tr >
                                    			
                                    			<td><input type="text" onfocus="emptyElements('statu')" id="cname" placeholder="Name" style="height: 35px; width:100%; margin-top:10px;  font-family:Roboto,trebuchet ms,serif !important; border:1px solid #ff9031; font-size:16px;" /></td>
                                    </tr>
                                      <tr>
                                    			
                                    			<td><input type="button" id="submitbtn"  value="Create"  onclick="createCategory()" style="height:35px; width:120px; float:right; color:#FFF; background:#ff9031; border:1px solid #ff9031; font-family:Roboto,trebuchet ms,serif !important; font-size:16px;" /></td>
                                    </tr>
                                    </table>
                                    
                                    
                                    
                                    
                                    <P id="categ" style="color:#333; font-family:Roboto,trebuchet ms,serif !important; font-size:16px;"> 
                            <?
$sql2 = mysql_query("SELECT * FROM `category` ORDER BY `id` DESC");
while($fetch1 = mysql_fetch_assoc($sql2)){
	echo '<P  class="cat" style="color:#333; font-family:Roboto,trebuchet ms,serif !important; font-size:16px;" id="'.$fetch1['id'].'">'.$fetch1['name'], ' <img src="css/images/close.png" style="cursor:pointer;" onClick="deleteCat('.$fetch1['id'].')" height="10"></p> ';	
}
?>
                            
                            </P>
					</div>
                    
                      <div class="entry" style="margin-bottom:10px;">
						<div class="date" style="height:70px; width:70px; border-radius:50%;">
						<img src="css/images/push-320x240.jpg" height="100%">
						</div>
						
						<div class="cnt">
							<a href="insight.php"><h3 style="padding-bottom:0; padding-top:25px;">Insight</h3></a>	
						</div>
					</div>
                    
					
                
				
                    
              
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
		<div id="footer-push"></div>
	</div>
	<!-- end of wrapper -->
	
	
</body>
</html>