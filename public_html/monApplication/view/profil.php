<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>uapv</title>
  
  


  <style>
  html,body {
    background: #efefef;
 
}
.container {
  max-width: 1250px;
  margin: 30px auto 30px;
  padding: 0 !important;
  width: 90%;
  background-color: #fff;
}

header {
  background: #eee;
  background-image: url("https://image.noelshack.com/fichiers/2017/38/2/1505775648-annapurnafocus.jpg");
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  background-color: red;
  height: 250px;
}


.left {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}

.photo {
  width: 200px;
  height: 200px;
  margin-top: -120px;
  border-radius: 100px;
  border: 4px solid #fff;
}


.name {
  margin-top: 20px;
  font-family: "Open Sans";
  font-weight: 600;
  font-size: 18pt;
  color: #777;
}

.info {
  margin-top: -5px;
  margin-bottom: 5px;
  font-family: 'Montserrat', sans-serif;
  font-size: 11pt;
  color: #aaa;
}

.decon
{
	margin-left:90%;
	height:40px;
	padding:6px 0 6px 0;
	font:bold 13px Arial;
	background:#f5f5f5;
	color:#555;
	border-radius:2px;
	width:100px;
	border:1px solid #ccc;
	box-shadow:1px 1px 3px #999;
	margin-top:5px;

}




.desc-stat {
  margin-top: -15px;
  font-size: 10pt;
  color: #bbb;
}

.desc {
  text-align: center;
  margin-top: 25px;
  margin: 25px 40px;
  color: #999;
  font-size: 11pt;
  font-family: "Open Sans";
  padding-bottom: 25px;
  border-bottom: 1px solid #ededed;
}

.amies {
  display:         flex;
  list-style-type: none;
  width:           300px;
  flex-wrap:       wrap;
}

.amies,li {
  flex: 33%;
}

.amie_div {
	
	margin-top:30px;
	margin-left:30px;
}

.post_div {
	margin-left:20px;
	
}





.top {
  text-align: center;
}

.shadow {
  box-shadow: 0px 0px 5px 0px;
  padding-top: 10px;
}
</style>
  
</head>

<body>

  <div class="container">
  <header>
   <button onclick="<?php /*context::setSessionAttribute("user",null);*/ ?>" class="decon">Se déconecter</button>
  </header>
  <main>
    <div class="row">
      <div class="left col-lg-4">
        <div class="photo-left">
          <img class="photo" src="https://www.hpci.ch/sites/chuv/themes/bootstrap_hpci/img/default-user-icon-profile.png"/>
        </div>
        <h4 class="name"><?php echo "".$nom." ".$prenom; ?></h4>
        <p class="info">Date de naissance : <?php echo "nom :".$date_ns; ?></p>
        <p class="desc"> status : <?php echo "".$statut; ?></p>
        		<a href="#">Editer</a>

             </div>
      <div class="amie_div">
        <ul class="amies">
		
		<?php
		$i=0;
		while($i<10){
		echo"<li>amies ".$i."</li>";
	  $i++;
		}
  ?>
		</ul>

		 </div>

		
      </div>

	  <div class="post_div">
		
		
		
		
	  
  <div class="top">
    <h2>Postes</h2>
  </div>
  <?php  
  $j=0;
  while($j<5)
  { echo'
  <div class="roww">

    <div class="shadow">
      <div class="col-sm-12">
        <div class="col-sm-2">
          <img src="data:image/png;base64,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" class="img-circle" width="60px">
        </div>
        <div class="col-sm-8">
          <h4><a href="#">BRICH Oussama</a></h4>
          <p>bonjour  j espere que vous allez bien</p>
		  
		  <br><span>60</span>  <img width="20px" src="https://cdn.worldvectorlogo.com/logos/heart.svg">
        </div>
      </div>
    
      <div class="clearfix"></div>
    </div>
  </div>';
  $j++;
  }
   ?>
</div>
		</div>
  </main>
</div>
 
  
</body>
</html>
