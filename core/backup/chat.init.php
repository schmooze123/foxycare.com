<?php
require '../core/chat.init.php';

if(isset($_POST['method']) === true  && empty($_POST['method']) === false){
	$chat = new Chat();
	$method = trim($_POST['method']);
	
	if ($method === 'fetch'){
		
			$messages = $chat->fetchMessages();
			
			if(empty($messages) === true){
				echo 'There are currently no messages in the chat';
			}else  {
				
				foreach($messages as $message) {
						?>
                        		<div class="message">
                                		<a href="#"><?php echo $message['user_firstname'];  ?></a> says:
                                		<p><?php echo $message['message']; ?></p>
                                </div>
                        <?php	
				}
				
			}
	}
}else if ($method === 'throw') {
	
}
?>