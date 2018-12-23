<?php if(!isset($_SESSION['user']))
  header( "Refresh:0.01; url=monApplication.php?action=login", true, 303);
else{
 ?>

  <div class="profilBody">
  <header>
  </header>
    <div class="row">
      <div class="left col-lg-4">
        <div class="photo-left">
          <img class="photo" src="<?php  
			if($context->userProfil->avatar!=null)
			{
			  echo "".$context->userProfil->avatar;
			}
            else
            {
				echo('https://www.hpci.ch/sites/chuv/themes/bootstrap_hpci/img/default-user-icon-profile.png');
            }
            
            ?>"/>
           <?php if($context->userProfil->id==$_SESSION['id']) { ?>
            <button onclick="document.getElementById('modal-chat').style.display='block'" class="btn-sample">Modifier image</button>
         <div id="modal-chat" class="modal">
			
			<form class="modal-content animate" action="monApplication.php?action=editImage" method="post"
			enctype="multipart/form-data">
				
				<div class="imgcontainer">
				  <span onclick="document.getElementById('modal-chat').style.display='none'" class="close" title="Close PopUp">&times;</span>
				  <h1 style="text-align:center">Votre image : </h1>
				</div>

				<div class="container">
	    		  <input type="file" name="imageProfil" >
				</div>
					
				 <input type="submit" width="30px" value="modifier"/>
			</form>

		</div>
		<?php }?>
        </div>
        
        <h4 class="name"><?php echo "".$context->userProfil->nom." ".$context->userProfil->prenom; ?></h4>
        <p class="info">Date de naissance : <?php echo "".$context->userProfil->date_de_naissance; ?></p>
        <p class="desc"> statut : <?php echo "".$context->userProfil->statut; ?></p>
		<br>
		
		<?php if($context->userProfil->id==$_SESSION['id']){ ?>
		
		<button onclick="document.getElementById('modal-wrapper').style.display='block'" class="btn-sample">
		Editer</button>
		<?php }?>
		
		
		<div id="modal-wrapper" class="modal">
			<form class="modal-content animate" action="monApplication.php?action=statut" method="post">
				<div class="imgcontainer">
					<span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
					<h1 style="text-align:center">Modifier votre statut : </h1>
				</div>

				<div class="container">
					<textarea type="statut" placeholder="Votre statut" name="statut" rows="10" cols="70" style="resize:none" ></textarea>		 
				</div>
					<button type="submit" width="30px" class="Btn-Enregistrer">Enregistrer</button>
			</form>

		</div>
		<?php if($context->userProfil->id!=$_SESSION['id']) { ?>
			<button onclick="document.getElementById('modal-msg').style.display='block'" class="btn-sample">Envoyer message</button>
		<?php } ?>		
		<div id="modal-msg" class="modal">
		  
			<form class="modal-content animate" action=<?php echo '"monApplication.php?action=message&id='.$_GET['id'].'"';?> method="post"
			enctype="multipart/form-data">
				
				<div class="imgcontainer">
				  <span onclick="document.getElementById('modal-msg').style.display='none'" class="close" title="Close PopUp">&times;</span>
				  <h1 style="text-align:center">Votre message : </h1>
				</div>
 
				<div class="container">
				  <textarea type="text" placeholder="Votre message" name="text" rows="10" cols="70" style="resize:none" ></textarea>
	    		  <input type="file" name="image" >
				</div>
					
				 <input type="submit" width="30px" class="Btn-Enregistrer" value="Envoyer"/>
			</form>

		</div>

     </div>  
     
     
	   	  
<?php } ?>
