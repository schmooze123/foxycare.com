
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
<?
$sql25 = mysql_query("SELECT * FROM `fullnews` WHERE `newid`='".$_GET['post']."' ORDER BY `id` ASC");
		
		$fetchu5 = mysql_fetch_assoc($sql25);
		$image = $fetchu5['image'];
		?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <meta property="og:title" content="<? echo $headline?>" /> 
  <meta property="og:image" content="<? echo $image; ?>" /> 
  <meta property="og:description" content="<? echo $desc?>" /> 

	<title><? echo $headline ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="css/images/iconFC.png" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
	
	
	<!--[if lt IE 9]>
		<script src="js/modernizr.custom.js"></script>
	<![endif]-->
	
	
    <script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script>
$(document).ready(function() { 
 $('#fileInputBox').live('change', function()			{ 
//elements
var progressbox 		= $('#progressbox'); //progress bar wrapper
var progressbar 		= $('#progressbar'); //progress bar element
var statustxt 			= $('#statustxt'); //status text element
var submitbutton 		= $("#SubmitButton"); //submit button
var myform 				= $("#UploadForm"); //upload form

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
		$('#mainBody').append(response.responseText);
		myform.resetForm();  // reset form
		submitbutton.removeAttr('disabled'); //enable submit button
		progressbox.hide(); // hide progressbar
		
	}
	
}).submit();
 });
}); 

</script>
<script>

function countVisitor(){
	
		
			var newsid = <? echo $_GET['post']; ?>;
			$.post("visitor_post.inc.php",{request: "countVisitor" ,  newsid: newsid }, function(data){
				
			});
}
window.onload = countVisitor();
</script>
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
                  <?
$sql22 = mysql_query("SELECT * FROM `category` WHERE `id` = '".$category."'");
$fetch22 = mysql_fetch_assoc($sql22);
	
?>
				<div class="content" style="clear:both;">
                <div id="mainBody">
                  <?
				   
				   if($_SESSION['id'] == 5){
				   ?>
                    <button  onClick="deletePost(<? echo $_GET['post']?>);" title="delete this post" style="height:20px; width:20px; float:left; margin-right:5px; margin-top:5px; float:right; background-image:url(css/images/close.png); background-size:100% 100%; border:0; background-color:transparent; color:#FFF;"></button>
                    <? } ?>
					<h3 style="padding-bottom:5px; font-size:28px; line-height:30px;"><? echo convertHashtags($headline)?></h3>
                    <p style="font-size:16px; font-family:Roboto,trebuchet ms,serif !important; color:#333;">Category: <b><? echo $fetch22['name'] ?></b></p>
                     
                    <script type="text/javascript">
					function deletePost(p){
	$.post("deleteNews.php",{p: p}, function(data){
		if(data == 1){
			window.location = "index.php";	
		}else{
			$('#msg').html("Something went wrong!");
		}
	});
}
					</script>
                     <script type="text/javascript">
					function FavPost(p){
	$.post("get_fav.php",{p: p}, function(data){
		$('#favBox').html(data);
	});
}
					</script>
                    <script type="text/javascript">
					function RemoveFavPost(p){
	$.post("remove_fav.php",{p: p}, function(data){
		$('#favBox').html(data);
	});
}
					</script>
                     <script type="text/javascript">
					function addtoslider(p){
	$.post("addtoslider.php",{p: p}, function(data){
		$('#sliders').html(data);
	});
}
					</script>
                    <script type="text/javascript">
					function removeSlider(p){
	$.post("removeslider.php",{p: p}, function(data){
		$('#sliders').html(data);
	});
}
					</script>
                    
                    
                    <script type="text/javascript">
					function addtoenglish(p){
	$.post("addtoeng.php",{p: p}, function(data){
		$('#slidere').html(data);
		$('#sliderh').html('<button id="slider" onClick="addtohindi(<? echo $_GET['post']?>);"   style="height:40px; width:150px; float:left; margin-right:5px; margin-top:5px; background:#ff9031;  border:1px solid #ff9031;  font-family:Roboto,trebuchet ms,serif !important;  color:#FFF;">Hindi</button>');
	});
}
					</script>
                    <script type="text/javascript">
					function addtohindi(p){
	$.post("addtohindi.php",{p: p}, function(data){
		$('#sliderh').html(data);
		$('#slidere').html('<button id="slider" onClick="addtoenglish(<? echo $_GET['post']?>);"  style="height:40px; width:150px; float:left; margin-right:5px; margin-top:5px; background:#ff9031;  border:1px solid #ff9031;  font-family:Roboto,trebuchet ms,serif !important;  color:#FFF;">English</button>');
	});
}
					</script>
                   <p style="font-size:16px; font-family:Roboto,trebuchet ms,serif !important; color:#333;"><? echo nl2br(convertHashtags($desc)) ?></p>
                
                       <?
				   
				   if($_SESSION['id'] == 5){
				   ?>
                     <div id="sliders" style="float:left;">  
             <?
			 $sql5 = mysql_query("SELECT * FROM `posts` WHERE `id`='".$_GET['post']."' AND `slider`='1' ");
		if(mysql_num_rows($sql5) == 0){
			?>
            <button id="slider"  onClick="addtoslider(<? echo $_GET['post']?>);" style="height:40px; width:150px; float:left; margin-right:5px; margin-top:5px; background:#ff9031;  border:1px solid #ff9031;  font-family:Roboto,trebuchet ms,serif !important;  color:#FFF;">Add to Slider</button>
            <?
		}else{
			
			?>
            <button id="slider"  onClick="removeSlider(<? echo $_GET['post']?>);" style="height:40px; width:150px; float:left; margin-right:5px; margin-top:5px; background:#ff9031;  border:1px solid #ff9031;  font-family:Roboto,trebuchet ms,serif !important;  color:#FFF;">Remove to Slider</button>
            <?
		}
			 ?>
            
           </div>         
           
                    
                    <? } ?>
                    
                                     <?
				   
				   if($_SESSION['id'] == 5){
				   ?>
                     <div id="slidere" style="float:left;">  
             <?
			 $sql5 = mysql_query("SELECT * FROM `posts` WHERE `id`='".$_GET['post']."' AND `lang`='1' ");
		if(mysql_num_rows($sql5) == 0){
			?>
            <button id="slider"  onClick="addtoenglish(<? echo $_GET['post']?>);" style="height:40px; width:150px; float:left; margin-right:5px; margin-top:5px; background:#ff9031;  border:1px solid #ff9031;  font-family:Roboto,trebuchet ms,serif !important;  color:#FFF;">English</button>
            <?
		}else{
			
			?>
            <button id="slider" onClick="addtoenglish(<? echo $_GET['post']?>);" style="height:40px; width:150px; float:left; margin-right:5px; margin-top:5px; background:#ff9031;  border:1px solid #ff9031;  font-family:Roboto,trebuchet ms,serif !important;  color:#FFF;">In English</button>
            <?
		}
			 ?>
            
           </div>         
           
                    
                    <? } ?>
                                     <?
				   
				   if($_SESSION['id'] == 5){
				   ?>
                     <div id="sliderh" style="float:left;">  
             <?
			 $sql5 = mysql_query("SELECT * FROM `posts` WHERE `id`='".$_GET['post']."' AND `lang`='2' ");
		if(mysql_num_rows($sql5) == 0){
			?>
            <button id="slider"  onClick="addtohindi(<? echo $_GET['post']?>);" style="height:40px; width:150px; float:left; margin-right:5px; margin-top:5px; background:#ff9031;  border:1px solid #ff9031;  font-family:Roboto,trebuchet ms,serif !important;  color:#FFF;">Hindi</button>
            <?
		}else{
			
			?>
            <button id="slider" onClick="addtohindi(<? echo $_GET['post']?>);"  style="height:40px; width:150px; float:left; margin-right:5px; margin-top:5px; background:#ff9031;  border:1px solid #ff9031;  font-family:Roboto,trebuchet ms,serif !important;  color:#FFF;">In Hindi</button>
            <?
		}
			 ?>
            
           </div>         
           
                    
                    <? } ?>
                   <?
				   	if(!empty($_SESSION['id'])){
				   
				   ?>
                   <div id="favBox" style="float:left;">  
             <?
			 $sql5 = mysql_query("SELECT * FROM `favourite` WHERE `session_id`='".$_SESSION['id']."' AND `post_id`='".$_GET['post']."' ");
		if(mysql_num_rows($sql5) == 0){
			?>
            <button id="addtofav" onClick="FavPost(<? echo $_GET['post']?>);" style="height:40px; width:150px; background:#ff9031; border:1px solid #ff9031; color:#FFF; margin-bottom:10px;  font-family:Roboto,trebuchet ms,serif !important; margin-top:5px;">Add to favourite</button>
            <?
		}else{
			
			?>
           <button id="remove" onClick="RemoveFavPost(<? echo $_GET['post']?>);" style="height:40px; width:150px;  font-family:Roboto,trebuchet ms,serif !important; background:#ff9031;  border:1px solid #ff9031; color:#FFF; margin-bottom:10px; margin-top:5px;">Remove Favourite</button>
            <?
		}
			 ?>
           </div>         
                    
                     <p id="msg"></p>
                     
                     <? }
                     ?>
                        <?
		 $sql0 = mysql_query("SELECT COUNT(*) FROM `visitors` WHERE `post_id`='".$_GET['post']."' ");
		 $fetch = mysql_fetch_array($sql0);
		 $count = $fetch[0];
		 ?>
           <h2 align="right" style="font-family:Roboto,trebuchet ms,serif !important; float:right; font-size:24px; margin:10px;"><? echo $count ?> <font color="#666666" size="+1">View</font></h2>
         
                      <a href="http://www.facebook.com/share.php?u=http://foxycare.com/post.php?post=<? echo $_GET['post']?>" onclick="return fbs_click()" > <img src="css/images/fshare.png" alt="" style="float:left; " /></a>
                      
                       <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>function fbs_click()
{u=location.href;t=document.title;window.open
('http://www.facebook.com/sharer.php?u='+
encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');return false;}</script>
                      
                    <?
$sql2 = mysql_query("SELECT * FROM `fullnews` WHERE `newid`='".$_GET['post']."' ORDER BY `id` ASC");
		
		while($fetchu = mysql_fetch_assoc($sql2)){
			$conID = $fetchu['id'];
		$text = $fetchu['texts'];
		$image = $fetchu['image'];
		$datetime = $fetchu['datetime'];
		$title = $fetchu['title'];
		echo '<div class="pin" id="'.$conID.'" style="clear:both;">
		<div class="cross" style="float:right; height:30px; width:45px; border:px solid #ccc; display:;">
		';
		if($_SESSION['id'] == 5){
		echo '
			<input onclick="editcontent('.$conID.')" type="image" src="css/images/Edit-Document-icon.png" style="float:left; width:13px; margin-top:5px;" />
			<input onclick="deletecontent('.$conID.')" type="image" src="css/images/close.png" style="float:left; height:13px; margin-left:5px;  margin-top:5px;" />';
		}
		echo '
		</div>
		<h3 style="padding-bottom:0; margin-top:10px; line-height:30px; ">'.nl2br(convertHashtags($title)).'</h3>
		
			
		
		';
		$video = $fetchu['video'];
		if(!empty($video)){
		echo '<center><iframe width="100%" height="400" src="https://www.youtube.com/embed/'.$video.'" frameborder="0" allowfullscreen></iframe></center>';
		}
		
		echo '<center><img src="'.$image.'" style="max-width:100%;     " /></center>
		<p id="textID'.$conID.'" style=" font-size:16px; color:#333; font-family:Roboto,trebuchet ms,serif !important; padding:10px; line-height:25px; margin-top:0; padding-top:0;   ">'.nl2br(convertHashtags($text)).'</p></div>
			<table align="center" id="table'.$conID.'"  style="font-family:Roboto,trebuchet ms,serif !important; display:none; width:100%;  font-size:16px; margin-top:px;" cellpadding="1"  cellspacing="1" >
                				
                                   
                                   
                                      <tr>
                                    			
                                    			<td><textarea class="resixeBox" onfocus="emptyElements("statu")"  type="text" id="edittext'.$conID.'" placeholder="Add description." style="min-height: 70px; width:100%; margin-top:10px;  width:650px; font-family:Roboto,trebuchet ms,serif !important" >'.$text.'</textarea></td>
                                    </tr>
                                   
                                    
                          
                                      <tr>
                                    			
                                    			<td><input type="button" id="submitbtn"  value="Save"  onclick="editText('.$conID.')" style="height:35px; background:'.$bg_color.';  margin-top:10px; width:100px; float:right; color:#FFF; border:1px solid '.$bg_color.'; font-family:Roboto,trebuchet ms,serif !important; font-size:16px;" /></td>
                                    </tr>
                			</table>
		';
}
?>
                 
				 <?
			
				
			
		?>

      
</div>
 
   
           
            <?
            ?>
         <?
			
				
			
		?>
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
     <style>

#progressbox {
	
	padding: 1px;
	margin:1px;
	position:relative;
	border-radius: ;
	display:none;
	text-align:left;
	margin-top:5px;
}
#progressbar {
	height:20px;
	border-radius:;
	background-color: #ef4a4a;
	width:1%;
}

.pin:hover{
	
}
</style>
<script type="text/javascript">
function deletecontent(x){
	$.post("deleteCon.php",{x: x}, function(){
		$('#'+x).slideUp('slow');
	});
}
function editcontent(x){
	$('#table'+x).slideToggle('slow');
}
function editText(ID){
	var text = $('#edittext'+ID).val();
	$.post("editText.php",{ID: ID, text: text}, function(DATA){
		document.getElementById('textID'+ID).innerHTML = DATA;
		$('#table'+ID).fadeOut('slow');
	});
}
</script> 
<?
if($_SESSION['id'] == 5){
?>
<div style="border:px solid #000; margin-bottom:50px;  float:left;">

  <form action="upload_cover.php" method="post" enctype="multipart/form-data" name="UploadForm" id="UploadForm" style=" margin-top:5px;z-index:99999; clear:both; padding-top:5px;"> 
            
            <input type="hidden" value="<? echo $_GET['post']; ?>" id="newsid" name="newsid" />
            	<input id="fileInputBox" style=" width:180px; opacity:1; cursor:pointer; " type="file"  name="file[]"/>
               
                  
       <div class="sep_s"></div>
    <div id="progressbox" ><img src="css/images/ajax-loader.gif" /></div>
    
                </form>
           
            <div id="togglebar" onclick="togglebox();"></div>
 <form id="shopform" onsubmit="return false;">
 
                			<table align="left" width="500px" style="font-family:<? echo $font_style; ?>;  font-size:18px; margin-top:px;" cellpadding="1"  style="" cellspacing="1" align="center">
                				
                                      <tr>
                                    			
                                    			<td><textarea class="resixeBox" onfocus="emptyElements('statu')"  type="text" id="title" placeholder="Add Title" style=" margin-top:10px; height:30px;  padding:5px; border:1px solid #ff9031;  width:600px; font-family:Roboto,trebuchet ms,serif !important; font-size:24px;" ></textarea></td>
                                    </tr>
                                      <tr>
                                    			
                                  <td><input type="text" class="resixeBox" onfocus="emptyElements('statu')"  type="text" id="embed" placeholder="Add Embedd Code" style=" height:35px; padding:5px; margin-top:px;  width:200px; border:1px solid #ff9031; font-family:Roboto,trebuchet ms,serif !important; font-size:16px;" ></textarea></td>
                                    </tr>
                                   
                                      <tr>
                                    			
                                    			<td><textarea class="resixeBox" onfocus="emptyElements('statu')"  type="text" id="longdesc" placeholder="Write long description." style="min-height: 70px; margin-top:5px; border:1px solid #ff9031; padding:5px;  width:600px; font-family:Roboto,trebuchet ms,serif !important; font-size:16px;" ></textarea></td>
                                    </tr>
                                   
                                    
                          
                                      <tr>
                                    			
                                    			<td><input type="button" id="submitbtn"  value="Submit"  onclick="submitForm()" style="height:35px; background:#ff9031;  margin-top:px; width:120px; float:right; color:#FFF; border:1px solid #ff9031; font-family:Roboto,trebuchet ms,serif !important; font-size:16px;" /></td>
                                    </tr>
                			</table>
                           
                           </form>
                                            
                            				<p id="statu"></p>
                                            
                                   </div>         
                                          
                                            
      
<?
}
?>
<h3 style="padding-bottom:10px">Comments</h3>
<hr>
<?
if(!empty($_SESSION['id'])){
?>
<div style="border:px solid #000; margin-bottom:50px;  float:left;">

  
 
 
                			<table align="left" width="500px" style="font-family:<? echo $font_style; ?>;  font-size:18px; margin-top:5px;" cellpadding="1"  style="" cellspacing="1" align="center">
                				
                                     
                                    			
                                    			<td><textarea class="resixeBox" onfocus="emptyElements('statu')"  type="text" id="comment" placeholder="Write long description." style="min-height: 50px; margin-top:5px; border:1px solid #ff9031; padding:5px;  width:600px; font-family:Roboto,trebuchet ms,serif !important; font-size:16px;" ></textarea></td>
                                    </tr>
                                   
                                    
                          
                                      <tr>
                                    			
                                    			<td><input type="button" id="submitbtn"  value="Submit"  onclick="submitQuest()" style="height:35px; background:#ff9031;  margin-top:px; width:120px; float:right; color:#FFF; border:1px solid #ff9031; font-family:Roboto,trebuchet ms,serif !important; font-size:16px;" /></td>
                                    </tr>
                			</table>
                            <script>
			  function	submitQuest(){
				  var cat = <? echo $_GET['post']?>;
				  var quest = document.getElementById('comment').value;
				 
				  if(quest != ""){
						 $.post("comment.inc.php", {cat: cat, quest: quest}, function(data){
							 $('.entrys:first').before(data);
							$('#question').val('');
						 }); 
				  }
				  
					  
			  }
			  
			  </script>
                              <script type="text/javascript">
							function deleteCat(x){
								
								$.post("delete_comment.php",{x:x}, function(data){
									$('#'+x).hide('fast');
								});
									
							}
						</script>
                                            
                            				
                                            
                                   </div>         
                                          
                                            
      
<?
}
?>

<div class="entrys" id="'.$id.'"></div>
                    <?
					

		
		
			$sql = mysql_query("SELECT * FROM `comment` WHERE `pid`='".$_GET['post']."' ORDER BY `id` DESC ");
		while(	$fetchu = mysql_fetch_assoc($sql)){
		$id = $fetchu['id'];
		
		$uid = $fetchu['uid'];
		$comment = $fetchu['comment'];
		
		$datetime = $fetchu['datetime'];
		
		$sql2 = mysql_query('SELECT * FROM `users` WHERE  `id`="'.$uid.'" ');
		$rows = mysql_fetch_assoc($sql2);
		

			echo '<div class="entrys" id="'.$id.'">
						
						
						<div class="cnt">
							<img src="css/images/close.png" style="cursor:pointer; margin-top:10px; float:right;" onClick="deleteCat('.$id.')" height="10">
						<h4 style="font-size:16px; font-family:Roboto,trebuchet ms,serif !important; padding-top:10px;">'.$rows['name'].' '.$rows['lastnm'].'</h4><p>posted on '.$datetime.'</p>
					
							<p style="padding-bottom:0; color:#333; padding-top:0px; font-family:Roboto,trebuchet ms,serif !important; font-size:14px; line-height:30px;"><b>Comment: </b> '.nl2br(convertHashtags($comment)).'</p>
							
							
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
                 
                    <button style="height:45px; width:120px; float:left; margin-bottom:20px; font-family:Roboto,trebuchet ms,serif !important; font-size:14px; background-image:url(css/images/red-btn.png); background-size:100% 105%; border:0; background-color:transparent; color:#FFF;"><a href="eng_post.php" style="color:#FFF;">In English</a></button>
                
                <button style="height:45px; width:120px; float:left; margin-bottom:20px; margin-left:5px; font-family:Roboto,trebuchet ms,serif !important; font-size:14px; background-image:url(css/images/red-btn.png); background-size:100% 105%; border:0; background-color:transparent; color:#FFF;"><a href="hindi_post.php" style="color:#FFF;"> हिंदी में  </a></button>
                <div style="height:60px;"></div>
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
        <?php
function convertHashtags($str){
	$regex = "/#+([a-zA-Z0-9_]+)/";
	$str = preg_replace($regex, '<a href="search.php?search=$1">$0</a>', $str);
	return($str);
}

//$text =  "I am #Priyanshu Shrivastava and #devanshu.";
$text = convertHashtags($text);
//echo $string;
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
   
                  <div style="height:20px;"></div>
                 <div style="height:20px;">
                         <div style="min-height:200px; width:96%; margin:3px; margin-top:0px; margin-bottom:30px; margin-top:-20px; ">
                         <h3 style="margin-bottom:-20px;">Related Post</h3>
                        <?
$querys = mysql_query("SELECT * FROM `posts` WHERE `category`='".$category."' ORDER BY RAND() LIMIT 8");
		
		while($fetchus = mysql_fetch_assoc($querys)){
		$idu = $fetchus['id'];
		$headlines = $fetchus['headline'];
		$new = urlencode($headlines);
			$sql2 = mysql_query('SELECT `thumb_img` FROM `fullnews` WHERE  `thumb_img` != "" && `newid`="'.$idu.'" ');
		$rows = mysql_fetch_assoc($sql2);
		if($idu != $_GET['post']){
		echo '<div style="min-height:110px; width:100%; margin-top:20px; border:px solid #999; background-image:url(css/images/facebook-box.png); background-position:center; background-size:120% 120%;">
                         	<a href="post.php?post='.$idu.'&t='.$new.'"><div style="height:100px; width:100px; border:px solid #ccc; margin-right:10px;  float:left;">
                            	<img src="'.$rows['thumb_img'].'" style="margin:5px;" height="100%" width="100%"  />
                                
                            </div></a>
                          <a href="post.php?post='.$idu.'&t='.$new.'">  <h3 style="margin:5px; padding-top:5px; font-size:18px;">'.$headlines.'</h3></a>
                         </div>';
		}
		}
	
	
?>
                         
                         
                         
                          
                         
                         
                         </div>
                      <div style="min-height:400px; width:96%; margin:3px; margin-top:10px;  background-image:url(css/images/facebook-box.png); background-position:center; background-size:120% 120%; ">
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