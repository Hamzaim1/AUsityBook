<?php
/*
 * Controler 
 */

class mainController
{

	public static function helloWorld($request,$context)
	{
		
	
		$context->mavariable="hello world";
	if(context::getSessionAttribute('user') != null) 
				
				
	return context::SUCCESS;
		
	}

	public static function superTest($request,$context)
	{
		$context->mavariable1=$request['param1'];
		$context->mavariable2=$request['param2'];
		return context::SUCCESS; 
	}
	public static function index($request,$context)
	{
		context::executeAction("profil",$request);
		return context::SUCCESS;
	}
	
	public static function login($context,$request){

		if(isset($_REQUEST['log']) && isset($_REQUEST['pass']))
		{	
		$returnLogin = utilisateurTable::getUserByLoginAndPass($_REQUEST['log'], $_REQUEST['pass']);
			if($returnLogin == false)
			{
			}		
			else 
			{
				context::setSessionAttribute("user",$returnLogin);
				context::setSessionAttribute("id",$returnLogin[0]['id']);

				context::redirect("monApplication.php?action=profil");
			}
		
		}
		 else
        {
            echo "welcome : ".$_SESSION['user']." vous etes déjas connecté  ... ";
        }				
		return context::SUCCESS;

	}
	public static function deconnexion($request,$context)
	{
	session_destroy();
	context::redirect("monApplication.php?action=login");
	}
	 
	 public static function profil($request,$context)
{

			if(isset($_SESSION['user']))
			{
				if(!isset($_GET['id']))
				{
				$user = utilisateurTable::getUserById($_SESSION['id']);
				$user=$user[0];
				$context->userProfil = $user;
				
				}
			else 
			{
				$user = utilisateurTable::getUserById($_GET['id']);
				$user=$user[0];
				$context->userProfil = $user;

				
			}

			}

	return context::SUCCESS;
	}
	
	
	public static function users($request,$context)
	{
		$context->users = utilisateurTable::getUsers();
		return context::SUCCESS;
	}
		
	public static function chats($request,$context){
		$context->chats=chatTable::getLast10Chat();
		return context::SUCCESS;
	}
	
	
	public static function chatSent($request, $context)
	{
		if(!empty($request['action'])) {

			$postInfo['texte'] = $request['chat'];
			$postInfo['date'] = date("Y-m-d H:i:s");
			$post = new post($postInfo);
			$idPost = $post->save();
						
			$chatInfo['emetteur'] = $_SESSION['id'];
			$chatInfo['post'] = $idPost;
			$chat = new chat($chatInfo);
			$idMsg = $chat->save();
			return context::SUCCESS;
		}
		return context::ERROR;
	}
	
	
	public static function posts($request,$context){
		
		if(isset($_SESSION['user']))
			{
				if(!isset($_GET['id']))
				{
					$allMsg=messageTable::getMessagesSentTo($_SESSION['id']);		
					$context->allMsg=	$allMsg;

				}
				else 
				{
					$allposts=messageTable::getMessagesSendTo($_GET['id']);
					$context->allposts=	$allposts;
				}
		
			}
		return context::SUCCESS;
	}
	
	
	public static function message($request, $context)
	{
		if(!empty($request['action'])) {

			$postInfo['texte'] = $request['text'];
			$postInfo['date'] = date("Y-m-d H:i:s");
			$post = new post($postInfo);
			$idPost = $post->save();
						
			$msgInfo['emetteur'] = $_SESSION['id'];
			$msgInfo['destinataire'] = $_GET['id'];
			$msgInfo['parent'] = $_SESSION['id'];		
			$msgInfo['post'] = $idPost;
			$msgInfo['aime']=0;
			$message = new message($msgInfo);
			$idMsg = $message->save();
		
			return context::SUCCESS;
		}
		return context::ERROR;
	}
	
		public static function statut($request, $context)
	{
		if(isset($request['statut'])) {
			$userInfo['statut'] = $request['statut'];
			$userInfo['id'] = $_SESSION['id'];
			$user = new utilisateur($userInfo);
			$id = $user->save();
			context::redirect("monApplication.php?action=profil");
			return context::SUCCESS;
		}
		return context::ERROR;
	}
	
		public static function share($request, $context)
		{

			if(!empty($_GET['id'])) {
				$p=messageTable::getMessagesById($_GET['id']);
				$postt=$p[0];
				$postIn['post']=$_GET['id'];
				$postIn['parent'] = $postt['parent'];
				$postIn['emetteur'] = $_SESSION['id'];
				$postIn['destinataire'] = $postt['destinataire'];
				$postIn['aime']=0;
				$message = new message($postIn);
				$id = $message->save();
				return context::SUCCESS;
			}
			return context::ERROR;
		}
		/*
		public static function like($request, $context){
				$id=$_GET['id'];
				$likeInfo['aime'] = messageTable::getLastMessagesById();
				$message = new message($voteInfo);
				$message->save();
		}*/
	
	
	
	
	}//fin de class


?>
