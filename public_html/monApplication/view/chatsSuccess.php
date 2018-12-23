<?php if(isset($_SESSION['user'])) {?>

	  <!-------------------------------message deplacé--> 
	  
	  
	  

		  
		
	<div id="mydiv">
		
	  <div id="mydivheader">Chat <button onclick="myFunction()" class="close" title="Close PopUp" class="reduire"><img src="images/reduire.png"></button></div>
			<div id="chat-body">
				<form class="" action="monApplication.php?action=chatSent" method="post" enctype="multipart/form-data" required>
					  <textarea  placeholder="Votre message" name="chat" rows="4" cols="60%" style="resize:none" ></textarea><br>
					<input type="file"  name="imageChat" width="30px" class=""></button>
					<button type="submit" width="30px" class="">Envoyer</button>
				  </form>
				<div class="chat-info">
					<?php		 
					$i=0;
					foreach ($context->chats as $chat ) {
						
						
					?>
				
				<div class="msg darker">
					<img class="image-utilisateur" src="<?php  
					if($chat->getEmetteur()[0]->avatar!=null)
					{
					  echo "".$chat->getEmetteur()[0]->avatar;
					}
					else
					{
						echo('https://www.hpci.ch/sites/chuv/themes/bootstrap_hpci/img/default-user-icon-profile.png');
					}
					?>" alt="Avatar" style="width:100%;">
					<?php echo $chat->getEmetteur()[0]->prenom.' '.$chat->getEmetteur()[0]->nom; ?>
					<p><strong><?php echo $chat->getPost()[0]->texte; ?></strong></p>
					
					<?php if($chat->getPost()[0]->image!=null) { ?>
						<img alt="image" class="img12" src="
						<?php echo $chat->getPost()[0]->image;?>
						">	
					<?php } ?>
					<br>	
					<span class="time-left"><?php echo $chat->getPost()[0]->date; ?></span>
				</div>
				<?php $i=$i+1;} //foreach ?>
			
				
				</div>
				</div>
	</div>
	
	  <!----------------------------------------------------->
<?php 

	} //session?>
