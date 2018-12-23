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
		
		return context::SUCCESS; 
	}
	public static function index($request,$context)
	{	
		
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
	return context::SUCCESS;

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
			$context->executeAction("users",$request);
			$context->executeAction("posts",$request);	
			$context->executeAction("chats",$request);
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

			if(!empty($_FILES['imageChat']['name'])) {
			move_uploaded_file($_FILES['imageChat']['tmp_name'],'images/'.$_FILES['imageChat']['name']);
			$postInfo['image'] ='https://pedago02a.univ-avignon.fr/~uapv1900407/images/'.$_FILES['imageChat']['name'];
			}
			
			$postInfo['texte'] = $request['chat'];
			$postInfo['date'] = date("Y-m-d H:i:s");
			$post = new post($postInfo);
			$idPost = $post->save();
						
			$chatInfo['emetteur'] = $_SESSION['id'];
			$chatInfo['post'] = $idPost;
			$chat = new chat($chatInfo);
			$idMsg = $chat->save();
			context::redirect("monApplication.php?action=profil");
		}
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
					$allMsg=messageTable::getMessagesSentTo($_GET['id']);
					$context->allMsg=	$allMsg;
				}
		
			}
		return context::SUCCESS;
	}
	public static function message($request, $context)
	{
		if(!empty($request['action'])) {
			
			if(!empty($_FILES['image']['name'])) {	
			move_uploaded_file($_FILES['image']['tmp_name'],'images/'.$_FILES['image']['name']);
			$postInfo['image'] ='https://pedago02a.univ-avignon.fr/~uapv1900407/images/'.$_FILES['image']['name'];
			}
			
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
			echo "error".$_FILES['image']['error'];
			context::redirect("monApplication.php?action=profil");
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
			return context::SUCCESS;
		}
		return context::ERROR;
		}
		public static function editImage($request, $context)
	{
		if(isset($_FILES['imageProfil'])) {
			
			move_uploaded_file($_FILES['imageProfil']['tmp_name'],'images/'.$_FILES['imageProfil']['name']);			
			$userInfo['avatar'] ='https://pedago02a.univ-avignon.fr/~uapv1900407/images/'.$_FILES['imageProfil']['name'];
			$userInfo['id'] = $_SESSION['id'];
			$user = new utilisateur($userInfo);
			$id = $user->save();
			context::redirect("monApplication.php?action=profil");
		}
	}
		public static function share($request, $context)
		{

			if(!empty($_GET['id'])) {
				$msg=messageTable::getMessagesById($_GET['id'])[0];
				$postIn['post']=$msg->post;
				$postIn['parent'] = $msg->getParent()[0]->id;
				$postIn['emetteur'] = $_SESSION['id'];
				$postIn['destinataire'] = $_SESSION['id'];
				$postIn['aime']=0;
				$message = new message($postIn);
				$id = $message->save();
				return context::SUCCESS;
			}
			return context::ERROR;
		}
		public static function like($request, $context){
				$id=$_GET['id'];
				$message=messageTable::getMessagesbyId($id)[0];
				$messageUpdate['id']=$message->getId();
				$messageUpdate['aime']=$message->getLikes()+1;
				$messageUpdate = new message($messageUpdate);
				$messageUpdate->save();
				return context::SUCCESS;
		}
	}//fin de class
?>
