<?php
	class Chat extends Core {
			public function fetchMessages() {
				/*$this->query("SELECT `chat`.`msg`,
												`users`.`fstnm`,
											`users`.`id`
											FROM `chat`
											JOIN `users`
											ON `chat`.`uid` = `users`.`id`
											ORDER BY `chat`.`id` ASC
											");*/
											$uid = $_GET['uid'];
											
											$this->query("SELECT `chat`.`id`,`chat`.`msg`, `chat`.`img_thumb`, `chat`.`img`,`chat`.`datetime`,`chat`.`emoticons`,`users`.`fstnm`,`users`.`lstnm`,`users`.`id` FROM `chat` JOIN `users`
		ON `chat`.`uid` = `users`.`id` WHERE (`uid`='".$_SESSION['id']."' AND `sent_id`='".$uid."') OR (`uid`='".$uid."' AND `sent_id`='".$_SESSION['id']."') ORDER BY `chat`.`id` DESC   
										LIMIT 25	 		
											");
											
					return $this->rows();
			}
			 
			public function throwMessage($uid, $message){
			
				$this->query("
						INSERT INTO `chat` (`uid`,`msg`,`datetime`)
						VALUES(" .$uid.", '" .$this->db->real_escape_string(htmlentities($message)) . " ', UNIX_TIMESTAMP())
				");
				
			}
	}

?>
