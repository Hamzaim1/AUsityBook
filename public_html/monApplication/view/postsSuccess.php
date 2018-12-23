<?php if(isset($_SESSION['user'])) {?>
	  
	  <!----------------------------------------------------->
	 
	  
	 
		<div class="post_div" width="100px">
		
		
		
		
	  
		<div class="top">
  </div> 
  <br><br>
  <?php 
	/*
	********************* les variable qu'on a utiliser ************************
	var_dump($row);
	var_dump($row->getPost());

	echo $row->getPost()->texte;
	echo $row->getPost()->date;	
	echo $row->getPost()->id;	
	echo $row->getPost()->image;	
	echo '<br>';
	echo  $row->emetteur;
	echo  $row->destinataire;
	echo  $row->aime;
	echo  $row->parent;

	echo $row->getDestinataire()[0]->nom;
	echo $row->getDestinataire()[0]->prenom;
	echo $row->getLikes();
	echo $row->getEmetteur()[0]->nom;
	echo $row->getEmetteur()[0]->prenom;

	*/
	
	foreach ($context->allMsg as $row ) {

	 echo '<div class="roww">
		<div class="shadow">
		  <div class="col-sm-12">
			<div class="col-sm-2">';
			
			 if($row->getEmetteur()[0]->avatar!=null)
			{
			  echo  '<img src="'.$row->getEmetteur()[0]->avatar.'" class="img-circle" width="60px">';
			}
            else
            {
				echo '<img src="https://www.hpci.ch/sites/chuv/themes/bootstrap_hpci/img/default-user-icon-profile.png" class="img-circle" width="60px">';
            }
			
			echo'
			</div>
			<div class="col-sm-8">
			  <h4><a href="#">'.$row->getEmetteur()[0]->prenom.'  '.$row->getEmetteur()[0]->nom.'</a></h4>
			  <p><strong><font size="4">'.$row->getPost()[0]->texte.'</font></strong></p>';
			 
			 if($row->getPost()[0]->image!=null){
			 echo '<img src="'.$row->getPost()[0]->image.'" width="600px" style="border-radius:8px;"><br><br>';
			 }

			 echo '<font style="vertical-align:text-bottom" size="4" >'.$row->getLikes().'</font><a href ="monApplication.php?action=like&id='.$row->id.'"><img style="vertical-align:top" width="20px" src="http://chittagongit.com//images/free-like-icon/free-like-icon-2.jpg"></a>
				   
					<br>destinataire : '.$row->getDestinataire()[0]->nom.'  '.$row->getDestinataire()[0]->prenom;
					
					if($row->getParent()!=null){
						echo '<br><i>parent : '.$row->getParent()[0]->prenom.' '.$row->getParent()[0]->nom.'</i>';
					}
					echo '
				    <br>'.$row->getPost()[0]->date.'
			</div>
			<br>
			<a class="partage" href="monApplication.php?action=share&id='.$row->id.'">partager</a>
		  </div>
		  <div class="clearfix"></div>
		</div>
	  </div><br><br><br>';
	}
   ?>
</div>
<script>
</script> 

<?php } //session?>
