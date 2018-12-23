<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
	<title>UAPV MS</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	   
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"/>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="css/profil.css" rel="stylesheet">
	<link href="css/popup.css" rel="stylesheet">
	<link href="css/msg.css" rel="stylesheet">

	</head>
	<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <a class="navbar-brand" href="#">UAPV MS</a>
		</div>
		<ul class="nav navbar-nav">
		  <li class="active"><a href="#">Accueil</a></li>
		  <li><a href="#">Profil</a></li>
		  <li id="deco"><a  href="
		  <?php if(isset($_SESSION['user'])){echo "monApplication.php?action=deconnexion";}
		  else{echo "#";}?>"><?php
		  if(isset($_SESSION['user']))
		  {echo '<i class="decon"></i>'.'Déconnexion';}
		  else{echo '<i class="decon"></i>'.' Se connecter';}
		  
		  ?></a></li>
		</ul>
	  </div>
	</nav> 
		<?php
		if($action=="profil"){
			include("monApplication/view/profilSuccess.php");
			include("monApplication/view/usersSuccess.php");
			include("monApplication/view/chatsSuccess.php");
			include("monApplication/view/postsSuccess.php");
		}
		else{
		include($template_view);
		}
		?>
			<script src="js/popup.js" type="text/javascript"></script>
			<script src="js/msg_move.js" type="text/javascript"></script>
  </body>

</html>
