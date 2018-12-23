<?php if(isset($_SESSION['user'])) {?>
  
  <div class="amie_div" >
		<ul>
		<?php
	
				foreach ($context->users as $user ) {
				
				echo '<li>';	
				if($user->avatar!=null)
				{
				  echo  '<img src="'. $user->avatar.'" class="img-circle" width="30px">';
				}
				else
				{
					echo '<img src="https://www.hpci.ch/sites/chuv/themes/bootstrap_hpci/img/default-user-icon-profile.png" class="img-circle" width="30px">';
				}
				echo ' <a href="monApplication.php?action=profil&id='.$user->id.'">';
				echo ''.$user->prenom;
				echo '  '.$user->nom.'</a>';
				echo '<li>';
				}
       ?>
			
		</ul>

		</div>
		
     </div>
<?php } //session?>
